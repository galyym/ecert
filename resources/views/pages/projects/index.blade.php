@extends('layouts.app')

@section('title', __('messages.projects') . ' - ' . __('messages.brand_name'))
@section('meta_description', __('messages.brand_name') . ' - ' . __('messages.projects_overview_title'))

@section('content')

<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>{{ __('messages.our_projects') }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('messages.home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('messages.projects') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Projects Overview -->
<section class="projects-overview section">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2>{{ __('messages.projects_overview_title') }}</h2>
                <p class="lead">
                    {{ __('messages.projects_overview_desc') }}
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Filters -->
@if($categories->isNotEmpty())
<section class="projects-filters">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="filter-buttons text-center mb-4">
                    <a href="{{ route('projects.index') }}"
                        class="btn btn-outline-primary me-2 mb-2 {{ !request('category') ? 'active' : '' }}">
                        {{ __('messages.all_projects_filter') }}
                    </a>
                    @foreach($categories as $category)
                    <a href="{{ route('projects.index', ['category' => $category]) }}"
                        class="btn btn-outline-primary me-2 mb-2 {{ request('category') == $category ? 'active' : '' }}">
                        {{ ucfirst($category) }}
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Projects Grid -->
<section class="projects-grid section">
    <div class="container">
        @if($projects->isNotEmpty())
        <div class="row g-4">
            @foreach($projects as $project)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ 100 + $loop->index * 100 }}">
                <article class="project-card card-modern">
                    @if($project->featured_image)
                    <div class="project-image">
                        <img src="{{ Storage::disk('public')->url($project->featured_image) }}" alt="{{ $project->title }}" class="img-fluid">
                    </div>
                    @endif

                    <div class="project-content p-4">
                        <div class="project-meta mb-3">
                            @if($project->category)
                            <span class="badge bg-corporate-blue me-2">{{ $project->category }}</span>
                            @endif
                            @if($project->project_date)
                            <span class="text-muted">
                                <i class="bi bi-calendar"></i>
                                {{ $project->project_date->format('Y') }}
                            </span>
                            @endif
                        </div>

                        <h3 class="project-title h5 mb-3">
                            <a href="{{ route('projects.show', $project->slug) }}" class="text-decoration-none">
                                {{ $project->title }}
                            </a>
                        </h3>

                        @if($project->description)
                        <p class="text-muted mb-3">{{ Str::limit($project->description, 120) }}</p>
                        @endif

                        @if($project->client_name)
                        <div class="project-client mb-3">
                            <small class="text-corporate-blue">
                                <i class="bi bi-building"></i>
                                <strong>{{ __('messages.client_label') }}:</strong> {{ $project->client_name }}
                            </small>
                        </div>
                        @endif

                        <div class="project-status mb-3">
                            <span class="badge 
                                        @switch($project->status)
                                            @case('completed') bg-success @break
                                            @case('in_progress') bg-warning @break
                                            @case('planning') bg-info @break
                                            @default bg-secondary
                                        @endswitch">
                                {{
                                            match($project->status) {
                                                'completed' => __('messages.project_status_completed'),
                                                'in_progress' => __('messages.project_status_in_progress'), 
                                                'planning' => __('messages.project_status_planning'),
                                                'on_hold' => __('messages.project_status_on_hold'),
                                                default => $project->status
                                            }
                                        }}
                            </span>
                        </div>

                        <a href="{{ route('projects.show', $project->slug) }}" class="btn btn-outline-primary btn-sm">
                            {{ __('messages.details') }}
                        </a>
                    </div>
                </article>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    {{ $projects->withQueryString()->links() }}
                </div>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-12 text-center">
                <div class="no-projects py-5">
                    <i class="bi bi-folder2-open" style="font-size: 4rem; color: var(--corporate-blue);"></i>
                    <h3 class="mt-3">{{ __('messages.no_projects_title') }}</h3>
                    <p class="text-muted">{{ __('messages.no_projects_desc') }}</p>
                    <a href="{{ route('home') }}" class="btn btn-primary">{{ __('messages.back_to_home') }}</a>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="cta section bg-gradient-corporate-light">
    <div class="container" data-aos="fade-up">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h2>{{ __('messages.be_client_title') }}</h2>
                <p class="lead mb-4">
                    {{ __('messages.be_client_desc') }}
                </p>
                <div class="cta-buttons">
                    <a href="{{ route('contact') }}" class="btn btn-primary btn-lg me-3">
                        <i class="bi bi-telephone"></i> {{ __('messages.contact_us_btn') }}
                    </a>
                    <button onclick="openApplicationModal()" class="btn btn-outline-primary btn-lg">
                        <i class="bi bi-file-text"></i> {{ __('messages.apply_btn') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
    .project-image {
        overflow: hidden;
        border-radius: 15px 15px 0 0;
        height: 200px;
    }

    .project-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .project-card:hover .project-image img {
        transform: scale(1.05);
    }

    .project-title a {
        color: var(--corporate-navy);
        transition: color 0.3s ease;
    }

    .project-title a:hover {
        color: var(--corporate-blue);
    }

    .filter-buttons .btn.active {
        background: var(--corporate-blue);
        border-color: var(--corporate-blue);
        color: white;
    }

    .project-meta {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 0.5rem;
    }

    @media (max-width: 576px) {
        .project-meta {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>
@endpush