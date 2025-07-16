<?php

namespace App\Http\Requests\Job;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreJobApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'company_name' => 'required|string|max:255',
            'job_type_id' => 'required|integer|numeric|exists:job_types,id',
            'position' => 'required|string|max:255',
            'application_status_id' => 'required|integer|numeric|exists:application_statuses,id',
            'location' => 'nullable|string|max:50',
            'description' => 'nullable|string|max:255',
            //            'application_url' => 'required|string|max:255',
        ];
    }

    public function attributes(): array
    {
        return [
            'job_type_id' => 'job type',
        ];
    }

    public function messages(): array
    {
        return [
            'job_type_id.required' => 'The :attribute is required.',
        ];
    }
}
