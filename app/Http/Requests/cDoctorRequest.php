<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class cDoctorRequest extends FormRequest
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
           //'photo' => 'required_without:id|mimes:jpg,jpeg,png,pdf',
            'reson' => 'required|string|max:255',
            //'doc_degry' => 'required',
            //'doc_des' => 'required_without:id|',
          //  'mobile' => 'required|unique:doctors,mobile,'.$this -> id,
         //   'sex' => 'required|in:male,female',
            //'perth_date' => 'required',
           // 'address' => 'required|max:191',
            'user_id' => 'required|exists:Users,id',
            'serve1_id' => 'required|exists:serve1s,id',
           'serve1_price_id' => 'required|exists:serve1_prices,id',
            'serve1_thin_id' => 'required|exists:serve1_thins,id',
            'serve1_total_id' => 'required|exists:serve1_totals,id',
            'serve1_tprice_id' => 'required|exists:serve1_tprices,id'
         
            
        ];
    }

    public function messages()
    {
        return [
            'requierd' => 'هذا الحقل مطلوب',
            'in' => 'القيمة غير صحيحة',
            'doc_name.string' => 'أسم ألطبيب يجب أن يكون أحرف وليس ارقام',
            
            'max' => '  يجب أن لا يزيد عن 191 حرف',
            'serve1_total_id.exists' => 'هاذا الحقل مطلوب',
            'serve1_tprice_id.exists' => 'ألتخصص هذا غير موجود',
            'photo.required_without' => 'ألصورة مطلوبة'
            
        ];
    }

}
