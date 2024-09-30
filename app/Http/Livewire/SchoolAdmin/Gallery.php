<?php

namespace App\Http\Livewire\SchoolAdmin;

use App\Models\SchoolImage;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Livewire\WithFileUploads;

class Gallery extends Component
{
    use WithFileUploads;
    public $pictures = [], $images = [];
    public function render()
    {
        return view('livewire.school-admin.gallery');
    }
    public function save()
    {
        $x =  Session::get('school_id');
        $school_images = SchoolImage::where('school_id', $x)->first();
        foreach ($this->pictures as $key => $image) {
            $this->pictures[$key] = $image->store('public/gallery1');
            $images[] = str_replace("public/gallery/", "", $this->pictures[$key]);
        }
        $school_images->school_image = $images;
        $school_images->update($school_images->toArray());
        $this->reset();
        session()->flash('message', 'Gallery Added Successfully.');
        return redirect()->back();
    }
}
