<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <!-- 1. Logo (Left aligned) -->
        <a href="{{ route('home') }}" class="logo d-flex align-items-center me-0">
            <span class="sitename">ТОО ВсеСтрой</span>
        </a>

        <!-- 2. Navigation (Centered) -->
        <nav id="navmenu" class="navmenu mx-auto">
            <ul>
                <li>
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">
                        {{ __('messages.home') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">
                        {{ __('messages.about') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? 'active' : '' }}">
                        {{ __('messages.services') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('projects.index') }}" class="{{ request()->routeIs('projects.*') ? 'active' : '' }}">
                        {{ __('messages.projects') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('news.index') }}" class="{{ request()->routeIs('news.*') ? 'active' : '' }}">
                        {{ __('messages.news') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                        {{ __('messages.contacts') }}
                    </a>
                </li>

                <!-- Mobile Only Actions (Inside Menu) -->
                <li class="d-xl-none mt-4">
                    <div class="mobile-actions d-flex flex-column gap-3 align-items-center w-100 px-3">
                        <div class="d-flex gap-3 w-100 justify-content-center">
                            <button class="btn-action btn-theme-toggle" onclick="toggleTheme()" title="{{ __('messages.toggle_theme') }}">
                                <i class="bi bi-moon-stars theme-icon-dark"></i>
                                <i class="bi bi-sun theme-icon-light" style="display: none;"></i>
                            </button>
                            <button class="btn-action btn-search" onclick="openSearchModal()" title="{{ __('messages.search_certificate') }}">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                        <button class="btn-action btn-primary-action w-100 justify-content-center" onclick="openApplicationModal()">
                            <i class="bi bi-pencil-square"></i>
                            <span class="btn-text">{{ __('messages.submit_application') }}</span>
                        </button>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- 3. Mobile Toggle (Visible only on mobile, Right aligned) -->
        <i class="mobile-nav-toggle d-xl-none bi bi-list ms-auto"></i>

        <!-- 4. Desktop Actions (Visible only on desktop, Right aligned) -->
        <div class="header-actions d-none d-xl-flex">
            <!-- Search -->
            <button class="btn-action btn-icon-only" onclick="openSearchModal()" title="{{ __('messages.search_certificate') }}">
                <i class="bi bi-search"></i>
            </button>

            <!-- Theme Toggle -->
            <button class="btn-action btn-icon-only" onclick="toggleTheme()" title="{{ __('messages.toggle_theme') }}">
                <i class="bi bi-moon-stars theme-icon-dark"></i>
                <i class="bi bi-sun theme-icon-light" style="display: none;"></i>
            </button>

            <!-- Language Switcher -->
            <div class="dropdown lang-dropdown">
                <button class="btn-action btn-icon-only dropdown-toggle" type="button" id="langDropdown" data-bs-toggle="dropdown" aria-expanded="false" title="{{ __('messages.choose') }}">
                    <i class="bi bi-globe"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="langDropdown">
                    <li>
                        <a class="dropdown-item {{ app()->getLocale() == 'ru' ? 'active' : '' }}" href="{{ route('lang.switch', 'ru') }}">
                            <i class="bi bi-check-circle-fill me-2"></i> Русский
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item {{ app()->getLocale() == 'kk' ? 'active' : '' }}" href="{{ route('lang.switch', 'kk') }}">
                            <i class="bi bi-check-circle-fill me-2"></i> Қазақша
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Application Button -->
            <button class="btn-action btn-icon-only btn-primary-icon" onclick="openApplicationModal()" title="{{ __('messages.submit_application') }}">
                <i class="bi bi-pencil-square"></i>
            </button>
        </div>

    </div>
</header>