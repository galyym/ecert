<footer id="footer" class="footer">
    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="{{ route('home') }}" class="d-flex align-items-center">
                    <span class="sitename">ТОО ВсеСтрой</span>
                </a>
                <div class="footer-contact pt-3">
                    <p>Профессиональная аттестация и сертификация</p>
                    <p>инженерно-технических работников</p>
                    <p class="mt-3"><strong>Телефон:</strong> <span>+7 (702) 912-23-00</span></p>
                    <p><strong>Email:</strong> <span>ermek_ospanov@mail.ru</span></p>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Навигация</h4>
                <ul>
                    <li><i class="bi bi-chevron-right"></i> <a href="{{ route('home') }}">Главная</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="{{ route('about') }}">О компании</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="{{ route('services.index') }}">Услуги</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="{{ route('projects.index') }}">Проекты</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="{{ route('news.index') }}">Новости</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Услуги</h4>
                <ul>
                    <li><i class="bi bi-chevron-right"></i> <a href="{{ route('services.index') }}">Аттестация</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="{{ route('services.index') }}">Аккредитация</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="{{ route('services.index') }}">Обучение</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="{{ route('services.index') }}">Экспертиза</a></li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-12">
                <h4>Наш адрес</h4>
                <p>г. Актау, 29а мкр, 145</p>
                <p>БЦ "АБК", офис 103</p>
                <p class="mt-3">
                    <strong>Режим работы:</strong><br>
                    Пн-Пт: 9:00 - 18:00<br>
                    Сб-Вс: Выходной
                </p>
            </div>
        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">ТОО ВсеСтрой</strong> <span>Все права защищены</span></p>
    </div>
</footer>
