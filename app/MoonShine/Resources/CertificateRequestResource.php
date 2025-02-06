<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\CertificateRequest;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Text;

/**
 * @extends ModelResource<CertificateRequest>
 */
class CertificateRequestResource extends ModelResource
{
    protected string $model = CertificateRequest::class;

    protected string $title = 'CertificateRequests';

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Фамилия', 'last_name'),
            Text::make('Имя', 'first_name'),
            Text::make('ИИН', 'iin'),
            Text::make('Телефон', 'phone'),
            Text::make('Chat ID', 'chat_id'),
            Text::make('Статус', 'status'),
            Text::make('Номер сертификата', 'certificate_number'),
            Text::make('Файл сертификата', 'certificate_file'),
        ];
    }

    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function formFields(): iterable
    {
        return [
            Box::make([
                ID::make(),
                Text::make('Фамилия', 'last_name'),
                Text::make('Имя', 'first_name'),
                Text::make('Отчество', 'middle_name'),
                Text::make('ИИН', 'iin'),
                Text::make('Вид деятельности', 'activity_type'),
                Text::make('Специальность', 'specialty'),
                Text::make('Телефон', 'phone'),
                Text::make('Место работы', 'workplace'),
                Text::make('Имя отправителя', 'sender_name'),
                Text::make('Документ', 'document'),
                Text::make('Chat ID', 'chat_id'),
                Text::make('Статус', 'status'),
                Text::make('Номер сертификата', 'certificate_number'),
                Text::make('Файл сертификата', 'certificate_file'),
                Text::make('User ID', 'user_id'),
            ])
        ];
    }

    /**
     * @return list<FieldContract>
     */
    protected function detailFields(): iterable
    {
        return [
            ID::make(),
            Text::make('Фамилия', 'last_name'),
            Text::make('Имя', 'first_name'),
            Text::make('Отчество', 'middle_name'),
            Text::make('ИИН', 'iin'),
            Text::make('Вид деятельности', 'activity_type'),
            Text::make('Специальность', 'specialty'),
            Text::make('Телефон', 'phone'),
            Text::make('Место работы', 'workplace'),
            Text::make('Имя отправителя', 'sender_name'),
            Text::make('Документ', 'document'),
            Text::make('Chat ID', 'chat_id'),
            Text::make('Статус', 'status'),
            Text::make('Номер сертификата', 'certificate_number'),
            Text::make('Файл сертификата', 'certificate_file'),
            Text::make('User ID', 'user_id'),
        ];
    }

    /**
     * @param CertificateRequest $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
