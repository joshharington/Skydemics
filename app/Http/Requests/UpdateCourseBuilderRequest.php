<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateCourseBuilderRequest extends FormRequest
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
    public function rules(Request $request) {
        return [
            'title' => 'unique:courses,name,' . $request->id,
            'slug' => 'unique:courses,slug,' . $request->id,
            'description' => '',
            'discipline' => '',
            'published' => '',
            'invite_only' => '',
            'public_enrollment' => '',
            'manually_accept' => ''
        ];
    }
}
