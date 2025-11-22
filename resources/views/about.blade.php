@extends('layouts.app')

@section('title', 'О компании - ТОО ВсеСтрой')

@section('content')
<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1>О компании</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
                <li class="breadcrumb-item active">О компании</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Main About Section -->
<section class="about-main section">
    <div class="container">
        <div class="row gy-4 align-items-center">
            <div class="col-lg-6" data-aos="fade-up">
                <h2>ТОО ВсеСтрой - Ваш надежный партнер</h2>
                <p class="lead">
                    ТОО ВсеСтрой — ваш надежный партнёр в сфере аттестации и сертификации с 2013 года.
                </p>
                <p>
                    Несмотря на молодой возраст, мы уже заслужили доверие сотен компаний Казахстана благодаря 
                    профессионализму, оперативности и строгому соблюдению стандартов. Каждый наш эксперт 
                    проходит ежегодную аттестацию, чтобы гарантировать вам актуальные знания и соответствие 
                    международным стандартам.
                </p>
                
                <div class="row mt-4">
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
            </div>
            
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <div class="about-images">
                    <img src="{{ asset('assets/img/about-5.webp') }}" alt="О компании" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Dynamic Sections -->
@if($sections->count() > 0)
@foreach($sections as $section)
<section class="about-section section {{ $loop->even ? 'light-background' : '' }}">
    <div class="container">
        <div class="row gy-4 align-items-center {{ $loop->even ? 'flex-row-reverse' : '' }}">
            <div class="col-lg-6" data-aos="fade-up">
                <h2>{{ $section->title }}</h2>
                <div class="content">
                    {!! nl2br(e($section->content)) !!}
                </div>
            </div>
            
            @if($section->image)
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <img src="{{ asset('storage/' . $section->image) }}" alt="{{ $section->title }}" class="img-fluid rounded">
            </div>
            @endif
        </div>
    </div>
</section>
@endforeach
@endif

<!-- Values Section -->
<section class="values section light-background">
    <div class="container section-title" data-aos="fade-up">
        <h2>Наши ценности</h2>
        <p>Принципы, которыми мы руководствуемся в работе</p>
    </div>
    
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="value-card text-center">
                    <div class="value-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h4>Надежность</h4>
                    <p>Гарантируем качество и соблюдение всех стандартов</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="value-card text-center">
                    <div class="value-icon">
                        <i class="bi bi-lightning"></i>
                    </div>
                    <h4>Оперативность</h4>
                    <p>Быстрое оформление документов без задержек</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="value-card text-center">
                    <div class="value-icon">
                        <i class="bi bi-people"></i>
                    </div>
                    <h4>Профессионализм</h4>
                    <p>Команда опытных экспертов в своей области</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="value-card text-center">
                    <div class="value-icon">
                        <i class="bi bi-heart"></i>
                    </div>
                    <h4>Клиентоориентированность</h4>
                    <p>Индивидуальный подход к каждому клиенту</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
