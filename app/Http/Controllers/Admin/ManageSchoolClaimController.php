<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\School;
use App\Models\SchoolAcademic;
use App\Models\SchoolClaim;
use App\Models\SchoolClaimQuery;
use App\Models\SchoolContact;
use App\Models\SchoolEligibility;
use App\Models\SchoolFacility;
use App\Models\SchoolFees;
use App\Models\SchoolHour;
use App\Models\SchoolImage;
use App\Models\SeatAvailability;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Str;
use Mail;
use App\Core\Helper;
use App\Core\RequsetMethod;
use App\Mail\SendEmailVerification;
use App\Mail\SendSchoolCredentials;
class ManageSchoolClaimController extends Controller
{
    public function claim_list()
    {
        $all_claim_lists = SchoolClaimQuery::where('school_claim',0)->latest()->paginate(10);
        return view('admin.school.view.schoolclaimqueries', compact('all_claim_lists'));
    }
    public function claim_register_list()
    {
        $all_claim_lists = SchoolClaimQuery::where('school_claim',1)->latest()->paginate(10);
        return view('admin.school.view.schoolclaimqueries', compact('all_claim_lists'));
    }

    public function claimer_details($id)
    {
        $claimer_details = SchoolClaimQuery::where('id', $id)->first();
        $schools = School::all();
        $users   = User::all();
        return view('admin.school.view.claimquerydetails', compact('claimer_details', 'schools', 'users'));
    }

    public function create_user(Request $request)
    {
        $entity = new User();
        $entity->name  = $request->name;
        $entity->email = $request->email;
        $email = User::where('email', $request->email)->first();
        if ($email) {
            return redirect()->back()->with("message", "This email id has already been used");
        }
        $entity->password = Hash::make($request->password);
        $entity->role = 2;
        $entity->save();
        return redirect()->back()->with("message", "User has been created successfully");
    }

    public function create_school(Request $request)
    {
        $entity = new School();
        $entity->name = $request->school_name;
        $entity->save();
        $contact = new SchoolContact();
        $contact->school_id = $entity->id;
        $contact->save();
        $eligibility = new SchoolEligibility();
        $eligibility->school_id = $entity->id;
        $eligibility->save();
        $fees = new SchoolFees();
        $fees->school_id = $entity->id;
        $fees->save();
        $seats = new SeatAvailability();
        $seats->school_id = $entity->id;
        $seats->save();
        $facility = new SchoolFacility();
        $facility->school_id = $entity->id;
        $facility->save();
        $image = new SchoolImage();
        $image->school_id = $entity->id;
        $image->save();
        $hour = new SchoolHour();
        $hour->school_id = $entity->id;
        $hour->save();
        $id = $entity->id;
        $name = str_replace(" ", "-", $entity->name) . "-" . $id;
        $school_slug = School::where('id', $id)->update(['slug' => $name]);
        return redirect()->back()->with("message", "School added successfully");
    }

    public function create_claim(Request $request)
    {
        $claim = SchoolClaimQuery::where('id', $request->claim_id)->first();
        
        $entity = new User();
        $entity->name  = $claim->contact_person;
        $entity->email = $claim->official_email;
        $email = User::where('email', $claim->official_email)->first();
        // dd($email);
        if ($email) {
            return redirect()->back()->with("message", "This email id has already been used");
        }
        $entity->password = Hash::make("123456");
        $entity->role = '2';
        $entity->save();
        // Auth::login($entity);
        if($request->school != null)
        {
            $school_claim = new SchoolClaim();
            $school_claim->school_id = $request->school;
            $school_claim->claim_id  = $entity->id;
            $school_claim->phone     = $claim->official_contact;
            $school_claim->name      = $claim->contact_person;
            $school_claim->email     = $claim->official_email;
            $school_claim->verify    = 9;
            $school_claim->save();
            
            $trial = new Payment();
            $trial->school_id  = $request->school;
            $trial->claim_id   = $entity->id;
            $trial->school_claim_id = $school_claim->id;
            $trial->amount = 100;
            $trial->status = 1;
            $trial->payment_id = "pay_" . substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'), 1, 14);
            $date = strtotime(date('Y-m-d'));  // if today :2013-05-23
    
            $newDate = date('Y-m-d', strtotime('+15 days', $date));
            $trial->validated_at = $newDate;
            $trial->save();
        }else{
            $entity2 = new School();
            $entity2->name = $request->school_name;
            $entity2->save();
            
            $contact = new SchoolContact();
            $contact->school_id = $entity2->id;
            $contact->save();
            
            $eligibility = new SchoolEligibility();
            $eligibility->school_id = $entity2->id;
            $eligibility->save();
            
            $fees = new SchoolFees();
            $fees->school_id = $entity2->id;
            $fees->save();
            
            $seats = new SeatAvailability();
            $seats->school_id = $entity2->id;
            $seats->save();
            
            $facility = new SchoolFacility();
            $facility->school_id = $entity2->id;
            $facility->save();
            
            $image = new SchoolImage();
            $image->school_id = $entity2->id;
            $image->save();
            
            $hour = new SchoolHour();
            $hour->school_id = $entity2->id;
            $hour->save();
            
            $id = $entity2->id;
            $name = str_replace(" ", "-", $entity2->name) . "-" . $id;
            $school_slug = School::where('id', $id)->update(['slug' => $name]);
    
            $school_claim = new SchoolClaim();
            $school_claim->school_id = $entity2->id;
            $school_claim->claim_id  = $entity->id;
            $school_claim->phone     = $request->phone;
            $school_claim->name      = $request->name;
            $school_claim->email     = $request->email;
            $school_claim->verify    = 9;
            $school_claim->save();
            
            $trial = new Payment();
            $trial->school_id  = $entity2->id;
            $trial->claim_id   = $entity->id;
            $trial->school_claim_id = $school_claim->id;
            $trial->amount = 100;
            $trial->status = 1;
            $trial->payment_id = "pay_" . substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'), 1, 14);
            $date = strtotime(date('Y-m-d'));  // if today :2013-05-23
    
            $newDate = date('Y-m-d', strtotime('+15 days', $date));
            $trial->validated_at = $newDate;
            $trial->save();
        }
        // $claimer_details = SchoolClaimQuery::where('id',$request->claim_id)->first();
        $claim->status = 2;
        $claim->save();
        
        Mail::to($claim->official_email)->send(new SendSchoolCredentials($claim));
        
        return redirect()->back()->with("message", "School claimed successfully by the user");
    }
    
    public function claim_email_verify($id)
    {
        $claim_details = SchoolClaimQuery::where('id', $id)->first();

        $verification_code = Str::random(60);

        $claim_details->email_verification_code = $verification_code;
        $claim_details->status = 1;
        $claim_details->save();

        Mail::to($claim_details->official_email)->send(new SendEmailVerification($claim_details));
        
        return redirect()->back()->with("message", "Email verification mail has been sent to official email.");
    }

    public function claim_mobile_verify($code)
    {
        $claim_details = SchoolClaimQuery::where('email_verification_code', $code)->first();
        $claim_details->status = 3;
        $claim_details->save();

        $otp = substr(str_shuffle('1234567890'),1,4);

        $response = Http::get("http://pertinaxsolution.com/api/mt/SendSMS?senderid=SKLDKO&channel=trans&DCS=0&flashsms=0&number=91".$claim_details->contact_number."&text=Your school dekho OTP is ".$otp."&route=29&apikey=LjeeHNL1gkiGE2uUDR5U8w");

        $jsonData = $response->json();

        if($jsonData['ErrorCode']=='000')
            return view('email.otp-verify', ['claim_id'=>$claim_details->id]);
            
        return redirect()->back()->with("message", "Sending OTP");
    }

    public function claim_mobile_otp(Request $request)
    {
        // dd($request);
        $claim_details = SchoolClaimQuery::where('id', $request->claim_id)->first();
        $claim_details->status = 2;
        $claim_details->save();
        
        return redirect()->back()->with("message", "Our executive will be in touch with you soon.");
    }
}
