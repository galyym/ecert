@extends('layouts.app')

@section('title', __('messages.about_company') . ' - ' . __('messages.brand_name'))
@section('meta_description', __('messages.brand_name') . ' - ' . __('messages.about_company_title'))

@section('content')

<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>{{ __('messages.about_company') }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('messages.home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('messages.about_company') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- About Content -->
@if($aboutContent)
<section class="about-detail section">
    <div class="container" data-aos="fade-up">
        <div class="row gy-4">
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <h2>{{ $aboutContent->title }}</h2>
                @if($aboutContent->subtitle)
                <p class="lead">{{ $aboutContent->subtitle }}</p>
                @endif

                @if($aboutContent->content)
                @foreach($aboutContent->content as $content)
                @if(isset($content['text']))
                <p>{{ $content['text'] }}</p>
                @endif
                @endforeach
                @endif
            </div>

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                @if($aboutContent->image)
                <img src="{{ Storage::disk('public')->url($aboutContent->image) }}" alt="{{ $aboutContent->title }}" class="img-fluid rounded">
                @endif
            </div>
        </div>
    </div>
</section>
@endif

<!-- Team Section -->
@if($teamContent)
<section class="team section light-background">
    <div class="container section-title" data-aos="fade-up">
        <h2>{{ $teamContent->title }}</h2>
        @if($teamContent->subtitle)
        <p>{{ $teamContent->subtitle }}</p>
        @endif
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
            @if($teamContent->content)
            @foreach($teamContent->content as $member)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ 100 + $loop->index * 100 }}">
                <div class="team-member">
                    @if(isset($member['image']))
                    <div class="member-img">
                        <img src="{{ Storage::disk('public')->url($member['image']) }}" alt="{{ $member['title'] ?? '' }}" class="img-fluid">
                    </div>
                    @endif
                    <div class="member-info">
                        @if(isset($member['title']))
                        <h4>{{ $member['title'] }}</h4>
                        @endif
                        @if(isset($member['text']))
                        <p>{{ $member['text'] }}</p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
@endif

<!-- Mission Section -->
@if($missionContent)
<section class="mission section">
    <div class="container" data-aos="fade-up">
        <div class="row gy-4 align-items-center">
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <h2>{{ $missionContent->title }}</h2>
                @if($missionContent->subtitle)
                <p class="lead">{{ $missionContent->subtitle }}</p>
                @endif

                @if($missionContent->content)
                @foreach($missionContent->content as $content)
                @if(isset($content['text']))
                <p>{{ $content['text'] }}</p>
                @endif
                @endforeach
                @endif

                @if($missionContent->features)
                <ul class="feature-list">
                    @foreach($missionContent->features as $feature)
                    <li>
                        <i class="{{ $feature['icon'] ?? 'bi bi-check-circle' }}"></i>
                        <strong>{{ $feature['title'] ?? $feature }}</strong>
                        @if(isset($feature['description']))
                        <br><small>{{ $feature['description'] }}</small>
                        @endif
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                @if($missionContent->image)
                <img src="{{ Storage::disk('public')->url($missionContent->image) }}" alt="{{ $missionContent->title }}" class="img-fluid rounded">
                @endif
            </div>
        </div>
    </div>
</section>
@endif

<!-- History Section -->
@if($historyContent)
<section class="history section light-background">
    <div class="container section-title" data-aos="fade-up">
        <h2>{{ $historyContent->title }}</h2>
        @if($historyContent->subtitle)
        <p>{{ $historyContent->subtitle }}</p>
        @endif
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        @if($historyContent->content)
        <div class="timeline">
            @foreach($historyContent->content as $event)
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="{{ 100 + $loop->index * 100 }}">
                <div class="timeline-marker"></div>
                <div class="timeline-content">
                    @if(isset($event['title']))
                    <h3>{{ $event['title'] }}</h3>
                    @endif
                    @if(isset($event['text']))
                    <p>{{ $event['text'] }}</p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>
@endif

<!-- Certificates Section -->
@if($certificatesContent)
<section class="certificates section">
    <div class="container section-title" data-aos="fade-up">
        <h2>{{ $certificatesContent->title }}</h2>
        @if($certificatesContent->subtitle)
        <p>{{ $certificatesContent->subtitle }}</p>
        @endif
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
            @if($certificatesContent->content)
            @foreach($certificatesContent->content as $certificate)
            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="{{ 100 + $loop->index * 100 }}">
                <div class="certificate-item">
                    @if(isset($certificate['image']))
                    <div class="certificate-img">
                        <img src="{{ Storage::disk('public')->url($certificate['image']) }}" alt="{{ $certificate['title'] ?? 'Сертификат' }}" class="img-fluid">
                        <div class="certificate-overlay">
                            <a href="{{ Storage::disk('public')->url($certificate['image']) }}" class="glightbox" data-gallery="certificates">
                                <i class="bi bi-zoom-in"></i>
                            </a>
                        </div>
                    </div>
                    @endif
                    @if(isset($certificate['title']))
                    <h4>{{ $certificate['title'] }}</h4>
                    @endif
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
@endif

<!-- Default About Section if no content -->
@if(!$aboutContent && !$teamContent && !$historyContent && !$missionContent)
<section class="about-detail section">
    <div class="container" data-aos="fade-up">
        <div class="row gy-4">
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <h2>{{ __('messages.about_company_title') }}</h2>
                <p class="lead">{{ __('messages.partner_title') }}</p>

                <p>{{ __('messages.about_company_desc') }}</p>

                <p>{{ __('messages.about_mission') }}</p>

                <ul class="feature-list">
                    <li><i class="bi bi-check-circle"></i> <strong>{{ __('messages.experience_label') }}:</strong> {{ __('messages.experience_val') }}</li>
                    <li><i class="bi bi-check-circle"></i> <strong>{{ __('messages.quality_label') }}:</strong> {{ __('messages.quality_val') }}</li>
                    <li><i class="bi bi-check-circle"></i> <strong>{{ __('messages.speed_label') }}:</strong> {{ __('messages.speed_val') }}</li>
                    <li><i class="bi bi-check-circle"></i> <strong>{{ __('messages.reliability_label') }}:</strong> {{ __('messages.reliability_val') }}</li>
                </ul>
            </div>

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <img src="{{ asset('assets/img/about-5.png') }}" alt="{{ __('messages.about_company') }}" class="img-fluid rounded">
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="values section light-background">
    <div class="container section-title" data-aos="fade-up">
        <h2>{{ __('messages.values_title') }}</h2>
        <p>{{ __('messages.values_desc') }}</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="value-item">
                    <div class="value-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h3>{{ __('messages.value_quality') }}</h3>
                    <p>{{ __('messages.value_quality_desc') }}</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="value-item">
                    <div class="value-icon">
                        <i class="bi bi-clock"></i>
                    </div>
                    <h3>{{ __('messages.value_efficiency') }}</h3>
                    <p>{{ __('messages.value_efficiency_desc') }}</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="value-item">
                    <div class="value-icon">
                        <i class="bi bi-people"></i>
                    </div>
                    <h3>{{ __('messages.value_professionalism') }}</h3>
                    <p>{{ __('messages.value_professionalism_desc') }}</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="value-item">
                    <div class="value-icon">
                        <i class="bi bi-megaphone"></i>
                    </div>
                    <h3>{{ __('messages.value_honesty') }}</h3>
                    <p>{{ __('messages.value_honesty_desc') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Call to Action -->
<section class="cta section">
    <div class="container" data-aos="fade-up">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2>{{ __('messages.ready_to_start') }}</h2>
                <p>{{ __('messages.ready_to_start_desc') }}</p>
                <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">{{ __('messages.contact_us_btn') }}</a>
                <a href="#" onclick="openApplicationModal(); return false;" class="btn btn-outline-primary btn-lg ms-3">{{ __('messages.apply_btn') }}</a>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
    .timeline {
        position: relative;
        padding: 2rem 0;
    }

    .timeline:before {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        width: 2px;
        height: 100%;
        background: var(--accent-color);
        transform: translateX(-50%);
    }

    .timeline-item {
        position: relative;
        margin-bottom: 2rem;
    }

    .timeline-marker {
        position: absolute;
        left: 50%;
        top: 1rem;
        width: 12px;
        height: 12px;
        background: var(--accent-color);
        border-radius: 50%;
        transform: translateX(-50%);
        z-index: 2;
    }

    .timeline-content {
        position: relative;
        background: white;
        padding: 1.5rem;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        width: 45%;
    }

    .timeline-item:nth-child(even) .timeline-content {
        margin-left: auto;
    }

    @media (max-width: 768px) {
        .timeline:before {
            left: 20px;
        }

        .timeline-marker {
            left: 20px;
        }

        .timeline-content {
            width: calc(100% - 40px);
            margin-left: 40px;
        }
    }

    .value-item {
        text-align: center;
        padding: 2rem 1rem;
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .value-item:hover {
        transform: translateY(-5px);
    }

    .value-icon {
        font-size: 3rem;
        color: var(--accent-color);
        margin-bottom: 1rem;
    }

    .certificate-item {
        position: relative;
        overflow: hidden;
        border-radius: 10px;
        background: white;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .certificate-img {
        position: relative;
        overflow: hidden;
    }

    .certificate-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.7);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .certificate-item:hover .certificate-overlay {
        opacity: 1;
    }

    .certificate-overlay a {
        color: white;
        font-size: 2rem;
        text-decoration: none;
    }
</style>
@endpush