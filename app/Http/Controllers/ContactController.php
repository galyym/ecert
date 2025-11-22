<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * Отправка контактной формы
     */
    public function store(Request $request)
    {
        try {
            // Валидация данных
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
                'email' => 'nullable|email|max:255',
                'subject' => 'nullable|string|in:attestation,accreditation,training,consultation,other',
                'message' => 'required|string|max:2000',
                'agreement' => 'required|accepted',
            ], [
                'name.required' => 'Поле "Имя" обязательно для заполнения',
                'phone.required' => 'Поле "Телефон" обязательно для заполнения',
                'email.email' => 'Некорректный формат email',
                'message.required' => 'Поле "Сообщение" обязательно для заполнения',
                'message.max' => 'Сообщение не должно превышать 2000 символов',
                'agreement.required' => 'Необходимо согласие на обработку персональных данных',
                'agreement.accepted' => 'Необходимо согласие на обработку персональных данных',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Ошибки валидации',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Сохраняем сообщение в базу данных
            $contactMessage = ContactMessage::create([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'subject' => $request->input('subject'),
                'message' => $request->input('message'),
                'agreement' => true,
                'status' => ContactMessage::STATUS_NEW
            ]);

            // Логируем успешную отправку
            Log::info('Получена новая контактная форма', [
                'id' => $contactMessage->id,
                'name' => $contactMessage->name,
                'phone' => $contactMessage->phone,
                'subject' => $contactMessage->subject_name
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Спасибо! Ваше сообщение успешно отправлено. Мы свяжемся с вами в ближайшее время.',
                'data' => [
                    'id' => $contactMessage->id,
                    'created_at' => $contactMessage->created_at->format('d.m.Y H:i')
                ]
            ]);

        } catch (\Exception $e) {
            Log::error('Ошибка при сохранении контактной формы', [
                'error' => $e->getMessage(),
                'request_data' => $request->except(['agreement'])
            ]);

            return response()->json([
                'status' => false,
                'message' => 'Произошла ошибка при отправке сообщения. Пожалуйста, попробуйте позже или свяжитесь с нами по телефону.'
            ], 500);
        }
    }
}
