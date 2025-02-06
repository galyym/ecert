<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Services;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;

/**
 * @extends ModelResource<Services>
 */
class ServicesResource extends ModelResource
{
    protected string $model = Services::class;

    protected string $title = 'Services';

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Қазақша', 'name_kk')->sortable(),
            Text::make('Русский', 'name_ru')->sortable(),
            Textarea::make('Қазақша', 'description_kk')->sortable(),
            Textarea::make('Русский', 'description_ru')->sortable(),
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
                Text::make('Қазақша', 'name_kk'),
                Text::make('Русский', 'name_ru'),
                Textarea::make('Қазақша', 'description_kk'),
                Textarea::make('Русский', 'description_ru'),
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
            Text::make('Қазақша', 'name_kk'),
            Text::make('Русский', 'name_ru'),
            Textarea::make('Қазақша', 'description_kk'),
            Textarea::make('Русский', 'description_ru'),
        ];
    }

    /**
     * @param Services $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
