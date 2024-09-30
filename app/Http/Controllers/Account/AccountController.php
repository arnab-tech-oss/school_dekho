<?php

namespace App\Http\Controllers\Account;
//Arvin Check
use App\Models\School;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BillSession;
use App\Models\SchoolBill;
use App\Models\SchoolBillOriginal;
use App\Models\SchoolBillProforma;
use Illuminate\Support\Facades\Session;
use PDF;

class AccountController extends Controller
{
    public function dashboard()
    {
        $total_original_bills = SchoolBillOriginal::count();
        $total_proforma_bills = SchoolBillProforma::count();
        return view('account.dashboard', compact('total_original_bills', 'total_proforma_bills'));
    }
    public function list()
    {
        $bills = SchoolBillOriginal::with('school', 'bill_session')->paginate(5);
        return view('account.bill.original_list', compact('bills'));
    }
    public function proforma_list()
    {
        $bills = SchoolBillProforma::with('school')->where('bill_type', "Proforma")->paginate(5);
        return view('account.bill.proforma_list', compact('bills'));
    }
    public function add()
    {
        $all_schools = School::with('school_address')->get();
        $all_bill_sessions = BillSession::all();
        // return $all_schools;
        return view('account.bill.add', compact('all_schools', 'all_bill_sessions'));
    }
    public function original_edit($id)
    {
        $bill_details = SchoolBillOriginal::where('id', $id)->first();
        $all_schools = School::with('school_address')->get();
        return view('account.bill.original_edit', compact('bill_details', 'all_schools'));
    }
    public function proforma_edit($id) 
    {
        $bill_details = SchoolBillProforma::where('id', $id)->first();
        $all_schools = School::with('school_address')->get();
        return view('account.bill.proforma_edit', compact('bill_details', 'all_schools'));
    }
    public function submit(Request $request) 
    {
        if ($request->bill_type == "Proforma") {
            $entity = new SchoolBillProforma();
            $entity->school_id = $request->school_id;
            $entity->bill_type = $request->bill_type;
            $entity->location  = $request->location;
            $entity->mobile    = $request->phone;
            $entity->email_id  = $request->email;
            $entity->bill_session_id = $request->bill_session_id;
            $entity->total_fees_amount = $request->proforma_total_amount;
            $entity->received_amount = ($request->proforma_total_amount) / 1.18;
            $entity->gst_number = "19AELFS2780L1ZA";
            $entity->cgst = ($entity->total_fees_amount - $entity->received_amount) / 2;
            $entity->sgst = ($entity->total_fees_amount - $entity->received_amount) / 2;
            $entity->total = $request->proforma_total_amount;
            $entity->receipt_date = $request->receipt_date;
            $entity->save();
            return redirect()->back()->with('message', "Proforma Bill has been added successfully");
        }
        $entity = new SchoolBillOriginal();
        $entity->school_id = $request->school_id;
        $entity->bill_type = $request->bill_type;
        $entity->bill_session_id = $request->bill_session_id;
        $entity->location  = $request->location;
        $entity->mobile    = $request->phone;
        $entity->email_id  = $request->email;
        $entity->total_fees_amount = $request->total_fee;
        $entity->received_amount = ($request->received_fees) / 1.18;
        $entity->gst_number = "19AELFS2780L1ZA";
        $entity->gst_number_school = $request->gst_number_school;
        $entity->cgst = ($request->received_fees * (1 - (1 / 1.18))) / 2;
        $entity->sgst = ($request->received_fees * (1 - (1 / 1.18))) / 2;
        $entity->total = $request->received_fees;
        $entity->newly_received = $request->received_fees;
        $previous_received_amounts = SchoolBillOriginal::where('school_id', $request->school_id)->where('bill_session_id', $request->bill_session_id)->get();
        if (sizeof($previous_received_amounts) > 0) {
            // return "exists";
            $updated_received_amount = 0;
            foreach ($previous_received_amounts as $previous_received) {
                $updated_received_amount = $updated_received_amount + $previous_received->total;
            }
            $entity->total = $updated_received_amount + $entity->total;
            // return $entity->total;
        }
        $entity->due_amount = $request->total_fee - $entity->total;
        // return $entity->due_amount;
        $entity->payment_mode = $request->payment_mode;
        if ($request->payment_mode == "Online") {
            $entity->transaction_id = $request->transaction_id;
        } elseif ($request->payment_mode == "cheque") {
            $entity->bank_name = $request->bank_name;
            $entity->cheque_number = $request->check_number;
        }
        $entity->receipt_date = $request->receipt_date;
        $entity->save();
        return redirect()->back()->with('message', "Original Bill has been added successfully");
    }
    public function original_update(Request $request)
    {
        $bill_details = SchoolBillOriginal::where('id', $request->id)->first();
        $bill_details->school_id = $request->school_id;
        // $bill_details->bill_type = $request->bill_type;
        $bill_details->location  = $request->location;
        $bill_details->mobile    = $request->phone;
        $bill_details->email_id  = $request->email;
        $bill_details->gst_number = "19AELFS2780L1ZA";
        $bill_details->gst_number_school = $request->gst_number_school;
        $bill_details->total_fees_amount = $request->total_fee;
        $bill_details->received_amount = ($request->received_fees) / 1.18;
        $bill_details->cgst = ($request->received_fees * (1 - (1 / 1.18))) / 2;
        $bill_details->sgst = ($request->received_fees * (1 - (1 / 1.18))) / 2;
        $bill_details->due_amount = $request->total_fee - $request->received_fees;
        $bill_details->total = $request->received_fees;
        $bill_details->receipt_date = $request->receipt_date;
        // if ($request->payment_mode == "Online") {
        //     $bill_details->transaction_id = $request->transaction_id;
        // } elseif ($request->payment_mode == "cheque") {
        //     $bill_details->bank_name = $request->bank_name;
        //     $bill_details->cheque_number = $request->check_number;
        // }
        $bill_details->update($bill_details->toArray());
        return redirect()->back()->with('message', "Original Bill has been updated successfully");
    }
    public function proforma_update(Request $request)
    {
        $bill_details = SchoolBillProforma::where('id', $request->id)->first();
        $bill_details->school_id = $request->school_id;
        $bill_details->location  = $request->location;
        $bill_details->mobile    = $request->phone;
        $bill_details->email_id  = $request->email;
        $bill_details->school_gst_number = $request->school_gst_number;
        $bill_details->total_fees_amount = $request->total_fee;
        $bill_details->received_amount = ($request->received_fees) / 1.18;
        $bill_details->gst_number = "19AELFS2780L1ZA";
        $bill_details->cgst = ($request->received_fees * (1 - (1 / 1.18))) / 2;
        $bill_details->sgst = ($request->received_fees * (1 - (1 / 1.18))) / 2;
        $bill_details->total = $request->total_fee;
        $bill_details->receipt_date = $request->receipt_date;
        $bill_details->update($bill_details->toArray());
        return redirect()->back()->with('message', "Proforma Bill has been updated successfully");
    }
    public function schoolcopy_original($id)
    {
        $bill_details = SchoolBillOriginal::with('school')->where('id', $id)->first();
        $bill_id      = "0000" . $bill_details->id;
        $bill_id      = substr($bill_id, -12);
        $data = [
            'title' => 'Welcome to SchoolDekho.org',
            'date' => date('m/d/Y'),
            'bill' => $bill_details,
            'bill_id' => $bill_id,
        ];
        //return view('account.bill.schoolpdf', $data);
        //$pdf = PDF::loadView('account.bill.schoolpdf', $data);
        if ($bill_details->bill_type == "Proforma") {
            return view('account.bill.schoolproformapdf', $data);
        } elseif ($bill_details->status == 1) {
            return view('account.bill.schoolpdf', $data);
        } else {
            return view('account.bill.schoolcancelpdf', $data);
        }
        //return $pdf->download('SchoolReceipt.pdf');
    }
    public function schoolcopy_proforma($id)
    {
        $bill_details = SchoolBillProforma::with('school')->where('id', $id)->first();
        $bill_id      = "0000" . $bill_details->id;
        $bill_id      = substr($bill_id, -12);
        $data = [
            'title' => 'Welcome to SchoolDekho.org',
            'date' => date('m/d/Y'),
            'bill' => $bill_details,
            'bill_id' => $bill_id,
        ];
        //return view('account.bill.schoolpdf', $data);
        //$pdf = PDF::loadView('account.bill.schoolpdf', $data);
        if ($bill_details->bill_type == "Proforma" && $bill_details->status = 1) {
            return view('account.bill.schoolproformapdf', $data);
        }
        return view('account.bill.schoolpdf', $data);
        //return $pdf->download('SchoolReceipt.pdf');
    }
    public function officecopy_original($id)
    {
        $bill_details = SchoolBillOriginal::with('school')->where('id', $id)->first();
        $bill_id      = "0000" . $bill_details->id;
        $bill_id      = substr($bill_id, -12);
        $data = [
            'title' => 'Welcome to SchoolDekho.org',
            'date' => date('m/d/Y'),
            'bill' => $bill_details,
            'gst'  => $bill_details->fee_amount,
            'bill_id' => $bill_id,
        ];
        if ($bill_details->bill_type == "Proforma") {
            return view('account.bill.officeproformapdf', $data);
        }
        //$pdf = PDF::loadView('account.bill.officepdf', $data);
        elseif ($bill_details->status == 1) {
            return view('account.bill.officepdf', $data);
        } else {
            return view('account.bill.officecancelpdf', $data);
        }
        //return $pdf->download('OfficeCopy.pdf');
    }
    public function officecopy_proforma($id)
    {
        $bill_details = SchoolBillProforma::with('school')->where('id', $id)->first();
        $bill_id      = "0000" . $bill_details->id;
        $bill_id      = substr($bill_id, -12);
        $data = [
            'title' => 'Welcome to SchoolDekho.org',
            'date' => date('m/d/Y'),
            'bill' => $bill_details,
            'gst'  => $bill_details->fee_amount,
            'bill_id' => $bill_id,
        ];
        if ($bill_details->bill_type == "Proforma") {
            return view('account.bill.officeproformapdf', $data);
        }
        //$pdf = PDF::loadView('account.bill.officepdf', $data);
        return view('account.bill.officepdf', $data);
        //return $pdf->download('OfficeCopy.pdf');
    }
    public function cancel_original_bill($id)
    {
        $bill_details = SchoolBillOriginal::where('id', $id)->first();
        $bill_details->status = 0;
        $bill_details->update($bill_details->toArray());
        return redirect()->back();
    }
    public function logout()
    {
        Session::flush();
        // Auth::logout();
        return redirect()->route('schools.index');
    }
}
