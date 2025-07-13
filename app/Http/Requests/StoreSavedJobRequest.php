<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreSavedJobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'job_application_id' => [
                'required',
                'integer',
                'numeric',
                'exists:job_applications,id',
                Rule::unique('saved_jobs', 'job_application_id')
                    ->where('user_id', Auth::id()),
            ],
        ];
    }

    public function attributes(): array
    {
        return [
            'job_application_id' => 'job application',
        ];
    }

    public function messages(): array
    {
        return [
            'job_application_id.required' => 'The :attribute is required.',
            'job_application_id.exists' => 'The :attribute does not exist.',
            'job_application_id.unique' => 'The :attribute has already been saved.',
        ];
    }
}
