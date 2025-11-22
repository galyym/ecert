<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ContactMessage extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'subject',
        'message',
        'agreement',
        'status',
        'admin_notes',
        'processed_at'
    ];

    protected $casts = [
        'agreement' => 'boolean',
        'processed_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Статусы для удобства
    const STATUS_NEW = 'new';
    const STATUS_IN_PROGRESS = 'in_progress';
    const STATUS_COMPLETED = 'completed';
    const STATUS_ARCHIVED = 'archived';

    public static function getStatuses()
    {
        return [
            self::STATUS_NEW => 'Новое',
            self::STATUS_IN_PROGRESS => 'В обработке',
            self::STATUS_COMPLETED => 'Завершено',
            self::STATUS_ARCHIVED => 'Архивировано',
        ];
    }

    public function getStatusNameAttribute()
    {
        return self::getStatuses()[$this->status] ?? 'Неизвестно';
    }

    public function getSubjectNameAttribute()
    {
        $subjects = [
            'attestation' => 'Вопросы по аттестации',
            'accreditation' => 'Вопросы по аккредитации',
            'training' => 'Обучение и курсы',
            'consultation' => 'Консультация',
            'other' => 'Другое',
        ];

        return $subjects[$this->subject] ?? $this->subject;
    }

    // Скоупы для удобной фильтрации
    public function scopeNew($query)
    {
        return $query->where('status', self::STATUS_NEW);
    }

    public function scopeInProgress($query)
    {
        return $query->where('status', self::STATUS_IN_PROGRESS);
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', self::STATUS_COMPLETED);
    }

    public function scopeRecent($query, $days = 30)
    {
        return $query->where('created_at', '>=', Carbon::now()->subDays($days));
    }
}
