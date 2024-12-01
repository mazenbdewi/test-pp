<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
{
  
    public function authorize(): bool
    {
        return true;
    }

   
    public function rules(): array
    {
        return [
           
            'course_name' => 'required|string|max:255',
            'class' => 'nullable|string|max:255',
            'teacher_name' => 'nullable|string|max:255',
           
        ];
    }

    public function messages(): array
{
    return [
        'course_name.required' => 'Course name is required.',
        'course_name.string' => 'First name must be a string.',
        'course_name.max' => 'First name may not exceed 255 characters.',

        'class_name.string' => 'Class name must be a string.',
        'class_name.max' => 'Class name may not exceed 255 characters.',

        'teacher_name.string' => 'Teacher name must be a string.',
        'teacher_name.max' => 'Teacher name may not exceed 255 characters.',

    ];
}

}
