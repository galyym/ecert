<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\AboutContent;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;
use MoonShine\UI\Fields\Json;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Switcher;
use MoonShine\UI\Fields\Select;

/**
 * @extends ModelResource<AboutContent>
 */
class AboutContentResource extends ModelResource
{
    protected string $model = AboutContent::class;

    protected string $title = 'Контент "О компании"';

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Ключ секции', 'section_key')->sortable(),
            Text::make('Заголовок', 'title')->sortable(),
            Text::make('Подзаголовок', 'subtitle')->sortable(),
            Switcher::make('Активна', 'is_active')->sortable(),
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
                Select::make('Секция', 'section_key')->options([
                    'hero' => 'Главная секция (Hero)',
                    'about' => 'О компании',
                    'team' => 'Наша команда',
                    'history' => 'История компании',
                    'mission' => 'Миссия и ценности',
                    'statistics' => 'Статистика',
                    'certificates' => 'Сертификаты',
                ])->required(),
                Text::make('Заголовок', 'title')->required(),
                Text::make('Подзаголовок', 'subtitle'),
                Json::make('Контент', 'content')->fields([
                    Text::make('Заголовок', 'title'),
                    Textarea::make('Текст', 'text'),
                    Text::make('Ссылка', 'link'),
                    Text::make('Текст кнопки', 'button_text'),
                ])->creatable()->removable(),
                Image::make('Изображение', 'image'),
                Json::make('Особенности', 'features')->fields([
                    Text::make('Заголовок', 'title'),
                    Textarea::make('Описание', 'description'),
                    Text::make('Иконка', 'icon'),
                ])->creatable()->removable(),
                Json::make('Статистика', 'stats')->fields([
                    Text::make('Число', 'number'),
                    Text::make('Единица', 'unit'),
                    Text::make('Описание', 'description'),
                    Text::make('Иконка', 'icon'),
                ])->creatable()->removable(),
                Switcher::make('Активна', 'is_active')->default(true),
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
            Text::make('Ключ секции', 'section_key'),
            Text::make('Заголовок', 'title'),
            Text::make('Подзаголовок', 'subtitle'),
            Json::make('Контент', 'content'),
            Image::make('Изображение', 'image'),
            Json::make('Особенности', 'features'),
            Json::make('Статистика', 'stats'),
            Switcher::make('Активна', 'is_active'),
        ];
    }

    /**
     * @param AboutContent $item
     *
     * @return array<string, string[]|string>
     */
    protected function rules(mixed $item): array
    {
        return [
            'section_key' => 'required|string|unique:about_contents,section_key,' . $item->id,
            'title' => 'required|string|max:255',
        ];
    }
}
