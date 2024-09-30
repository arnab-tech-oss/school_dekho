<?php
namespace App\Http\Controllers\SchoolAdmin;

use App\Http\Controllers\Controller;
use App\Models\Complimentary;
use App\Models\ComplimentaryImage;
use App\Models\School;
use App\Models\SchoolClaim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Payment;
class SchoolComplimentaryController extends Controller
{
    public function complimentary_list(Request $request)
    {
       $total_schools = SchoolClaim::where('claim_id', Auth::user()->id)->count();
        $payment_status = Payment::with('claim')
            ->where('status', 1)
            ->where('validated_at', '>=', date('Y-m-d H:i:s', time()))
            ->where('claim_id', auth()->user()->id)
            ->get(); 
        if(sizeof($payment_status) > 0){
            
            $events = Complimentary::all();
            $months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            if (isset($request->month)) {
                $events = Complimentary::where('month', $request->month)->get();
                return view('school_admin_new.complimentary.list', compact('total_schools', 'events', 'months'));
            }
            return view('school_admin_new.complimentary.list', compact('total_schools', 'events', 'months'));
            }else{
            return view('school_admin_new.complimentary.subscription',compact('total_schools'));
            }
    }
    public function event_pictures($id)
    {
        $total_schools = SchoolClaim::where('claim_id', Auth::user()->id)->count();
        $event_pictures = ComplimentaryImage::where('complaintary_id', $id)->get();
        // $event = Complimentary::where('id', $event_pictures->complaintary_id)->first();
        $user_id = Auth::user()->id;
        $schools = SchoolClaim::with('school')->where('claim_id', $user_id)->where('verify', 9)->get();
        return view('school_admin_new.complimentary.pictures', compact('event_pictures', 'total_schools', 'schools'));
    }
    public function use_image($id)
    {
        $total_schools = SchoolClaim::where('claim_id', Auth::user()->id)->count();
        $event_picture = ComplimentaryImage::where('id', $id)->first();
        $event = Complimentary::where('id', $event_picture->complaintary_id)->first();
        $school_id = session()->get('school_id');
        $school_details = School::with('school_address')->where('id', $school_id)->first();
        return view('school_admin_new.complimentary.choose', compact('event_picture', 'total_schools', 'school_id', 'school_details', 'event'));
    }
    public function school_selection(Request $request)
    {
        $school_id = $request->school_id;
        $request->session()->put("school_id", $school_id);
        return back();
    }
}
