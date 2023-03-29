<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// helpers
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // Forcing A Unique Rule To Ignore A Given ID:
            'title' => [
                'required',
                Rule::unique('projects')->ignore($this->project->id),
                'max:100'
            ],
            'content' => 'required',
            'date' => 'required|before_or_equal:2155|after_or_equal:1901',
            'photo_link' => 'nullable|max:255',
            'localimg' => 'nullable|max:2048|image',
            'type_id' => 'nullable|exists:types,id'
        ];
    }
}
