@extends('layouts.app')

@section('title', 'Услуги - ТОО ВсеСтрой')
@section('meta_description', 'Полный спектр услуг аттестации и сертификации: аттестация инженерно-технических работников, аккредитация организаций, обучение специалистов.')

@section('content')

<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>{{ __('messages.our_services') }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('messages.home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('messages.services') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Services Overview -->
<section class="services-overview section">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2>{{ __('messages.services_overview_title') }}</h2>
                <p class="lead">
                    {{ __('messages.services_overview_desc') }}
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="services section light-background">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-4">

            <!-- Аттестация -->
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-card">
                    <div class="icon-header d-flex align-items-center">
                        <div class="icon flex-shrink-0">
                            <i class="bi bi-file-earmark-medical"></i>
                        </div>
                        <h3>{{ __('messages.certification') }}</h3>
                    </div>
                    <ul class="service-list">
                        <li>{{ __('messages.service_att_1') }}</li>
                        <li>{{ __('messages.service_att_2') }}</li>
                        <li>{{ __('messages.service_att_3') }}</li>
                        <li>{{ __('messages.service_att_4') }}</li>
                        <li>{{ __('messages.service_att_5') }}</li>
                        <li>{{ __('messages.service_att_6') }}</li>
                        <li>{{ __('messages.service_att_7') }}</li>
                        <li>{{ __('messages.service_att_8') }}</li>
                        <li>{{ __('messages.service_att_9') }}</li>
                    </ul>
                </div>
            </div>

            <!-- Аккредитация -->
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-card">
                    <div class="icon-header d-flex align-items-center">
                        <div class="icon flex-shrink-0">
                            <i class="bi bi-award"></i>
                        </div>
                        <h3>{{ __('messages.accreditation') }}</h3>
                    </div>
                    <ul class="service-list">
                        <li>{{ __('messages.service_acc_1') }}</li>
                        <li>{{ __('messages.service_acc_2') }}</li>
                        <li>{{ __('messages.service_acc_3') }}</li>
                        <li>{{ __('messages.service_acc_4') }}</li>
                    </ul>
                </div>
            </div>

            <!-- Обучение -->
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-card">
                    <div class="icon-header d-flex align-items-center">
                        <div class="icon flex-shrink-0">
                            <i class="bi bi-card-checklist"></i>
                        </div>
                        <h3>{{ __('messages.service_edu') }}</h3>
                    </div>
                    <ul class="service-list">
                        <li>{{ __('messages.service_edu_1') }}</li>
                        <li>{{ __('messages.service_edu_2') }}</li>
                        <li>{{ __('messages.service_edu_3') }}</li>
                        <li>{{ __('messages.service_edu_4') }}</li>
                        <li>{{ __('messages.service_edu_5') }}</li>
                        <li>{{ __('messages.service_edu_6') }}</li>
                        <li>{{ __('messages.service_edu_7') }}</li>
                        <li>{{ __('messages.service_edu_8') }}</li>
                        <li>{{ __('messages.service_edu_9') }}</li>
                        <li>{{ __('messages.service_edu_10') }}</li>
                        <li>{{ __('messages.service_edu_11') }}</li>
                    </ul>
                </div>
            </div>

            <!-- Прочие услуги -->
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                <div class="service-card">
                    <div class="icon-header d-flex align-items-center">
                        <div class="icon flex-shrink-0">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h3>{{ __('messages.service_other') }}</h3>
                    </div>
                    <ul class="service-list">
                        <li>{{ __('messages.service_oth_1') }}</li>
                        <li>{{ __('messages.service_oth_2') }}</li>
                        <li>{{ __('messages.service_oth_3') }}</li>
                        <li>{{ __('messages.service_oth_4') }}</li>
                        <li>{{ __('messages.service_oth_5') }}</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="why-choose section">
    <div class="container" data-aos="fade-up">
        <div class="section-title text-center">
            <h2>{{ __('messages.why_choose_us') }}</h2>
            <p>{{ __('messages.advantages_subtitle') }}</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="advantage-card">
                    <div class="advantage-icon">
                        <i class="bi bi-stopwatch"></i>
                    </div>
                    <h4>{{ __('messages.adv_fast_terms') }}</h4>
                    <p>{{ __('messages.speed_val') }}</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="advantage-card">
                    <div class="advantage-icon">
                        <i class="bi bi-trophy"></i>
                    </div>
                    <h4>{{ __('messages.adv_high_quality') }}</h4>
                    <p>{{ __('messages.quality_val') }}</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="advantage-card">
                    <div class="advantage-icon">
                        <i class="bi bi-people"></i>
                    </div>
                    <h4>{{ __('messages.adv_experienced_team') }}</h4>
                    <p>{{ __('messages.adv_experience_desc') }}</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="advantage-card">
                    <div class="advantage-icon">
                        <i class="bi bi-headset"></i>
                    </div>
                    <h4>{{ __('messages.adv_support_24') }}</h4>
                    <p>{{ __('messages.adv_support_desc') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta section light-background">
    <div class="container" data-aos="fade-up">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h2>{{ __('messages.consultation_title') }}</h2>
                <p class="lead mb-4">
                    {{ __('messages.consultation_desc') }}
                </p>
                <div class="cta-buttons">
                    <button onclick="openApplicationModal()" class="btn btn-primary btn-lg me-3">
                        <i class="bi bi-file-text"></i> {{ __('messages.leave_request') }}
                    </button>
                    <a href="{{ route('contact') }}" class="btn btn-outline-primary btn-lg">
                        <i class="bi bi-telephone"></i> {{ __('messages.contact_us_btn') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
    .services-overview {
        padding: 4rem 0;
    }

    .category-header h2 {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--heading-color);
        margin-bottom: 1rem;
    }

    .service-card-detailed {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        height: 100%;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        display: flex;
        flex-direction: column;
    }

    .service-card-detailed:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    .service-header {
        margin-bottom: 1.5rem;
    }

    .service-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--accent-color), #1a5490);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin-right: 1rem;
        flex-shrink: 0;
    }

    .service-info h3 {
        font-size: 1.4rem;
        font-weight: 600;
        color: var(--heading-color);
        margin-bottom: 0.5rem;
    }

    .service-description {
        color: var(--default-color);
        line-height: 1.6;
    }

    .service-features {
        flex-grow: 1;
        margin-bottom: 1.5rem;
    }

    .service-features ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .service-features li {
        padding: 0.3rem 0;
        display: flex;
        align-items: flex-start;
    }

    .service-features li i {
        color: var(--accent-color);
        margin-right: 0.5rem;
        margin-top: 0.2rem;
        flex-shrink: 0;
    }

    .service-footer {
        border-top: 1px solid #eee;
        padding-top: 1rem;
        margin-bottom: 1rem;
    }

    .service-duration {
        display: flex;
        align-items: center;
        color: #666;
        font-size: 0.9rem;
    }

    .service-duration i {
        margin-right: 0.5rem;
    }

    .service-price {
        color: var(--accent-color);
        font-size: 1.1rem;
    }

    .service-actions {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
    }

    .advantage-card {
        text-align: center;
        padding: 2rem 1rem;
        background: white;
        border-radius: 10px;
        box-shadow: 0 3px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
        height: 100%;
    }

    .advantage-card:hover {
        transform: translateY(-5px);
    }

    .advantage-icon {
        font-size: 3rem;
        color: var(--accent-color);
        margin-bottom: 1rem;
    }

    .advantage-card h4 {
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .cta-buttons .btn {
        margin: 0.5rem;
    }

    @media (max-width: 768px) {
        .page-header h1 {
            font-size: 2rem;
        }

        .service-card-detailed {
            padding: 1.5rem;
        }

        .service-actions {
            justify-content: center;
        }
    }
</style>
@endpush