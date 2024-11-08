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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students,email,' . $this->route('student'),
           // 'course_id' => 'required|exists:courses,id',
        ];
    }
}