<?php

namespace App\Http\Livewire;

use App\Models\School;
use Livewire\Component;
use DB;

class ListSchool extends Component
{
    public $search = null;
    
    public $schools= array();


    public function search($search)
    {
        $this->search = $search;
    }

    public function render()
    {
        
        if(!$this->search)
        {
            return view('livewire.list-school', [
                'allschools' => null
            ]);
        }
        return view('livewire.list-school', [
            'allschools' => DB::table('schools')
                            ->select('*')
                            ->join('school_contacts', 'schools.id', '=', 'school_contacts.school_id')
                            ->where('school_contacts.address', 'like', '%'.$this->search.'%')
                            ->orWhere('school_contacts.pincode', 'like', '%'.$this->search.'%')
                            ->orWhere('schools.name', 'like', '%'.$this->search.'%')->get()
            ]
        );
    }
}
