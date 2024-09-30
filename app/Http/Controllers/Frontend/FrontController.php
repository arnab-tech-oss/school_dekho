<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use App\Models\Blog;
use App\Models\School;
use App\Core\FileHelper;
use App\Models\SchoolReview;
use Illuminate\Http\Request;
use App\Models\SchoolContact;
use App\Models\StudentHistory;
use App\Core\ColectionPaginate;
use App\Core\BaseUserController;
use App\Http\Controllers\Controller;
use App\Models\SchoolApplicatrionForm;
use Illuminate\Support\Facades\Validator;
use App\Models\SchoolApplicationFormSettings;
use App\Models\FrontCounsellorQuery;
use App\Models\contact;
use App\Models\AllLead;
use App\Models\BlogArticle;
use App\Models\Payment;
use stdClass;
use DB;

class FrontController extends BaseUserController
{
    public function index()
    {
        $total_number_rows = FrontCounsellorQuery::all();
        $total_number_rows = $total_number_rows->count();
        $recommended_schools = School::orderBy('view_count', 'DESC')
            ->with('address', 'reviews')
            ->where('is_trending', 1)
            ->where('status', 1)
            ->get();
        foreach ($recommended_schools as $sch) {
            $sum = 0;
            foreach ($sch->reviews as $review) {
                $sum = $sum + $review->rating;
            }
            if (sizeof($sch->reviews) > 0) {
                $sch->rating = (int) ($sum / sizeof($sch->reviews));
            } else {
                $sch->rating = 0;
            }
        }
        $popular_blogs = Blog::latest()->with('comment')->take(8)->where('is_active', 1)->get();
        $title = "School Dekho® - Find Best Schools Near Me";
        $all_leads = AllLead::count();
        $school_application_leads = SchoolApplicatrionForm::count();

        $total_enquiries = $all_leads + $school_application_leads;
        $counselled_enquiries = $total_enquiries - 189;
        $school_count = School::count();
        return view('frontend.index', compact('title', 'popular_blogs', 'total_number_rows', 'total_enquiries', 'counselled_enquiries', 'school_count'));
    }
    public function registerSchool()
    {
        $total_number_rows = FrontCounsellorQuery::all();
        $total_number_rows = $total_number_rows->count();
        $recommended_schools = School::orderBy('view_count', 'DESC')
            ->with('address', 'reviews')
            ->where('is_trending', 1)
            ->where('status', 1)
            ->get();
        foreach ($recommended_schools as $sch) {
            $sum = 0;
            foreach ($sch->reviews as $review) {
                $sum = $sum + $review->rating;
            }
            if (sizeof($sch->reviews) > 0) {
                $sch->rating = (int) ($sum / sizeof($sch->reviews));
            } else {
                $sch->rating = 0;
            }
        }
        $popular_blogs = Blog::latest()->with('comment')->take(8)->where('is_active', 1)->get();
        $title = "Add Your School for Free Listing at School Dekho";
        return view('frontend.register-school', compact('title'));
    }

    public function registerclaimschool($id)
    {
        $total_number_rows = FrontCounsellorQuery::all();
        $total_number_rows = $total_number_rows->count();
        $recommended_schools = School::orderBy('view_count', 'DESC')
            ->with('address', 'reviews')
            ->where('is_trending', 1)
            ->where('status', 1)
            ->get();
        foreach ($recommended_schools as $sch) {
            $sum = 0;
            foreach ($sch->reviews as $review) {
                $sum = $sum + $review->rating;
            }
            if (sizeof($sch->reviews) > 0) {
                $sch->rating = (int) ($sum / sizeof($sch->reviews));
            } else {
                $sch->rating = 0;
            }
        }
        $popular_blogs = Blog::latest()->with('comment')->take(8)->where('is_active', 1)->get();
        $title = "School Registration | School Dekho";
        $school_details = School::with('school_address')->where('id', $id)->first();
        $index = "noindex";

        return view('frontend.register-claim-school', compact('title', 'school_details', 'index'));
    }
    public function index1()
    {
        $total_number_rows = FrontCounsellorQuery::all();
        $total_number_rows = $total_number_rows->count();
        $recommended_schools = School::orderBy('view_count', 'DESC')
            ->with('address', 'reviews')
            ->where('is_trending', 1)
            ->where('status', 1)
            ->get();
        foreach ($recommended_schools as $sch) {
            $sum = 0;
            foreach ($sch->reviews as $review) {
                $sum = $sum + $review->rating;
            }
            if (sizeof($sch->reviews) > 0) {
                $sch->rating = (int) ($sum / sizeof($sch->reviews));
            } else {
                $sch->rating = 0;
            }
        }
        $popular_blogs = Blog::latest()->with('comment')->take(8)->where('is_active', 1)->get();
        $title = "School Dekho | Best Schools near me";
        return view('frontend.trial', compact('title', 'popular_blogs', 'total_number_rows'));
    }
    // public function contact() {
    //     return view('frontend.contact');
    // }
    public function search(Request $request)
    {
        // dd($request->latitude);
        $title = "Search - School Dekho";
        return view('frontend.search', [
            'location' => $request->location,
            'lat' => $request->latitude,
            'long' => $request->longitude,
        ], compact('title'));
    }
    public function submitcontact(Request $request)
    {
        $entity = new contact();
        $entity->name = $request->name;
        $entity->email = $request->email;
        $entity->phone = $request->phone;
        $entity->message = $request->message;
        $entity->save();
        return redirect()->back()->with(['contact_message' => 'We will get back you soon']);
    }
    public function details($slug)
    {
        $school_count = School::count();
        $id = School::where('slug', $slug)->where('status', 1)->select('id')->get();
        if (!sizeof($id)) {
            return abort(404);
        }
        
        $id = $id[0]->id;
        if ($id == 160) {
            abort(404);
        }
        $is_payment = Payment::where('school_id', $id)->where('status', 1)->count();
        $article_list_schoolwise = BlogArticle::with('blog_article_writer')->where('school_id', $id)->where('status', 1)->get();
        $school_review = SchoolReview::where('school_id', $id)->avg('rating');
        $schooldetails = School::where('id', $id)->with('address', 'medium', 'boards', 'categories', 'elligibilities', 'fees', 'seats', 'hours', 'facilities', 'images')->first();
        $schoolcontacts = SchoolContact::where("school_id", $id)->with('cities', 'states', 'districts')->first();
        if (str_contains($schoolcontacts->lattitude, ",") || str_contains($schoolcontacts->longitude, ",") || $schoolcontacts->longitude === NULL || $schoolcontacts->lattitude === NULL) {
            return redirect()->route('schools.index');
        }
        $is_verified = School::where('id', $id)
            ->where('is_verify', 1)
            ->count();
        $view_count = $schooldetails->view_count;
        $view_count = $view_count + 1;
        $update = $schooldetails->update(['view_count' => $view_count]);
        $lat = $schooldetails->address->lattitude;
        $long = $schooldetails->address->longitude;
        $distance = 'N/A';
        if (session()->get('lat') && session()->get('long')) {
            $x = $this->getDistance(session()->get('lat'), session()->get('long'), (float) $schooldetails->address->lattitude, (float) $schooldetails->address->longitude) / 1000;
            $distance = number_format($x, 3);
        }
        $schools = School::with('address', 'reviews', 'medium', 'claims')
            ->where('status', '1')
            ->where('affiliated', '1')
            ->whereHas('address', function ($query) use ($lat, $long) {
                $query->whereBetween('lattitude', [$lat - 0.05, $lat + 0.05]);
                $query->whereBetween('longitude', [$long - 0.05, $long + 0.05]);
            })->take(10)->get();
        foreach ($schools as $school) {
            $dist = $this->getDistance($lat, $long, (float) $school->address->lattitude, (float) $school->address->longitude) / 1000;
            $school->distance = number_format($dist, 3);
        }
        $recommended_schools = collect($schools)->sortBy('distance');
        $user_view_count = 0;
        if (Auth::user() && Auth::user()->role == 3) {
            $user_id = Auth::user()->id;
            $student_view_count = StudentHistory::where('user_id', $user_id)
                ->where('school_id', $id)
                ->count();
            if ($student_view_count == 0) {
                $entity = new StudentHistory();
                $entity->user_id = $user_id;
                $entity->school_id = $id;
                $entity->count = 1;
                $entity->save();
            }
            $student_view_count++;
            $update_view_count = StudentHistory::where('user_id', $user_id)
                ->where('school_id', $id)
                ->update(['count' => $student_view_count]);
        }
        $reviews = SchoolReview::where('school_id', $id);
        $reviews_count = $reviews->count();

        $reviews_5 = $reviews_count ? (float) $reviews->clone()->where('rating', 5)->count() / $reviews_count : 0;
        $reviews_4 = $reviews_count ? (float) $reviews->clone()->where('rating', 4)->count() / $reviews_count : 0;
        $reviews_3 = $reviews_count ? (float) $reviews->clone()->where('rating', 3)->count() / $reviews_count : 0;
        $reviews_2 = $reviews_count ? (float) $reviews->clone()->where('rating', 2)->count() / $reviews_count : 0;
        $reviews_1 = $reviews_count ? (float) $reviews->clone()->where('rating', 1)->count() / $reviews_count : 0;

        $reviews = SchoolReview::where('school_id', $id)->paginate(10);
        // dd($reviews);
        // dd($reviews_count_5);
        // foreach ($recommended_schools as $sch) {
        //     $sum = 0;
        //     foreach ($sch->reviews as $review) {
        //         $sum = $sum + $review->rating;
        //     }
        //     if (sizeof($sch->reviews) > 0) {
        //         $sch->rating = (int) ($sum / sizeof($sch->reviews));
        //     } else {
        //         $sch->rating = 0;
        //     }
        // }
        // return view('front.school.details', compact('schooldetails', 'school_count', 'school_review', 'recommended_schools', 'schoolcontacts', 'is_verified'));
        return view(
            'frontend.details',
            compact(
                'schooldetails',
                'is_payment',
                'school_count',
                'school_review',
                'recommended_schools',
                'schoolcontacts',
                'is_verified',
                'reviews',
                'reviews_count',
                'reviews_5',
                'reviews_4',
                'reviews_3',
                'reviews_2',
                'reviews_1',
                'distance',
                'slug',
                'article_list_schoolwise'
            ),
        );
    }
    function getDistance(
        $latitudeFrom,
        $longitudeFrom,
        $latitudeTo,
        $longitudeTo,
        $earthRadius = 6371000,
    ) {
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);
        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;
        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
            cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return $angle * $earthRadius;
    }

    public function school_header_search($key, $latitude, $longitude)
    {
        $all_schools = School::with('school_address')
            ->where('status', '1')
            ->where('name', 'like', '%' . $key . '%')
            ->whereHas('school_address', function ($q) use ($key, $latitude, $longitude) {
                $q->whereBetween('lattitude', [$latitude - 1, $latitude + 1]);
                $q->whereBetween('longitude', [$longitude - 1, $longitude + 1]);
            })->get();

        if (sizeof($all_schools) < 10) {
            $more_schools = School::with('school_address')
                ->where('status', '1')
                ->whereHas('school_address', function ($q) use ($key, $latitude, $longitude) {
                    $q->where('address', 'like', '%' . $key . '%');
                    $q->orWhere('city', 'like', '%' . $key . '%');
                })->limit(10 - sizeof($all_schools))->get();

            $all_schools = $all_schools->merge($more_schools);
        }
        if ($latitude && $longitude) {
            foreach ($all_schools as $school) {
                $dist = $this->getDistance($latitude, $longitude, (float) $school->address->lattitude, (float) $school->address->longitude) / 1000;
                $school->distance = number_format($dist, 3);
            }
        }
        $all_schools = collect($all_schools)->sortBy('distance');
        // $perPage = 20;
        // $offset = max(0, 20);
        // $items = $collection->slice($offset, 20);
        // $all_schools = new Paginator($items, $perPage, 20);
        // $all_schools = array_slice($all_schools->toArray(), 0, 3);
        $school_suggestions = [];
        foreach ($all_schools as $school) {
            $suggest = new stdClass();
            $suggest->name = $school->name;
            if (isset($school->slug)) {
                $suggest->link = route('details', $school?->slug);
            }
            $suggest->logo = $school->school_logo;
            $suggest->location = $school?->address?->address . ', ' . $school?->address?->city;
            $suggest->distance = $school->distance . ' km';
            $suggest->verified = $school->is_verify === 1 ? true : false;
            // return $suggest;
            array_push($school_suggestions, $suggest);
        }
        $school_suggestions = array_slice($school_suggestions, 0, 10);
        usort($school_suggestions, function ($a, $b) {
            return $b->verified - $a->verified;
        });
        return response()->json(
            [
                'suggestions' => $school_suggestions,
            ]
        );
    }

    // public function search(Request $request)
    // {
    //     // dd($request->latitude);
    //     return view('frontend.search', [
    //         'lat' => $request->latitude,
    //         'long' => $request->longitude,
    //     ]);
    // }

    public function school_trends(Request $request)
    {
        $all_schools = [];
        $lat = $request->latitude;
        $long = $request->longitude;
        $request->session()->put('lat', $lat);
        $request->session()->put('long', $long);
        if ($lat != null && $long != null) {
            $schools = School::with('address', 'reviews', 'medium', 'claims')
                ->where('status', '1')
                ->where('affiliated', '1')
                ->whereHas('address', function ($query) use ($lat, $long) {
                    $query->whereBetween('lattitude', [$lat - 1, $lat + 1]);
                    $query->whereBetween('longitude', [$long - 1, $long + 1]);
                });
            $schools = $schools->take(2000)->get();
            if ($request->ratings) {
                $ratings = explode(',', $request->ratings);
                $tmp_schools = $schools;
                $schools = [];
                foreach ($ratings as $rat) {
                    $new_list = $tmp_schools->where('rating', $rat)->values();
                    foreach ($new_list as $new) {
                        array_push($schools, $new);
                    }
                }
            }
            foreach ($schools as $school) {
                $dist = $this->getDistance($lat, $long, (float) $school->address->lattitude, (float) $school->address->longitude) / 1000;
                $school->distance = number_format($dist, 3);
            }
            $collect = collect($schools)->sortBy('distance');
            $all_schools = ColectionPaginate::paginate($collect, 12);
        } else {
            $schools = School::with('address', 'reviews')
                ->where('status', 1);
            $schools = $schools->take(500)->get();
            $collect = collect($schools)->sortBy('is_verify');
            $all_schools = ColectionPaginate::paginate($collect, 12);
        }
        $verifiedSchools = [];
        $unverifiedSchools = [];

        foreach ($all_schools as $school) {
            if ($school->is_verify) {
                $verifiedSchools[] = $school;
            } else {
                $unverifiedSchools[] = $school;
            }
        }

        $allSchoolsOrdered = array_merge($verifiedSchools, $unverifiedSchools);

        foreach ($allSchoolsOrdered as $school) {
            echo $this->generateSchoolItemHtml($school);
        }
    }

    private function generateSchoolItemHtml($school)
    {
        ob_start();

        $reviews = SchoolReview::where('school_id', $school->id);
        $schoolcontacts = SchoolContact::where("school_id", $school->id)->with('cities', 'states', 'districts')->first();
        $reviews_count = $reviews->count();
        $schoolRating = number_format((float) $this->avgRating($school->id), 1, '.', '');
        $address = $school->address->address;
        $district = $schoolcontacts->districts->district;
        $state = $schoolcontacts->states->state;
        $pinCode = $school->address->pincode; ?>

        <style>
            .course-info-02__rating .rating-star::before,
            .course-info-02__rating .rating-label::before {
                font-size: 12px;
            }
        </style>
        <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="course-item-02">
                <div class="course-header-02">
                    <div class="course-header-02__thumbnail ">
                        <a href="/details/<?= $school->slug ?>">
                            <img src="<?= $school->school_logo ?>" alt="courses" width="330" height="221">
                        </a>
                    </div>
                    <?php if ($school->is_verify) : ?>
                        <div class="course-header-02__badge"><span class="price">Admission Open | 2025-26</span></div>
                    <?php endif; ?>
                </div>
                <div class="course-info-02">
                    <div>
                        <span class="course-info-02__badge-text badge-beginner">
                            <?= $school?->boards?->board_name ?>
                        </span>
                        <span class="course-info-02__badge-text badge-beginner">
                            <?= strtoupper($school->school_type) ?>
                        </span>
                    </div>
                    <h3 class="course-info-02__title">
                        <a href="/details/<?= $school->slug ?>">
                            <?= $school->name ?>
                            <?php if ($school->is_verify) : ?>
                                <i class="fas fa-badge-check text-primary small" data-bs-tooltip="tooltip" data-bs-placement="top"
                                    data-bs-original-title="Verified" title="" aria-label="Verified"></i>
                            <?php endif; ?>
                        </a>
                    </h3>
                    <div class="course-info-02__description">
                        <p class="event-item__location">
                            <i style="color:#7e7e7e;" class="far fa-map-marker-alt"></i>
                            <?= $address . ', ' . $district . ', ' . $state . ' - ' . $pinCode ?>
                        </p>
                    </div>
                    <small class="course-info-02__footer">
                        <div class="course-info-02__rating">
                            <div class="rating-star">
                                <div class="rating-label" style="width: <?= $schoolRating * 20 ?>%;"> </div>
                            </div>
                            <div class="rating-count"> (<?= $reviews_count ?>) </div>
                        </div>
                        <div class="course-info-02__meta"> <span><i class="far fa-eye text-success"></i></span> <span>
                                <?= $school->view_count ?> Views </span> </div>
                    </small>
                </div>
            </div>
        </div>
<?php

        $output = ob_get_clean();
        return $output;
    }

    public function avgRating($id)
    {
        $x = SchoolReview::where('school_id', $id)->avg('rating');
        if ($x != null)
            return $x;
        else
            return $x = 0;
    }
    public function postreview(Request $request)
    {
        $schoolreview = new SchoolReview();
        $schoolreview->school_id = $request->school_id;
        $schoolreview->name = $request->name;
        $schoolreview->email = $request->email;
        $schoolreview->mobile = $request->mobile ? $request->mobile : '';
        $schoolreview->description = $request->description;
        $schoolreview->rating = $request->rating ? $request->rating : '0';
        // if (request->modal) {
        //     $disable = 1;
        // }
        $schoolreview->save();
        return redirect()->back();
    }
    public function privacy() //
    {
        $school_count = School::count();
        $title = "Privacy Policy  - School Dekho";
        return view('frontend.privacy', compact('title', 'school_count'));
        // return view('front.school.privacy', compact('title', 'school_count'));
    }
    public function refund() //
    {
        $school_count = School::count();
        $title = "Refund Policy - School Dekho";
        return view('frontend.refund', compact('title', 'school_count'));
    }
    public function about() //
    {
        $school_count = School::count();
        $title = "About Us - School Dekho";
        $all_leads = AllLead::count();
        $school_application_leads = SchoolApplicatrionForm::count();
        $total_enquiries = $all_leads + $school_application_leads;
        $counselled_enquiries = $total_enquiries - 189;
        $school_count = School::count();
        return view('frontend.about-us', compact('title', 'school_count', 'total_enquiries', 'counselled_enquiries', 'school_count'));
    }
    public function careers()
    {
        $school_count = School::count();
        $title = "Careers - School Dekho";
        $all_leads = AllLead::count();
        $school_application_leads = SchoolApplicatrionForm::count();
        $total_enquiries = $all_leads + $school_application_leads;
        $counselled_enquiries = $total_enquiries - 189;
        $school_count = School::count();
        return view('frontend.careers', compact('title', 'school_count', 'total_enquiries', 'counselled_enquiries', 'school_count'));
    }
    public function checkout() //
    {
        $school_count = School::count();
        $title = "Checkout - School Dekho";
        $all_leads = AllLead::count();
        $school_application_leads = SchoolApplicatrionForm::count();
        $total_enquiries = $all_leads + $school_application_leads;
        $counselled_enquiries = $total_enquiries - 189;
        $school_count = School::count();
        return view('frontend.checkout', compact('title', 'school_count', 'total_enquiries', 'counselled_enquiries', 'school_count'));
    }
    public function terms() //
    {
        $school_count = School::count();
        $title = "Terms & Conditions - School Dekho";
        return view('frontend.terms', compact('title', 'school_count'));
    }
    public function faq()
    {
        $school_count = School::count();
        $title = "FAQ - School Dekho";
        return view('frontend.faq', compact('title', 'school_count'));
    }
    public function contact() //
    {
        $school_count = School::count();
        $title = "Contact Us - School Dekho";
        return view('frontend.contact', compact('title', 'school_count'));
    }
    public function shipping() //
    {
        $school_count = School::count();
        $title = "Shipping Policy - School Dekho";
        return view('frontend.shipping', compact('title', 'school_count'));
    }
    public function compare()
    {
        return view('frontend.compare');
    }
    public function school_application(Request $request)
    {
        $school_count = School::count();
        $school_form = 1;
        $schooldetails = School::where('id', $request->id)->first();
        $application_exists = SchoolApplicationFormSettings::where("school_id", $request->id)->first();
        if (isset($application_exists) > 0) {
            return view('frontend.applicationform', ["school_id" => $request->id], compact('schooldetails', 'school_count'));
        } else {
            $application_form = [];
            $section = new stdClass();
            $section->section = "Basic Student Details";
            array_push($application_form, $section);
            $elements = [];
            $x = new stdClass();
            $x->section = "Basic Student Details";
            $option = new stdClass();
            $option->is_required = true;
            $option->min_length = null;
            $option->max_length = null;
            for ($i = 0; $i <= 4; $i++) {
                if ($i == 0) {
                    $y = new stdClass();
                    $y->name = "name_of_the_student";
                    $y->label = "Name of The Student";
                    $y->type = "text";
                    $y->option = $option;
                    array_push($elements, $y);
                } elseif ($i == 1) {
                    $y = new stdClass();
                    $y->name = "pin_code";
                    $y->label = "Pin Code";
                    $y->type = "number";
                    $y->option = $option;
                    array_push($elements, $y);
                } elseif ($i == 2) {
                    $y = new stdClass();
                    $y->name = "class_seeking_admission";
                    $y->label = "Class Seeking Admission";
                    $y->type = "select";
                    $y->option = $option;
                    $y->menu = ["Nursery", "LKG", "UKG", "Class-I", "Class-II", "Class-III", "Class-IV", "Class-V", "Class-VI", "Class-VII", "Class-VIII", "Class-IX", "Class-X", "Class-XI", "Class-XII"];
                    array_push($elements, $y);
                } elseif ($i == 3) {
                    $y = new stdClass();
                    $y->name = "email_address";
                    $y->label = "Email Address";
                    $y->type = "email";
                    $y->option = $option;
                    array_push($elements, $y);
                } elseif ($i == 4) {
                    $y = new stdClass();
                    $y->name = "phone";
                    $y->label = "Phone";
                    $y->type = "number";
                    $y->option = $option;
                    array_push($elements, $y);
                }
            }
            array_push($application_form, $elements);
            $z = new stdClass();
            $z->section = $application_form[0]->section;
            $z->elements = $application_form[1];
            $application_form_settings = [];
            array_push($application_form_settings, $z);
            $application_form_settings;
            $entity = new SchoolApplicationFormSettings();
            $entity->school_id = $request->id;
            $entity->fields = $application_form_settings;
            $entity->save();
            return view('frontend.applicationform', ["school_id" => $request->id], compact('schooldetails', 'school_count', 'school_form'));
        }
    }
    public function get_application_fields(Request $request)
    {
        $schoolform = SchoolApplicationFormSettings::where('school_id', $request->school_id)->first();
        $fields = $schoolform->fields ?? [];
        $this->response->is_success = true;
        $this->response->data = $fields;
        $this->response->message = "All fields";
        return $this->rModel();
    }
    public function save_application_form(Request $request)
    {
        //return $request->all();
        $required = [];
        $required['school_id'] = "required";
        $fields = $request->fields;
        // return $fields;
        foreach ($fields as $field) {
            $field = (object) $field;
            foreach ($field->elements as $element) {
                $element = (object) $element;
                if (($element->option['is_required']) && (!isset($element->value))) {
                    $required[$element->name] = "required";
                }
            }
        }
        $validation = Validator::make($request->all(), $required);
        if ($validation->fails()) {
            $this->response->message = "All field is required";
            $this->response->errors = $validation->errors();
            return $this->rModel();
        }
        $assign_fields = [];
        foreach ($fields as $field) {
            $elements = [];
            foreach ($field['elements'] as $element) {
                if (($element['type'] == "file") && (isset($element['value']))) {
                    $url = FileHelper::UploadEncodedFile($element['value'], "uploads/applicationform/");
                    unset($element['value']);
                    $element['value'] = $url;
                }
                array_push($elements, $element);
            }
            $field['elements'] = $elements;
            array_push($assign_fields, $field);
        }
        $schoolform = new SchoolApplicatrionForm();
        $schoolform->school_id = $request->school_id;
        $schoolform->fields = $assign_fields;
        $schoolform->save();
        // $schoollead = new Lead();
        // $schoollead->application = $assign_fields;
        // $schoollead->school_id = $request->school_id;
        // $schoollead->lead_mode = "auto";
        // $schoollead->save();
        // $school_student_lead = new SchoolLead();
        // $school_student_lead->school_id = $request->school_id;
        // $school_student_lead->lead_id = $schoollead->id;
        // $school_student_lead->is_open = 1;
        // $school_student_lead->save();
        $this->response->is_success = true;
        $this->response->message = "Your application has been submitted successfully";
        return $this->rModel();
    }
    public function front_counsellor_enquiry(Request $request)
    {
        // $request->validate([
        //     'phone' => 'required|between:10,13',
        // ]);
        // if ($request->fails()) {
        //     return back()->with(['query_message' => 'Please provide a valid phone number']);
        // }
        $query = new FrontCounsellorQuery();
        $query->name = $request->name;
        $query->phone = $request->phone;
        $query->seeking_class = $request->seeking_class;
        $query->pincode = $request->pincode;
        $query->save();
        return back()->with(['query_message' => 'Query received. We will be in touch with you soon.']);
    }

    public function test_index($key)
    {
        dd($key);
        $all_schools = School::with('school_address')
            ->where('status', '1')
            ->where('name', 'like', '%' . $key . '%')
            ->whereHas('school_address', function ($q) use ($key, $latitude, $longitude) {
                $q->whereBetween('lattitude', [$latitude - 1, $latitude + 1]);
                $q->whereBetween('longitude', [$longitude - 1, $longitude + 1]);
            })->get();
        dd($all_schools);
        if (sizeof($all_schools) < 10) {
            $more_schools = School::with('school_address')
                ->where('status', '1')
                ->whereHas('school_address', function ($q) use ($key, $latitude, $longitude) {
                    $q->orWhere('address', 'like', '%' . $key . '%');
                    $q->orWhere('city', 'like', '%' . $key . '%');
                })->limit(10 - sizeof($all_schools))->get();

            $all_schools = $all_schools->merge($more_schools);
        }
        if ($latitude && $longitude) {
            foreach ($all_schools as $school) {
                $dist = $this->getDistance($latitude, $longitude, (float) $school->address->lattitude, (float) $school->address->longitude) / 1000;
                $school->distance = number_format($dist, 3);
            }
        }
        $all_schools = collect($all_schools)->sortBy('distance');
        // $perPage = 20;
        // $offset = max(0, 20);
        // $items = $collection->slice($offset, 20);
        // $all_schools = new Paginator($items, $perPage, 20);
        // $all_schools = array_slice($all_schools->toArray(), 0, 3);
        $school_suggestions = [];
        foreach ($all_schools as $school) {
            $suggest = new stdClass();
            $suggest->name = $school->name;
            if (isset($school->slug)) {
                $suggest->link = route('details', $school?->slug);
            }
            $suggest->logo = $school->school_logo;
            $suggest->location = $school?->address?->address . ', ' . $school?->address?->city;
            $suggest->distance = $school->distance . ' km';
            $suggest->verified = $school->is_verify === 1 ? true : false;
            // return $suggest;
            array_push($school_suggestions, $suggest);
        }
        $school_suggestions = array_slice($school_suggestions, 0, 10);
        usort($school_suggestions, function ($a, $b) {
            return $b->verified - $a->verified;
        });
        return response()->json(
            [
                'suggestions' => $school_suggestions,
            ]
        );
    }
}
