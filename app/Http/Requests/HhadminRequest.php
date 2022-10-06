<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HhadminRequest extends FormRequest
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
            
            'mobile' => 'required|unique:hadmins,mobile,'.$this -> id,
            
            'address' => 'required|max:191',
           
            'email' => 'required|email|unique:hadmins,email,'.$this -> id,
            'cuontry_id' => 'required|exists:cuontries,id',
            'city_id' => 'required|exists:cities,id',
            'password'  => 'required|confirmed|min:8'
            
        ];
    }

    public function messages()
    {
        return [
            'requierd' => 'هذا الحقل مطلوب',
            'in' => 'القيمة غير صحيحة',
            'name.string' => 'أسم ألطبيب يجب أن يكون أحرف وليس ارقام',
            
            'max' => '  يجب أن لا يزيد عن 191 حرف',
           
            'photo.required_without' => 'ألصورة مطلوبة'
            
        ];
    }

}
