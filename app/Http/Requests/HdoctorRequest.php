<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HdoctorRequest extends FormRequest
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
            'mobile' => 'required|unique:hdoctors,mobile,'.$this -> id,
            'sex' => 'required|in:male,female',
            //'perth_date' => 'required',
            'address' => 'required|max:191',
            'hdepartment_id' => 'required|exists:hdepartments,id',
            'hspecialty_id' => 'required|exists:hspecialties,id',
            'email' => 'required|email|unique:hdoctors,email,'.$this -> id,
            'hcuontry_id' => 'required|exists:hcuontries,id',
            'hcity_id' => 'required|exists:hcities,id',
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
