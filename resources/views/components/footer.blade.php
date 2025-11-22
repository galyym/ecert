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
                        Профессиональная аттестация инженерно-технических работников. 
                        Качественные услуги сертификации с 2013 года.
                    </p>
                    <p class="mt-3">
                        <strong>Телефон:</strong> <span>+7 (702) 912-23-00</span><br>
                        <strong>Email:</strong> <span>ermek_ospanov@mail.ru</span><br>
                    </p>
                </div>
            </div>

            <!-- Services -->
            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Услуги</h4>
                <ul>
                    <li><a href="{{ route('services') }}#attestation">Аттестация</a></li>
                    <li><a href="{{ route('services') }}#accreditation">Аккредитация</a></li>
                    <li><a href="{{ route('services') }}#training">Обучение</a></li>
                    <li><a href="{{ route('services') }}#safety">Промышленная безопасность</a></li>
                </ul>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Ссылки</h4>
                <ul>
                    <li><a href="{{ route('home') }}">Главная</a></li>
                    <li><a href="{{ route('about') }}">О компании</a></li>
                    <li><a href="{{ route('projects.index') }}">Проекты</a></li>
                    <li><a href="{{ route('news.index') }}">Новости</a></li>
                    <li><a href="{{ route('contact') }}">Контакты</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-4 col-md-6 footer-contact">
                <h4>Контакты</h4>
                <p>
                    <i class="bi bi-geo-alt-fill"></i>
                    г. Актау, 29а мкр, 145<br>
                    БЦ "АБК", офис 103<br><br>
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
            <span>Все права защищены</span>
        </p>
        <div class="credits">
            Разработано с <i class="bi bi-heart-fill text-danger"></i> для качественной аттестации
        </div>
    </div>
</footer>
