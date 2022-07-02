<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VenlabeRequest extends FormRequest
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
            'name' => 'required|min:2',
            
            'address' => 'required',
            'photo' => 'required_without:id|mimes:jpg,jpeg,png',
            'mobile' => 'required|unique:doctors,mobile,'.$this -> id,
            'email' => 'required|email|unique:admins,email,'.$this -> id,
            'cuontry_id' => 'required|exists:cuontries,id',
            'city_id' => 'required|exists:cities,id',
            'password'  => 'required|confirmed|min:8'
        ];
    }

}
