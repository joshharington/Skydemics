<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLessonRequest extends FormRequest
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
            'title' => '',
            'slug' => '',
            'description' => '',
            'attendance_code' => '',
            'start_date' => '',
            'end_date' => '',
            'published' => '',
            'requires_attendance' => '',
        ];
    }
}
