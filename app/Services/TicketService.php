<?php
namespace App\Services;

use App\Models\{Ticket};
use App\Http\Requests\TicketRequest;

class TicketService {
    public static function createNewTicket(TicketRequest $request)
    {
        $ticket = Ticket::create([
            'subject' => $request->subject,
            'mssg' => $request->mssg,
            'status' => $request->status,
            'file' => ''
        ]);

        if(!$ticket)
        {
            return false;
        }

        return $ticket;
    } 
}