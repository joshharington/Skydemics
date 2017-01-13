<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseBuilderRequest extends FormRequest
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
            'title' => 'required|unique:courses,name',
            'slug' => 'required|unique:courses',
            'description' => '',
            'discipline' => '',
            'published' => '',
            'invite_only' => '',
            'public_enrollment' => '',
            'manually_accept' => ''
        ];
    }
}
