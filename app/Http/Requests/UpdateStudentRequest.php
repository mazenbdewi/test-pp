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
        'course_id' => 'nullable|integer',  
        'address' => 'nullable|string|max:255',
        'national_id' => 'required|string|max:20|unique:students,national_id,' . $this->route('student'),  
        'college_name' => 'nullable|string|max:255',
        'specialization' => 'nullable|string|max:255',
        'overall_grade' => 'nullable|numeric|between:0,100',  
        // 'course_id' => 'required|exists:courses,id',
    ];
    }


    public function messages(): array
    {
        return [
            'first_name.required' => 'First name is required.',
            'first_name.string' => 'First name must be a string.',
            'first_name.max' => 'First name may not exceed 255 characters.',

            'middle_name.string' => 'Middle name must be a string.',
            'middle_name.max' => 'Middle name may not exceed 255 characters.',

            'last_name.string' => 'Last name must be a string.',
            'last_name.max' => 'Last name may not exceed 255 characters.',

            'email.required' => 'Email is required.',
            'email.string' => 'Email must be a string.',
            'email.email' => 'Please provide a valid email address.',
            'email.max' => 'Email may not exceed 255 characters.',
            'email.unique' => 'This email is already in use.',

            'course_id.integer' => 'Course ID must be an integer.',

            'address.string' => 'Address must be a string.',
            'address.max' => 'Address may not exceed 255 characters.',

            'national_id.required' => 'National ID is required.',
            'national_id.string' => 'National ID must be a string.',
            'national_id.max' => 'National ID may not exceed 20 characters.',
            'national_id.unique' => 'This National ID is already in use.',

            'college_name.string' => 'College name must be a string.',
            'college_name.max' => 'College name may not exceed 255 characters.',

            'specialization.string' => 'Specialization must be a string.',
            'specialization.max' => 'Specialization may not exceed 255 characters.',

            'overall_grade.numeric' => 'Overall grade must be a number.',
            'overall_grade.between' => 'Overall grade must be between 0 and 100.',
        ];
    }
}
