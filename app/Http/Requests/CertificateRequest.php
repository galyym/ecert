<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CertificateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'last_name' => 'required|string',
            'first_name' => 'required|string',
            'middle_name' => 'string',
            'iin' => 'required|min_digits:12|max_digits:12',
            'activity_type' => 'required',
            'specialty' => 'required|string',
            'phone' => 'required',
            'workplace' => 'required',
            'sender_name' => 'string',
            'document' => 'nullable',
        ];
    }
}
