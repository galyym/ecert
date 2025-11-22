@extends('layouts.app')

@section('title', 'Проекты - ТОО ВсеСтрой')

@section('content')
<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1>Наши проекты</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
                <li class="breadcrumb-item active">Проекты</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Projects List -->
<section class="projects-list section">
    <div class="container">
        <!-- Category Filter -->
        @if($categories->count() > 0)
        <div class="filter-bar mb-4">
            <div class="btn-group" role="group">
                <a href="{{ route('projects.index') }}" class="btn {{ !request('category') ? 'btn-primary' : 'btn-outline-primary' }}">
                    Все проекты
                </a>
                @foreach($categories as $category)
                <a href="{{ route('projects.index', ['category' => $category]) }}" 
                   class="btn {{ request('category') == $category ? 'btn-primary' : 'btn-outline-primary' }}">
                    {{ $category }}
                </a>
                @endforeach
            </div>
        </div>
        @endif
        
        <div class="row g-4">
            @forelse($projects as $project)
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
            @empty
            <div class="col-12">
                <div class="alert alert-info">
                    Проекты скоро появятся
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
