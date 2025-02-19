<?php
namespace App\Http\Controllers\SchoolAdmin;

use App\Models\City;
use App\Models\State;
use App\Models\School;
use App\Core\FileHelper;
use App\Models\District;
use App\Models\SchoolFees;
use App\Models\SchoolHour;
use App\Models\SchoolBoard;
use App\Models\SchoolClaim;
use App\Models\SchoolImage;
use App\Models\SchoolMedium;
use Illuminate\Http\Request;
use App\Models\SchoolContact;
use App\Models\SchoolCategory;
use App\Models\SchoolFacility;
use App\Models\SchoolEligibility;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SchoolEditController extends Controller
{
    public function school_about($id)
    {
        // school_about
        $school_exists = SchoolClaim::where('claim_id', Auth::user()->id)->where('school_id', $id)->first();
        $allboards = SchoolBoard::get();
        $allmedium = SchoolMedium::get();
        $allcategory = SchoolCategory::get();
        $school_details = School::with('medium', 'categories', 'boards')->where('id', $id)->first();
        $total_schools = SchoolClaim::where('claim_id', Auth::user()->id)->count();
        //   school_principal

        $school_principal_details = School::where('id', $id)->first();
        // school_contact

        $school_id = $id;
        $allstates = State::all();
        $allcities = City::all();
        $alldistricts = District::all();
        $school_contact_details = SchoolContact::with('states')->where('school_id', $id)->first();

        //Eligibility
        $school_eligibility_details = SchoolEligibility::where('school_id', $id)->first();

        //opening_hour
        $school_opening_hour = SchoolHour::where('school_id', $id)->first();

        //fees
        $school_fees_structure = SchoolFees::where('school_id', $id)->first();

        //facilities
        $school_facilities = SchoolFacility::where('school_id', $id)->first();

        //gallery
        $school_gallery = SchoolImage::where('school_id', $id)->first();
        $total_images = sizeof($school_gallery?->school_image);
        $school_principal_details = School::where('id', $id)->first();

        return view('school_admin_new.edit.about', compact('school_details', 'allboards', 'allmedium', 'allcategory', 'id', 'total_schools', 'school_exists', 'allstates', 'allcities', 'alldistricts', 'school_contact_details', 'school_principal_details', 'school_eligibility_details', 'school_opening_hour', 'school_fees_structure', 'school_facilities', 'school_gallery', 'total_images', 'school_principal_details'));
    }
    public function update_school_about(Request $request) 
    {
        // return $request->all();
        $entity = School::where('id', $request->school_id)->first();
        $entity->name = $request->school_name;
        $entity->about = $request->about;
        $entity->registration_no = $request->registration_no;
        $entity->board = $request->board;
        $entity->school_type = $request->school_type;
        $entity->school_medium_id = $request->medium;
        $entity->category = $request->category;
        $update = $entity->update($entity->toArray());
        return redirect()->route('schooladmin.about_new.edit', $request->school_id)->with('message', 'School information updated. !!!');
    }

    // public function update_school_logo(Request $request)
    // {
    //      $entity = School::where('id', $request->school_id)->first();
    //      $entity->school_logo = FileHelper::Upload($request->logo_path, null, FileHelper::$logo_path)->upload_name;
    //      $entity->update($entity->toArray());
    //      return redirect()->back();
    // }

    public function school_principal($id)
    {
        $school_exists = SchoolClaim::where('claim_id', Auth::user()->id)->where('school_id', $id)->first();
        $school_principal_details = School::where('id', $id)->first();
        $total_schools = SchoolClaim::where('claim_id', Auth::user()->id)->count();
        return view('school_admin_new.edit.principal', compact('school_principal_details', 'total_schools', 'school_exists'));
    }

    public function update_school_principal(Request $request)
    {
        // return $request->principal_pic;
        $principal_details = School::where('id', $request->school_id)->first();
        $principal_details->principal_name = $request->principal_name;
        $principal_details->principal_desk = $request->principal_desk;
        $principal_details->principal_pic = FileHelper::Upload($request->principal_pic, $principal_details->principal_pic, FileHelper::$principal)->upload_name;
        $principal_details->update($principal_details->toArray());
        return redirect()->back()->with('message', 'School principal updated. !!!')->with('tab', 2);

    }

    public function school_contact($id)
    {
        $school_exists = SchoolClaim::where('claim_id', Auth::user()->id)->where('school_id', $id)->first();
        $school_id = $id;
        $allstates = State::all();
        $allcities = City::all();
        $alldistricts = District::all();
        $school_contact_details = SchoolContact::with('states')->where('school_id', $id)->first();
        $total_schools = SchoolClaim::where('claim_id', Auth::user()->id)->count();
        $school_details = School::with('medium', 'categories', 'boards')->where('id', $id)->first();
        return view('school_admin_new.edit.contact', compact('school_contact_details', 'allstates', 'allcities', 'alldistricts', 'school_id', 'total_schools', 'school_details', 'school_exists'));
    }
    public function update_school_contact(Request $request)
    {
        // if ($request->terms) {
            $entity = SchoolContact::where("school_id", $request->school_id)->first();
            $entity->address = $request->address;
            $entity->state_id = $request->state_id;
            $entity->city = $request->city;
            $entity->district_id = $request->district_id;
            $entity->pincode = $request->pincode;
            $entity->email = $request->email;
            $entity->contact = $request->phone;
            $entity->alt_contact = $request->alt_phone;
            $entity->fb = $request->fb_link;
            $entity->insta = $request->insta_link;
            $entity->twitter = $request->twitt_link;
            $entity->linkedin = $request->linkedin;
            $entity->lattitude = $request->lat;
            $entity->longitude = $request->long;
            $update = $entity->update($entity->toArray());
            return redirect()->back()->with('message', 'School contact information updated. !!!')->with('tab', 5);
        // } else {
        //     return redirect()->back()->with('message', 'Accept terms.')->with('tab', 5);
        // }
    }
    public function eligibility($id)
    {
        $school_exists = SchoolClaim::where('claim_id', Auth::user()->id)->where('school_id', $id)->first();
        $school_eligibility_details = SchoolEligibility::where('school_id', $id)->first();
        $school_details = School::with('medium', 'categories', 'boards')->where('id', $id)->first();
        $total_schools = SchoolClaim::where('claim_id', Auth::user()->id)->count();
        return view('school_admin_new.edit.eligibility', compact('school_eligibility_details', 'total_schools', 'school_details', 'school_exists'));
    }
    public function update_school_elligibility(Request $request)
    {
        // if ($request->term) {
            $entity = new SchoolEligibility();
            $entity->pre_nursery = $request->pre_nursery;
            $entity->nursery = $request->nursery;
            $entity->lkg = $request->lkg;
            $entity->ukg = $request->ukg;
            $entity->kg = $request->kg;
            $entity->class_one = $request->one;
            $entity->class_two = $request->two;
            $entity->class_three = $request->three;
            $entity->class_four = $request->four;
            $entity->class_five = $request->five;
            $entity->class_six = $request->six;
            $entity->class_seven = $request->seven;
            $entity->class_eight = $request->eight;
            $entity->class_nine = $request->nine;
            $entity->class_ten = $request->ten;
            $entity->class_eleven = $request->eleven;
            $entity->class_twelve = $request->twelve;
            $update = SchoolEligibility::where("school_id", $request->id)->update($entity->toArray());
            return redirect()->back()->with('message', 'School eligibility information updated. !!!')->with('tab', 6);
        // } else {
        //     return redirect()->back()->with('message', 'Accept terms.')->with('tab', 6);
        // }
    }
    public function fees_structure($id)
    {
        $school_exists = SchoolClaim::where('claim_id', Auth::user()->id)->where('school_id', $id)->first();
        $school_fees_structure = SchoolFees::where('school_id', $id)->first();
        $total_schools = SchoolClaim::where('claim_id', Auth::user()->id)->count();
        $school_details = School::with('medium', 'categories', 'boards')->where('id', $id)->first();
        return view('school_admin_new.edit.fees', compact('school_fees_structure', 'total_schools', 'school_details', 'school_exists'));
    }
    public function update_fees_structure(Request $request)
    {
        $schoolfees = new SchoolFees();
        $schoolfees->pre_nursery = $request->class_prenursery_admission . ',' . $request->class_prenursery_annual;
        $schoolfees->nursery = $request->class_nursery_admission . ',' . $request->class_nursery_annual;
        $schoolfees->lkg = $request->class_lkg_admission . ',' . $request->class_lkg_annual;
        $schoolfees->kg = $request->class_kg_admission . ',' . $request->class_kg_annual;
        $schoolfees->ukg = $request->class_ukg_admission . ',' . $request->class_ukg_annual;
        $schoolfees->class_one = $request->class_one_admission . ',' . $request->class_one_annual;
        $schoolfees->class_two = $request->class_two_admission . ',' . $request->class_two_annual;
        $schoolfees->class_three = $request->class_three_admission . ',' . $request->class_three_annual;
        $schoolfees->class_four = $request->class_four_admission . ',' . $request->class_four_annual;
        $schoolfees->class_five = $request->class_five_admission . ',' . $request->class_five_annual;
        $schoolfees->class_six = $request->class_six_admission . ',' . $request->class_six_annual;
        $schoolfees->class_seven = $request->class_seven_admission . ',' . $request->class_seven_annual;
        $schoolfees->class_eight = $request->class_eight_admission . ',' . $request->class_eight_annual;
        $schoolfees->class_nine = $request->class_nine_admission . ',' . $request->class_nine_annual;
        $schoolfees->class_ten = $request->class_ten_admission . ',' . $request->class_ten_annual;
        $schoolfees->class_eleven = $request->class_eleven_admission . ',' . $request->class_eleven_annual;
        $schoolfees->class_twelve = $request->class_twelve_admission . ',' . $request->class_twelve_annual;
        $schoolfees->is_public = $request->is_public ? '1' : '0';
        $update = SchoolFees::where('school_id', $request->id)->update($schoolfees->toArray());
        return redirect()->back()->with('message', 'School eligibility information updated. !!!')->with('tab', 7);
    }
    public function opening_hour($id)
    {
        $school_exists = SchoolClaim::where('claim_id', Auth::user()->id)->where('school_id', $id)->first();
        $school_opening_hour = SchoolHour::where('school_id', $id)->first();
        $school_details = School::with('medium', 'categories', 'boards')->where('id', $id)->first();
        $total_schools = SchoolClaim::where('claim_id', Auth::user()->id)->count();
        return view('school_admin_new.edit.openinghour', compact('school_opening_hour', 'total_schools', 'school_details', 'school_exists'));
    }
    public function update_opening_hour(Request $request)
    {
        $entity = new SchoolHour();
        $entity->mon = array($request->mon_f, $request->mon_t);
        $entity->tue = array($request->tue_f, $request->tue_t);
        $entity->wed = array($request->wed_f, $request->wed_t);
        $entity->thu = array($request->thu_f, $request->thu_t);
        $entity->fri = array($request->fri_f, $request->fri_t);
        $entity->sat = array($request->sat_f, $request->sat_t);
        $entity->sun = array($request->sun_f, $request->sun_t);
        $update = SchoolHour::where('school_id', $request->id)->update($entity->toArray());
        return redirect()->back()->with('message', 'School opening hour updated. !!!')->with('tab', 4);
    }
    public function facilities($id)
    {
        $school_exists = SchoolClaim::where('claim_id', Auth::user()->id)->where('school_id', $id)->first();
        $school_facilities = SchoolFacility::where('school_id', $id)->first();
        $total_schools = SchoolClaim::where('claim_id', Auth::user()->id)->count();
        $school_details = School::with('medium', 'categories', 'boards')->where('id', $id)->first();
        return view('school_admin_new.edit.facilities', compact('school_facilities', 'total_schools', 'school_details', 'school_exists'));
    }
    public function update_facilities(Request $request)
    {
        $school_facility = new SchoolFacility();
        $school_facility->education = json_encode($request->education);
        $school_facility->classroom = json_encode($request->classroom);
        $school_facility->lab = json_encode($request->lab);
        $school_facility->boarding = json_encode($request->boarding);
        $school_facility->sports = json_encode($request->sports);
        $school_facility->arts = json_encode($request->arts);
        $school_facility->digital = json_encode($request->digital);
        $school_facility->food = json_encode($request->food);
        $school_facility->security = json_encode($request->security);
        $school_facility->medical = json_encode($request->medical);
        $school_facility->infra = json_encode($request->infra);
        $update = SchoolFacility::where('school_id', $request->id)->update($school_facility->toArray());
        return redirect()->back()->with('message', 'School facilities updated. !!!')->with('tab', 3);

    }
    public function gallery($id)
    {
        $school_exists = SchoolClaim::where('claim_id', Auth::user()->id)->where('school_id', $id)->first();
        $school_gallery = SchoolImage::where('school_id', $id)->first();
        $total_images = sizeof($school_gallery->school_image);
        $total_schools = SchoolClaim::where('claim_id', Auth::user()->id)->count();
        $school_details = School::with('medium', 'categories', 'boards')->where('id', $id)->first();
        return view('school_admin_new.edit.gallery', compact('school_gallery', 'total_images', 'total_schools', 'school_details', 'school_exists'));
    }
    public function upload_new_image(Request $request)
    {
        $entity = SchoolImage::where('school_id', $request->id)->first();
        if ($request->hasFile('filenewnames')) {
            $schoolimages = $entity->school_image;
            foreach ($request->file('filenewnames') as $file) {
                $upload = FileHelper::Upload($file, null, FileHelper::$gallery);
                array_push($schoolimages, $upload->upload_name);
            }
            $entity->school_image = $schoolimages;
            $entity->update($entity->toArray());
            return redirect()->back()->with('message', 'School image uploaded. !!!')->with('tab', 8);
        }
    }
}