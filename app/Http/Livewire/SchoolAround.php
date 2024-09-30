<?php

namespace App\Http\Livewire;

use App\Models\School;
use Livewire\Component;
use DB;

use App\Core\ColectionPaginate;

class SchoolAround extends Component
{
    public $aroundSchools = array();
    public $latitude, $longitude, $search, $text;
    
    protected $listeners = ['setSearch','setLatitude', 'setLongitude'];

    public function setSearch($value) 
    {
        $this->search = $value;
    }
    public function setLatitude($value) 
    {
        $this->latitude = $value;
    }
    
    public function setLongitude($value) 
    {
        $this->longitude = $value;
        // $this->text = $this->search;
        $this->submit();
    }

    public function submit()
    {
        $this->aroundSchools = array();
         $lat = $this->latitude;
         $long = $this->longitude;
      
         $schools = School::with('address', 'reviews', 'medium', 'claims')
            ->where('status', '1')
            ->where('affiliated', '1')
            ->whereHas('address', function ($query) use ($lat, $long) {
                $query->whereBetween('lattitude', [$lat-0.5, $lat+0.5]);
                $query->whereBetween('longitude', [$long-0.5, $long+0.5]);
            });
        $schools = $schools->take(500)->get();
        foreach ($schools as $school) {
            $dist = $this->getDistance($lat, $long, (float) $school->address->lattitude, (float) $school->address->longitude)/1000;
            $school->distance = number_format($dist,3);
        }
        
        $collect = collect($schools)->sortBy('distance');
        $x=0;
        foreach($collect as $c){
            array_push($this->aroundSchools, $c);
           
            if($x++ > 20) break;
        }
       
    }
    
    function getDistance(
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
        
        
        return view('livewire.school-around', [
               'aroundSchools' => $this->aroundSchools,
               'search'=> $this->search
            ]
        );
    }
}
