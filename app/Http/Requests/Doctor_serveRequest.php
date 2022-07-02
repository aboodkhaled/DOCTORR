<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Doctor_serveRequest extends FormRequest
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
           
            
            'serve_id' => 'required|exists:serves,id',
            'doctor_id' => 'required|exists:doctors,id',
            'price' =>     'required' 
        ];
    }

    public function messages()
    {
        return [
            
            
            'requierd' => 'هذا الحقل مطلوب',
            'doctor_id.exists' => 'ألطبيب هذا غير موجود',
            'serve_id.exists' => 'ألخدمة هذا غير موجود'
            
            
        ];
    }

}
