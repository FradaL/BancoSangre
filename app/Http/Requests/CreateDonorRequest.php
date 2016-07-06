<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateDonorRequest extends Request
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
            //
            'first_name' => 'required|alpha',
            'second_name' => 'required|alpha',
            'first_lastname' => 'required|alpha',
            'second_lastname' => 'required|alpha',
            'dpi' => 'required|alpha_num|min:11',
            'Civil_Status' =>'required|min:4',
            'age' => 'required|alpha_num',
            'BloodType_id' => 'required',
            'weight' => 'required|alpha_num',
            'disease' => 'required|alpha:min:2',
            'tattoo' => 'required|alpha:min:2',

        ];
    }
}
