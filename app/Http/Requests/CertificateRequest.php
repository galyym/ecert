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
            'requests.*.specialty' => 'required',
            'requests.*.phone' => 'nullable|string|max:20',
            'requests.*.workplace' => 'nullable|string|max:255',
            'requests.*.sender_name' => 'required|string|max:255',
            'requests.*.documents' => 'nullable|array',
            'requests.*.documents.*.file' => 'file|max:20480', // 20MB
            'requests.*.documents.*.name' => 'string',
        ];
    }

    public function messages()
    {
        return [
            // Общие сообщения для массива заявок
            'requests.required' => 'Необходимо добавить хотя бы одну заявку',
            'requests.array' => 'Неверный формат данных заявок',

            // Фамилия
            'requests.*.last_name.required' => 'Поле "Фамилия" обязательно для заполнения',
            'requests.*.last_name.string' => 'Фамилия должна быть текстом',
            'requests.*.last_name.max' => 'Фамилия не должна превышать 255 символов',

            // Имя
            'requests.*.first_name.required' => 'Поле "Имя" обязательно для заполнения',
            'requests.*.first_name.string' => 'Имя должно быть текстом',
            'requests.*.first_name.max' => 'Имя не должно превышать 255 символов',

            // Отчество
            'requests.*.middle_name.string' => 'Отчество должно быть текстом',
            'requests.*.middle_name.max' => 'Отчество не должно превышать 255 символов',

            // ИИН
            'requests.*.iin.required' => 'Поле "ИИН" обязательно для заполнения',
            'requests.*.iin.digits' => 'ИИН должен состоять из 12 цифр',

            // Вид деятельности
            'requests.*.activity_type.required' => 'Необходимо выбрать вид деятельности',
            'requests.*.activity_type.in' => 'Выбран недопустимый вид деятельности. Допустимые значения: ПД, СМР',

            // Специальность
            'requests.*.specialty.required' => 'Необходимо выбрать специальность',

            // Место работы
            'requests.*.workplace.string' => 'Место работы должно быть текстом',
            'requests.*.workplace.max' => 'Место работы не должно превышать 255 символов',

            // Отправитель
            'requests.*.sender_name.required' => 'Поле "Отправитель" обязательно для заполнения',
            'requests.*.sender_name.string' => 'Имя отправителя должно быть текстом',
            'requests.*.sender_name.max' => 'Имя отправителя не должно превышать 255 символов',

            // Документы
            'requests.*.documents.array' => 'Неверный формат документов',
            'requests.*.documents.*.file.file' => 'Загруженный документ должен быть файлом',
            'requests.*.documents.*.file.max' => 'Максимальный размер файла - 20 МБ',
            'requests.*.documents.*.name.string' => 'Название документа должно быть текстом',
        ];
    }
}
