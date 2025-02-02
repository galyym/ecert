<?php

declare(strict_types=1);

namespace App\MoonShine\Layouts;

use MoonShine\Laravel\Components\Fragment;
use MoonShine\Laravel\Layouts\CompactLayout;
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
use MoonShine\MenuManager\MenuGroup;
use MoonShine\MenuManager\MenuItem;

final class WebLayout extends CompactLayout
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
            MenuItem::make('Main', '')
        ];
    }

    /**
     * @param ColorManager $colorManager
     */
    protected function colors(ColorManagerContract $colorManager): void
    {
        parent::colors($colorManager);

         $colorManager->primary('#00000');
    }

    public function build(): Layout
    {
        return Layout::make([
            Html::make([
                $this->getHeadComponent(),
                Body::make([
                    Wrapper::make([
                         $this->getTopBarComponent(),
//                        $this->getSidebarComponent(),
                        Div::make([
                            Fragment::make([
                                Flash::make(),

//                                $this->getHeaderComponent(),

                                Content::make([
                                    Components::make(
                                        $this->getPage()->getComponents()
                                    ),
                                ]),

                                $this->getFooterComponent(),
                            ])->class('layout-page')->name(self::CONTENT_FRAGMENT_NAME),
                        ])->class('flex grow')->customAttributes(['id' => self::CONTENT_ID]),
                    ]),
                ])->class('theme-minimalistic'),
            ])
                ->customAttributes([
                    'lang' => $this->getHeadLang(),
                ])
                ->withAlpineJs()
                ->withThemes(),
        ]);
    }

    protected function getTopBarComponent(): Topbar
    {
        return TopBar::make([
            Div::make([
                $this->getLogoComponent()->minimized(),
            ])->class('menu-logo'),

            Div::make([
                Menu::make()->top(),
            ])->class('menu-navigation'),

            Div::make([
                Div::make()->class('menu-inner-divider'),
                ThemeSwitcher::make(),

                Div::make([
                    Burger::make(),
                ])->class('menu-burger'),
            ])->class('menu-actions'),
        ])->customAttributes([
            ':class' => "asideMenuOpen && '_is-opened'",
        ]);
    }
}
