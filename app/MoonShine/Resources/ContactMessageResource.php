<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\ContactMessage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Email;
use MoonShine\UI\Fields\Phone;
use MoonShine\UI\Fields\Select;
use MoonShine\UI\Fields\Textarea;
use MoonShine\UI\Fields\Checkbox;
use MoonShine\UI\Fields\Date;
use MoonShine\UI\Components\Badge;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;

/**
 * @extends ModelResource<ContactMessage>
 */
class ContactMessageResource extends ModelResource
{
    protected string $model = ContactMessage::class;

    protected string $title = 'Контактные сообщения';
    
    protected array $with = [];
    
    protected string $column = 'name';
    
    public function getActiveActions(): array
    {
        return ['view', 'update', 'delete'];
    }
    
    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make('№')->sortable(),
            Text::make('Имя', 'name')->sortable(),
            Phone::make('Телефон', 'phone'),
            Email::make('Email', 'email')->sortable(),
            Select::make('Тема', 'subject')
                ->options([
                    'attestation' => 'Вопросы по аттестации',
                    'accreditation' => 'Вопросы по аккредитации',
                    'training' => 'Обучение и курсы',
                    'consultation' => 'Консультация',
                    'other' => 'Другое',
                ])
                ->nullable(),
            Select::make('Статус', 'status')
                ->options(ContactMessage::getStatuses())
                ->sortable(),
            Date::make('Дата создания', 'created_at')
                ->format('d.m.Y H:i')
                ->sortable()
        ];
    }

    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function formFields(): iterable
    {
        return [
            Box::make('Основная информация', [
                Text::make('Имя', 'name')
                    ->required()
                    ->readonly(),
                Phone::make('Телефон', 'phone')
                    ->required()
                    ->readonly(),
                Email::make('Email', 'email')
                    ->readonly(),
            ]),
            
            Box::make('Сообщение', [
                Select::make('Тема обращения', 'subject')
                    ->options([
                        'attestation' => 'Вопросы по аттестации',
                        'accreditation' => 'Вопросы по аккредитации',
                        'training' => 'Обучение и курсы',
                        'consultation' => 'Консультация',
                        'other' => 'Другое',
                    ])
                    ->nullable()
                    ->readonly(),
                Textarea::make('Сообщение', 'message')
                    ->required()
                    ->readonly(),
            ]),
            
            Box::make('Управление', [
                Select::make('Статус', 'status')
                    ->options(ContactMessage::getStatuses())
                    ->required(),
                Textarea::make('Примечания администратора', 'admin_notes')
                    ->nullable(),
                Date::make('Дата обработки', 'processed_at')
                    ->format('d.m.Y H:i')
                    ->nullable()
            ]),
        ];
    }

    /**
     * @return list<FieldContract>
     */
    protected function detailFields(): iterable
    {
        return [
            ID::make('№'),
            Text::make('Имя', 'name'),
            Phone::make('Телефон', 'phone'),
            Email::make('Email', 'email'),
            Select::make('Тема обращения', 'subject')
                ->options([
                    'attestation' => 'Вопросы по аттестации',
                    'accreditation' => 'Вопросы по аккредитации',
                    'training' => 'Обучение и курсы',
                    'consultation' => 'Консультация',
                    'other' => 'Другое',
                ])
                ->nullable(),
            Textarea::make('Сообщение', 'message'),
            Select::make('Статус', 'status')
                ->options(ContactMessage::getStatuses()),
            Textarea::make('Примечания администратора', 'admin_notes'),
            Checkbox::make('Согласие на обработку данных', 'agreement'),
            Date::make('Дата создания', 'created_at')
                ->format('d.m.Y H:i'),
            Date::make('Дата обновления', 'updated_at')
                ->format('d.m.Y H:i'),
            Date::make('Дата обработки', 'processed_at')
                ->format('d.m.Y H:i')
                ->nullable(),
        ];
    }

    /**
     * @param ContactMessage $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [
            'status' => 'required|in:new,in_progress,completed,archived',
        ];
    }
}
