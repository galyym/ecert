@extends('layouts.app')

@section('title', 'Контакты - ТОО ВсеСтрой')

@section('content')
<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1>Контакты</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
                <li class="breadcrumb-item active">Контакты</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Contact Section -->
<section class="contact section">
    <div class="container">
        <div class="row g-4 g-lg-5">
            <!-- Contact Info -->
            <div class="col-lg-5">
                <div class="info-box" data-aos="fade-up">
                    <h3>Контактные данные</h3>
                    
                    <div class="info-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon-box">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div class="content">
                            <h4>Наш адрес</h4>
                            <p>г. Актау, 29а мкр, 145</p>
                            <p>БЦ "АБК", офис 103</p>
                        </div>
                    </div>
                    
                    <div class="info-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon-box">
                            <i class="bi bi-telephone"></i>
                        </div>
                        <div class="content">
                            <h4>Телефон</h4>
                            <p>+7 (702) 912-23-00</p>
                        </div>
                    </div>
                    
                    <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon-box">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <div class="content">
                            <h4>Электронная почта</h4>
                            <p>ermek_ospanov@mail.ru</p>
                        </div>
                    </div>
                    
                    <div class="info-item" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon-box">
                            <i class="bi bi-clock"></i>
                        </div>
                        <div class="content">
                            <h4>Режим работы</h4>
                            <p>Понедельник - Пятница: 9:00 - 18:00</p>
                            <p>Суббота - Воскресенье: Выходной</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Map -->
            <div class="col-lg-7">
                <div class="map-container" data-aos="fade-up" data-aos-delay="200">
                    <iframe 
                        src="https://yandex.ru/map-widget/v1/?um=constructor%3A2a8fd567db08c1b8152f2963fb3e4ad77faf6e94191026ee87b470e59794d943&amp;source=constructor" 
                        width="100%" 
                        height="500" 
                        frameborder="0"
                        style="border-radius: 10px;">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta section light-background">
    <div class="container" data-aos="fade-up">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h2>Готовы начать сотрудничество?</h2>
                <p>Подайте заявку на аттестацию или свяжитесь с нами для консультации</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="#" onclick="event.preventDefault(); openCertificationModal();" class="btn btn-primary btn-lg">
                    <i class="bi bi-file-earmark-text"></i> Подать заявку
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
