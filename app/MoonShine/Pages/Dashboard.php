<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use App\Models\CertificateRequest;
use Google\Service\CloudKMS\Certificate;
use MoonShine\Laravel\Pages\Page;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Components\Metrics\Wrapped\ValueMetric;

class Dashboard extends Page
{
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
        return $this->title ?: 'Dashboard';
    }

    /**
     * @return list<ComponentContract>
     */
    protected function components(): iterable
	{
		return [
            ValueMetric::make('Заявки')
                ->value(fn() => CertificateRequest::all()->count()),
            ValueMetric::make('Количество заявок за сегодня')
                ->value(fn() => CertificateRequest::where('created_at', '>=', now()->startOfDay())->count()),
            ValueMetric::make('Количество заявок за неделю')
                ->value(fn() => CertificateRequest::where('created_at', '>=', now()->startOfWeek())->count()),
            ValueMetric::make('Количество заявок за месяц')
                ->value(fn() => CertificateRequest::where('created_at', '>=', now()->startOfMonth())->count())
        ];
	}
}
