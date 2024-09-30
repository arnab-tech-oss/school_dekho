<?php

namespace App\Http\Controllers\Frontend;

use App\Models\School;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompareController extends Controller
{
    function getDistance(
        $latitudeFrom,
        $longitudeFrom,
        $latitudeTo,
        $longitudeTo,
        $earthRadius = 6371000
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
    public function school_compare()
    {
        $school_count = School::count();
        if (session()->has('school_ids') && sizeof(session()->get('school_ids')) > 0) {
            $compare_id = session()->get('school_ids');
            $all_schools = School::whereIn('id', $compare_id)->with('boards')
                ->with('medium')
                ->with('facilities')
                ->get();
            $lat = $all_schools[0]->address->lattitude;
            $long = $all_schools[0]->address->longitude;
            $schools = School::with('address', 'reviews', 'medium', 'claims')
                ->where('status', '1')
                ->where('affiliated', '1')
                ->whereHas('address', function ($query) use ($lat, $long) {
                    $query->whereBetween('lattitude', [$lat - 0.05, $lat + 0.05]);
                    $query->whereBetween('longitude', [$long - 0.05, $long + 0.05]);
                })->take(100)->get();
            foreach ($schools as $school) {
                $dist = $this->getDistance($lat, $long, (float) $school->address->lattitude, (float) $school->address->longitude) / 1000;
                $school->distance = number_format($dist, 3);
            }
            $recommended_schools = collect($schools)->sortBy('distance');
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
            return view('frontend.compare', compact('all_schools', 'school_count', 'recommended_schools'));
        } else {
            return redirect()->route('schools.index')->with(['msg' => 'You have to add any school for compare']);
        }
    }

    public function addToCompare(Request $request)
    {

        $compare_school_ids = $request->session()->get('school_ids');

        if (!$compare_school_ids) {
            $compare_school_ids = [];
        }

        if (sizeof($compare_school_ids) == 3) {
            return back()->with('alert', 'The limit for comparing schools has been exceeded. Kindly remove one to compare more.');
        }

        if (!in_array($request->id, $compare_school_ids)) {
            array_push($compare_school_ids, $request->id);
        }
        $request->session()->put("school_ids", $compare_school_ids);

        return back();
    }

    public function schoolcompare()
    {
        $school_count = School::count();
        if (session()->has('school_ids') && sizeof(session()->get('school_ids')) > 0) {

            $compare_id = session()->get('school_ids');
            $all_schools = School::whereIn('id', $compare_id)->with('boards')
                ->with('medium')
                ->with('facilities')
                ->get();

            $lat = $all_schools[0]->address->lattitude;
            $long = $all_schools[0]->address->longitude;

            $schools = School::with('address', 'reviews', 'medium', 'claims')
                ->where('status', '1')
                ->where('affiliated', '1')
                ->whereHas('address', function ($query) use ($lat, $long) {
                    $query->whereBetween('lattitude', [$lat - 0.05, $lat + 0.05]);
                    $query->whereBetween('longitude', [$long - 0.05, $long + 0.05]);
                })->take(100)->get();

            foreach ($schools as $school) {
                $dist = $this->getDistance($lat, $long, (float) $school->address->lattitude, (float) $school->address->longitude) / 1000;
                $school->distance = number_format($dist, 3);
            }
            $recommended_schools = collect($schools)->sortBy('distance');

            // $recommended_schools = School::orderBy('view_count', 'DESC')
            //     ->with('address', 'reviews')
            //     ->where('is_trending', 1)
            //     ->get();
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
            return view('frontend.compare', compact('all_schools', 'school_count', 'recommended_schools'));
        } else {

            return redirect()->route('schools.index')->with(['msg' => 'You have to add any school for compare']);
        }
    }

    public function removecompare(Request $request)
    {
        $compare_id = session()->get('school_ids');

        $index = array_search($request->id, $compare_id);

        array_splice($compare_id, $index, 1);

        $request->session()->put("school_ids", $compare_id);

        if (sizeof($compare_id) < 1) {
            return redirect()->route('schools.index');
        }

        return redirect()->route('school.compare');
    }
}
