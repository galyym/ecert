<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Page;
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
use MoonShine\UI\Fields\Number;

/**
 * @extends ModelResource<Page>
 */
class PageResource extends ModelResource
{
    protected string $model = Page::class;

    protected string $title = 'Страницы';

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Заголовок', 'title')->sortable(),
            Text::make('Slug', 'slug')->sortable(),
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
                Text::make('Заголовок', 'title')->required(),
                Text::make('Slug', 'slug')->required(),
                Json::make('Контент', 'content')->fields([
                    Text::make('Секция', 'section'),
                    Textarea::make('Текст', 'text'),
                    Image::make('Изображение', 'image'),
                ]),
                Text::make('Meta Title', 'meta_title'),
                Textarea::make('Meta Description', 'meta_description'),
                Image::make('Главное изображение', 'featured_image'),
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
            Text::make('Заголовок', 'title'),
            Text::make('Slug', 'slug'),
            Json::make('Контент', 'content'),
            Text::make('Meta Title', 'meta_title'),
            Textarea::make('Meta Description', 'meta_description'),
            Image::make('Главное изображение', 'featured_image'),
            Switcher::make('Активна', 'is_active'),
            Number::make('Порядок сортировки', 'sort_order'),
        ];
    }

    /**
     * @param Page $item
     *
     * @return array<string, string[]|string>
     */
    protected function rules(mixed $item): array
    {
        return [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:pages,slug,' . $item->id,
        ];
    }
}
