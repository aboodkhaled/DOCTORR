<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FHdoctorRequest extends FormRequest
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
           'photo' => 'required_without:id|mimes:jpg,jpeg,png,pdf',
            'doc_name' => 'required|string|max:191',
            'doc_degry' => 'required',
            'doc_des' => 'required_without:id|',
            'mobile' => 'required|unique:fdoctors,mobile,'.$this -> id,
            'sex' => 'required|in:male,female',
            //'perth_date' => 'required',
            'address' => 'required|max:191',
            'fdepartment_id' => 'required|exists:fdepartments,id',
            'fspecialty_id' => 'required|exists:fspecialties,id',
            'email' => 'required|email|unique:fdoctors,email,'.$this -> id,
            'fcuontry_id' => 'required|exists:fcuontries,id',
            'fcity_id' => 'required|exists:fcities,id',
            'password'  => 'required|confirmed|min:8'
            
        ];
    }

    public function messages()
    {
        return [
            'requierd' => 'هذا الحقل مطلوب',
            'in' => 'القيمة غير صحيحة',
            'doc_name.string' => 'أسم ألطبيب يجب أن يكون أحرف وليس ارقام',
            
            'max' => '  يجب أن لا يزيد عن 191 حرف',
            'department_id.exists' => 'ألقسم هذا غير موجود',
            'specialty_id.exists' => 'ألتخصص هذا غير موجود',
            'photo.required_without' => 'ألصورة مطلوبة'
            
        ];
    }

}
