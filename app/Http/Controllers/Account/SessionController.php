<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\BillSession;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function bill_session_list()
    {
        $bill_sessions = BillSession::all();
        return view('account.session.list', compact('bill_sessions'));
    }

    public function bill_session_add()
    {
        return view('account.session.add');
    }

    public function bill_session_submit(Request $request)
    {
        $bill_session = new BillSession();
        $bill_session->session = $request->session;
        $bill_session->save();
        return redirect()->back()->with('message', 'Session added successfully');
    }
}
