<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Http\Request;

class StateDistrictController extends Controller
{
    public function district_list(Request $request)
    {
        $districts = District::where('state_id', $request->state_id)->get();
        return response()->json($districts);
    }

}
