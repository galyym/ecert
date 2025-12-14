<footer id="footer" class="footer light-background">
    <div class="container">
        <div class="row gy-4">

            <!-- Company Info -->
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="{{ route('home') }}" class="logo d-flex align-items-center">
                    <span class="sitename">ТОО ВсеСтрой</span>
                </a>
                <div class="footer-contact pt-3">
                    <p class="mt-3">
                        {{ __('messages.company_description') }}
                    </p>
                    <p class="mt-3">
                        <strong>{{ __('messages.phone') }}:</strong> <span>+7 (702) 912-23-00</span><br>
                        <strong>{{ __('messages.email') }}:</strong> <span>ermek_ospanov@mail.ru</span><br>
                    </p>
                </div>
            </div>

            <!-- Services -->
            <div class="col-lg-2 col-md-3 footer-links">
                <h4>{{ __('messages.services') }}</h4>
                <ul>
                    <li><a href="{{ route('services') }}#attestation">{{ __('messages.attestation') }}</a></li>
                    <li><a href="{{ route('services') }}#accreditation">{{ __('messages.accreditation') }}</a></li>
                    <li><a href="{{ route('services') }}#training">{{ __('messages.training') }}</a></li>
                    <li><a href="{{ route('services') }}#safety">{{ __('messages.industrial_safety') }}</a></li>
                </ul>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-md-3 footer-links">
                <h4>{{ __('messages.links') }}</h4>
                <ul>
                    <li><a href="{{ route('home') }}">{{ __('messages.home') }}</a></li>
                    <li><a href="{{ route('about') }}">{{ __('messages.about') }}</a></li>
                    <li><a href="{{ route('projects.index') }}">{{ __('messages.projects') }}</a></li>
                    <li><a href="{{ route('news.index') }}">{{ __('messages.news') }}</a></li>
                    <li><a href="{{ route('contact') }}">{{ __('messages.contacts') }}</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-4 col-md-6 footer-contact">
                <h4>{{ __('messages.contacts') }}</h4>
                <p>
                    <i class="bi bi-geo-alt-fill"></i>
                    {!! __('messages.address_text') !!}<br><br>
                    <i class="bi bi-telephone-fill"></i> +7 (702) 912-23-00<br>
                    <i class="bi bi-envelope-fill"></i> ermek_ospanov@mail.ru<br>
                </p>

                <div class="social-links d-flex mt-4">
                    <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>
            © <span>{{ date('Y') }}</span>
            <strong class="px-1 sitename">ТОО ВсеСтрой</strong>
            <span>{{ __('messages.all_rights_reserved') }}</span>
        </p>
        <div class="footer-lang-switcher mt-2">
            <a href="{{ route('lang.switch', 'kk') }}" class="lang-link {{ app()->getLocale() == 'kk' ? 'active' : '' }}">Қазақша</a>
            <span class="mx-2">|</span>
            <a href="{{ route('lang.switch', 'en') }}" class="lang-link {{ app()->getLocale() == 'en' ? 'active' : '' }}">English</a>
            <span class="mx-2">|</span>
            <a href="{{ route('lang.switch', 'ru') }}" class="lang-link {{ app()->getLocale() == 'ru' ? 'active' : '' }}">Русский</a>
        </div>
    </div>
</footer>