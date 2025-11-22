@extends('layouts.app')

@section('title', 'Услуги - ТОО ВсеСтрой')

@section('content')
<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1>Наши услуги</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
                <li class="breadcrumb-item active">Услуги</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Services List -->
<section class="services-list section">
    <div class="container">
        <div class="row g-4">
            @forelse($services as $service)
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="{{ 100 * $loop->iteration }}">
                <div class="service-card-detailed">
                    <div class="icon-header d-flex align-items-center mb-3">
                        <div class="icon flex-shrink-0">
                            <i class="bi {{ $service->icon ?? 'bi-gear' }}"></i>
                        </div>
                        <h3 class="ms-3 mb-0">{{ $service->title }}</h3>
                    </div>
                    
                    @if($service->short_description)
                    <p class="service-description">{{ $service->short_description }}</p>
                    @endif
                    
                    <a href="{{ route('services.show', $service->slug) }}" class="btn btn-outline-primary">
                        Подробнее <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-info">
                    Услуги скоро появятся
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta section light-background">
    <div class="container" data-aos="fade-up">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h2>Нужна консультация?</h2>
                <p>Свяжитесь с нами для получения подробной информации об услугах</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">
                    Связаться с нами
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
