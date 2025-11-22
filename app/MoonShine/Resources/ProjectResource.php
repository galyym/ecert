<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Project;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;
use MoonShine\UI\Fields\TinyMce;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Json;
use MoonShine\UI\Fields\Date;
use MoonShine\UI\Fields\Select;
use MoonShine\UI\Fields\Switcher;

/**
 * @extends ModelResource<Project>
 */
class ProjectResource extends ModelResource
{
    protected string $model = Project::class;

    protected string $title = 'Проекты';

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Название', 'title')->sortable(),
            Text::make('Клиент', 'client_name')->sortable(),
            Text::make('Категория', 'category')->sortable(),
            Select::make('Статус', 'status')->sortable(),
            Switcher::make('Рекомендуемый', 'is_featured')->sortable(),
            Switcher::make('Опубликован', 'is_published')->sortable(),
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
                Text::make('Название проекта', 'title')->required(),
                Text::make('Slug', 'slug')->required()
                    ->hint('URL-адрес проекта'),
                Textarea::make('Краткое описание', 'description'),
                \MoonShine\TinyMce\Fields\TinyMce::make('Подробное описание', 'content'),
                Image::make('Главное изображение', 'featured_image'),
                Json::make('Галерея', 'gallery')->fields([
                    Image::make('Изображение', 'image'),
                    Text::make('Описание', 'caption'),
                ])->creatable()->removable(),
                Text::make('Клиент', 'client_name'),
                Date::make('Дата проекта', 'project_date'),
                Select::make('Категория', 'category')->options([
                    'construction' => 'Строительство',
                    'certification' => 'Сертификация',
                    'consulting' => 'Консультирование',
                    'other' => 'Другое',
                ]),
                Select::make('Статус', 'status')->options([
                    'planning' => 'Планирование',
                    'in_progress' => 'В процессе',
                    'completed' => 'Завершен',
                    'on_hold' => 'Приостановлен',
                ])->default('planning'),
                Switcher::make('Рекомендуемый проект', 'is_featured')->default(false),
                Switcher::make('Опубликован', 'is_published')->default(false),
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
            Text::make('Название', 'title'),
            Text::make('Slug', 'slug'),
            Textarea::make('Описание', 'description'),
            \MoonShine\TinyMce\Fields\TinyMce::make('Содержание', 'content'),
            Image::make('Главное изображение', 'featured_image'),
            Json::make('Галерея', 'gallery'),
            Text::make('Клиент', 'client_name'),
            Date::make('Дата проекта', 'project_date'),
            Text::make('Категория', 'category'),
            Select::make('Статус', 'status'),
            Switcher::make('Рекомендуемый', 'is_featured'),
            Switcher::make('Опубликован', 'is_published'),
        ];
    }

    /**
     * @param Project $item
     *
     * @return array<string, string[]|string>
     */
    protected function rules(mixed $item): array
    {
        return [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:projects,slug,' . $item->id,
        ];
    }
}
