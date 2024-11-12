<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
        'email' => 'required|string|email|max:255|unique:students,email,' . $this->route('student'),
 
            // 'course_id' => 'required|exists:courses,id',
        ];
    }
}
