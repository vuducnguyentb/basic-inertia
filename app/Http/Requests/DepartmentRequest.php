<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
                'name' => ['required', 'min:5','max:50'],
                'email' => ['nullable', 'max:50','email'],
                'phone' => ['nullable', 'max:20']
        ];
    }

    public function messages(){
        return[
            'name.required'=>'Bạn vui lòng điền name',
                'name.min'=>'Tên phải ít nhất 5 kí tự',
                'email.email'=>'Email phải đúng định dạng' 
        ];
    }
}
