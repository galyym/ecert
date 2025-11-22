<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <!-- 1. Logo (Left aligned) -->
        <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto me-xl-0">
            <span class="sitename">ТОО ВсеСтрой</span>
        </a>

        <!-- 2. Navigation -->
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

                <!-- Mobile Only Actions (Inside Menu) -->
                <li class="d-xl-none mt-4">
                    <div class="mobile-actions d-flex flex-column gap-3 align-items-center w-100 px-3">
                        <div class="d-flex gap-3 w-100 justify-content-center">
                            <button class="btn-action btn-theme-toggle" onclick="toggleTheme()" title="Переключить тему">
                                <i class="bi bi-moon-stars theme-icon-dark"></i>
                                <i class="bi bi-sun theme-icon-light" style="display: none;"></i>
                            </button>
                            <button class="btn-action btn-search" onclick="openSearchModal()" title="Поиск аттестата">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                        <button class="btn-action btn-primary-action w-100 justify-content-center" onclick="openApplicationModal()">
                            <i class="bi bi-pencil-square"></i>
                            <span class="btn-text">Оставить заявку</span>
                        </button>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- 3. Mobile Toggle (Visible only on mobile, Right aligned) -->
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>

        <!-- 4. Desktop Actions (Visible only on desktop) -->
        <div class="header-actions d-none d-xl-flex ms-auto">
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
