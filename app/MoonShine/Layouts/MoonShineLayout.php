<?php

declare(strict_types=1);

namespace App\MoonShine\Layouts;

use App\MoonShine\Resources\AboutContentResource;
use App\MoonShine\Resources\NewsResource;
use App\MoonShine\Resources\PageResource;
use App\MoonShine\Resources\ProjectResource;
use App\MoonShine\Resources\ServiceResource;
use App\MoonShine\Resources\TemplateResource;
use MoonShine\Laravel\Layouts\AppLayout;
use MoonShine\ColorManager\ColorManager;
use MoonShine\Contracts\ColorManager\ColorManagerContract;
use MoonShine\Laravel\Components\Layout\{Locales, Notifications, Profile, Search};
use MoonShine\UI\Components\{Breadcrumbs,
    Components,
    Layout\Flash,
    Layout\Div,
    Layout\Body,
    Layout\Burger,
    Layout\Content,
    Layout\Footer,
    Layout\Head,
    Layout\Favicon,
    Layout\Assets,
    Layout\Meta,
    Layout\Header,
    Layout\Html,
    Layout\Layout,
    Layout\Logo,
    Layout\Menu,
    Layout\Sidebar,
    Layout\ThemeSwitcher,
    Layout\TopBar,
    Layout\Wrapper,
    When};
use MoonShine\Laravel\Resources\MoonShineUserResource;
use MoonShine\Laravel\Resources\MoonShineUserRoleResource;
use MoonShine\MenuManager\MenuGroup;
use MoonShine\MenuManager\MenuItem;
use App\MoonShine\Resources\MainResource;
use App\MoonShine\Resources\ServicesResource;
use App\MoonShine\Resources\CertificateRequestResource;
use App\MoonShine\Resources\PositionResource;
use App\MoonShine\Resources\ContactMessageResource;

final class MoonShineLayout extends AppLayout
{
    protected function assets(): array
    {
        return [
            ...parent::assets(),
        ];
    }

    protected function menu(): array
    {
        return [
            MenuGroup::make(static fn () => __('moonshine::ui.resource.system'), [
                MenuItem::make(
                    static fn () => __('moonshine::ui.resource.admins_title'),
                    MoonShineUserResource::class
                ),
                MenuItem::make(
                    static fn () => __('moonshine::ui.resource.role_title'),
                    MoonShineUserRoleResource::class
                ),
            ])->translatable(),
            MenuGroup::make(__('moonshine::menu.references'), [
                MenuItem::make(__('moonshine::menu.main'), MainResource::class),
                MenuItem::make(__('moonshine::menu.services'), ServicesResource::class),
                MenuItem::make(__('moonshine::menu.templates'), TemplateResource::class),
                MenuItem::make(__('moonshine::menu.position'), PositionResource::class),
            ]),
            MenuGroup::make('Меню', [
                MenuItem::make(__('moonshine::menu.page'), PageResource::class),
                MenuItem::make(__('moonshine::menu.services'), ServiceResource::class),
                MenuItem::make(__('moonshine::menu.news'), NewsResource::class),
                MenuItem::make(__('moonshine::menu.projects'), ProjectResource::class),
                MenuItem::make(__('moonshine::menu.about_content'), AboutContentResource::class),
                MenuItem::make('ContactMessages', ContactMessageResource::class),
            ]),
            MenuItem::make(__('moonshine::menu.certificate_request'), CertificateRequestResource::class),
        ];
    }

    /**
     * @param ColorManager $colorManager
     */
    protected function colors(ColorManagerContract $colorManager): void
    {
        parent::colors($colorManager);

        // $colorManager->primary('#00000');
    }

    public function build(): Layout
    {
        return parent::build();
    }
}
