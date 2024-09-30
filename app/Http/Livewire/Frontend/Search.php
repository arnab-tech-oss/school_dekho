<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Livewire\WithPagination;
use DB;

use App\Models\School;
use App\Models\SchoolBoard;
use App\Models\SchoolMedium;
use App\Models\SchoolReview;
use App\Models\SchoolCategory;

use App\Core\ColectionPaginate;

class Search extends Component
{
    use WithPagination;

    public $boards = [];
    public $medium = [];
    public $type = [];
    public $distance = 5;
    public $lat, $long, $location;
    

    public function mount($lat, $long, $location){
        $this->location = $location;
        $this->lat = $lat;
        $this->long = $long;
    }

    public function getDistance(
        $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
    {
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

    public function render()
    {
        $title = "Search | School Dekho | Best School near me | Indias first school search portal | Dekho Phir Chuno";
        $schools = School::with('address', 'reviews', 'medium', 'claims')
            ->where('status', '1')
            ->where('affiliated', '1')
            ->whereHas('address', function ($query)  {
                $query->whereBetween('lattitude', [$this->lat-0.5, $this->lat+0.5]);
                $query->whereBetween('longitude', [$this->long-0.5, $this->long+0.5]);
            });

        $school_boards = SchoolBoard::with([
            'schools' => function ($q) {
                $q->where('status', 1);
            }
        ])->where('status',1)->get();

        $mediums = SchoolMedium::with([
            'schools' => function ($q) {
                $q->where('status', 1);
            }
        ])->get();

        $school_reviews = SchoolReview::with([
            'school' => function ($q) {
                $q->where('status', 1);
            }])->groupBy('school_id')
                ->selectRaw('avg(rating) as average')
                ->pluck('average');

        $int_school_reviews = [];
        foreach ($school_reviews as $key => $value) {
            $int_school_reviews[$key] = (int) $value;
        }
        $reviews = [5, 4, 3, 2, 1];
        $count_reviews = [];
        $count_each_reviews = array_count_values($int_school_reviews);
        for ($i = 0; $i <= 4; $i++) {
            if (in_array($reviews[$i], $int_school_reviews)) {
                $x = $reviews[$i];
                $count_reviews[$i] = $count_each_reviews[$x];
            } else {
                $count_reviews[$i] = 0;
            }
        }
        // $categories = SchoolCategory::with('schools')->get();
        // dd($categories);
        $categories = SchoolCategory::with([
            'schools' => function ($q) {
                $q->where('status', 1);
            }
        ])->get();

        $school_types = School::select('school_type',DB::raw('count(*) as school_count'))->where('status', 1)->groupBy('school_type')->get();

        $schools = $schools->get();

        if($this->lat && $this->long){
            foreach ($schools as $school) {
                $dist = $this->getDistance($this->lat, $this->long, (float) $school->address->lattitude, (float) $school->address->longitude)/1000;
                $school->distance = number_format($dist,3);
            }
        }

        if($this->distance){
            if($this->distance == 5)
                $schools = $schools->where('distance', '<=' ,$this->distance);
            if($this->distance == 15)
                $schools = $schools->whereBetween('distance', [5.0,15.0]);
            if($this->distance == 50)
                $schools = $schools->whereBetween('distance', [15.0,50.0]);
        }


        if($this->boards)
           $schools = $schools->whereIn('board', $this->boards);
        if($this->medium)
           $schools = $schools->whereIn('school_medium_id', $this->medium);
        if($this->type)
           $schools = $schools->whereIn('school_type', $this->type);


        $search_result_count = $schools->count();
        $collection = collect($schools)->sortBy('distance');

        // $perPage = 10;

        // $items = $collection->forPage($this->page, $perPage);

        // $schools = new LengthAwarePaginator($items, $collection->count(), $perPage, $this->page);

        $perPage = 10;


        $offset = max(0, ($this->page - 1) * $perPage);

        // need one more here so the simple paginatior knows
        // if there are more pages left
        $items = $collection->slice($offset, $perPage + 1);

        $schools = new Paginator($items, $perPage, $this->page);
        $location = $this->location;

        // return view('livewire.paginator-example', ['users' => $paginator]);

        return view('livewire.frontend.search', compact(
            'schools',
            'title',
            'school_boards',
            'mediums',
            'count_reviews',
            'categories',
            'school_types',
            'search_result_count',
            'location',
        ));
    }
}
