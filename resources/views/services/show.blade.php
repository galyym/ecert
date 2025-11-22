@extends('layouts.app')

@section('title', $service->title . ' - ТОО ВсеСтрой')

@section('content')
<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1>{{ $service->title }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('services.index') }}">Услуги</a></li>
                <li class="breadcrumb-item active">{{ $service->title }}</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Service Detail -->
<section class="service-detail section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @if($service->image)
                <div class="service-image mb-4">
                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="img-fluid rounded">
                </div>
                @endif
                
                <div class="service-content">
                    @if($service->description)
                    <div class="content-section">
                        {!! nl2br(e($service->description)) !!}
                    </div>
                    @endif
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="sidebar-widget">
                        <h4>Подать заявку</h4>
                        <p>Готовы начать? Подайте заявку на аттестацию прямо сейчас</p>
                        <a href="#" onclick="event.preventDefault(); openCertificationModal();" class="btn btn-primary w-100">
                            <i class="bi bi-file-earmark-text"></i> Подать заявку
                        </a>
                    </div>
                    
                    <div class="sidebar-widget">
                        <h4>Контакты</h4>
                        <ul class="contact-list">
                            <li><i class="bi bi-telephone"></i> +7 (702) 912-23-00</li>
                            <li><i class="bi bi-envelope"></i> ermek_ospanov@mail.ru</li>
                            <li><i class="bi bi-geo-alt"></i> г. Актау, 29а мкр, 145</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
