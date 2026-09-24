<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'          => ['required', 'string', 'max:255'],
            'description'    => ['required', 'string'],
            'price'          => ['required', 'numeric', 'min:0'],
            'course_format'  => ['required', 'string'],
            'language'       => ['required', 'string'],
            'duration'       => ['required', 'string'],
            'grade_id'       => ['required', 'exists:grades,id'],
            'subject_id'     => ['required', 'exists:subjects,id'],
            'teacher_id'     => ['required', 'exists:users,id'],
            'image'          => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ];
    }
}
