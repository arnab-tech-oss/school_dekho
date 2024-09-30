<?php

namespace App\Http\Controllers\School;

use App\Models\City;
use App\Models\State;
use App\Models\School;
use App\Models\District;
use App\Models\SchoolFees;
use App\Models\SchoolHour;
use App\Models\SchoolSeat;
use App\Models\SchoolBoard;
use App\Models\SchoolImage;
use App\Models\SchoolMedium;
use Illuminate\Http\Request;
use App\Models\SchoolContact;
use App\Models\SchoolAcademic;
use App\Models\SchoolCategory;
use App\Models\SchoolFacility;
use App\Models\SeatAvailability;
use App\Core\BaseAdminController;
use App\Core\FileHelper;
use App\Models\SchoolEligibility;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
    
class SchoolAdminFeatureEditController extends BaseAdminController
{
    public function editaboutschool($id)
    {
        $allstates = State::all();
        $allcities = City::all();
        $alldistricts = District::all();
        $schoolcontacts = SchoolContact::where("school_id", $id)->with('cities', 'states', 'districts')->first();
        
        return view('school.edit.contact', compact('allstates', 'allcities', 'alldistricts', 'schoolcontacts'));
    }

    public function updateaboutschool(Request $request)
    {
        $entity = new SchoolContact();
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
        $update = SchoolContact::where("school_id", $request->school_id)->update($entity->toArray());
        
        return redirect()->route('school.view.details', $request->school_id);
    }

    public function editschool($id)
    {
        $allboards = SchoolBoard::get();
        $allmedium = SchoolMedium::get();
        $allcategory = SchoolCategory::get();
        $school = school::where("id", $id)->with('medium', 'categories', 'boards')->first();
        return view('school.edit.about', compact('allboards', 'allmedium', 'allcategory', 'school'));
    }

    public function updateschool(Request $request)
    {
        
        $entity=School::findOrFail($request->id);
        $entity->name = $request->name;
        $entity->about = $request->about;
        $entity->principal_name = $request->principal_name;
        $entity->principal_desk = $request->principal_desk;
        $entity->school_type = $request->school_type;
        $entity->school_medium_id = $request->school_medium_id;
        $entity->registration_no = $request->registration_no;
        $entity->board = $request->board;
        $entity->category = $request->category;
        if($request->hasFile('logo_path'))
        {  
            $entity->school_logo= FileHelper::Upload($request->logo_path,null,FileHelper::$logo_path)->upload_name;
        }
        if($request->hasFile('principal_path'))
        {
            $entity->principal_pic= FileHelper::Upload($request->principal_path,null,FileHelper::$principal)->upload_name;
        }
        //dd($entity);
        $update = $entity->update($entity->toArray());

        return redirect()->route('school.view.details', $request->id);
    }

    public function editschooleligibility($id)
    {
        $schooleligibility = SchoolEligibility::where("school_id", $id)->first();
        return view('school.edit.eligibility', compact('schooleligibility'));
    }

    public function updateschooleligibility(Request $request)
    {
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
        
        return redirect()->route('school.view.details', $request->id);
    }

    public function academicperformance($id)
    {
        $academics = SchoolAcademic::where("school_id", $id)->latest()->limit(2)->get();
        $academics1 = $academics[0];
        // dd($academics1);
        $academics2 = $academics[1];
        return view('school.edit.academic', compact('academics1', 'academics2','id'));
    }

    public function updateacademicperformance(Request $request)
    {
        // $entity1 = new SchoolAcademic();
        // $entity1->student_appear = $request->student_appear1;
        // $entity1->student_passed = $request->student_passed1;
        // $entity1->abv_nine_five = $request->abv_nine_five1;
        // $entity1->abv_ninty = $request->abv_ninty1;
        // $entity1->abv_eighty = $request->abv_eighty1;
        // $data=SchoolAcademic::where('school_id',$request->id)->select('academic_year')->first();
        // if($data->academic_year==null)
        // {   
        //     SchoolAcademic::where('school_id',$request->id)->update(['academic_year'=>"2021"]);
        // }
        // $data_test=SchoolAcademic::where('school_id',$request->id)->where("academic_year","2022")->first();
        // if(!$data_test)
        // {
        // $entity3 = new SchoolAcademic();
        // $entity3->academic_year="2022";
        // $entity3->school_id=$request->id;
        // $entity3->save();
        // }
        // $update1 = SchoolAcademic::where("school_id", $request->id)->where("academic_year", "2021")->update($entity1->toArray());
        // $entity2 = new SchoolAcademic();
        // $entity2->student_appear = $request->student_appear2;
        // $entity2->student_passed = $request->student_passed2;
        // $entity2->abv_nine_five = $request->abv_nine_five2;
        // $entity2->abv_ninty = $request->abv_ninty2;
        // $entity2->abv_eighty = $request->abv_eighty2;
        // $update2 = SchoolAcademic::where("school_id", $request->id)->where("academic_year", "2022")->update($entity2->toArray());
        
        $entity1 = new SchoolAcademic();

        $entity1->academic_year = $request->academic_year_1;
        $entity1->student_appear = $request->student_appear1;
        $entity1->student_passed = $request->student_passed1;
        $entity1->abv_nine_five = $request->abv_nine_five1;
        $entity1->abv_ninty = $request->abv_ninty1;
        $entity1->abv_eighty = $request->abv_eighty1;
        
        SchoolAcademic::where(['school_id'=> $request->id, 'id'=>$request->academic_id_1])->update($entity1->toArray());
        
        
        $entity2 = new SchoolAcademic();
        
        $entity2->academic_year = $request->academic_year_2;
        $entity2->student_appear = $request->student_appear2;
        $entity2->student_passed = $request->student_passed2;
        $entity2->abv_nine_five = $request->abv_nine_five2;
        $entity2->abv_ninty = $request->abv_ninty2;
        $entity2->abv_eighty = $request->abv_eighty2;
        
        SchoolAcademic::where(['school_id'=> $request->id, 'id'=>$request->academic_id_2])->update($entity2->toArray());
        
        return redirect()->route('school.view.details', $request->id);
     }

    public function feesstructure($id)
    {
        $schoolfees = SchoolFees::where('school_id', $id)->first();
        return view('school.edit.fees', compact('schoolfees'));
    }

    public function updatefeesstructure(Request $request)
    {
        $schoolfees = new SchoolFees();
        $schoolfees->pre_nursery = collect($request->pre_nursery)->implode(',');
        $schoolfees->nursery = collect($request->nursery)->implode(',');
        $schoolfees->lkg = collect($request->lkg)->implode(',');
        $schoolfees->kg = collect($request->kg)->implode(',');
        $schoolfees->ukg = collect($request->ukg)->implode(',');
        $schoolfees->class_one = collect($request->class_one)->implode(',');
        $schoolfees->class_two = collect($request->class_two)->implode(',');
        $schoolfees->class_three = collect($request->class_three)->implode(',');
        $schoolfees->class_four = collect($request->class_four)->implode(',');
        $schoolfees->class_five = collect($request->class_five)->implode(',');
        $schoolfees->class_six = collect($request->class_six)->implode(',');
        $schoolfees->class_seven = collect($request->class_seven)->implode(',');
        $schoolfees->class_eight = collect($request->class_eight)->implode(',');
        $schoolfees->class_nine = collect($request->class_nine)->implode(',');
        $schoolfees->class_ten = collect($request->class_ten)->implode(',');
        $schoolfees->class_eleven = collect($request->class_eleven)->implode(',');
        $schoolfees->class_twelve = collect($request->class_twelve)->implode(',');
        $schoolfees->is_public = $request->is_public?'1':'0';
        $update = SchoolFees::where('school_id', $request->id)->update($schoolfees->toArray());
        
        return redirect()->route('school.view.details', $request->id);
    }
    public function seatavailable($id)
    {
        $seats = SeatAvailability::where('school_id', $id)->first();
        return view('school.edit.seat', compact('seats'));
    }
    public function updateseatavailable(Request $request)
    {
        $entity = new SeatAvailability();
        $entity->pre_nursery = $request->pre_nursery;
        $entity->nursery = $request->nursery;
        $entity->ukg = $request->ukg;
        $entity->kg = $request->kg;
        $entity->lkg = $request->lkg;
        $entity->class_one = $request->class_one;
        $entity->class_two = $request->class_two;
        $entity->class_three = $request->class_three;
        $entity->class_four = $request->class_four;
        $entity->class_five = $request->class_five;
        $entity->class_six = $request->class_six;
        $entity->class_seven = $request->class_seven;
        $entity->class_eight = $request->class_eight;
        $entity->class_nine = $request->class_nine;
        $entity->class_ten = $request->class_ten;
        $entity->class_eleven = $request->class_eleven;
        $entity->class_twelve = $request->class_twelve;
        $id = $request->id;
        $update = SeatAvailability::where('school_id', $id)->update($entity->toArray());
        
        return redirect()->route('school.view.details', $request->id);
    }

    public function openhour($id)
    {
        $hour = SchoolHour::where('school_id', $id)->first();

        return view('school.edit.hours', compact('hour'));
    }
    public function updateopenhour(Request $request)
    {
        $entity = new SchoolHour();
        $entity->mon = $request->mon;
        $entity->tue = $request->tue;
        $entity->wed = $request->wed;
        $entity->thu = $request->thu;
        $entity->fri = $request->fri;
        $entity->sat = $request->sat;
        $entity->sun = $request->sun;
        $id = $request->id;
        $update = SchoolHour::where('school_id', $id)->update($entity->toArray());
        
        return redirect()->route('school.view.details', $request->id);
    }
    public function facilities($id)
    {
        $facility = SchoolFacility::where('school_id', $id)->first();
        return view('school.edit.facility', compact('facility'));
    }
    public function updatefacilities(Request $request)
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
        
        return redirect()->route('school.view.details', $request->id);
    }

    public function images($id)
    {
        $images = SchoolImage::where('school_id', $id)->first();
        return view('school.edit.images', compact('images'));
    }
    public function imageupdate(Request $request)
    {
        $validator = Validator::make($request->all(), array(
            "position" => "required",
            "file" => "required",
            "id" => "required",
        ));


        //return $request->all();
        if ($validator->fails()) {
            $this->response->errors = $validator->errors();
            //$this->response->message=""
            return $this->rModel();
        }
        $image = SchoolImage::where("school_id", $request->id)->first();

        if (!$image) {
            $this->response->message = "No records founds!";
            return $this->rModel();
        }


        $images = $image->school_image ?? [];

        if (!isset($images[$request->position])) {
            $this->response->message = "No records founds!";
            return $this->rModel();
        }

        $filename = $images[$request->position];

        $upload = FileHelper::Upload($request->file, $filename,FileHelper::$gallery);

        //FileHelper::Delete()

        if (!$upload->status) {
            $this->response->message = "Choose a file!";
            return $this->rModel();
        }

        $images[$request->position] = $upload->upload_name;
        $image->school_image = $images;
        $image->update($image->toArray());


        $this->response->is_success = true;
        $this->response->message = "Upload Successfully";
        return $this->rModel();
    }
    public function imagedelete(Request $request)
    {

        $validator = Validator::make($request->all(), array(
            "position" => "required",
            "id" => "required",
        ));
        if ($validator->fails()) {
            $this->response->errors = $validator->errors();
            return $this->rModel();
        }
        $image = SchoolImage::where("school_id", $request->id)->first();

        if (!$image) {
            $this->response->message = "No records founds!";
            return $this->rModel();
        }


        $images = $image->school_image ?? [];

        if (!isset($images[$request->position])) {
            $this->response->message = "No records founds!";
            return $this->rModel();
        }
        $filename = $images[$request->position];
        FileHelper::Delete($filename);

        array_splice($images,$request->position,1);

        $image->school_image = $images;
        $image->update($image->toArray());


        $this->response->is_success = true;
        $this->response->message = "Deleted Successfully";
        return $this->rModel();
    }
    public function addnewimage(Request $request)
    {
        $entity = SchoolImage::where('school_id', $request->id)->first();

        if ($request->hasFile('filenewnames')) {
            $schoolimages = $entity->school_image;
            //return $schoolimages;
            foreach ($request->file('filenewnames') as $file) {

                $upload=FileHelper::Upload($file,null,FileHelper::$gallery);
                array_push($schoolimages,$upload->upload_name);
            }


            $entity->school_image=$schoolimages;
            $entity->update($entity->toArray());
            return redirect()->back();
        }

        return redirect()->route('school.view.details',$request->id);
    }
}
  