<nav id="main-navbar">
    <!-- Left: Sidebar Toggle Button -->
    <button onclick="toggleSidebar()" class="neo-nav-btn me-3" id="sidebar-toggle-btn" aria-label="Toggle sidebar">
        <i class="bi bi-list fs-4" style="color: var(--color-primary);"></i>
    </button>

    <!-- Center: Dynamic Page Title -->
    <h4 class="navbar-title m-0 fw-bold font-monospace text-uppercase" style="color: var(--color-primary); font-size: 1.1rem; letter-spacing: -0.015em;">
        @yield('title', 'Dashboard')
    </h4>

    <!-- Right: Language & Theme Controls -->
    <div class="d-flex align-items-center ms-auto">
        <!-- Language Switcher: ID / EN Chip Tags -->
        <div class="language-toggle d-flex align-items-center gap-2 me-4">
            <a href="{{ route('language', 'id') }}" 
               class="neo-lang-btn {{ app()->getLocale() === 'id' ? 'active-lang' : 'inactive-lang' }}">
                ID
            </a>
            <a href="{{ route('language', 'en') }}" 
               class="neo-lang-btn {{ app()->getLocale() === 'en' ? 'active-lang' : 'inactive-lang' }}">
                EN
            </a>
        </div>

        <!-- Dark Mode Toggle Button -->
        <button onclick="toggleDarkMode()" class="neo-nav-btn" id="theme-toggle-btn" aria-label="Toggle theme">
            <i class="bi bi-moon-stars-fill dark-mode-hide fs-5" style="color: var(--color-primary);"></i>
            <i class="bi bi-sun-fill dark-mode-show fs-5" style="color: var(--color-secondary);"></i>
        </button>
    </div>
</nav>
