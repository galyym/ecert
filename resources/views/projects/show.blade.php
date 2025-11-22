@extends('layouts.app')

@section('title', $project->title . ' - ТОО ВсеСтрой')

@section('content')
<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1>{{ $project->title }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Проекты</a></li>
                <li class="breadcrumb-item active">{{ $project->title }}</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Project Detail -->
<section class="project-detail section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Project Gallery -->
                @if($project->images && count($project->images) > 0)
                <div class="project-gallery mb-4">
                    <div id="projectCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($project->images as $index => $image)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . $image) }}" class="d-block w-100 rounded" alt="{{ $project->title }}">
                            </div>
                            @endforeach
                        </div>
                        @if(count($project->images) > 1)
                        <button class="carousel-control-prev" type="button" data-bs-target="#projectCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Предыдущий</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#projectCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Следующий</span>
                        </button>
                        @endif
                    </div>
                </div>
                @endif
                
                <!-- Project Info -->
                <div class="project-info mb-4">
                    <div class="row g-3">
                        @if($project->client)
                        <div class="col-md-6">
                            <div class="info-item">
                                <strong><i class="bi bi-building"></i> Клиент:</strong>
                                <span>{{ $project->client }}</span>
                            </div>
                        </div>
                        @endif
                        
                        @if($project->completion_date)
                        <div class="col-md-6">
                            <div class="info-item">
                                <strong><i class="bi bi-calendar"></i> Дата завершения:</strong>
                                <span>{{ $project->completion_date->format('d.m.Y') }}</span>
                            </div>
                        </div>
                        @endif
                        
                        @if($project->category)
                        <div class="col-md-6">
                            <div class="info-item">
                                <strong><i class="bi bi-tag"></i> Категория:</strong>
                                <span>{{ $project->category }}</span>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                
                <!-- Project Description -->
                @if($project->description)
                <div class="project-description">
                    <h3>Описание проекта</h3>
                    <div class="content">
                        {!! nl2br(e($project->description)) !!}
                    </div>
                </div>
                @endif
            </div>
            
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="sidebar-widget">
                        <h4>Заинтересованы?</h4>
                        <p>Свяжитесь с нами для обсуждения вашего проекта</p>
                        <a href="{{ route('contact') }}" class="btn btn-primary w-100">
                            <i class="bi bi-envelope"></i> Связаться с нами
                        </a>
                    </div>
                    
                    <div class="sidebar-widget">
                        <h4>Наши услуги</h4>
                        <p>Узнайте больше о наших услугах по аттестации и сертификации</p>
                        <a href="{{ route('services.index') }}" class="btn btn-outline-primary w-100">
                            <i class="bi bi-list-check"></i> Все услуги
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
