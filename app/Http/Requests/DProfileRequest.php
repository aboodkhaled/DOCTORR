<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DProfileRequest extends FormRequest
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
            'doc_name' => 'required',
            'email' => 'required|email|unique:doctors,email,'.$this -> id,
            'password'  => 'nullable|confirmed|min:8'
        ];
    }
}
