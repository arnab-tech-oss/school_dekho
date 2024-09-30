<?php
namespace App\Http\Controllers\SchoolAdmin;
use App\Models\School;
use App\Models\SchoolClaim;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class SchoolController extends Controller
{
    public function schools()
    {
        $id = Auth::user()->id;
        $total_schools = SchoolClaim::where('claim_id', Auth::user()->id)->count();
        $schoollist = SchoolClaim::with('school.reviews', 'payments')->where('claim_id', $id)->get();
        $addedschools = School::where('user_id', $id)->get();
        foreach ($schoollist as $sch) {
            $payments = $sch->payments->sortByDesc("validated_at")->values();
            $expiry_date = null;
            if (sizeof($payments) > 0) {
                $expiry_date = $payments[0]->validated_at;
            }
            $sch->expiry_date = $expiry_date;
            $school_review = [];
            array_push($school_review, $sch->school->reviews);
            $school_review = $school_review[0];
            $sum = 0;
            foreach ($school_review as $review) {
                $sum = $sum + $review->rating;
            }
            if(sizeof($school_review)>0){
            $avreage_rating = $sum / sizeof($school_review);
            }
            else{
            $avreage_rating = $sum;    
            }
            $sch->review = $avreage_rating;
        }
        // return $schoollist;
        return view('school_admin_new.myschool', compact('schoollist', 'addedschools', 'total_schools'));
    }
}
