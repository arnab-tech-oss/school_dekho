<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function ticket_list()
    {
        $all_tickets = Support::paginate(5);
        return view('admin.ticket.list', compact('all_tickets'));
    }

    public function ticket_details($id)
    {
        $ticket_details = Support::with('school_admin')->where('id', $id)->first();
        return view('admin.ticket.details', compact('ticket_details'));
    }

    public function ticket_solve($id)
    {
        $ticket_details = Support::where('id', $id)->first();
        $ticket_details->status = 1;
        $ticket_details->update($ticket_details->toArray());
        return redirect()->back();
    }
}
