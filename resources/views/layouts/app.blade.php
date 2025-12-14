<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', __('messages.company_name') . ' - ' . __('messages.certification'))</title>
    <meta name="description" content="@yield('meta_description', __('messages.company_description'))">
    <meta name="keywords" content="@yield('meta_keywords', 'аттестация, сертификация, инженеры, строительство, промышленная безопасность, ТОО ВсеСтрой, Казахстан')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="ТОО ВсеСтрой">
    <meta name="robots" content="index, follow">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Hreflang tags for multilingual SEO -->
    @php
    $currentUrl = url()->current();
    $baseUrl = 'https://vsestroi.kz';
    $currentPath = parse_url($currentUrl, PHP_URL_PATH) ?? '/';
    @endphp
    <link rel="alternate" hreflang="kk" href="{{ $baseUrl . $currentPath }}?lang=kk">
    <link rel="alternate" hreflang="ru" href="{{ $baseUrl . $currentPath }}?lang=ru">
    <link rel="alternate" hreflang="en" href="{{ $baseUrl . $currentPath }}?lang=en">
    <link rel="alternate" hreflang="x-default" href="{{ $baseUrl . $currentPath }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', __('messages.company_name') . ' - ' . __('messages.certification'))">
    <meta property="og:description" content="@yield('meta_description', __('messages.company_description'))">
    <meta property="og:image" content="{{ asset('assets/img/og-image.jpg') }}">
    <meta property="og:locale" content="{{ app()->getLocale() == 'kk' ? 'kk_KZ' : (app()->getLocale() == 'ru' ? 'ru_RU' : 'en_US') }}">
    <meta property="og:site_name" content="ТОО ВсеСтрой">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="@yield('title', __('messages.company_name') . ' - ' . __('messages.certification'))">
    <meta name="twitter:description" content="@yield('meta_description', __('messages.company_description'))">
    <meta name="twitter:image" content="{{ asset('assets/img/og-image.jpg') }}">

    <!-- Schema.org Structured Data -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "ТОО ВсеСтрой",
            "alternateName": "VseStroi",
            "url": "https://vsestroi.kz",
            "logo": "{{ asset('assets/img/logo.png') }}",
            "description": "{{ __('messages.company_description') }}",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "{{ __('messages.address') }}",
                "addressLocality": "Алматы",
                "addressCountry": "KZ"
            },
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "+7-700-912-2300",
                "contactType": "customer service",
                "availableLanguage": ["Kazakh", "Russian", "English"]
            },
            "sameAs": []
        }
    </script>

    <!-- Favicon -->
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link href="{{ asset('assets/img/favicon.ico') }}" rel="icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

    <!-- Corporate CSS -->
    <link href="{{ asset('assets/css/corporate.css') }}" rel="stylesheet">

    @stack('styles')
</head>

<body class="@yield('body_class', 'page')">

    <!-- Header -->
    @include('components.header')

    <!-- Main Content -->
    <main class="main">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('components.footer')

    <!-- Back to top button -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Modals -->
    @include('components.modals')

    <!-- Vendor JS Files -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>

    <!-- Theme JS -->
    <script src="{{ asset('assets/js/theme.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    @stack('scripts')
</body>

</html>