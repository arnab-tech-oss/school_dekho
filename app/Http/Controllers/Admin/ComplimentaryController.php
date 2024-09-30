<?php
namespace App\Http\Controllers\Admin;

use App\Core\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Complimentary;
use App\Models\ComplimentaryImage;
use Illuminate\Http\Request;

class ComplimentaryController extends Controller
{
    public function add_event()
    {
        $months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        return view('admin.complimentary.add', compact('months'));
    }
    public function upload_image($id)
    {
        $complimentary_details = Complimentary::with('complimentary_image')->where('id', $id)->first();
        $months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        return view('admin.complimentary.upload', compact('complimentary_details', 'months'));
    }
    public function upload_image_submit(Request $request)
    {
        $entity = new ComplimentaryImage();
        $entity->complaintary_id = $request->id;
        $entity->image = FileHelper::Upload($request->image, null, FileHelper::$complimentary_image)->upload_name;
        $entity->save();
        return redirect()->back()->with('success', 'Image uploaded successfully');
    }
    public function delete_image($id)
    {
        $entity = ComplimentaryImage::where('id', $id)->first();
        FileHelper::Delete($entity->image, FileHelper::$complimentary_image);
        $entity->delete();
        return redirect()->back()->with('success', 'Image deleted successfully');
    }
    public function add_event_submit(Request $request)
    {
        $entity = new Complimentary();
        $entity->month = $request->month;
        $entity->event_date = $request->event_date;
        $entity->event_title = $request->event_title;
        $entity->event_hash_tag = $request->event_hash_tag;
        $month_number = $request->month + 1;
        if ($month_number == date('n', strtotime($request->event_date))) {
            $entity->save();
        } else {
            return redirect()->back()->with('failure', 'Please provide correct month');
        }
        return redirect()->back()->with('success', 'Complimentary Event added successfully');
    }
    public function complimentary_event_list()
    {
        $all_complementaries = Complimentary::all();
        return view('admin.complimentary.list', compact('all_complementaries'));
    }
    public function complementary_edit($id)
    {
        $complementary_details = Complimentary::where('id', $id)->first();
        $months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        return view('admin.complimentary.edit', compact('complementary_details', 'months'));
    }
    public function complimentary_update(Request $request)
    {
        $entity = Complimentary::where('id', $request->id)->first();
        $entity->month = $request->month;
        $entity->event_date = $request->event_date;
        $entity->event_title = $request->event_title;
        $entity->event_hash_tag = $request->event_hash_tag;
        $month_number = $request->month + 1;
        if ($month_number == date('n', strtotime($request->event_date))) {
            $entity->update($entity->toArray());
            return redirect()->back()->with('success', 'Complimentary Event updated successfully');
        } else {
            return redirect()->back()->with('failure', 'Please provide correct month');
        }
    }
}
