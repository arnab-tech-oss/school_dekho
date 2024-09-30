<?php

namespace App\Http\Controllers\Admin;

use App\Core\FileHelper;
use App\Models\SchholFees;
use App\Models\SchoolFees;
use App\Models\SchoolHour;
use App\Models\SchoolAbout;
use App\Models\SchoolImage;
use Illuminate\Http\Request;
use App\Models\SchoolAcademic;
use App\Models\SchoolFacility;
use App\Models\SeatAvailability;
use App\Models\SchoolEligibility;
use App\Http\Controllers\Controller;
use App\Models\SchoolContact;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class SchoolFeatureController extends Controller
{
  public function aboutschool(Request $request)
  {
    switch ($request->input('action')) {
      case 'previous':
        return redirect()->route('admin.school.add');
        break;
      case 'next':
        $x = Session::get('school_id');
        $id = $x;
        $school_contact = new SchoolContact();
        $school_contact->address = $request->address;
        $school_contact->city = $request->city_id;
        $school_contact->district_id = $request->district_id;
        $school_contact->state_id = $request->state_id;
        $school_contact->pincode = $request->pincode;
        $school_contact->lattitude = $request->lattitude;
        $school_contact->longitude = $request->longitude;
        $school_contact->contact = $request->phone;
        $school_contact->alt_contact = $request->alt_phone;
        $school_contact->email = $request->email;
        $school_contact->fb = $request->fb_link;
        $school_contact->insta = $request->insta_link;
        $school_contact->twitter = $request->twitt_link;
        $school_contact->linkedin = $request->linkedin;

        $update = SchoolContact::where('school_id', $id)->update($school_contact->toArray()); 

        return redirect()->route('admin.school.add.eligibility');

        break;
    }
  }

  public function eligibility(Request $request)
  {
    switch ($request->input('action')) {
      case 'previous':
        return redirect()->route('admin.school.add.about');
        break;
      case 'next':
        $x = Session::get('school_id');
        $school_eligibility = new SchoolEligibility();
        $school_eligibility->min_qualification = $request->min_qualification;
        $school_eligibility->max_qualification = $request->max_qualification;
        $school_eligibility->pre_nursery = $request->pre_nursery;
        $school_eligibility->nursery    = $request->nursery;
        $school_eligibility->lkg        = $request->lkg;
        $school_eligibility->ukg        = $request->ukg;
        $school_eligibility->kg         = $request->kg;
        $school_eligibility->class_one  = $request->one;
        $school_eligibility->class_two  = $request->two;
        $school_eligibility->class_three = $request->three;
        $school_eligibility->class_four = $request->four;
        $school_eligibility->class_five = $request->five;
        $school_eligibility->class_six  = $request->six;
        $school_eligibility->class_seven = $request->seven;
        $school_eligibility->class_eight = $request->eight;
        $school_eligibility->class_nine = $request->nine;
        $school_eligibility->class_ten  = $request->ten;
        $school_eligibility->class_eleven = $request->eleven;
        $school_eligibility->class_twelve = $request->twelve;
        $id = $x;
        $update = SchoolEligibility::where('school_id', $id)->update($school_eligibility->toArray());

        return redirect()->route('admin.school.add.facility');

        break;
    }
  }

  public function academicperformance(Request $request)
  {
    switch ($request->input('action')) {
      case 'previous':
        return redirect()->route('admin.school.add.eligibility');
        break;
      case 'next':
        $x = Session::get('school_id');
        // $schoolacademics = new SchoolAcademic();
        // $schoolacademics->academic_year = $request->year;
        // $schoolacademics->student_appear = $request->student_appear;
        // $schoolacademics->student_passed = $request->student_passed;
        // $schoolacademics->abv_nine_five = $request->abv_nine_five;
        // $schoolacademics->abv_ninty     = $request->abv_ninty;
        // $schoolacademics->abv_eighty    = $request->abv_eighty;
        // $schoolacademics->school_id     = $x;

        $entity1 = new SchoolAcademic();

        $entity1->academic_year = $request->academic_year_1;
        $entity1->student_appear = $request->student_appear1;
        $entity1->student_passed = $request->student_passed1;
        $entity1->abv_nine_five = $request->abv_nine_five1;
        $entity1->abv_ninty = $request->abv_ninty1;
        $entity1->abv_eighty = $request->abv_eighty1;
        
        SchoolAcademic::where(['school_id'=> $request->school_id, 'id'=>$request->academic_id_1])->update($entity1->toArray());
        
        $entity2 = new SchoolAcademic();
        
        $entity2->academic_year = $request->academic_year_2;
        $entity2->student_appear = $request->student_appear2;
        $entity2->student_passed = $request->student_passed2;
        $entity2->abv_nine_five = $request->abv_nine_five2;
        $entity2->abv_ninty = $request->abv_ninty2;
        $entity2->abv_eighty = $request->abv_eighty2;
        
        SchoolAcademic::where(['school_id'=> $request->school_id, 'id'=>$request->academic_id_2])->update($entity2->toArray());
        
        $id = $x;
        // $schoolacademics->save();
        return redirect()->route('admin.school.add.fees');
        break;
    }
  }

  public function feesstructure(Request $request)
  {
    switch ($request->input('action')) {
      case 'previous':
        // return redirect()->route('admin.school.add.eligibility');
         return redirect()->route('admin.school.add.gallery');
        break;
      case 'next':
        $x = Session::get('school_id');
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
         
        $update = SchoolFees::where('school_id', $x)->update($schoolfees->toArray());
        
        // return redirect()->route('admin.school.add.seatavailable');
        return redirect()->route('admin.school.list');
        break;
    }
  }

  public function seatavailability(Request $request)
  {
    switch ($request->input('action')) {
      case 'previous':
        return redirect()->route('admin.school.add.fees');
        break;
      case 'next':
        $x = Session::get('school_id');
        $seat = new SeatAvailability();
        $seat->pre_nursery = $request->pre_nursery;
        $seat->nursery = $request->nursery;
        $seat->lkg = $request->lkg;
        $seat->kg = $request->kg;
        $seat->ukg = $request->ukg;
        $seat->class_one = $request->class_one;
        $seat->class_two = $request->class_two;
        $seat->class_three = $request->class_three;
        $seat->class_four = $request->class_four;
        $seat->class_five = $request->class_five;
        $seat->class_six = $request->class_six;
        $seat->class_seven = $request->class_seven;
        $seat->class_eight = $request->class_eight;
        $seat->class_nine = $request->class_nine;
        $seat->class_ten = $request->class_ten;
        $seat->class_eleven = $request->class_eleven;
        $seat->class_twelve = $request->class_twelve;
        
        $update = SeatAvailability::where('school_id', $x)->update($seat->toArray());
        
        return redirect()->route('admin.school.add.facility');
        
        break;
    }
  }
  public function schoolfacilities(Request $request)
  {
    switch ($request->input('action')) {
      case 'previous':
        return redirect()->route('admin.school.add.seatavailable');
        break;
      case 'next': 
        $x = Session::get('school_id');
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
        $update = SchoolFacility::where('school_id', $x)->update($school_facility->toArray());
        return redirect()->route('admin.school.add.gallery');
        break;
    }
  }
  public function schoolgallery(Request $request)
  {
    switch ($request->input('action')) {
      case 'previous':
        return redirect()->route('admin.school.add.facility');
        break;
      case 'next':
        $x = Session::get('school_id');
        $this->validate($request, [
          'filenames' => 'required',
          'filenames.*' => 'image'
        ]);

        if ($request->hasFile('filenames')) {
          foreach ($request->file('filenames') as $file) {  // $image=$request->file('filenames');
            //$destination = public_path('images/schools');
            //$img = Image::make($file->getRealPath());
            $name = time() . rand(1, 100) ;
            //echo json_encode($file->extension());
            $school_id = $x;
            $upload=FileHelper::Upload($file,null,FileHelper::$gallery);
            //$img->resize(1000, 1000, function ($constraint) {
              //$constraint->aspectRatio();
            //})->save($destination . '/' . $name);
            //$file->move(public_path('images/schools'), $name);
            $imagedata[] = $upload->upload_name;
          }

          $school_image =  SchoolImage::where('school_id', $school_id)->first();
          $school_image->school_image = $imagedata;
          $school_image->update($school_image->toArray());
          //$update = SchoolImage::where('school_id', $school_id)->update($school_images->toArray());
          return redirect()->route('admin.school.add.hours');
        }

        break;
    }
  }

  public function openinghours(Request $request)
  {
    switch ($request->input('action')) {
      case 'previous':
        return redirect()->route('admin.school.add.gallery');
        break;
      case 'Finish':
        $x = Session::get('school_id');
        $hour = new SchoolHour();
        $hour->mon = $this->GetActualValue($request->mon);
        $hour->tue = $this->GetActualValue($request->tue);
        $hour->wed = $this->GetActualValue($request->wed);
        $hour->thu = $this->GetActualValue($request->thu);
        $hour->fri = $this->GetActualValue($request->fri);
        $hour->sat = $this->GetActualValue($request->sat);
        $hour->sun = $this->GetActualValue($request->sun);
        $update = SchoolHour::where('school_id', $x)->update($hour->toArray());
        
        return redirect()->route('admin.school.add.fees');
        // return redirect()->route('admin.school.list');
        break;
    }
  }

  public function GetActualValue($value)
  {

    foreach ($value as $x) {
      if (!$x || empty($x) || $x == null) {
        return ["00:00","00:00"];
      }
    }
    return $value;
  }
}
