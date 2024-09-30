<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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

use App\Models\SchoolApplicatrionForm;
use Illuminate\Support\Facades\Validator;
use App\Models\SchoolApplicationFormSettings;
use App\Models\FrontCounsellorQuery;
use App\Models\contact;
use stdClass;
use DB;
use Illuminate\Support\Facades\Log;

class SchoolSearchController extends Controller
{
    public function schoolSearch(Request $request)
    {
        $lat = $request->latitude;
        $long = $request->longitude;

        if ($lat && $long) {
            $schools = School::with('address', 'reviews')
                ->where('status', '1')
                ->where('affiliated', '1')
                ->whereHas('address', function ($query) use ($lat, $long) {
                    $query->whereBetween('lattitude', [$lat - 1, $lat + 1])
                        ->whereBetween('longitude', [$long - 1, $long + 1]);
                });

            if ($request->ratings) {
                $ratings = explode(',', $request->ratings);
                $schools->whereIn('rating', $ratings);
            }

            $schools->withCount('reviews');

            $schools->take(5);

            $schools = $schools->get();

            $all_schools = $schools->map(function ($school) use ($lat, $long) {
                $distance = $this->calculateDistance($lat, $long, $school->address->lattitude, $school->address->longitude);

                $data = [
                    'isVerified' => $school->is_verified,
                    'name' => $school->name,
                    'link' => url('details/' . $school->slug),
                    'logo' => $school->school_logo,
                    'location' => $school->address->address,
                    'distance' => number_format($distance, 3) . ' km',
                ];

                return $data;
            });
        } else {

            $all_schools = [];
        }

        return response()->json(['suggestions' => $all_schools]);
    }

    private function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        return ($miles * 1.609344);
    }
}
