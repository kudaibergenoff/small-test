<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TicketRequest;
use App\Services\TicketService;
use App\Models\{Ticket, Answer, User};
use Carbon\Carbon;
use DebugBar\DebugBar;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with('clients')->get();

        /**Проверка времени последнего запроса клиента */
        $check_ticket_time = Ticket::whereHas('clients', function($q) {
            $q->where('user_id', Auth::user()->id);
        })->where('created_at', '>', Carbon::parse('-24 hours'))->get();
        
        /**Получить тикеты */
        if(Auth::user()->hasRole('client'))
        {
            $tickets = Ticket::with('clients')->whereHas('clients', function($q) {
                $q->where('id', Auth::user()->id);
            })->get();
        }
        return view('web.tickets.index', ['tickets' => $tickets, 'check_ticket_time' => $check_ticket_time]);
    }

    public function create()
    {
        return view('web.tickets.add');
    }

    public function add(TicketRequest $request)
    {
        $ticket = TicketService::createNewTicket($request);

        if(Auth::user()->hasRole('client'))
        {
            $ticket->clients()->attach(Auth::user()->id);
        }

        if($request->file() != null)
        {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('files'), $filename);

            $ticket->file = $filename;
            $ticket->save();
        }

        if(!$ticket)
        {
            return back()->with(['error' => 'Упс!Новый запрос не добавился!']);
        }
        return redirect()->route('tickets')->with(['success' => 'Запрос успешно добавился!']);
    }

    public function show($id)
    {
        $ticket = Ticket::with(['clients', 'managers', 'answers'])->where('id', $id)->first();

        //dd($ticket);

        return view('web.tickets.show', ['ticket' => $ticket]);
    }

    public function answered(Request $request)
    {
        $answer = Answer::create([
            'ticket_id' => $request->ticket_id,
            'answer'    => $request->answer
        ]);
        if($answer)
        {
            $ticket  = Ticket::find($request->ticket_id);
            $ticket->update(['status' => 'answered']);
            $ticket->managers()->attach(['user_id' => Auth::user()->id]);
            return redirect()->route('tickets');
        }else{
            return back();
        }
    }
}
