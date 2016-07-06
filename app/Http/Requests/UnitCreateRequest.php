<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UnitCreateRequest extends Request
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
             '*.BloodType_id' => 'required|alpha_num',
             '*.freezer_id' => 'required|alpha_num',
             '*.donor_id' => 'required|alpha_num',
             '*.quantity' => 'required|alpha_num',
        ];
    }
}
