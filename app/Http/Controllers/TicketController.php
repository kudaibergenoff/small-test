<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TicketRequest;
use App\Services\TicketService;
use App\Models\{Ticket};
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index()
    {
        return view('web.tickets.index');
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
}
