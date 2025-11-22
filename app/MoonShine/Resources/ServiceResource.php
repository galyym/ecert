<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Service;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;
use MoonShine\UI\Fields\Json;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Select;
use MoonShine\UI\Fields\Switcher;

/**
 * @extends ModelResource<Service>
 */
class ServiceResource extends ModelResource
{
    protected string $model = Service::class;

    protected string $title = 'Услуги';

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Название', 'title')->sortable(),
            Text::make('Категория', 'category')->sortable(),
            Text::make('Цена', 'price')->sortable(),
            Switcher::make('Активна', 'is_active')->sortable(),
            Number::make('Порядок', 'sort_order')->sortable(),
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
                Text::make('Название услуги', 'title')->required(),
                Textarea::make('Описание', 'description'),
                Text::make('Иконка (CSS класс)', 'icon')
                    ->hint('Например: bi bi-award'),
                Json::make('Особенности', 'features')->fields([
                    Text::make('Особенность', 'feature'),
                ])->creatable()->removable(),
                Number::make('Цена', 'price')->step(0.01),
                Text::make('Длительность', 'duration')
                    ->hint('Например: 1 рабочий день'),
                Select::make('Категория', 'category')->options([
                    'attestation' => 'Аттестация',
                    'accreditation' => 'Аккредитация', 
                    'training' => 'Обучение',
                    'safety' => 'Промышленная безопасность',
                    'other' => 'Прочие услуги',
                ]),
                Switcher::make('Активна', 'is_active')->default(true),
                Number::make('Порядок сортировки', 'sort_order')->default(0),
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
            Text::make('Название услуги', 'title'),
            Textarea::make('Описание', 'description'),
            Text::make('Иконка', 'icon'),
            Json::make('Особенности', 'features'),
            Number::make('Цена', 'price'),
            Text::make('Длительность', 'duration'),
            Text::make('Категория', 'category'),
            Switcher::make('Активна', 'is_active'),
            Number::make('Порядок сортировки', 'sort_order'),
        ];
    }

    /**
     * @param Service $item
     *
     * @return array<string, string[]|string>
     */
    protected function rules(mixed $item): array
    {
        return [
            'title' => 'required|string|max:255',
            'price' => 'nullable|numeric|min:0',
        ];
    }
}
