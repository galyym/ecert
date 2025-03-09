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
            'requests' => 'required|array',
            'requests.*.last_name' => 'required|string|max:255',
            'requests.*.first_name' => 'required|string|max:255',
            'requests.*.middle_name' => 'nullable|string|max:255',
            'requests.*.iin' => 'required|digits:12',
            'requests.*.activity_type' => 'required|in:ПД,СМР',
            'requests.*.specialty' => 'required|string|max:255',
            'requests.*.phone' => 'required|string|max:20',
            'requests.*.workplace' => 'nullable|string|max:255',
            'requests.*.sender_name' => 'required|string|max:255',
            'requests.*.documents' => 'nullable|array',
            'requests.*.documents.*.file' => 'file|max:5120', // 5MB
        ];
    }

    public function messages()
    {
        return [
            'requests.*.documents.*.file.max' => 'Максимальные размер файла ',
        ];
    }
}
