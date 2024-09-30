<?php

namespace App\Http\Controllers\SchoolAdmin;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Core\BaseUserController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\SchoolApplicationFormSettings;
use App\Models\SchoolClaim;

class ApplicationController extends BaseUserController
{
    public function createform($id)
    {
        $school_admin_id = Auth::user()->id;
        $is_verified = Payment::where('school_claim_id', $id)
            ->where('claim_id', $school_admin_id)
            ->where('status', 1)
            ->get();
        //return $is_verified;
        $payment_status = Payment::with('claim')
            ->where('status', 1)
            ->where('validated_at', '>=', date('Y-m-d H:i:s', time()))
            ->where('claim_id', $school_admin_id)
            ->get();
        $total_schools = SchoolClaim::where('claim_id', Auth::user()->id)->count();
        return view('school_admin_new.application.create', ["school_id" => $id], compact('is_verified', 'payment_status','total_schools'));
    }
    public function getDetailsApi(Request $request)
    {
        $entity = SchoolApplicationFormSettings::where('school_id', $request->school_id)->first();
        if (!$entity) {
            $this->response->message = "No record found";
            return $this->rModel();
        }
        $this->response->is_success = true;
        $this->response->data = $entity;
        $this->response->message = "All data";
        return $this->rModel();
    }
    public function createFormApi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "school_id" => "required|exists:schools,id",
            "fields" => "required"
        ]);
        if ($validator->fails()) {
            $this->response->errors = $validator->errors();
            return $this->rModel();
        }
        $entity = new SchoolApplicationFormSettings();
        $entity->fields = $request->fields;
        $entity->school_id = $request->school_id;
        $entity->save();
        $this->response->is_success = true;
        $this->response->message = "Application Form Has been Created";
        return $this->rModel();
    }
    public function updateFormApi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "id" => "required",
            "fields" => "required"
        ]);
        if ($validator->fails()) {
            $this->response->errors = $validator->errors();
            return $this->rModel();
        }
        $entity = SchoolApplicationFormSettings::find($request->id);
        if (!$entity) {
            $this->response->message = "No record found";
            return $this->rModel();
        }
        $entity->fields = $request->fields;
        $entity->school_id = $request->school_id;
        $entity->update($entity->toArray());
        $this->response->is_success = true;
        $this->response->message = "Application form has been updated";
        return $this->rModel();
    }
}
