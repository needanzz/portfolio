@extends('layouts.app')

@section('title', __('nav.dashboard'))

@section('content')
<div class="container-fluid p-0">
    <!-- Neo-Brutalist Hero Terminal Window -->
    <div class="neo-window mb-5">
        <div class="neo-window-header">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-terminal fs-6"></i>
                <span class="neo-window-title">Profil Pengembang</span>
            </div>
            <div class="neo-window-dots">
                <span class="neo-window-dot dot-red"></span>
                <span class="neo-window-dot dot-yellow"></span>
                <span class="neo-window-dot dot-green"></span>
            </div>
        </div>
        <div class="neo-window-body">
            <div class="row align-items-center g-4">
                <div class="col-lg-8">
                    <span class="neo-badge mb-3">
                        @lang('dashboard.hero.badge')
                    </span>
                    <h1 class="display-4 fw-bold mb-3 text-dark-mode-override" style="color: var(--color-primary); font-weight: 900; letter-spacing: -0.02em;">
                        Muhammad Danil Aminuddin
                    </h1>
                    <p class="fs-4 text-muted mb-4 font-monospace">
                        <span class="fw-bold" style="color: var(--color-primary);">@lang('dashboard.hero.role')</span> @lang('dashboard.hero.role_suffix')
                    </p>
                    <p class="lead mb-0 fs-6 text-muted opacity-90 leading-relaxed font-monospace" style="text-align: justify; max-width: 750px;">
                        @lang('dashboard.hero.bio')
                    </p>
                </div>
                <!-- <!-- <div class="col-lg-4 d-none d-lg-block">
                    Diagnostic Matrix Panel
                    <div class="neo-card p-4">
                        <div class="text-uppercase mb-3 fw-bold border-bottom border-dark pb-2 d-flex align-items-center justify-content-between font-monospace" 
                             style="font-size: 0.75rem; letter-spacing: 0.1em; color: var(--color-primary);">
                            <span>@lang('dashboard.matrix.title')</span>
                            <span class="d-inline-block rounded-circle bg-success" style="width: 8px; height: 8px;"></span>
                        </div>
                        <div class="d-flex justify-content-between mb-2 small font-monospace">
                            <span class="text-muted">@lang('dashboard.matrix.host'):</span> 
                            <span class="fw-bold" style="color: var(--color-primary);">LARAVEL 13.X</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2 small font-monospace">
                            <span class="text-muted">@lang('dashboard.matrix.status'):</span> 
                            <span class="text-success fw-bold">@lang('dashboard.matrix.status_online')</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2 small font-monospace">
                            <span class="text-muted">@lang('dashboard.matrix.locale'):</span> 
                            <span class="fw-bold text-uppercase text-info" style="font-size: 0.75rem;">{{ app()->getLocale() }}</span>
                        </div>
                        <div class="d-flex justify-content-between small font-monospace">
                            <span class="text-muted">@lang('dashboard.matrix.capacity'):</span> 
                            <span class="fw-bold" style="color: var(--color-primary);">@lang('dashboard.matrix.capacity_ready')</span>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

    <!-- Quick Stats Grid: Neo-Brutalist Block Cards -->
    <div class="row g-4 mb-5">
        <!-- Stat Card 1: Projects -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="neo-card h-100 p-4">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="small fw-bold text-uppercase font-monospace" style="font-size: 0.75rem; color: var(--color-primary);">
                        @lang('dashboard.stats.projects.title')
                    </div>
                    <i class="bi bi-folder2-open text-muted fs-5"></i>
                </div>
                <div class="d-flex align-items-baseline mb-3">
                    <h2 class="fw-bold m-0 font-monospace" style="color: var(--color-primary); font-size: 2.5rem;">
                        @lang('dashboard.stats.projects.value')<span class="fs-4 fw-normal">+</span>
                    </h2>
                    <span class="neo-badge ms-2" style="font-size: 0.6rem; padding: 0.2rem 0.5rem;">
                        @lang('dashboard.stats.projects.badge')
                    </span>
                </div>
                <div class="neo-progress mt-2">
                    <div class="neo-progress-bar" style="width: 85%;"></div>
                </div>
                <div class="d-flex justify-content-between small text-muted font-monospace mt-2" style="font-size: 0.7rem;">
                    <span>@lang('dashboard.stats.projects.progress')</span>
                    <span>@lang('dashboard.stats.projects.goal')</span>
                </div>
            </div>
        </div>

        <!-- Stat Card 2: Experience -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="neo-card h-100 p-4">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="small fw-bold text-uppercase font-monospace" style="font-size: 0.75rem; color: var(--color-primary);">
                        @lang('dashboard.stats.experience.title')
                    </div>
                    <i class="bi bi-briefcase text-muted fs-5"></i>
                </div>
                <h2 class="fw-bold m-0 font-monospace mb-3" style="color: var(--color-primary); font-size: 2.5rem;">
                    3+<span class="fs-5 fw-bold text-muted"> @lang('dashboard.stats.experience.suffix')</span>
                </h2>
                <div class="neo-progress mt-2">
                    <div class="neo-progress-bar" style="width: 90%;"></div>
                </div>
                <div class="d-flex justify-content-between small text-muted font-monospace mt-2" style="font-size: 0.7rem;">
                    <span>@lang('dashboard.stats.experience.progress')</span>
                    <span>@lang('dashboard.stats.experience.goal')</span>
                </div>
            </div>
        </div>

        <!-- Stat Card 3: Technologies -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="neo-card h-100 p-4">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="small fw-bold text-uppercase font-monospace" style="font-size: 0.75rem; color: var(--color-primary);">
                        @lang('dashboard.stats.tech.title')
                    </div>
                    <i class="bi bi-cpu text-muted fs-5"></i>
                </div>
                <h2 class="fw-bold mb-3 font-monospace" style="color: var(--color-primary); font-size: 2.5rem;">
                    @lang('dashboard.stats.tech.value')<span class="fs-5 fw-bold text-muted"> @lang('dashboard.stats.tech.suffix')</span>
                </h2>
                <div class="neo-tech-grid">
                    <div class="neo-tech-slot" data-tooltip="Laravel"><i class="bi bi-filetype-php fs-5"></i></div>
                    <div class="neo-tech-slot" data-tooltip="Bootstrap 5"><i class="bi bi-bootstrap-fill fs-5"></i></div>
                    <div class="neo-tech-slot" data-tooltip="MySQL"><i class="bi bi-database-fill fs-5"></i></div>
                    <div class="neo-tech-slot" data-tooltip="Vite / JS"><i class="bi bi-lightning-charge-fill fs-5"></i></div>
                </div>
            </div>
        </div>

        <!-- Stat Card 4: Satisfaction -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="neo-card h-100 p-4">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="small fw-bold text-uppercase font-monospace" style="font-size: 0.75rem; color: var(--color-primary);">
                        @lang('dashboard.stats.satisfaction.title')
                    </div>
                    <i class="bi bi-emoji-smile text-muted fs-5"></i>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h2 class="fw-bold m-0 font-monospace" style="color: var(--color-primary); font-size: 2.5rem;">
                        @lang('dashboard.stats.satisfaction.value')<span class="fs-5 fw-bold text-muted">%</span>
                    </h2>
                    <i class="bi bi-heart-fill minimal-heartbeat" style="font-size: 1.3rem;"></i>
                </div>
                <div class="neo-progress mt-2">
                    <div class="neo-progress-bar" style="width: 100%; background-color: #27c93f !important;"></div>
                </div>
                <div class="d-flex justify-content-between small text-muted font-monospace mt-2" style="font-size: 0.7rem;">
                    <span>@lang('dashboard.stats.satisfaction.progress')</span>
                    <span>@lang('dashboard.stats.satisfaction.goal')</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Section: Featured Projects Workspace & TIMELINE -->
    <div class="row g-4">
        <!-- Curated Work Column -->
        <div class="col-12 col-lg-8">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h5 class="m-0 fw-bold text-uppercase tracking-wider font-monospace" style="color: var(--color-primary); font-size: 0.95rem;">
                    <i class="bi bi-grid-3x3-gap-fill me-2 text-muted"></i>@lang('dashboard.projects.title')
                </h5>
                <a href="{{ route('projects.index') }}" class="neo-btn-outline" style="padding: 0.4rem 1rem; font-size: 0.75rem;">
                    @lang('dashboard.projects.view_all') <i class="bi bi-arrow-right-short ms-1"></i>
                </a>
            </div>

            <!-- Neo-Brutalist Explorer Project Grid -->
            <div class="row g-4">
                @forelse($projects as $project)
                    <div class="col-12 col-md-6">
                        <x-project-card :project="$project" />
                    </div>
                @empty
                    <div class="col-12 text-center py-4">
                        <div class="neo-card p-5 d-inline-block text-center max-width-md mx-auto" style="background-color: var(--color-surface);">
                            <i class="bi bi-folder-x display-4 text-muted mb-3 d-block"></i>
                            <h5 class="fw-bold mb-2 font-monospace">{{ __('projects.no_projects') }}</h5>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Diagnostic Log timeline Column -->
        <div class="col-12 col-lg-4">
            <div class="d-flex align-items-center mb-4">
                <h5 class="m-0 fw-bold text-uppercase tracking-wider font-monospace" style="color: var(--color-primary); font-size: 0.95rem;">
                    <i class="bi bi-activity me-2 text-muted"></i>@lang('dashboard.logs.title')
                </h5>
            </div>

            <!-- Pure Neo-Brutalist Log Timeline Window -->
            <div class="neo-window h-100 mb-0">
                <div class="neo-window-header">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-journal-text"></i>
                        <span class="neo-window-title">Aktivitas Terbaru</span>
                    </div>
                    <div class="neo-window-dots">
                        <span class="neo-window-dot dot-red"></span>
                        <span class="neo-window-dot dot-yellow"></span>
                        <span class="neo-window-dot dot-green"></span>
                    </div>
                </div>
                <div class="neo-window-body d-flex flex-column gap-4 position-relative" style="min-height: 400px;">
                    <!-- Solid vertical timeline line -->
                    <div class="position-absolute" style="left: 27px; top: 1.5rem; bottom: 1.5rem; width: 4px; background-color: var(--color-text); z-index: 1;"></div>

                    <!-- Log Event 1 -->
                    <div class="d-flex gap-3 position-relative" style="z-index: 2;">
                        <!-- Timeline Node -->
                        <div class="flex-shrink-0 d-flex justify-content-center align-items-center" 
                             style="width: 26px; height: 26px; border-radius: 50%; background-color: var(--color-secondary); border: 3px solid var(--color-text); box-shadow: 2px 2px 0px var(--neo-shadow);">
                            <span class="d-inline-block rounded-circle bg-success" style="width: 8px; height: 8px;"></span>
                        </div>
                        <!-- Log Content Box -->
                        <div class="neo-card p-3 flex-grow-1" style="background-color: var(--color-bg); box-shadow: 4px 4px 0px var(--neo-shadow) !important;">
                            <span class="neo-badge mb-2" style="font-size: 0.6rem; padding: 0.15rem 0.4rem;">
                                @lang('dashboard.logs.log_1.meta')
                            </span>
                            <h6 class="fw-bold mb-1 font-monospace" style="color: var(--color-primary); font-size: 0.85rem;">
                                @lang('dashboard.logs.log_1.title')
                            </h6>
                            <p class="text-muted small m-0 font-monospace leading-relaxed" style="font-size: 0.75rem; text-align: justify;">
                                @lang('dashboard.logs.log_1.description')
                            </p>
                        </div>
                    </div>

                    <!-- Log Event 2 -->
                    <div class="d-flex gap-3 position-relative" style="z-index: 2;">
                        <!-- Timeline Node -->
                        <div class="flex-shrink-0 d-flex justify-content-center align-items-center" 
                             style="width: 26px; height: 26px; border-radius: 50%; background-color: var(--color-secondary); border: 3px solid var(--color-text); box-shadow: 2px 2px 0px var(--neo-shadow);">
                            <span class="d-inline-block rounded-circle" style="width: 8px; height: 8px; background-color: var(--color-muted);"></span>
                        </div>
                        <!-- Log Content Box -->
                        <div class="neo-card p-3 flex-grow-1" style="background-color: var(--color-bg); box-shadow: 4px 4px 0px var(--neo-shadow) !important;">
                            <span class="neo-badge mb-2" style="font-size: 0.6rem; padding: 0.15rem 0.4rem;">
                                @lang('dashboard.logs.log_2.meta')
                            </span>
                            <h6 class="fw-bold mb-1 font-monospace" style="color: var(--color-primary); font-size: 0.85rem;">
                                @lang('dashboard.logs.log_2.title')
                            </h6>
                            <p class="text-muted small m-0 font-monospace leading-relaxed" style="font-size: 0.75rem; text-align: justify;">
                                @lang('dashboard.logs.log_2.description')
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
