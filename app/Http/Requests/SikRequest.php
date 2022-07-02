<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SikRequest extends FormRequest
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
           'photo' => 'required_without:id|mimes:jpg,jpeg,png',
            'name' => 'required|string|max:191',
            'age' => 'required',
            
            'sex' => 'required|in:male,female',
            'sik_typ' => 'required|in:external,internal',
            'socia' => 'required|in:marride,single',
            'address' => 'required|max:191',
            'blood_id' => 'required|exists:bloods,id',
            'cuontry_id' => 'required|exists:cuontries,id',
            'city_id' => 'required|exists:cities,id',
            //'user_id' => 'required|exists:users,id',
            'password'  => 'required|confirmed|min:8',
            'mobile' => 'required|unique:Users,mobile,'.$this -> id,
            'email' => 'required|email|unique:Users,email,'.$this -> id
           
            
        ];
    }

   
}
