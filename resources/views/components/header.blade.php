<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <!-- Logo -->
        <a href="{{ route('home') }}" class="logo d-flex align-items-center">
            <span class="sitename">ТОО ВсеСтрой</span>
        </a>

        <!-- Navigation -->
        <nav id="navmenu" class="navmenu">
            <ul>
                <li>
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">
                        Главная
                    </a>
                </li>
                <li>
                    <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">
                        О компании
                    </a>
                </li>
                <li>
                    <a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? 'active' : '' }}">
                        Услуги
                    </a>
                </li>
                <li>
                    <a href="{{ route('projects.index') }}" class="{{ request()->routeIs('projects.*') ? 'active' : '' }}">
                        Проекты
                    </a>
                </li>
                <li>
                    <a href="{{ route('news.index') }}" class="{{ request()->routeIs('news.*') ? 'active' : '' }}">
                        Новости
                    </a>
                </li>
                <li>
                    <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                        Контакты
                    </a>
                </li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <!-- Action Buttons Group -->
        <div class="header-actions ms-auto">
            <button class="btn-action btn-theme-toggle" onclick="toggleTheme()" title="Переключить тему">
                <i class="bi bi-moon-stars theme-icon-dark"></i>
                <i class="bi bi-sun theme-icon-light" style="display: none;"></i>
            </button>
            <button class="btn-action btn-search" onclick="openSearchModal()" title="Поиск аттестата">
                <i class="bi bi-search"></i>
                <span class="btn-text d-none d-lg-inline">Поиск</span>
            </button>
            <button class="btn-action btn-primary-action" onclick="openApplicationModal()" title="Оставить заявку">
                <i class="bi bi-pencil-square"></i>
                <span class="btn-text d-none d-lg-inline">Оставить заявку</span>
            </button>
        </div>

    </div>
</header>
