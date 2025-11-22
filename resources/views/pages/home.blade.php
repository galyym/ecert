@extends('layouts.app')

@section('title', 'ТОО ВсеСтрой - Профессиональная аттестация и сертификация')
@section('meta_description', 'Аттестация инженерно-технических работников, участвующих в процессе проектирования и строительства. 98% успешных аттестаций с 2013 года.')
@section('body_class', 'index-page')

@section('content')

<!-- Hero Section -->
<section id="hero" class="hero section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
                    @if($heroContent)
                        <h1 class="mb-5">
                            {!! $heroContent->title !!}
                        </h1>
                        <p class="mb-4 mb-md-5">
                            {{ $heroContent->subtitle }}
                        </p>
                    @else
                        <h1 class="mb-5">
                            Аттестация инженерно- <br>
                            технических <br>
                            <span class="accent-text">работников</span>
                        </h1>
                        <p class="mb-4 mb-md-5">
                            Аттестация инженерно-технических работников,
                            участвующих в процессе проектирования и строительства
                        </p>
                    @endif
                </div>
            </div>

            <div class="col-lg-6">
                <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">
                    @if($heroContent && $heroContent->image)
                        <img src="{{ Storage::disk('public')->url($heroContent->image) }}" alt="Hero Image" class="img-fluid">
                    @else
                        <img src="{{ asset('assets/img/illustration-1.webp') }}" alt="Hero Image" class="img-fluid">
                    @endif
                </div>
            </div>
        </div>

        <!-- Statistics -->
        <div class="row stats-row gy-4 mt-5" data-aos="fade-up" data-aos-delay="500">
            @if($statistics && $statistics->stats)
                @foreach($statistics->stats as $stat)
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="{{ $stat['icon'] ?? 'bi bi-trophy' }}"></i>
                            </div>
                            <div class="stat-content">
                                <h4>{{ $stat['number'] }}{{ $stat['unit'] ?? '' }} {{ $stat['description'] ?? '' }}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="bi bi-trophy"></i>
                        </div>
                        <div class="stat-content">
                            <h4>98% успешных аттестаций</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="bi bi-briefcase"></i>
                        </div>
                        <div class="stat-content">
                            <h4>1 000+ сертифицированных инженеров</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <div class="stat-content">
                            <h4>95% удовлетворенности клиентов</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="bi bi-award"></i>
                        </div>
                        <div class="stat-content">
                            <h4>10+ лет опыта</h4>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="about section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4 align-items-center justify-content-between">
            <div class="col-xl-5" data-aos="fade-up" data-aos-delay="200">
                @if($aboutContent)
                    <h2 class="about-title">{{ $aboutContent->title }}</h2>
                    <p class="about-description">{{ $aboutContent->subtitle }}</p>

                    @if($aboutContent->features)
                        <div class="row feature-list-wrapper">
                            <div class="col-md-6">
                                <ul class="feature-list">
                                    @foreach($aboutContent->features as $index => $feature)
                                        @if($index % 2 == 0)
                                            <li><i class="bi bi-check-circle-fill"></i> {{ $feature['title'] ?? $feature['feature'] ?? $feature }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="feature-list">
                                    @foreach($aboutContent->features as $index => $feature)
                                        @if($index % 2 == 1)
                                            <li><i class="bi bi-check-circle-fill"></i> {{ $feature['title'] ?? $feature['feature'] ?? $feature }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                @else
                    <h2 class="about-title">НАША КОМАНДА — ВАША НАДЕЖНОСТЬ</h2>
                    <p class="about-description">
                        ТОО ВсеСтрой — ваш надежный партнёр в сфере аттестации и сертификации с 2013 года.
                        Несмотря на молодой возраст, мы уже заслужили доверие сотен компаний Казахстана
                        благодаря профессионализму, оперативности и строгому соблюдению стандартов.
                    </p>

                    <div class="row feature-list-wrapper">
                        <div class="col-md-6">
                            <ul class="feature-list">
                                <li><i class="bi bi-check-circle-fill"></i> Аттестация за 1 рабочий день</li>
                                <li><i class="bi bi-check-circle-fill"></i> Лицензии I–III категорий</li>
                                <li><i class="bi bi-check-circle-fill"></i> Гарантия соответствия ГОСТ и ISO</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="feature-list">
                                <li><i class="bi bi-check-circle-fill"></i> Поддержка 24/7</li>
                                <li><i class="bi bi-check-circle-fill"></i> Соблюдение сроков</li>
                                <li><i class="bi bi-check-circle-fill"></i> Конфиденциальность данных</li>
                            </ul>
                        </div>
                    </div>
                @endif

                <div class="info-wrapper">
                    <div class="row gy-4">
                        <div class="col-lg-7">
                            <div class="contact-info d-flex align-items-center gap-2">
                                <i class="bi bi-telephone-fill"></i>
                                <div>
                                    <p class="contact-label">Контакты</p>
                                    <p class="contact-number">+7 (702) 912-23-00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
                <div class="image-wrapper">
                    <div class="images position-relative" data-aos="zoom-out" data-aos-delay="400">
                        @if($aboutContent && $aboutContent->image)
                            <img src="{{ Storage::disk('public')->url($aboutContent->image) }}" alt="About" class="img-fluid main-image rounded-4">
                        @else
                            <img src="{{ asset('assets/img/about-5.png') }}" alt="Business Meeting" class="img-fluid main-image rounded-4">
                            <img src="{{ asset('assets/img/about-2.png') }}" alt="Team Discussion" class="img-fluid small-image rounded-4">
                        @endif
                    </div>
                    <div class="experience-badge floating">
                        <h3>10+ лет</h3>
                        <p>Профессионализм в бизнес-услугах</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Latest News Section -->
@if($latestNews->isNotEmpty())
<section id="news" class="news section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Последние Новости</h2>
        <p>Актуальная информация из мира аттестации и сертификации</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-4">
            @foreach($latestNews as $news)
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="{{ 100 + $loop->index * 100 }}">
                    <div class="news-card">
                        @if($news->featured_image)
                            <div class="news-image">
                                <img src="{{ Storage::disk('public')->url($news->featured_image) }}" alt="{{ $news->title }}" class="img-fluid">
                            </div>
                        @endif
                        <div class="news-content">
                            <div class="news-meta">
                                <span class="news-date">{{ $news->published_at->format('d.m.Y') }}</span>
                            </div>
                            <h3><a href="{{ route('news.show', $news->slug) }}">{{ $news->title }}</a></h3>
                            @if($news->excerpt)
                                <p>{{ $news->excerpt }}</p>
                            @endif
                            <a href="{{ route('news.show', $news->slug) }}" class="read-more">Читать далее</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('news.index') }}" class="btn btn-outline-primary btn-lg">
                Все новости
            </a>
        </div>
    </div>
</section>
@endif

<!-- Featured Projects Section -->
@if($featuredProjects->isNotEmpty())
<section id="projects" class="projects section light-background">
    <div class="container section-title" data-aos="fade-up">
        <h2>Рекомендуемые Проекты</h2>
        <p>Примеры наших успешных проектов и достижений</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-4">
            @foreach($featuredProjects as $project)
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="{{ 100 + $loop->index * 100 }}">
                    <div class="project-card">
                        @if($project->featured_image)
                            <div class="project-image">
                                <img src="{{ Storage::disk('public')->url($project->featured_image) }}" alt="{{ $project->title }}" class="img-fluid">
                            </div>
                        @endif
                        <div class="project-content">
                            <div class="project-meta">
                                @if($project->category)
                                    <span class="project-category">{{ $project->category }}</span>
                                @endif
                                @if($project->project_date)
                                    <span class="project-date">{{ $project->project_date->format('Y') }}</span>
                                @endif
                            </div>
                            <h3><a href="{{ route('projects.show', $project->slug) }}">{{ $project->title }}</a></h3>
                            @if($project->description)
                                <p>{{ $project->description }}</p>
                            @endif
                            @if($project->client_name)
                                <div class="project-client">
                                    <strong>Клиент:</strong> {{ $project->client_name }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('projects.index') }}" class="btn btn-outline-primary btn-lg">
                Все проекты
            </a>
        </div>
    </div>
</section>
@endif

<!-- Contact Section -->
<section id="contact" class="contact section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Свяжитесь с Нами</h2>
        <p>Готовы помочь вам с аттестацией и сертификацией</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-4 g-lg-5">
            <div class="col-lg-5">
                <div class="info-box" data-aos="fade-up" data-aos-delay="200">
                    <h3>Контактные данные</h3>

                    <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon-box">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div class="content">
                            <h4>Наш адрес</h4>
                            <p>г. Актау, 29а мкр, 145</p>
                            <p>БЦ "АБК", офис 103</p>
                        </div>
                    </div>

                    <div class="info-item" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon-box">
                            <i class="bi bi-telephone"></i>
                        </div>
                        <div class="content">
                            <h4>Телефон</h4>
                            <p>+7 (702) 912-23-00</p>
                        </div>
                    </div>

                    <div class="info-item" data-aos="fade-up" data-aos-delay="500">
                        <div class="icon-box">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <div class="content">
                            <h4>Электронная почта</h4>
                            <p>ermek_ospanov@mail.ru</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="map-container" data-aos="fade-up" data-aos-delay="300">
                    <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A2a8fd567db08c1b8152f2963fb3e4ad77faf6e94191026ee87b470e59794d943&amp;source=constructor" width="100%" height="407" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    // Функции для работы с модальными окнами
    function openApplicationModal() {
        document.getElementById('applicationModal').style.display = 'block';
    }

    function closeApplicationModal() {
        document.getElementById('applicationModal').style.display = 'none';
    }

    function openSearchModal() {
        document.getElementById('searchModal').style.display = 'block';
    }

    function closeSearchModal() {
        document.getElementById('searchModal').style.display = 'none';
    }

    // Закрытие при клике вне модального окна
    window.onclick = function(event) {
        const applicationModal = document.getElementById('applicationModal');
        const searchModal = document.getElementById('searchModal');

        if (event.target == applicationModal) {
            applicationModal.style.display = 'none';
        }
        if (event.target == searchModal) {
            searchModal.style.display = 'none';
        }
    }
</script>
@endpush
