<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\News;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\Date;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;
use MoonShine\UI\Fields\TinyMce;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Switcher;
use MoonShine\UI\Fields\DateTime;

/**
 * @extends ModelResource<News>
 */
class NewsResource extends ModelResource
{
    protected string $model = News::class;

    protected string $title = 'Новости';

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Заголовок', 'title')->sortable(),
            Text::make('Slug', 'slug')->sortable(),
            Date::make('Дата публикации', 'published_at')->sortable(),
            Switcher::make('Опубликована', 'is_published')->sortable(),
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
                Text::make('Заголовок новости', 'title')->required(),
                Text::make('Slug', 'slug')->required()
                    ->hint('URL-адрес новости (например: novaya-usluga-attestacii)'),
                Textarea::make('Краткое описание', 'excerpt')
                    ->hint('Краткое описание для списка новостей'),
                \MoonShine\TinyMce\Fields\TinyMce::make('Содержание', 'content')->required(),
                Image::make('Главное изображение', 'featured_image'),
                Date::make('Дата публикации', 'published_at'),
                Switcher::make('Опубликована', 'is_published')->default(false),
                Text::make('Meta Title', 'meta_title'),
                Textarea::make('Meta Description', 'meta_description'),
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
            Textarea::make('Краткое описание', 'excerpt'),
            TinyMce::make('Содержание', 'content'),
            Image::make('Главное изображение', 'featured_image'),
            DateTime::make('Дата публикации', 'published_at'),
            Switcher::make('Опубликована', 'is_published'),
            Text::make('Meta Title', 'meta_title'),
            Textarea::make('Meta Description', 'meta_description'),
        ];
    }

    /**
     * @param News $item
     *
     * @return array<string, string[]|string>
     */
    protected function rules(mixed $item): array
    {
        return [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:news,slug,' . $item->id,
            'content' => 'required|string',
        ];
    }
}
