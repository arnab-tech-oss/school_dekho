<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SchoolRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'address'=>'required',
            'city_id'=>'required',
            'district_id'=>'required',
            'state_id'=>'required',
            'school_medium_id'=>'required',
            'school_board_id'=>'required',
            'pincode'=>'required'
        ];
    }
}
