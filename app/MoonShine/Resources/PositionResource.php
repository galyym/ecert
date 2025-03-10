<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Position;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;

/**
 * @extends ModelResource<Position>
 */
class PositionResource extends ModelResource
{
    protected string $model = Position::class;

    protected string $title = 'Positions';

    protected string $column = 'name_kk';

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Textarea::make('Қазақша', 'name_kk')->sortable(),
            Textarea::make('Русский', 'name_ru')->sortable(),
            Text::make('ТИп', 'type')->sortable()
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
                Textarea::make('Қазақша', 'name_kk')->sortable(),
                Textarea::make('Русский', 'name_ru')->sortable(),
                Text::make('ТИп', 'type')->sortable()
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
            Textarea::make('Қазақша', 'name_kk')->sortable(),
            Textarea::make('Русский', 'name_ru')->sortable(),
            Text::make('ТИп', 'type')->sortable()
        ];
    }

    /**
     * @param Position $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
