<?php

declare(strict_types=1);

namespace App\Providers;

use App\MoonShine\Resources\TemplateResource;
use Illuminate\Support\ServiceProvider;
use MoonShine\Contracts\Core\DependencyInjection\ConfiguratorContract;
use MoonShine\Contracts\Core\DependencyInjection\CoreContract;
use MoonShine\Laravel\DependencyInjection\MoonShine;
use MoonShine\Laravel\DependencyInjection\MoonShineConfigurator;
use App\MoonShine\Resources\MoonShineUserResource;
use App\MoonShine\Resources\MoonShineUserRoleResource;
use App\MoonShine\Pages\MainPage;
use App\MoonShine\Resources\MainResource;
use App\MoonShine\Resources\ServicesResource;
use App\MoonShine\Resources\CertificateRequestResource;
use App\MoonShine\Resources\PositionResource;
// Новые ресурсы
use App\MoonShine\Resources\PageResource;
use App\MoonShine\Resources\ServiceResource;
use App\MoonShine\Resources\NewsResource;
use App\MoonShine\Resources\ProjectResource;
use App\MoonShine\Resources\AboutContentResource;
use App\MoonShine\Resources\ContactMessageResource;

class MoonShineServiceProvider extends ServiceProvider
{
    /**
     * @param  MoonShine  $core
     * @param  MoonShineConfigurator  $config
     *
     */
    public function boot(CoreContract $core, ConfiguratorContract $config): void
    {
        // $config->authEnable();

        $core
            ->resources([
                MoonShineUserResource::class,
                MoonShineUserRoleResource::class,
                MainResource::class,
                ServicesResource::class,
                CertificateRequestResource::class,
                PositionResource::class,
                TemplateResource::class,
                // Новые ресурсы для корпоративного сайта
                PageResource::class,
                ServiceResource::class,
                NewsResource::class,
                ProjectResource::class,
                AboutContentResource::class,
                ContactMessageResource::class,
            ])
            ->pages([
                ...$config->getPages(),
                MainPage::class,
            ])
        ;
    }
}
