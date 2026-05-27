<aside id="sidebar">
    <!-- Profile Header -->
    <div class="sidebar-header position-relative">
        <!-- Diagnostic Status Bar -->
        <div class="sidebar-status-pill d-flex align-items-center gap-1.5 position-absolute" style="top: 10px; right: 15px;">
            <span class="sidebar-status-dot"></span>
        </div>

        <div class="sidebar-profile-card">
            <!-- Neo-Brutalist Frame for Avatar -->
            <div class="avatar-container position-relative">
                <img src="{{ asset('images/profile.jpg') }}" 
                     onerror="this.onerror=null; this.src='https://ui-avatars.com/api/?name=Muhammad+Danil&background=ffffff&color=263F93&size=128&bold=true';" 
                     alt="Muhammad Danil Aminuddin" 
                     class="sidebar-avatar">
                
                <!-- Corner brackets decorations in neo-brutalist cyberpunk style -->
                <div class="avatar-bracket bracket-tl"></div>
                <div class="avatar-bracket bracket-tr"></div>
                <div class="avatar-bracket bracket-bl"></div>
                <div class="avatar-bracket bracket-br"></div>
            </div>

            <!-- User Info (Visible in expanded mode) -->
            <div class="sidebar-user-info mt-3">
                <h5 class="sidebar-user-name text-white m-0 fw-bold font-monospace text-uppercase" style="letter-spacing: -0.01em;">
                    Muhammad Danil Aminuddin
                </h5>
                <span class="sidebar-user-role small font-monospace d-block my-1" style="letter-spacing: 0.08em;">
                    Website Developer
                </span>
            </div>
        </div>
    </div>

    <!-- Navigation Menu -->
    <ul class="sidebar-menu">
        <li class="sidebar-menu-item">
            <a href="{{ route('dashboard') }}" 
               class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" 
               data-tooltip="{{ __('nav.dashboard') }}">
                <i class="bi bi-house-door"></i>
                <span>{{ __('nav.dashboard') }}</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a href="{{ route('profile') }}" 
               class="sidebar-link {{ request()->routeIs('profile') ? 'active' : '' }}" 
               data-tooltip="{{ __('nav.profile') }}">
                <i class="bi bi-person-circle"></i>
                <span>{{ __('nav.profile') }}</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a href="{{ route('projects.index') }}" 
               class="sidebar-link {{ request()->routeIs('projects.index') ? 'active' : '' }}" 
               data-tooltip="{{ __('nav.projects') }}">
                <i class="bi bi-folder2-open"></i>
                <span>{{ __('nav.projects') }}</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a href="{{ route('experience') }}" 
               class="sidebar-link {{ request()->routeIs('experience') ? 'active' : '' }}" 
               data-tooltip="{{ __('nav.experience') }}">
                <i class="bi bi-briefcase"></i>
                <span>{{ __('nav.experience') }}</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a href="{{ route('freelance-price') }}" 
               class="sidebar-link {{ request()->routeIs('freelance-price') ? 'active' : '' }}" 
               data-tooltip="{{ __('nav.freelance_price') }}">
                <i class="bi bi-tags"></i>
                <span>{{ __('nav.freelance_price') }}</span>
            </a>
        </li>
    </ul>
</aside>
