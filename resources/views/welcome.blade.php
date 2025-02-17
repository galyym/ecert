<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Index - iLanding Bootstrap Template</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

    <!-- =======================================================
    * Template Name: iLanding
    * Template URL: https://bootstrapmade.com/ilanding-bootstrap-landing-page-template/
    * Updated: Nov 12 2024 with Bootstrap v5.3.3
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body class="index-page">

<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto me-xl-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1 class="sitename">VSESTROI</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="#hero" class="active">Главная страница</a></li>
                <li><a href="#about">О нас</a></li>
                <li><a href="#features">Поиск аттестата</a></li>
                <li><a href="#services">Услуги</a></li>
                <li><a href="#contact">Контакты</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="btn-getstarted" href="{{ route('home') }}#about">Оставить заявку</a>

    </div>
</header>

<main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
                        <div class="company-badge mb-4">
                            <i class="bi bi-gear-fill me-2"></i>
                            Работаем для вашего успеха
                        </div>

                        <h1 class="mb-5">
                            Аттестация инженерно- <br>
                            технических <br>
                            <span class="accent-text">работников</span>
                        </h1>

                        <p class="mb-4 mb-md-5">
                            Аттестация инженерно-технических работников,
                            участвующих в процессе проектирования и строительства
                        </p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">
                        <img src="{{ asset('assets/img/illustration-1.webp') }}" alt="Hero Image" class="img-fluid">
                    </div>
                </div>
            </div>

            <div class="row stats-row gy-4 mt-5" data-aos="fade-up" data-aos-delay="500">
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
                            <h4>1 000 сертифицированных инженеров</h4>
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
                            <h4>5+ лет опыта</h4>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4 align-items-center justify-content-between">

                <div class="col-xl-5" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="about-title">НАША КОМАНДА — ВАША НАДЕЖНОСТЬ</h2>
                    <p class="about-description">ТОО VseStroi — ваш надежный партнёр в сфере аттестации и сертификации с 2019 года. Несмотря на молодой возраст, мы уже заслужили доверие сотен компаний Казахстана благодаря профессионализму, оперативности и строгому соблюдению стандартов. Каждый наш эксперт проходит ежегодную аттестацию, чтобы гарантировать вам актуальные знания и соответствие международным стандартам.</p>

                    <div class="row feature-list-wrapper">
                        <div class="col-md-6">
                            <ul class="feature-list">
                                <li><i class="bi bi-check-circle-fill"></i> Аттестация за 5 рабочих дней</li>
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

                    <div class="info-wrapper">
                        <div class="row gy-4">
                            <div class="col-lg-7">
                                <div class="contact-info d-flex align-items-center gap-2">
                                    <i class="bi bi-telephone-fill"></i>
                                    <div>
                                        <p class="contact-label">Контакты</p>
                                        <p class="contact-number">+7 (777) 555-12-34</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="image-wrapper">
                        <div class="images position-relative" data-aos="zoom-out" data-aos-delay="400">
                            <img src=" {{asset('assets/img/about-5.webp') }}" alt="Business Meeting" class="img-fluid main-image rounded-4">
                            <img src=" {{asset('assets/img/about-2.webp') }}" alt="Team Discussion" class="img-fluid small-image rounded-4">
                        </div>
                        <div class="experience-badge floating">
                            <h3>5+ лет</h3>
                            <p>Профессионализм в бизнес-услугах</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /About Section -->

{{--    <!-- Features Cards Section -->--}}
{{--    <section id="features-cards" class="features-cards section">--}}

{{--        <div class="container">--}}

{{--            <div class="row gy-4">--}}

{{--                <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">--}}
{{--                    <div class="feature-box orange">--}}
{{--                        <i class="bi bi-award"></i>--}}
{{--                        <h4>Corporis voluptates</h4>--}}
{{--                        <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>--}}
{{--                    </div>--}}
{{--                </div><!-- End Feature Borx-->--}}

{{--                <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">--}}
{{--                    <div class="feature-box blue">--}}
{{--                        <i class="bi bi-patch-check"></i>--}}
{{--                        <h4>Explicabo consectetur</h4>--}}
{{--                        <p>Est autem dicta beatae suscipit. Sint veritatis et sit quasi ab aut inventore</p>--}}
{{--                    </div>--}}
{{--                </div><!-- End Feature Borx-->--}}

{{--                <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">--}}
{{--                    <div class="feature-box green">--}}
{{--                        <i class="bi bi-sunrise"></i>--}}
{{--                        <h4>Ullamco laboris</h4>--}}
{{--                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>--}}
{{--                    </div>--}}
{{--                </div><!-- End Feature Borx-->--}}

{{--                <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">--}}
{{--                    <div class="feature-box red">--}}
{{--                        <i class="bi bi-shield-check"></i>--}}
{{--                        <h4>Labore consequatur</h4>--}}
{{--                        <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>--}}
{{--                    </div>--}}
{{--                </div><!-- End Feature Borx-->--}}

{{--            </div>--}}

{{--        </div>--}}

{{--    </section><!-- /Features Cards Section -->--}}
{{--    --}}
{{--    <!-- Call To Action Section -->--}}
{{--    <section id="call-to-action" class="call-to-action section">--}}

{{--        <div class="container" data-aos="fade-up" data-aos-delay="100">--}}

{{--            <div class="row content justify-content-center align-items-center position-relative">--}}
{{--                <div class="col-lg-8 mx-auto text-center">--}}
{{--                    <h2 class="display-4 mb-4">Maecenas tempus tellus eget condimentum</h2>--}}
{{--                    <p class="mb-4">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel</p>--}}
{{--                    <a href="#" class="btn btn-cta">Call To Action</a>--}}
{{--                </div>--}}

{{--                <!-- Abstract Background Elements -->--}}
{{--                <div class="shape shape-1">--}}
{{--                    <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">--}}
{{--                        <path d="M47.1,-57.1C59.9,-45.6,68.5,-28.9,71.4,-10.9C74.2,7.1,71.3,26.3,61.5,41.1C51.7,55.9,35,66.2,16.9,69.2C-1.3,72.2,-21,67.8,-36.9,57.9C-52.8,48,-64.9,32.6,-69.1,15.1C-73.3,-2.4,-69.5,-22,-59.4,-37.1C-49.3,-52.2,-32.8,-62.9,-15.7,-64.9C1.5,-67,34.3,-68.5,47.1,-57.1Z" transform="translate(100 100)"></path>--}}
{{--                    </svg>--}}
{{--                </div>--}}

{{--                <div class="shape shape-2">--}}
{{--                    <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">--}}
{{--                        <path d="M41.3,-49.1C54.4,-39.3,66.6,-27.2,71.1,-12.1C75.6,3,72.4,20.9,63.3,34.4C54.2,47.9,39.2,56.9,23.2,62.3C7.1,67.7,-10,69.4,-24.8,64.1C-39.7,58.8,-52.3,46.5,-60.1,31.5C-67.9,16.4,-70.9,-1.4,-66.3,-16.6C-61.8,-31.8,-49.7,-44.3,-36.3,-54C-22.9,-63.7,-8.2,-70.6,3.6,-75.1C15.4,-79.6,28.2,-58.9,41.3,-49.1Z" transform="translate(100 100)"></path>--}}
{{--                    </svg>--}}
{{--                </div>--}}

{{--                <!-- Dot Pattern Groups -->--}}
{{--                <div class="dots dots-1">--}}
{{--                    <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">--}}
{{--                        <pattern id="dot-pattern" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">--}}
{{--                            <circle cx="2" cy="2" r="2" fill="currentColor"></circle>--}}
{{--                        </pattern>--}}
{{--                        <rect width="100" height="100" fill="url(#dot-pattern)"></rect>--}}
{{--                    </svg>--}}
{{--                </div>--}}

{{--                <div class="dots dots-2">--}}
{{--                    <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">--}}
{{--                        <pattern id="dot-pattern-2" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">--}}
{{--                            <circle cx="2" cy="2" r="2" fill="currentColor"></circle>--}}
{{--                        </pattern>--}}
{{--                        <rect width="100" height="100" fill="url(#dot-pattern-2)"></rect>--}}
{{--                    </svg>--}}
{{--                </div>--}}

{{--                <div class="shape shape-3">--}}
{{--                    <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">--}}
{{--                        <path d="M43.3,-57.1C57.4,-46.5,71.1,-32.6,75.3,-16.2C79.5,0.2,74.2,19.1,65.1,35.3C56,51.5,43.1,65,27.4,71.7C11.7,78.4,-6.8,78.3,-23.9,72.4C-41,66.5,-56.7,54.8,-65.4,39.2C-74.1,23.6,-75.8,4,-71.7,-13.2C-67.6,-30.4,-57.7,-45.2,-44.3,-56.1C-30.9,-67,-15.5,-74,0.7,-74.9C16.8,-75.8,33.7,-70.7,43.3,-57.1Z" transform="translate(100 100)"></path>--}}
{{--                    </svg>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}

{{--    </section><!-- /Call To Action Section -->--}}

{{--    <!-- Clients Section -->--}}
{{--    <section id="clients" class="clients section">--}}

{{--        <div class="container" data-aos="fade-up" data-aos-delay="100">--}}

{{--            <div class="swiper init-swiper">--}}
{{--                <script type="application/json" class="swiper-config">--}}
{{--                    {--}}
{{--                      "loop": true,--}}
{{--                      "speed": 600,--}}
{{--                      "autoplay": {--}}
{{--                        "delay": 5000--}}
{{--                      },--}}
{{--                      "slidesPerView": "auto",--}}
{{--                      "pagination": {--}}
{{--                        "el": ".swiper-pagination",--}}
{{--                        "type": "bullets",--}}
{{--                        "clickable": true--}}
{{--                      },--}}
{{--                      "breakpoints": {--}}
{{--                        "320": {--}}
{{--                          "slidesPerView": 2,--}}
{{--                          "spaceBetween": 40--}}
{{--                        },--}}
{{--                        "480": {--}}
{{--                          "slidesPerView": 3,--}}
{{--                          "spaceBetween": 60--}}
{{--                        },--}}
{{--                        "640": {--}}
{{--                          "slidesPerView": 4,--}}
{{--                          "spaceBetween": 80--}}
{{--                        },--}}
{{--                        "992": {--}}
{{--                          "slidesPerView": 6,--}}
{{--                          "spaceBetween": 120--}}
{{--                        }--}}
{{--                      }--}}
{{--                    }--}}
{{--                </script>--}}
{{--                <div class="swiper-wrapper align-items-center">--}}
{{--                    <div class="swiper-slide"><img src="{{ asset('assets/img/clients/client-1.png') }}" class="img-fluid" alt=""></div>--}}
{{--                    <div class="swiper-slide"><img src="{{ asset('assets/img/clients/client-2.png') }}" class="img-fluid" alt=""></div>--}}
{{--                    <div class="swiper-slide"><img src="{{ asset('assets/img/clients/client-3.png') }}" class="img-fluid" alt=""></div>--}}
{{--                    <div class="swiper-slide"><img src="{{ asset('assets/img/clients/client-4.png') }}" class="img-fluid" alt=""></div>--}}
{{--                    <div class="swiper-slide"><img src="{{ asset('assets/img/clients/client-5.png') }}" class="img-fluid" alt=""></div>--}}
{{--                    <div class="swiper-slide"><img src="{{ asset('assets/img/clients/client-6.png') }}" class="img-fluid" alt=""></div>--}}
{{--                    <div class="swiper-slide"><img src="{{ asset('assets/img/clients/client-7.png') }}" class="img-fluid" alt=""></div>--}}
{{--                    <div class="swiper-slide"><img src="{{ asset('assets/img/clients/client-8.png') }}" class="img-fluid" alt=""></div>--}}
{{--                </div>--}}
{{--                <div class="swiper-pagination"></div>--}}
{{--            </div>--}}

{{--        </div>--}}

{{--    </section><!-- /Clients Section -->--}}

{{--    <!-- Testimonials Section -->--}}
{{--    <section id="testimonials" class="testimonials section light-background">--}}

{{--        <!-- Section Title -->--}}
{{--        <div class="container section-title" data-aos="fade-up">--}}
{{--            <h2>Testimonials</h2>--}}
{{--            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>--}}
{{--        </div><!-- End Section Title -->--}}

{{--        <div class="container">--}}

{{--            <div class="row g-5">--}}

{{--                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">--}}
{{--                    <div class="testimonial-item">--}}
{{--                        <img src="{{ asset('assets/img/testimonials/testimonials-1.jpg') }}" class="testimonial-img" alt="">--}}
{{--                        <h3>Saul Goodman</h3>--}}
{{--                        <h4>Ceo &amp; Founder</h4>--}}
{{--                        <div class="stars">--}}
{{--                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>--}}
{{--                        </div>--}}
{{--                        <p>--}}
{{--                            <i class="bi bi-quote quote-icon-left"></i>--}}
{{--                            <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.</span>--}}
{{--                            <i class="bi bi-quote quote-icon-right"></i>--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div><!-- End testimonial item -->--}}

{{--                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">--}}
{{--                    <div class="testimonial-item">--}}
{{--                        <img src="{{ asset('assets/img/testimonials/testimonials-2.jpg') }}" class="testimonial-img" alt="">--}}
{{--                        <h3>Sara Wilsson</h3>--}}
{{--                        <h4>Designer</h4>--}}
{{--                        <div class="stars">--}}
{{--                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>--}}
{{--                        </div>--}}
{{--                        <p>--}}
{{--                            <i class="bi bi-quote quote-icon-left"></i>--}}
{{--                            <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.</span>--}}
{{--                            <i class="bi bi-quote quote-icon-right"></i>--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div><!-- End testimonial item -->--}}

{{--                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">--}}
{{--                    <div class="testimonial-item">--}}
{{--                        <img src="{{ asset('assets/img/testimonials/testimonials-3.jpg') }}" class="testimonial-img" alt="">--}}
{{--                        <h3>Jena Karlis</h3>--}}
{{--                        <h4>Store Owner</h4>--}}
{{--                        <div class="stars">--}}
{{--                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>--}}
{{--                        </div>--}}
{{--                        <p>--}}
{{--                            <i class="bi bi-quote quote-icon-left"></i>--}}
{{--                            <span>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.</span>--}}
{{--                            <i class="bi bi-quote quote-icon-right"></i>--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div><!-- End testimonial item -->--}}

{{--                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">--}}
{{--                    <div class="testimonial-item">--}}
{{--                        <img src="{{ asset('assets/img/testimonials/testimonials-4.jpg') }}" class="testimonial-img" alt="">--}}
{{--                        <h3>Matt Brandon</h3>--}}
{{--                        <h4>Freelancer</h4>--}}
{{--                        <div class="stars">--}}
{{--                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>--}}
{{--                        </div>--}}
{{--                        <p>--}}
{{--                            <i class="bi bi-quote quote-icon-left"></i>--}}
{{--                            <span>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.</span>--}}
{{--                            <i class="bi bi-quote quote-icon-right"></i>--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div><!-- End testimonial item -->--}}

{{--            </div>--}}

{{--        </div>--}}

{{--    </section><!-- /Testimonials Section -->--}}

    <!-- Stats Section -->
{{--    <section id="stats" class="stats section">--}}

{{--        <div class="container" data-aos="fade-up" data-aos-delay="100">--}}

{{--            <div class="row gy-4">--}}

{{--                <div class="col-lg-3 col-md-6">--}}
{{--                    <div class="stats-item text-center w-100 h-100">--}}
{{--                        <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>--}}
{{--                        <p>Clients</p>--}}
{{--                    </div>--}}
{{--                </div><!-- End Stats Item -->--}}

{{--                <div class="col-lg-3 col-md-6">--}}
{{--                    <div class="stats-item text-center w-100 h-100">--}}
{{--                        <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>--}}
{{--                        <p>Projects</p>--}}
{{--                    </div>--}}
{{--                </div><!-- End Stats Item -->--}}

{{--                <div class="col-lg-3 col-md-6">--}}
{{--                    <div class="stats-item text-center w-100 h-100">--}}
{{--                        <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>--}}
{{--                        <p>Hours Of Support</p>--}}
{{--                    </div>--}}
{{--                </div><!-- End Stats Item -->--}}

{{--                <div class="col-lg-3 col-md-6">--}}
{{--                    <div class="stats-item text-center w-100 h-100">--}}
{{--                        <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span>--}}
{{--                        <p>Workers</p>--}}
{{--                    </div>--}}
{{--                </div><!-- End Stats Item -->--}}

{{--            </div>--}}

{{--        </div>--}}

{{--    </section><!-- /Stats Section -->--}}

    <!-- Services Section -->

    <section id="services" class="services section light-background">

        <!-- Заголовок секции -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Услуги</h2>
            <p>Полный спектр услуг для юридических лиц и специалистов</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-4">

                <!-- Карточка: Аттестация -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-card">
                        <div class="icon-header d-flex align-items-center">
                            <div class="icon flex-shrink-0">
                                <i class="bi bi-file-earmark-medical"></i>
                            </div>
                            <h3>Аттестация</h3>
                        </div>
                        <ul class="service-list">
                            <li>Аттестация инженерно-технических работников (проектирование и строительство)</li>
                            <li>Аттестат на право работ в области промышленной безопасности</li>
                            <li>Экспертиза градостроительной и проектной документации</li>
                            <li>Технический и авторский надзор</li>
                            <li>Обследование надежности зданий и сооружений</li>
                        </ul>
                    </div>
                </div>

                <!-- Карточка: Аккредитация -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-card">
                        <div class="icon-header d-flex align-items-center">
                            <div class="icon flex-shrink-0">
                                <i class="bi bi-award"></i>
                            </div>
                            <h3>Аккредитация</h3>
                        </div>
                        <ul class="service-list">
                            <li>Аккредитация организаций в сфере управления проектами</li>
                            <li>Аккредитация для технического надзора (1-2 уровень ответственности)</li>
                            <li>Комплексная вневедомственная экспертиза объектов</li>
                        </ul>
                    </div>
                </div>

                <!-- Карточка: Лицензирование -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-card">
                        <div class="icon-header d-flex align-items-center">
                            <div class="icon flex-shrink-0">
                                <i class="bi bi-card-checklist"></i>
                            </div>
                            <h3>Лицензирование</h3>
                        </div>
                        <ul class="service-list">
                            <li>Изыскательская деятельность</li>
                            <li>Лицензии на проектирование I-III категорий</li>
                            <li>Лицензии на строительно-монтажные работы I-III категорий</li>
                            <li>Работы в области охраны окружающей среды</li>
                        </ul>
                    </div>
                </div>

                <!-- Карточка: Промышленная безопасность -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-card">
                        <div class="icon-header d-flex align-items-center">
                            <div class="icon flex-shrink-0">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <h3>Промышленная безопасность</h3>
                        </div>
                        <ul class="service-list">
                            <li>Обучение и переподготовка специалистов</li>
                            <li>Пожарно-технический минимум</li>
                            <li>Электробезопасность и работы на высоте</li>
                            <li>Программы с отрывом/без отрыва от производства</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Pricing Section -->
{{--    <section id="pricing" class="pricing section light-background">--}}

{{--        <!-- Section Title -->--}}
{{--        <div class="container section-title" data-aos="fade-up">--}}
{{--            <h2>Pricing</h2>--}}
{{--            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>--}}
{{--        </div><!-- End Section Title -->--}}

{{--        <div class="container" data-aos="fade-up" data-aos-delay="100">--}}

{{--            <div class="row g-4 justify-content-center">--}}

{{--                <!-- Basic Plan -->--}}
{{--                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">--}}
{{--                    <div class="pricing-card">--}}
{{--                        <h3>Basic Plan</h3>--}}
{{--                        <div class="price">--}}
{{--                            <span class="currency">$</span>--}}
{{--                            <span class="amount">9.9</span>--}}
{{--                            <span class="period">/ month</span>--}}
{{--                        </div>--}}
{{--                        <p class="description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam.</p>--}}

{{--                        <h4>Featured Included:</h4>--}}
{{--                        <ul class="features-list">--}}
{{--                            <li>--}}
{{--                                <i class="bi bi-check-circle-fill"></i>--}}
{{--                                Duis aute irure dolor--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <i class="bi bi-check-circle-fill"></i>--}}
{{--                                Excepteur sint occaecat--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <i class="bi bi-check-circle-fill"></i>--}}
{{--                                Nemo enim ipsam voluptatem--}}
{{--                            </li>--}}
{{--                        </ul>--}}

{{--                        <a href="#" class="btn btn-primary">--}}
{{--                            Buy Now--}}
{{--                            <i class="bi bi-arrow-right"></i>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <!-- Standard Plan -->--}}
{{--                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">--}}
{{--                    <div class="pricing-card popular">--}}
{{--                        <div class="popular-badge">Most Popular</div>--}}
{{--                        <h3>Standard Plan</h3>--}}
{{--                        <div class="price">--}}
{{--                            <span class="currency">$</span>--}}
{{--                            <span class="amount">19.9</span>--}}
{{--                            <span class="period">/ month</span>--}}
{{--                        </div>--}}
{{--                        <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum.</p>--}}

{{--                        <h4>Featured Included:</h4>--}}
{{--                        <ul class="features-list">--}}
{{--                            <li>--}}
{{--                                <i class="bi bi-check-circle-fill"></i>--}}
{{--                                Lorem ipsum dolor sit amet--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <i class="bi bi-check-circle-fill"></i>--}}
{{--                                Consectetur adipiscing elit--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <i class="bi bi-check-circle-fill"></i>--}}
{{--                                Sed do eiusmod tempor--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <i class="bi bi-check-circle-fill"></i>--}}
{{--                                Ut labore et dolore magna--}}
{{--                            </li>--}}
{{--                        </ul>--}}

{{--                        <a href="#" class="btn btn-light">--}}
{{--                            Buy Now--}}
{{--                            <i class="bi bi-arrow-right"></i>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <!-- Premium Plan -->--}}
{{--                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">--}}
{{--                    <div class="pricing-card">--}}
{{--                        <h3>Premium Plan</h3>--}}
{{--                        <div class="price">--}}
{{--                            <span class="currency">$</span>--}}
{{--                            <span class="amount">39.9</span>--}}
{{--                            <span class="period">/ month</span>--}}
{{--                        </div>--}}
{{--                        <p class="description">Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae.</p>--}}

{{--                        <h4>Featured Included:</h4>--}}
{{--                        <ul class="features-list">--}}
{{--                            <li>--}}
{{--                                <i class="bi bi-check-circle-fill"></i>--}}
{{--                                Temporibus autem quibusdam--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <i class="bi bi-check-circle-fill"></i>--}}
{{--                                Saepe eveniet ut et voluptates--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <i class="bi bi-check-circle-fill"></i>--}}
{{--                                Nam libero tempore soluta--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <i class="bi bi-check-circle-fill"></i>--}}
{{--                                Cumque nihil impedit quo--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <i class="bi bi-check-circle-fill"></i>--}}
{{--                                Maxime placeat facere possimus--}}
{{--                            </li>--}}
{{--                        </ul>--}}

{{--                        <a href="#" class="btn btn-primary">--}}
{{--                            Buy Now--}}
{{--                            <i class="bi bi-arrow-right"></i>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}

{{--        </div>--}}

{{--    </section><!-- /Pricing Section -->--}}

{{--    <!-- Faq Section -->--}}
{{--    <section class="faq-9 faq section light-background" id="faq">--}}

{{--        <div class="container">--}}
{{--            <div class="row">--}}

{{--                <div class="col-lg-5" data-aos="fade-up">--}}
{{--                    <h2 class="faq-title">Have a question? Check out the FAQ</h2>--}}
{{--                    <p class="faq-description">Maecenas tempus tellus eget condimentum rhoncus sem quam semper libero sit amet adipiscing sem neque sed ipsum.</p>--}}
{{--                    <div class="faq-arrow d-none d-lg-block" data-aos="fade-up" data-aos-delay="200">--}}
{{--                        <svg class="faq-arrow" width="200" height="211" viewBox="0 0 200 211" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                            <path d="M198.804 194.488C189.279 189.596 179.529 185.52 169.407 182.07L169.384 182.049C169.227 181.994 169.07 181.939 168.912 181.884C166.669 181.139 165.906 184.546 167.669 185.615C174.053 189.473 182.761 191.837 189.146 195.695C156.603 195.912 119.781 196.591 91.266 179.049C62.5221 161.368 48.1094 130.695 56.934 98.891C84.5539 98.7247 112.556 84.0176 129.508 62.667C136.396 53.9724 146.193 35.1448 129.773 30.2717C114.292 25.6624 93.7109 41.8875 83.1971 51.3147C70.1109 63.039 59.63 78.433 54.2039 95.0087C52.1221 94.9842 50.0776 94.8683 48.0703 94.6608C30.1803 92.8027 11.2197 83.6338 5.44902 65.1074C-1.88449 41.5699 14.4994 19.0183 27.9202 1.56641C28.6411 0.625793 27.2862 -0.561638 26.5419 0.358501C13.4588 16.4098 -0.221091 34.5242 0.896608 56.5659C1.8218 74.6941 14.221 87.9401 30.4121 94.2058C37.7076 97.0203 45.3454 98.5003 53.0334 98.8449C47.8679 117.532 49.2961 137.487 60.7729 155.283C87.7615 197.081 139.616 201.147 184.786 201.155L174.332 206.827C172.119 208.033 174.345 211.287 176.537 210.105C182.06 207.125 187.582 204.122 193.084 201.144C193.346 201.147 195.161 199.887 195.423 199.868C197.08 198.548 193.084 201.144 195.528 199.81C196.688 199.192 197.846 198.552 199.006 197.935C200.397 197.167 200.007 195.087 198.804 194.488ZM60.8213 88.0427C67.6894 72.648 78.8538 59.1566 92.1207 49.0388C98.8475 43.9065 106.334 39.2953 114.188 36.1439C117.295 34.8947 120.798 33.6609 124.168 33.635C134.365 33.5511 136.354 42.9911 132.638 51.031C120.47 77.4222 86.8639 93.9837 58.0983 94.9666C58.8971 92.6666 59.783 90.3603 60.8213 88.0427Z" fill="currentColor"></path>--}}
{{--                        </svg>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-lg-7" data-aos="fade-up" data-aos-delay="300">--}}
{{--                    <div class="faq-container">--}}

{{--                        <div class="faq-item faq-active">--}}
{{--                            <h3>Non consectetur a erat nam at lectus urna duis?</h3>--}}
{{--                            <div class="faq-content">--}}
{{--                                <p>Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.</p>--}}
{{--                            </div>--}}
{{--                            <i class="faq-toggle bi bi-chevron-right"></i>--}}
{{--                        </div><!-- End Faq item-->--}}

{{--                        <div class="faq-item">--}}
{{--                            <h3>Feugiat scelerisque varius morbi enim nunc faucibus?</h3>--}}
{{--                            <div class="faq-content">--}}
{{--                                <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>--}}
{{--                            </div>--}}
{{--                            <i class="faq-toggle bi bi-chevron-right"></i>--}}
{{--                        </div><!-- End Faq item-->--}}

{{--                        <div class="faq-item">--}}
{{--                            <h3>Dolor sit amet consectetur adipiscing elit pellentesque?</h3>--}}
{{--                            <div class="faq-content">--}}
{{--                                <p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis</p>--}}
{{--                            </div>--}}
{{--                            <i class="faq-toggle bi bi-chevron-right"></i>--}}
{{--                        </div><!-- End Faq item-->--}}

{{--                        <div class="faq-item">--}}
{{--                            <h3>Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?</h3>--}}
{{--                            <div class="faq-content">--}}
{{--                                <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>--}}
{{--                            </div>--}}
{{--                            <i class="faq-toggle bi bi-chevron-right"></i>--}}
{{--                        </div><!-- End Faq item-->--}}

{{--                        <div class="faq-item">--}}
{{--                            <h3>Tempus quam pellentesque nec nam aliquam sem et tortor?</h3>--}}
{{--                            <div class="faq-content">--}}
{{--                                <p>Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in</p>--}}
{{--                            </div>--}}
{{--                            <i class="faq-toggle bi bi-chevron-right"></i>--}}
{{--                        </div><!-- End Faq item-->--}}

{{--                        <div class="faq-item">--}}
{{--                            <h3>Perspiciatis quod quo quos nulla quo illum ullam?</h3>--}}
{{--                            <div class="faq-content">--}}
{{--                                <p>Enim ea facilis quaerat voluptas quidem et dolorem. Quis et consequatur non sed in suscipit sequi. Distinctio ipsam dolore et.</p>--}}
{{--                            </div>--}}
{{--                            <i class="faq-toggle bi bi-chevron-right"></i>--}}
{{--                        </div><!-- End Faq item-->--}}

{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </section><!-- /Faq Section -->--}}

    <!-- Call To Action 2 Section -->

    <!-- Секция "Наши клиенты" -->
    <section class="clients-section">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Наши клиенты</h2>

            <!-- Бегущая строка с логотипами -->
            <div class="logos-scroll-container">
                <div class="logos-track">
                    <!-- Первый набор логотипов -->
                    <div class="logo-item">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Логотип клиента">
                    </div>
                    <div class="logo-item">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Логотип клиента">
                    </div>
                    <div class="logo-item">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Логотип клиента">
                    </div><div class="logo-item">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Логотип клиента">
                    </div><div class="logo-item">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Логотип клиента">
                    </div><div class="logo-item">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Логотип клиента">
                    </div><div class="logo-item">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Логотип клиента">
                    </div><div class="logo-item">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Логотип клиента">
                    </div>
                    <!-- Добавьте остальные логотипы здесь -->

                    <!-- Дубликат для бесконечной анимации -->
                    <div class="logo-item">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Логотип клиента">
                    </div>
                    <div class="logo-item">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Логотип клиента">
                    </div>
                    <div class="logo-item">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Логотип клиента">
                    </div><div class="logo-item">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Логотип клиента">
                    </div><div class="logo-item">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Логотип клиента">
                    </div><div class="logo-item">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Логотип клиента">
                    </div><div class="logo-item">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Логотип клиента">
                    </div><div class="logo-item">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Логотип клиента">
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Contact Section -->
    <section id="contact" class="contact section light-background">

        <!-- Заголовок секции -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Контакты</h2>
            <p>Свяжитесь с нами удобным для вас способом</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-4 g-lg-5">

                <!-- Контактная информация -->
                <div class="col-lg-5">
                    <div class="info-box" data-aos="fade-up" data-aos-delay="200">
                        <h3>Контактные данные</h3>

                        <!-- Адрес -->
                        <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon-box">
                                <i class="bi bi-geo-alt"></i>
                            </div>
                            <div class="content">
                                <h4>Наш адрес</h4>
                                <p>г. Актау, 23а мкр</p>
                                <p>БЦ "АБК", офис 102</p>
                            </div>
                        </div>

                        <!-- Телефон -->
                        <div class="info-item" data-aos="fade-up" data-aos-delay="400">
                            <div class="icon-box">
                                <i class="bi bi-telephone"></i>
                            </div>
                            <div class="content">
                                <h4>Телефон</h4>
                                <p>+7 (777) 123-45-67</p>
                                <p>+7 (7172) 55-88-99</p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="info-item" data-aos="fade-up" data-aos-delay="500">
                            <div class="icon-box">
                                <i class="bi bi-envelope"></i>
                            </div>
                            <div class="content">
                                <h4>Электронная почта</h4>
                                <p>info@vsestroi.kz</p>
                                <p>support@vsestroi.kz</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Карта -->
                <div class="col-lg-7">
                    <div class="map-container" data-aos="fade-up" data-aos-delay="300">
                        <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A2a8fd567db08c1b8152f2963fb3e4ad77faf6e94191026ee87b470e59794d943&amp;source=constructor" width="736" height="407" frameborder="0"></iframe>
                    </div>
                </div>

            </div>
        </div>
    </section><!-- /Contact Section -->


    <!-- Модальное окно -->
    <div id="applicationModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>

            <h2 class="modal-title">Заявка на аттестацию</h2>

            <div class="modal-scrollable">
                <table class="responsive-table">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>* Фамилия</th>
                        <th>* Имя</th>
                        <th>Отчество</th>
                        <th>* ИИН</th>
                        <th>* Вид деятельности</th>
                        <th>* Специальность</th>
                        <th>* Телефон</th>
                        <th>Место работы</th>
                        <th>* Отправитель</th>
                        <th>Документ</th>
                    </tr>
                    </thead>
                    <tbody id="tableOrder">
                    <tr id="row1">
                        <td>1</td>
                        <td><input type="text" class="form-control" name="SecondName" required></td>
                        <td><input type="text" class="form-control" name="FirstName" required></td>
                        <td><input type="text" class="form-control" name="ThirdName"></td>
                        <td><input type="text" class="form-control" name="iinKZ" pattern="\d{12}" required></td>
                        <td>
                            <select class="form-select" name="vd" required>
                                <option value="" disabled selected>Выберите</option>
                                <option value="PD">ПД</option>
                                <option value="SMR">СМР</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-select" name="SpecId" required>
                                <option value="" disabled selected>Выберите</option>
                            </select>
                        </td>
                        <td><input type="tel" class="form-control" name="phone" required></td>
                        <td><input type="text" class="form-control" name="WorkPlace"></td>
                        <td><input type="text" class="form-control" name="senderName" required></td>
                        <td>
                            <div class="documents-container">
                                <div class="document-item">
                                    <input type="text"
                                           class="form-control doc-name"
                                           placeholder="Название документа"
                                           name="docName[]">
                                    <input type="file"
                                           class="form-control doc-file"
                                           name="docFile[]"
                                           accept="image/*,.pdf">
                                </div>
                            </div>
                            <button type="button"
                                    class="btn-add-doc"
                                    onclick="addDocumentField(this)">
                                + Добавить документ
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="modal-actions">
                <button type="button" class="btn btn-secondary" onclick="addRow()">
                    <i class="bi bi-plus-circle"></i> Добавить строку
                </button>
                <button type="button" class="btn btn-primary" onclick="addOrder()">
                    Отправить заявку
                </button>
            </div>
        </div>
    </div>


    <div id="searchModal" class="modal">
        <div class="modal-content" style="max-width: 500px;">
            <span class="close" onclick="closeSearchModal()">&times;</span>
            <h3 class="modal-title">Поиск аттестата</h3>

            <form id="searchForm" onsubmit="handleSearch(event)">
                <div class="form-group">
                    <label>Введите ИИН:</label>
                    <input type="text"
                           class="form-control"
                           name="iin"
                           pattern="\d{12}"
                           maxlength="12"
                           placeholder="000000000000"
                           required>
                </div>

                <div class="modal-actions">
                    <button type="submit" class="btn btn-primary">
                        Поиск
                    </button>
                </div>
            </form>
        </div>
    </div>


</main>

{{--<footer id="footer" class="footer">--}}

{{--    <div class="container footer-top">--}}
{{--        <div class="row gy-4">--}}
{{--            <div class="col-lg-4 col-md-6 footer-about">--}}
{{--                <a href="{{ route('home') }}" class="logo d-flex align-items-center">--}}
{{--                    <span class="sitename">iLanding</span>--}}
{{--                </a>--}}
{{--                <div class="footer-contact pt-3">--}}
{{--                    <p>A108 Adam Street</p>--}}
{{--                    <p>New York, NY 535022</p>--}}
{{--                    <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>--}}
{{--                    <p><strong>Email:</strong> <span>info@example.com</span></p>--}}
{{--                </div>--}}
{{--                <div class="social-links d-flex mt-4">--}}
{{--                    <a href=""><i class="bi bi-twitter-x"></i></a>--}}
{{--                    <a href=""><i class="bi bi-facebook"></i></a>--}}
{{--                    <a href=""><i class="bi bi-instagram"></i></a>--}}
{{--                    <a href=""><i class="bi bi-linkedin"></i></a>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-lg-2 col-md-3 footer-links">--}}
{{--                <h4>Useful Links</h4>--}}
{{--                <ul>--}}
{{--                    <li><a href="#">Home</a></li>--}}
{{--                    <li><a href="#">About us</a></li>--}}
{{--                    <li><a href="#">Services</a></li>--}}
{{--                    <li><a href="#">Terms of service</a></li>--}}
{{--                    <li><a href="#">Privacy policy</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}

{{--            <div class="col-lg-2 col-md-3 footer-links">--}}
{{--                <h4>Our Services</h4>--}}
{{--                <ul>--}}
{{--                    <li><a href="#">Web Design</a></li>--}}
{{--                    <li><a href="#">Web Development</a></li>--}}
{{--                    <li><a href="#">Product Management</a></li>--}}
{{--                    <li><a href="#">Marketing</a></li>--}}
{{--                    <li><a href="#">Graphic Design</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}

{{--            <div class="col-lg-2 col-md-3 footer-links">--}}
{{--                <h4>Hic solutasetp</h4>--}}
{{--                <ul>--}}
{{--                    <li><a href="#">Molestiae accusamus iure</a></li>--}}
{{--                    <li><a href="#">Excepturi dignissimos</a></li>--}}
{{--                    <li><a href="#">Suscipit distinctio</a></li>--}}
{{--                    <li><a href="#">Dilecta</a></li>--}}
{{--                    <li><a href="#">Sit quas consectetur</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}

{{--            <div class="col-lg-2 col-md-3 footer-links">--}}
{{--                <h4>Nobis illum</h4>--}}
{{--                <ul>--}}
{{--                    <li><a href="#">Ipsam</a></li>--}}
{{--                    <li><a href="#">Laudantium dolorum</a></li>--}}
{{--                    <li><a href="#">Dinera</a></li>--}}
{{--                    <li><a href="#">Trodelas</a></li>--}}
{{--                    <li><a href="#">Flexo</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="container copyright text-center mt-4">--}}
{{--        <p>© <span>Copyright</span> <strong class="px-1 sitename">iLanding</strong> <span>All Rights Reserved</span></p>--}}
{{--        <div class="credits">--}}
{{--            <!-- All the links in the footer should remain intact. -->--}}
{{--            <!-- You can delete the links only if you've purchased the pro version. -->--}}
{{--            <!-- Licensing information: https://bootstrapmade.com/license/ -->--}}
{{--            <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->--}}
{{--            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed By <a href="https://themewagon.com">ThemeWagon</a>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--</footer>--}}

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>

<!-- Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>

<script>
    // Открытие модального окна
    document.querySelector('.btn-getstarted').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('applicationModal').style.display = 'block';
    });

    // Закрытие модального окна
    document.querySelector('.close').addEventListener('click', function() {
        document.getElementById('applicationModal').style.display = 'none';
    });

    // Закрытие при клике вне окна
    window.onclick = function(event) {
        if (event.target == document.getElementById('applicationModal')) {
            document.getElementById('applicationModal').style.display = 'none';
        }
    }
</script>

<script>
    // Хранилище данных
    let formData = [];

    // Функция добавления строки
    function addRow() {
        const table = document.getElementById('tableOrder');
        const rows = table.getElementsByTagName('tr');
        const newRow = rows[rows.length - 1].cloneNode(true);

        // Обновляем номер строки
        const newNumber = rows.length + 1;
        newRow.id = `row${newNumber}`;
        newRow.querySelector('td:first-child').textContent = newNumber;

        // Очищаем значения полей
        newRow.querySelectorAll('input').forEach(input => input.value = '');
        newRow.querySelectorAll('select').forEach(select => select.selectedIndex = 0);

        table.appendChild(newRow);
        saveFormData();
    }

    // Сохранение данных
    function saveFormData() {
        formData = [];
        document.querySelectorAll('#tableOrder tr').forEach((row, index) => {
            const docs = [];
            row.querySelectorAll('.document-item').forEach(doc => {
                docs.push({
                    name: doc.querySelector('.doc-name').value,
                    file: doc.querySelector('.doc-file').value
                });
            });

            const data = {
                SecondName: row.querySelector('.SecondName').value,
                FirstName: row.querySelector('.FirstName').value,
                ThirdName: row.querySelector('.ThirdName').value,
                iinKZ: row.querySelector('.iinKZ').value,
                vd: row.querySelector('.vd').value,
                SpecId: row.querySelector('.SpecId').value,
                phone: row.querySelector('.phone').value,
                WorkPlace: row.querySelector('.WorkPlace').value,
                senderName: row.querySelector('.senderName').value,
                docFile: row.querySelector('.docFile').value,
                documents: docs
            };
            formData.push(data);
        });
        localStorage.setItem('savedForm', JSON.stringify(formData));
    }

    // Загрузка данных
    function loadFormData() {
        const savedData = localStorage.getItem('savedForm');
        if (savedData) {
            formData = JSON.parse(savedData);
            formData.forEach((data, index) => {
                if (index > 0) addRow();
                const row = document.getElementById(`row${index + 1}`);

                // Загрузка документов
                if(data.documents) {
                    const container = row.querySelector('.documents-container');
                    container.innerHTML = '';
                    data.documents.forEach((doc, i) => {
                        if(i > 0) addDocumentField(row.querySelector('.btn-add-doc'));
                        const docItem = container.querySelector('.document-item:last-child');
                        docItem.querySelector('.doc-name').value = doc.name;
                        docItem.querySelector('.doc-file').value = doc.file;
                    });
                }
            });
        }
    }

    // Модифицированные функции открытия/закрытия
    document.querySelector('.btn-getstarted').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('applicationModal').style.display = 'block';
        loadFormData(); // Загружаем данные при открытии
    });

    document.querySelector('.close').addEventListener('click', function() {
        saveFormData(); // Сохраняем перед закрытием
        document.getElementById('applicationModal').style.display = 'none';
    });

    // Очистка при отправке
    function addOrder() {
        localStorage.removeItem('savedForm');
        document.getElementById('applicationModal').style.display = 'none';

        document.querySelectorAll('.doc-file').forEach(fileInput => {
            if(fileInput.value && !fileInput.previousElementSibling.value) {
                alert('Укажите название для документа');
                return;
            }
        });

        // Ваша логика отправки
    }

    function addDocumentField(button) {
        const container = button.previousElementSibling;
        const newItem = container.firstElementChild.cloneNode(true);
        newItem.querySelectorAll('input').forEach(input => input.value = '');
        container.appendChild(newItem);
    }
</script>

<script>

    // Открытие модалки поиска
    document.querySelector('a[href="#features"]').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('searchModal').style.display = 'block';
    });

    // Закрытие модалки
    function closeSearchModal() {
        document.getElementById('searchModal').style.display = 'none';
    }

    // Обработка отправки формы
    function handleSearch(e) {
        e.preventDefault();
        const iin = e.target.iin.value;

        // Здесь добавить логику поиска
        console.log('Поиск по ИИН:', iin);

        // Закрыть модалку после отправки
        closeSearchModal();
    }

    // Закрытие при клике вне окна
    window.onclick = function(event) {
        if (event.target == document.getElementById('searchModal')) {
            closeSearchModal();
        }
    }

</script>

</body>

</html>
