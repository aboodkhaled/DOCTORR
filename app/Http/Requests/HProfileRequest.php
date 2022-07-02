<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HProfileRequest extends FormRequest
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
            
            'email' => 'required|email|unique:hosbitals,email,'.$this -> id,
            'password'  => 'nullable|confirmed|min:8',
            'name' => 'required',
            'address' => 'required',
            'photo' => 'required_without:id|mimes:jpg,jpeg,png',
            'mobile' => 'required|unique:hosbitals,mobile,'.$this -> id,
            'cuontry_id' => 'required|exists:cuontries,id',
            'city_id' => 'required|exists:cities,id',
            'password'  => 'required|confirmed|min:8'
        ];
    }
}
