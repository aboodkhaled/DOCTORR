<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CProfileRequest extends FormRequest
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
            
            'email' => 'required|email|unique:clinics,email,'.$this -> id,
            'password'  => 'nullable|confirmed|min:8',
            'name' => 'required',
            'address' => 'required',
            'photo' => 'required_without:id|mimes:jpg,jpeg,png',
            'mobile' => 'required|unique:clinics,mobile,'.$this -> id,
            'plase_id' => 'required|exists:plases,id',
            
            'password'  => 'required|confirmed|min:8'
        ];
    }
}
