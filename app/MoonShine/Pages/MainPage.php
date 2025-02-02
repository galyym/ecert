<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use App\MoonShine\Layouts\WebLayout;
use Illuminate\Support\Facades\Storage;
use MoonShine\Laravel\Layouts\AppLayout;
use MoonShine\Laravel\Pages\Page;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Laravel\Resources\MoonShineUserResource;
use MoonShine\Laravel\Resources\MoonShineUserRoleResource;
use MoonShine\MenuManager\MenuGroup;
use MoonShine\MenuManager\MenuItem;
use MoonShine\UI\Components\Carousel;
use MoonShine\UI\Components\Layout\Div;
use MoonShine\UI\Components\Layout\Menu;

class MainPage extends Page
{
    protected ?string $layout = WebLayout::class;

    /**
     * @return array<string, string>
     */
    public function getBreadcrumbs(): array
    {
        return [
            '#' => $this->getTitle()
        ];
    }

    public function getTitle(): string
    {
        return 'MainPage';
    }

    /**
     * @return list<ComponentContract>
     */
    protected function components(): iterable
	{
		return [
            Carousel::make(
                items: [Storage::url('GOLANG.png')],
                alt: fake()->sentence(3)
            )
        ];
	}
}
