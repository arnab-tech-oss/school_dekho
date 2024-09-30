<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\User;
use App\Models\State;
use App\Models\School;
use App\Core\FileHelper;
use App\Models\District;
use App\Models\SchholFees;
use App\Models\SchoolFees;
use App\Models\SchoolHour;
use App\Models\SchoolSeat;
use App\Models\SchoolAbout;
use App\Models\SchoolBoard;
use App\Models\SchoolClaim;
use App\Models\SchoolImage;
use App\Models\SchoolMedium;
use Illuminate\Http\Request;
use App\Models\SchoolContact;
use App\Models\SchoolAcademic;
use App\Models\SchoolCategory;
use App\Models\SchoolFacility;
use App\Models\SchoolTrending;
use App\Models\SchoolAdmission;
use App\Models\SeatAvailability;
use App\Models\SchoolEligibility;
use App\Http\Controllers\Controller;
use App\Http\Requests\SchoolRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Exports\ExportSchool;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class SchoolController extends Controller
{
  public function index()
  {
    $allboards = SchoolBoard::get();
    $allmedium = SchoolMedium::get();
    $allcategory = SchoolCategory::get();
    $allcities = City::get();
    $allstates = State::all();
    $alldistricts = District::all();

    return view('admin.school.add.index', compact('allboards', 'allmedium', 'allcategory', 'allcities', 'allstates', 'alldistricts'));
  }

  public function approveschoollist()
  {
  $states = State::all();
    $schoollist = School::where('status', '=', '1')->paginate(15);
    $complete = 0;
    return view('admin.school.view.list', compact('schoollist', 'complete', 'states'));
  }

  public function school_admission()
  {
    $school_list = DB::table('schools')->select('schools.id as id', 'schools.name as name','school_contacts.address as address')->where('status',1)->join('school_contacts','school_contacts.school_id','schools.id')->get();
    $admission_status = SchoolAdmission::select('all_school_ids')->get();
    $school_ids = $admission_status[0]->all_school_ids;
    return view('admin.school.view.admission', compact('school_list', 'school_ids'));
  }
  
  public function admission_update(Request $request)
  {
    $school_admission = SchoolAdmission::where('id', 1)->first();
    $school_admission->all_school_ids = $request->selected_schools;
    $school_admission->update($school_admission->toArray());
    $school_all_update = School::query()->update(array('is_admission' => 0));
    foreach ($school_admission->all_school_ids as $schoolid) {
      $school_admission_open = School::where('id', $schoolid)->first();

      $school_admission_open->update(['is_admission' => 1]);
    }
    return redirect()->back();
  }

  public function school_trending()
  {
    $school_trending = DB::table('schools')->select('schools.id as id', 'schools.name as name','school_contacts.address as address')->where('status',1)->join('school_contacts','school_contacts.school_id','schools.id')->get();
    // return $school_trending;
    $trending_status = SchoolTrending::select('school_ids')->get();
    $school_ids = $trending_status[0]->school_ids;
    // $school_trending = $school_trending->get();
    // dd($school_trending[3]);
    return view('admin.school.view.trending', compact('school_trending', 'school_ids'));
  }

  public function trending_update(Request $request)
  {
    $school_trending = new SchoolTrending();
    $school_trending->school_ids = $request->selected_schools;
    $school_trending->where('id', 1)->update($school_trending->toArray());
    $school_all_update = School::query()->update(array('is_trending' => 0));
    foreach ($school_trending->school_ids as $schoolid) {
      $school_trending_open = School::where('id', $schoolid)->first();

      $school_trending_open->update(['is_trending' => 1]);
    }
    return redirect()->back();
  }

  public function addschool(Request $request)
  {
    // dd($request);
    $validator = Validator::make($request->all(), [
            'logo_path' => 'required|image|dimensions:min_width=400,min_height=400',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

    if (($request->hasFile('logo_path')) || ($request->hasFile('principal_path'))) {
      $request->logo_path = FileHelper::Upload($request->logo_path, null, FileHelper::$logo_path)->upload_name;
      $request->principal_path = FileHelper::Upload($request->principal_path, null, FileHelper::$principal)->upload_name;

      $entity = new School();
      $entity->name = $request->name;
      $entity->about = $request->about;
      $entity->principal_name = $request->principal_name;
      $entity->principal_desk = $request->principal_desk;
      $entity->principal_designation = $request->principal_designation ?? "";
      $entity->exam = $request->exam;
      $entity->school_type = $request->school_type;
      $entity->registration_no = $request->registration_no;
      $entity->category = $request->category;
      $entity->board = $request->board;
      $entity->school_medium_id = $request->school_medium_id;
      $entity->view_count = "0";
      $entity->status = "0";
      $entity->is_claimed = '0';
      $entity->user_id = Auth::user()->id;
      $entity->affiliated = '1';
      $entity->is_complete = '0';
      $entity->school_logo = $request->logo_path;
      $entity->principal_pic = $request->principal_path;
      $entity->save();

      $school_about = new SchoolContact();
      $school_about->school_id = $entity->id;
      $school_about->save();

      $school_eligibility = new SchoolEligibility();
      $school_eligibility->school_id = $entity->id;
      $school_eligibility->save();

      $schoolacademics = new SchoolAcademic();
      $schoolacademics->school_id = $entity->id;
      $schoolacademics->save();
      $schoolacademics1 = new SchoolAcademic();
      $schoolacademics1->school_id = $entity->id;
      $schoolacademics1->save();

      $school_fees = new SchoolFees();
      $school_fees->school_id = $entity->id;
      $school_fees->save();

      $school_seat = new SeatAvailability();
      $school_seat->school_id = $entity->id;
      $school_seat->save();

      $school_facility = new SchoolFacility();
      $school_facility->school_id = $entity->id;
      $school_facility->save();

      $school_gallery = new SchoolImage();
      $school_gallery->school_id = $entity->id;
      $school_gallery->save();

      $school_hours = new SchoolHour();
      $school_hours->school_id = $entity->id;
      $school_hours->save();

      $id = $entity->id;
      $name = str_replace(" ","-",$entity->name)."-".$id;
      $school_slug = School::where('id',$id)->update(['slug'=>$name]);
      Session::put('school_id', $id);

      return redirect()->route('admin.school.add.about');
    } else {
      return redirect()->back();
    }
  }
 
  public function schoollist(Request $request)
  {
   $q=$request->q;
    $schoollist = School::with('address');
    $complete = 0;
    $states = State::all();
    
    if (Auth::user()->role == 4) {
    //   $schoollist = $schoollist->where('user_id', '=', Auth::user()->id)->where("status",0);
    $schoollist = $schoollist->where('user_id', '=', Auth::user()->id)->where('is_complete', 1);
    }

    if($request->q){
      $schoollist=$schoollist->where('name', 'LIKE', '%' . $request->q . '%');
    }
    $schoollist=$schoollist->paginate(15);
    if (isset($request->search)) {
      $schoollist = School::with('address')->whereHas('address', function ($query) use ($request) {
        $query->where('state_id', $request->state_id)->where('is_complete', 1)->where('district_id',$request->district_id);
      })->paginate(15);
    }
    if(isset($request->export)){
      $schoolcount = School::with('address')->whereHas('address', function ($query) use ($request) {
        $query->where('state_id', $request->state_id)->where('is_complete', 1)->where('district_id',$request->district_id);
      })->count();
      if($schoolcount>0)
      {
        return Excel::download(new ExportSchool($request), 'school_district_and_state_wise.xlsx');
      }
    } 
 
    if (isset($request->mou)) {
      $schoollist = School::with('address')->where('is_mou', $request->mou_option)->paginate(15);
      return view('admin.school.view.list', compact('schoollist', 'complete', 'q', 'states'));
    }

    return view('admin.school.view.list', compact('schoollist', 'complete','q','states'));
  }

  public function claimschool()
  {
  $states = State::all();
    $schoollist = School::where('is_claimed', '1')->paginate(5);
    $claim = 1;
    $complete = 0;
    return view('admin.school.view.list', compact('schoollist', 'claim', 'complete', 'states'));
  }

  public function claimdetails($id)
  {
    $school_claims = SchoolClaim::where('school_id', $id)->get();
    return view('admin.school.view.claim', compact('school_claims'));
  }

  public function claimverify(Request $request)
  { 
    $school_id = $request->school_id;
    $claim_id = $request->claim_id;
    SchoolClaim::where('school_id', $school_id)->update(["verify" => 2]);
    $school_verify = SchoolClaim::where('school_id', $school_id)->where("claim_id", $claim_id)->first();
    $school_verify->update(["verify" => 9]);
    School::where('id', $school_id)->update(["is_verify" => 1]);
    return redirect()->back();
  }
  public function appliedSchool()
  {
  $states = State::all();
    $schoollist = School::where(['is_complete' => '1', 'status' => '0'])
      ->with('user')
      ->paginate(20);
    $complete = 1;
    return view('admin.school.view.list', compact('schoollist', 'complete', 'complete', 'states'));
  }
  
  public function incompleteSchool()
  {
  $states = State::all();
    $schoollist = School::where(['is_complete'=> '0','status'=>'0'])
                  ->with('user')
                  ->paginate(10);
    $complete = 0;
    return view('admin.school.view.list',compact('schoollist','complete', 'states'));
  }
  
  public function viewschool($id)
  {

    $schooldetails = School::where('id', $id)->with('medium', 'categories', 'address')->first();

    $schoolcontact = SchoolContact::where('school_id', $id)->with('cities', 'states')->first();
    $schooleligibility = SchoolEligibility::where('school_id', $id)->first();

    $academics = SchoolAcademic::where('school_id', $id)->latest()->limit(2)->get();

    $schoolfees = SchoolFees::where('school_id', $id)->first();
    $schoolseats = SeatAvailability::where('school_id', $id)->first();
    $schoolhours = SchoolHour::where('school_id', $id)->first();
    $schoolfeatures = SchoolFacility::where('school_id', $id)->first();
    $schoolimages = SchoolImage::where('school_id', $id)->first();

    //return compact('schooldetails','schoolcontact','schooleligibility','academics','schoolfees','schoolseats','schoolhours','schoolfeatures','schoolimages');
    return view('admin.school.view.details', compact('schooldetails', 'schoolcontact', 'schooleligibility', 'academics', 'schoolfees', 'schoolseats', 'schoolhours', 'schoolfeatures', 'schoolimages'));
  }

  public function editschool($id)
  {
    $schooldetails = School::where('id', $id)->with('state', 'district', 'medium')->first();
    $allstates = State::get();
    $alldistricts = District::get();
    $allcities = City::get();
    $allmedium = SchoolMedium::get();
    return view('admin.editschool', compact('schooldetails', 'allstates', 'alldistricts', 'allcities', 'allmedium'));
  }

  public function updateschool(SchoolRequest $request)
  {
    $request->validated();
    $id = $request->id;
    if ($request->hasFile('logo_path')) {
      $newfilename = time() . $request->file('logo_path')->getClientOriginalName();
      $extension = $request->file('logo_path')->getClientOriginalExtension();
      $filepath = $request->logo_path->move(public_path('images/uploads'), $newfilename);
      $filename = time() . '_' . $extension;
      $path = 'images/uploads/' . $newfilename;
      $request->logo_path = $path;

      $entity = new School();
      $entity->name = $request->name;
      $entity->address = $request->address;
      $entity->city_id = $request->city_id;
      $entity->state_id = $request->state_id;
      $entity->district_id = $request->district_id;
      $entity->school_board_id = $request->school_board_id;
      $entity->school_medium_id = $request->school_medium_id;
      $entity->pincode = $request->pincode;
      $entity->status = $request->status;
      $entity->logo_path = $request->logo_path;

      $update = School::where("id", $id)->update($entity->toArray());

      return back()->with('success', 'School Details has been updated successfully');
    }
  }
  public function aboutschool()
  {
    $allstates = State::all();
    // $allcities=City::all();
    $alldistricts = District::orderby('district')->get();
    return view('admin.school.add.about', compact('allstates', 'alldistricts'));
  }

  public function approval($id, $status)
  {
    if (Auth::user()->role != 1) {
      return redirect()->back();
    }
    $school = School::where('id', $id)->first();
    ($school->status == '0') ?
      School::where('id', $id)->update(array('status' => '1')) :
      School::where('id', $id)->update(array('status' => '0'));

    return redirect()->back();
  }

  public function iscomplete($id, $complete)
  {
    if (Auth::user()->role != 4) {
      return redirect()->back();
    }
    $school = School::where('id', $id)->first();

    ($school->is_complete == "0") ?
      School::where('id', $id)->update(array('is_complete' => "1")) :
      School::where('id', $id)->update(array('is_complete' => "0"));

    return redirect()->back();
  }

  public function openinghours()
  {
    return view('admin.school.add.openinghours');
  }

  public function eligibility()
  {
    return view('admin.school.add.eligibility');
  }

  public function seatavailability()
  {
    return view('admin.school.add.seatavailability');
  }

  public function schoolfacilities()
  {
    return view('admin.school.add.facilities');
  }

  public function feesstructure()
  {
    return view('admin.school.add.feesstructure');
  }

  public function academicperformance()
  {
    return view('admin.school.add.academic');
  }

  public function schoolgallery()
  {
    return view('admin.school.add.gallery');
  }
}
