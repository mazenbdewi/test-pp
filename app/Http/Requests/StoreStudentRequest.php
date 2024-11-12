<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
  
    public function authorize(): bool
    {
        return true;
    }

   
    public function rules(): array
    {
        return [
           
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'mother_name' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:students,email,' . $this->route('student'),
            'course_id' => 'nullable|integer',  
            'address' => 'nullable|string|max:255',
            'national_id' => 'required|string|max:20|unique:students,national_id,' . $this->route('student'),  
            'college_name' => 'nullable|string|max:255',
            'specialization' => 'nullable|string|max:255',
            'overall_grade' => 'nullable|numeric|between:0,100',  
          
        ];
    }
}
