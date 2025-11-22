@extends('layouts.app')

@section('title', 'Услуги - ТОО ВсеСтрой')
@section('meta_description', 'Полный спектр услуг аттестации и сертификации: аттестация инженерно-технических работников, аккредитация организаций, обучение специалистов.')

@section('content')

<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Наши Услуги</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Услуги</li>
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
                <h2>Профессиональные услуги аттестации и сертификации</h2>
                <p class="lead">
                    Мы предоставляем полный спектр услуг для обеспечения соответствия высоким стандартам 
                    качества и безопасности в области строительства и промышленности.
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
                            <h3>Аттестация</h3>
                        </div>
                        <ul class="service-list">
                            <li>Аттестация инженерно-технических работников, участвующих в процессе проектирования и строительства</li>
                            <li>Аттестат на право проведения работ в области промышленной безопасности</li>
                            <li>Экспертиза градостроительной, предпроектной и проектно-сметной документации</li>
                            <li>Технический надзор</li>
                            <li>Авторский надзор</li>
                            <li>Техническое обследование надежности и устойчивости зданий и сооружений</li>
                            <li>Аттестация профессиональных аварийно-спасательных служб в области промышленной безопасности</li>
                            <li>Аттестация негосударственных противопожарных служб на право проведения работ по предупреждению и тушению пожаров, обеспечению пожарной безопасности и проведению аварийно-спасательных работ в организациях, населенных пунктах и на объектах</li>
                            <li>Аттестация юридических лиц на право проведения работ в области промышленной безопасности</li>
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
                            <h3>Аккредитация</h3>
                        </div>
                        <ul class="service-list">
                            <li>Аккредитация организаций по управлению проектами в области архитектуры, градостроительства и строительства</li>
                            <li>Аккредитация юридических лиц, осуществляющих технический надзор и техническое обследование по объектам первого и второго уровней ответственности</li>
                            <li>Аккредитация юридических лиц, претендующих на проведение комплексной вневедомственной экспертизы проектов строительства объектов</li>
                            <li>Аккредитация экспертных организаций по аудиту в области пожарной безопасности</li>
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
                            <h3>Обучение (курсы)</h3>
                        </div>
                        <ul class="service-list">
                            <li>Пожарно-технический минимум</li>
                            <li>Безопасность и охрана труда ИТР</li>
                            <li>Безопасность и охрана труда рабочих</li>
                            <li>Промышленная безопасность</li>
                            <li>Электробезопасность</li>
                            <li>По профессии (слесарь, токарь, стропальщик)</li>
                            <li>Безопасное вождение</li>
                            <li>Оказание первой доврачебной помощи</li>
                            <li>Охранник, оказывающий услуги по охране имущества юридических и физических лиц, в том числе при его транспортировке</li>
                            <li>Антитеррористическая защита объектов, уязвимых в террористическом отношении</li>
                            <li>Безопасное обращение с оружием</li>
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
                            <h3>Прочие услуги</h3>
                        </div>
                        <ul class="service-list">
                            <li>Разработка декларации промышленной безопасности опасного производственного объекта (присвоения регистрационного шифра)</li>
                            <li>Проведение экспертизы по промышленной безопасности</li>
                            <li>Составление паспортов на оборудование</li>
                            <li>Техническое освидетельствование грузоподъемных механизмов</li>
                            <li>Выдача удостоверений на право управления тракторами и изготовленными на их базе самоходными шасси и механизмами, самоходными сельскохозяйственными, мелиоративными и дорожно-строительными машинами и механизмами, а также специальными машинами повышенной проходимости</li>
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
            <h2>Почему выбирают нас</h2>
            <p>Преимущества работы с ТОО ВсеСтрой</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="advantage-card">
                    <div class="advantage-icon">
                        <i class="bi bi-stopwatch"></i>
                    </div>
                    <h4>Быстрые сроки</h4>
                    <p>Аттестация за 1 рабочий день</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="advantage-card">
                    <div class="advantage-icon">
                        <i class="bi bi-trophy"></i>
                    </div>
                    <h4>Высокое качество</h4>
                    <p>98% успешных аттестаций</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="advantage-card">
                    <div class="advantage-icon">
                        <i class="bi bi-people"></i>
                    </div>
                    <h4>Опытная команда</h4>
                    <p>10+ лет опыта в отрасли</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="advantage-card">
                    <div class="advantage-icon">
                        <i class="bi bi-headset"></i>
                    </div>
                    <h4>Поддержка 24/7</h4>
                    <p>Всегда готовы помочь</p>
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
                <h2>Нужна консультация по нашим услугам?</h2>
                <p class="lead mb-4">
                    Свяжитесь с нами для получения подробной информации и расчета стоимости услуг
                </p>
                <div class="cta-buttons">
                    <button onclick="openApplicationModal()" class="btn btn-primary btn-lg me-3">
                        <i class="bi bi-file-text"></i> Оставить заявку
                    </button>
                    <a href="{{ route('contact') }}" class="btn btn-outline-primary btn-lg">
                        <i class="bi bi-telephone"></i> Связаться с нами
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
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    height: 100%;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    display: flex;
    flex-direction: column;
}

.service-card-detailed:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
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
    box-shadow: 0 3px 15px rgba(0,0,0,0.1);
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
