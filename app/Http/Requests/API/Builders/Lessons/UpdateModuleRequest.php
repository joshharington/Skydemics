<?php

namespace App\Http\Requests\API\Builders\Lessons;

use Illuminate\Foundation\Http\FormRequest;

class UpdateModuleRequest extends FormRequest
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
            'module_id' => 'required|exists:modules,id',
            'course_id' => 'required|exists:courses,id',
            'title' => '',
            'module_content' => '',
        ];
    }
}
