<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
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
           
            'doctor_id' => 'required|exists:doctors,id', 
           'day' => 'required',
            
            'stime' => 'required',
            'etime' => 'required'
           
            
        ];
    }

    public function messages()
    {
        return [
            
            
            'requierd' => 'هذا الحقل مطلوب',
            'doctor_id.exists' => 'ألطبيب هذا غير موجود'
            
            
            
        ];
    }

}
