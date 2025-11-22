@extends('layouts.app')

@section('title', 'ТОО ВсеСтрой - Профессиональная аттестация и сертификация')
@section('description', 'Аттестация инженерно-технических работников, участвующих в процессе проектирования и строительства')

@section('content')
<!-- Hero Section -->
<section id="hero" class="hero section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
                    <h1 class="mb-4">
                        Аттестация инженерно-<br>
                        технических<br>
                        <span class="accent-text">работников</span>
                    </h1>
                    <p class="mb-4">
                        Аттестация инженерно-технических работников,
                        участвующих в процессе проектирования и строительства
                    </p>
                    <div class="hero-buttons">
                        <a href="#" onclick="event.preventDefault(); openCertificationModal();" class="btn btn-primary me-3">
                            <i class="bi bi-file-earmark-text"></i> Подать заявку
                        </a>
                        <a href="#" onclick="event.preventDefault(); openSearchModal();" class="btn btn-outline-primary">
                            <i class="bi bi-search"></i> Поиск сертификата
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">
                    <img src="{{ asset('assets/img/illustration-1.webp') }}" alt="Hero Image" class="img-fluid">
                </div>
            </div>
        </div>

        <!-- Stats -->
        <div class="row stats-row gy-4 mt-5" data-aos="fade-up" data-aos-delay="500">
            <div class="col-lg-3 col-md-6">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="bi bi-trophy"></i>
                    </div>
                    <div class="stat-content">
                        <p>98% успешных аттестаций</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="bi bi-briefcase"></i>
                    </div>
                    <div class="stat-content">
                        <p>1 000+ сертифицированных инженеров</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="bi bi-graph-up"></i>
                    </div>
                    <div class="stat-content">
                        <p>95% удовлетворенности клиентов</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="bi bi-award"></i>
                    </div>
                    <div class="stat-content">
                        <p>5+ лет опыта</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
@if($services->count() > 0)
<section class="services section light-background">
    <div class="container section-title" data-aos="fade-up">
        <h2>Наши услуги</h2>
        <p>Полный спектр услуг для юридических лиц и специалистов</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-4">
            @foreach($services as $service)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ 100 * $loop->iteration }}">
                <div class="service-card h-100">
                    <div class="icon-header d-flex align-items-center mb-3">
                        <div class="icon flex-shrink-0">
                            <i class="bi {{ $service->icon ?? 'bi-gear' }}"></i>
                        </div>
                        <h3 class="ms-3">{{ $service->title }}</h3>
                    </div>
                    <p>{{ $service->short_description }}</p>
                    <a href="{{ route('services.show', $service->slug) }}" class="read-more">
                        Подробнее <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-5">
            <a href="{{ route('services.index') }}" class="btn btn-primary btn-lg">
                Все услуги <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</section>
@endif

<!-- Projects Section -->
@if($projects->count() > 0)
<section class="projects section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Наши проекты</h2>
        <p>Успешно реализованные проекты</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-4">
            @foreach($projects as $project)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ 100 * $loop->iteration }}">
                <div class="project-card">
                    @if($project->main_image)
                    <div class="project-image">
                        <img src="{{ asset('storage/' . $project->main_image) }}" alt="{{ $project->title }}" class="img-fluid">
                        <div class="project-overlay">
                            <a href="{{ route('projects.show', $project->slug) }}" class="btn btn-light">
                                Подробнее
                            </a>
                        </div>
                    </div>
                    @endif
                    <div class="project-content">
                        @if($project->category)
                        <span class="project-category">{{ $project->category }}</span>
                        @endif
                        <h3><a href="{{ route('projects.show', $project->slug) }}">{{ $project->title }}</a></h3>
                        @if($project->client)
                        <p class="project-client"><i class="bi bi-building"></i> {{ $project->client }}</p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-5">
            <a href="{{ route('projects.index') }}" class="btn btn-primary btn-lg">
                Все проекты <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</section>
@endif

<!-- News Section -->
@if($news->count() > 0)
<section class="news section light-background">
    <div class="container section-title" data-aos="fade-up">
        <h2>Новости</h2>
        <p>Последние новости и события</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-4">
            @foreach($news as $newsItem)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ 100 * $loop->iteration }}">
                <div class="news-card">
                    @if($newsItem->image)
                    <div class="news-image">
                        <img src="{{ asset('storage/' . $newsItem->image) }}" alt="{{ $newsItem->title }}" class="img-fluid">
                    </div>
                    @endif
                    <div class="news-content">
                        <div class="news-meta">
                            <span class="news-date"><i class="bi bi-calendar"></i> {{ $newsItem->formatted_date }}</span>
                            <span class="news-views"><i class="bi bi-eye"></i> {{ $newsItem->views }}</span>
                        </div>
                        <h3><a href="{{ route('news.show', $newsItem->slug) }}">{{ $newsItem->title }}</a></h3>
                        <p>{{ $newsItem->excerpt }}</p>
                        <a href="{{ route('news.show', $newsItem->slug) }}" class="read-more">
                            Читать далее <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-5">
            <a href="{{ route('news.index') }}" class="btn btn-primary btn-lg">
                Все новости <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="cta section">
    <div class="container" data-aos="fade-up">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h2>Готовы начать процесс аттестации?</h2>
                <p>Свяжитесь с нами сегодня и получите профессиональную консультацию</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="#" onclick="event.preventDefault(); openCertificationModal();" class="btn btn-light">
                    <i class="bi bi-file-earmark-text"></i> Подать заявку
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
