<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact_lists()
    {
        $all_contacts = contact::orderBy('id', 'DESC')->paginate(10);
        return view('admin.enquiry.contact-list', compact('all_contacts'));
    }
}
