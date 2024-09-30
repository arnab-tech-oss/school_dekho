<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalDetails;
use App\Models\Interview;

class InterviewController extends Controller
{
    public function showForm()
    {
        $formSteps = [
            1 => [
                ['type' => 'textarea', 'id' => 'vision', 'label' => '1. What is your vision for the school?', 'placeholder' => 'Write Your Answer', 'size' => 12],
                ['type' => 'textarea', 'id' => 'prepare-students', 'label' => '2. How do you prepare students for the future?', 'placeholder' => 'Write Your Answer', 'size' => 12],
                ['type' => 'textarea', 'id' => 'difference', 'label' => '3. What makes your school different from others?', 'placeholder' => 'Write Your Answer', 'size' => 12],
            ],
            2 => [
                ['type' => 'textarea', 'id' => 'balance-learning', 'label' => '4. How do you balance learning with creativity and thinking skills?', 'placeholder' => 'Write Your Answer', 'size' => 12],
                ['type' => 'textarea', 'id' => 'teaching-methods', 'label' => '5. What new teaching methods do you use?', 'placeholder' => 'Write Your Answer', 'size' => 12],
            ],
            3 => [
                ['type' => 'textarea', 'id' => 'improve-skills', 'label' => '6. How do you help teachers improve their skills?', 'placeholder' => 'Write Your Answer', 'size' => 12],
            ],
            4 => [
                ['type' => 'textarea', 'id' => 'friendly-school', 'label' => '7. How do you create a friendly and welcoming school?', 'placeholder' => 'Write Your Answer', 'size' => 12],
                ['type' => 'textarea', 'id' => 'involve-parents', 'label' => "8. How do you involve parents in their child's education?", 'placeholder' => 'Write Your Answer', 'size' => 12],
            ],
            5 => [
                ['type' => 'textarea', 'id' => 'facilities', 'label' => '9. What are the important facilities and resources your school has?', 'placeholder' => 'Write Your Answer', 'size' => 12],
                ['type' => 'textarea', 'id' => 'technology', 'label' => '10. How do you use technology to help students learn?', 'placeholder' => 'Write Your Answer', 'size' => 12],
            ]
        ];

        $stepTitles = [
            1 => 'Vision and Mission',
            2 => 'Learning and Teaching',
            3 => 'Leadership and Management',
            4 => 'School Environment',
            5 => 'School Buildings and Resources',
        ];

        return view('frontend.interview-form', compact('formSteps', 'stepTitles'));
    }

    public function userDetails()
    {
        $formSteps = [
            1 => [
                ['type' => 'text', 'id' => 'name', 'label' => 'Name', 'placeholder' => 'Your Name *', 'size' => 6],
                ['type' => 'file', 'id' => 'image', 'label' => 'Upload your image', 'placeholder' => '', 'size' => 6],
                ['type' => 'email', 'id' => 'email', 'label' => 'Email', 'placeholder' => 'Your Email *', 'size' => 6],
                ['type' => 'text', 'id' => 'mobile', 'label' => 'Mobile Number', 'placeholder' => 'Your Mobile Number *', 'size' => 6],
                ['type' => 'text', 'id' => 'address', 'label' => 'Address', 'placeholder' => 'Address *', 'size' => 6],
                ['type' => 'text', 'id' => 'pin', 'label' => 'Pin Code', 'placeholder' => 'Pin Code *', 'size' => 6],
                ['type' => 'text', 'id' => 'School-name', 'label' => 'School Name', 'placeholder' => 'School Name *', 'size' => 6],
                ['type' => 'text', 'id' => 'designation', 'label' => 'Your designation', 'placeholder' => 'Your designation *', 'size' => 6],
                ['type' => 'text', 'id' => 'school-address', 'label' => 'School Address', 'placeholder' => 'School Address *', 'size' => 6],
                ['type' => 'textarea', 'id' => 'experience', 'label' => 'Write about your experience', 'placeholder' => 'Write about your experience *', 'size' => 12],
            ],
        ];

        $stepTitles = [
            1 => 'Personal Details',
        ];

        return view('frontend.interview-user-details', compact('formSteps', 'stepTitles'));
    }

    public function storeuserDetails(Request $request)
    {
        // return $request->all();
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
            'email' => 'required|email|max:255',
            'mobile' => 'required|digits:10',
            'address' => 'required|string|max:255',
            'pin' => 'required|digits:6',
            'School-name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'school-address' => 'required|string|max:255',
            'experience' => 'required|string|max:500',
        ],

        [
            'name.required'=> 'Please enter your name',
            'email.required' => 'An email field is required',
            'mobile.required'=> 'Your mobile number is required',
            'image.required'=> 'Please Upload Your Photo',
            'address' => 'Your address is required',
            'pin'=> 'Please enter your pin number',
            'School-name'=> 'Please enter your school name',
            'designation'=> 'This field is required',
            'school-address'=> 'Please enter your school address',
            'experience'=> 'This field is required'
        ]);

        $user_details = new PersonalDetails();
        $user_details->name = $validatedData['name'];

        if ($request->hasFile('image')) {
            $user_details->image = $request->file('image')->store('images', 'public');
        }

        $user_details->email = $validatedData['email'];
        $user_details->number = $validatedData['mobile'];
        $user_details->address = $validatedData['address'];
        $user_details->pincode = $validatedData['pin'];
        $user_details->school_name = $validatedData['School-name'];
        $user_details->designation = $validatedData['designation'];
        $user_details->experience = $validatedData['experience'];

        $user_details->save();
        session(['personal_details_id' => $user_details->id]);

        return redirect()->route('interview.showfrom')->with('success', 'Details saved successfully!');
    }

    public function storeshowForm(Request $request)
    {
        // return $request->all();
        $validatedData = $request->validate([
            'vision' => 'required|string|max:500',
            'prepare-students' => 'required|string|max:500',
            'difference' => 'required|string|max:500',
            'balance-learning' => 'required|string|max:500',
            'teaching-methods' => 'required|string|max:500',
            'improve-skills' => 'required|string|max:500',
            'friendly-school' => 'required|string|max:500',
            'involve-parents' => 'required|string|max:500',
            'facilities' => 'required|string|max:500',
            'technology' => 'required|string|max:500',
        ]);

        $personalDetailsId = session('personal_details_id');

        if (!$personalDetailsId) {
            return redirect()->back()->with('error', 'Personal details not found.');
        }

        $show_form = new Interview();

        // $user_details = PersonalDetails::where('id', $request->id)->first();

        $show_form->personal_details_id = $personalDetailsId;
        $show_form->vision = $validatedData['vision'];
        $show_form->prepare_students = $validatedData['prepare-students'];
        $show_form->difference = $validatedData['difference'];
        $show_form->balance_learning = $validatedData['balance-learning'];
        $show_form->teaching_methods = $validatedData['teaching-methods'];
        $show_form->improve_skills = $validatedData['improve-skills'];
        $show_form->friendly_school = $validatedData['friendly-school'];
        $show_form->involve_parents = $validatedData['involve-parents'];
        $show_form->facilities = $validatedData['facilities'];
        $show_form->technology = $validatedData['technology'];

        $show_form->save();
        return redirect()->route('interview.userdetails')->with('success', 'Interview data submitted successfully!');
    }

    public function index()
    {
        $all_interview = PersonalDetails::paginate(10);
        return view('admin.interview.index', compact('all_interview'));
    }

    public function view($id)
    {
        $view = PersonalDetails::with('interview')->where('id', $id)->first();
        return view('admin.interview.view', compact('view'));
    }
}
