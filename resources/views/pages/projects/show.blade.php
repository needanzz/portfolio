@extends('layouts.app')

@section('title', $project->title)

@section('content')
<div class="container-fluid p-0">
    <!-- Back Navigation Link -->
    <div class="mb-4">
        <a href="{{ route('projects.index') }}" 
           class="neo-btn-outline p-2 px-3 d-inline-flex align-items-center gap-2" 
           style="font-size: 0.8rem; text-transform: uppercase;">
            <i class="bi bi-arrow-left-circle-fill fs-6"></i>
            <span>{{ __('projects.back') }}</span>
        </a>
    </div>

    <!-- Main Detail Grid -->
    <div class="row g-4">
        <!-- Main Content Area (Left) -->
        <div class="col-12 col-lg-8">
            <!-- Hero Window Visual -->
            <div class="neo-window mb-4">
                <div class="neo-window-header" style="background-color: var(--color-surface); color: var(--color-text);">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-image"></i>
                        <span class="neo-window-title font-monospace" style="color: var(--color-text); font-size: 0.75rem;">Tampilan Proyek</span>
                    </div>
                    <div class="neo-window-dots">
                        <span class="neo-window-dot dot-red"></span>
                        <span class="neo-window-dot dot-yellow"></span>
                        <span class="neo-window-dot dot-green"></span>
                    </div>
                </div>
                <div class="neo-window-body p-0" style="height: 320px; overflow: hidden; border-bottom: none;">
                    @if($project->thumbnail)
                        <img src="{{ asset($project->thumbnail) }}" 
                             alt="{{ $project->title }}" 
                             class="w-100 h-100 object-fit-cover">
                    @else
                        <!-- Engineering Grid Fallback -->
                        <div class="w-100 h-100 d-flex flex-column justify-content-center align-items-center p-5 text-center position-relative" 
                             style="background: linear-gradient(135deg, var(--color-primary) 0%, #101c42 100%);">
                            
                            <!-- Absolute grid overlay for engineering theme -->
                            <div class="absolute-grid-overlay position-absolute inset-0 opacity-10"></div>
                            
                            <i class="bi bi-cpu display-1 text-white mb-3 opacity-25"></i>
                            <h2 class="text-white text-opacity-10 fw-extrabold display-3 font-monospace position-absolute m-0 select-none" style="pointer-events: none; z-index: 1;">
                                {{ strtoupper(implode('', array_map(fn($w) => $w[0] ?? '', explode(' ', $project->title)))) }}
                            </h2>
                            <div class="z-2">
                                <span class="neo-badge px-3 py-1.5 text-dark mb-3" style="background-color: var(--color-secondary); font-weight: 800; font-size: 0.65rem; border-color: var(--color-text);">
                                    PROYEK #{{ str_pad($project->id, 3, '0', STR_PAD_LEFT) }}
                                </span>
                                <h3 class="text-white fw-bold font-monospace">{{ $project->title }}</h3>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Main Specifications Write-up Window -->
            <div class="neo-window mb-4">
                <div class="neo-window-header">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-file-earmark-text-fill"></i>
                        <span class="neo-window-title">Detail Proyek</span>
                    </div>
                    <div class="neo-window-dots">
                        <span class="neo-window-dot dot-red"></span>
                        <span class="neo-window-dot dot-yellow"></span>
                        <span class="neo-window-dot dot-green"></span>
                    </div>
                </div>
                <div class="neo-window-body">
                    <h4 class="fw-bold mb-3 font-monospace" style="color: var(--color-primary); font-weight: 800;">
                        {{ __('projects.project_details') }}
                    </h4>
                    <hr class="mb-4" style="border-top: 2px solid var(--color-text); opacity: 1;">

                    <div class="project-detailed-description text-secondary leading-relaxed fs-6 font-monospace" style="text-align: justify; line-height: 1.6;">
                        <p class="mb-4">
                            {{ $project->description }}
                        </p>
                        <p class="mb-0">
                            Sistem ini dirancang dengan memprioritaskan efisiensi alur kerja (workflow efficiency), performa tinggi, dan kemudahan navigasi bagi pengguna. Implementasi teknologi di bawah ini disesuaikan secara arsitektural untuk memberikan hasil optimal pada platform yang dituju.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Tech Stack Section Window -->
            <div class="neo-window mb-4">
                <div class="neo-window-header">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-cpu-fill"></i>
                        <span class="neo-window-title">Teknologi Terkait</span>
                    </div>
                    <div class="neo-window-dots">
                        <span class="neo-window-dot dot-red"></span>
                        <span class="neo-window-dot dot-yellow"></span>
                        <span class="neo-window-dot dot-green"></span>
                    </div>
                </div>
                <div class="neo-window-body">
                    <h5 class="fw-bold mb-3 font-monospace" style="color: var(--color-primary); font-weight: 800;">
                        {{ __('projects.tech_stack') }}
                    </h5>
                    <hr class="mb-4" style="border-top: 2px solid var(--color-text); opacity: 1;">
                    
                    <div class="d-flex flex-wrap gap-3">
                        @foreach($project->tech_stack as $tech)
                            <div class="d-flex align-items-center gap-2 px-3 py-2 rounded-3 border bg-body" 
                                 style="border: 2px solid var(--color-text) !important; box-shadow: 3px 3px 0 var(--neo-shadow); transition: transform 0.15s ease;">
                                <i class="bi bi-patch-check-fill fs-7" style="color: var(--color-primary);"></i>
                                <span class="fw-bold text-secondary font-monospace" style="font-size: 0.85rem;">{{ $tech }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Specs Column (Right) -->
        <div class="col-12 col-lg-4">
            <!-- Metadata Info Window -->
            <div class="neo-window mb-4">
                <div class="neo-window-header">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-info-circle-fill"></i>
                        <span class="neo-window-title">Informasi Tambahan</span>
                    </div>
                    <div class="neo-window-dots">
                        <span class="neo-window-dot dot-red"></span>
                        <span class="neo-window-dot dot-yellow"></span>
                        <span class="neo-window-dot dot-green"></span>
                    </div>
                </div>
                <div class="neo-window-body">
                    <!-- Spec Items Rows -->
                    <div class="d-flex flex-column gap-3 mb-4">
                        <!-- Category -->
                        <div class="d-flex justify-content-between align-items-center p-3 rounded-3 bg-body border" 
                             style="border: 2px solid var(--color-text) !important; box-shadow: 3px 3px 0 var(--neo-shadow);">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-tag-fill text-muted"></i>
                                <span class="text-muted small fw-bold font-monospace">{{ __('projects.category') }}</span>
                            </div>
                            <span class="neo-badge px-3 py-1.5 text-white text-uppercase" style="background-color: var(--color-primary); font-size: 0.65rem; border-color: var(--color-text); box-shadow: none;">
                                {{ $project->category }}
                            </span>
                        </div>

                        <!-- Status -->
                        <div class="d-flex justify-content-between align-items-center p-3 rounded-3 bg-body border" 
                             style="border: 2px solid var(--color-text) !important; box-shadow: 3px 3px 0 var(--neo-shadow);">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-check-circle-fill text-muted"></i>
                                <span class="text-muted small fw-bold font-monospace">{{ __('projects.status') }}</span>
                            </div>
                            <span class="neo-badge bg-success-subtle text-success px-3 py-1.5 rounded-pill" style="font-size: 0.65rem; border-color: var(--color-text); box-shadow: none; font-weight: 800;">
                                <i class="bi bi-activity me-1"></i> {{ __('projects.active') }}
                            </span>
                        </div>
                    </div>

                    <!-- Call to Action Redirect Buttons -->
                    <div class="d-flex flex-column gap-3">
                        <!-- Live Demo Link -->
                        @if($project->demo_url)
                            <a href="{{ $project->demo_url }}" target="_blank" 
                               class="neo-btn-primary w-100 py-3 d-flex align-items-center justify-content-center gap-2">
                                <i class="bi bi-box-arrow-up-right fs-6"></i> {{ __('projects.demo') }}
                            </a>
                        @else
                            <button class="neo-btn-outline w-100 py-3 text-muted border-dashed" 
                                    style="box-shadow: none !important; transform: none !important; cursor: not-allowed; background-color: var(--color-bg) !important;" disabled>
                                <i class="bi bi-lock-fill fs-6"></i> Demo Locked / Private
                            </button>
                        @endif

                        <!-- Code Repository Link -->
                        @if($project->repo_url)
                            <a href="{{ $project->repo_url }}" target="_blank" 
                               class="neo-btn-primary w-100 py-3 d-flex align-items-center justify-content-center gap-2"
                               style="background-color: #24292e !important;">
                                <i class="bi bi-github fs-6"></i> {{ __('projects.repository') }}
                            </a>
                        @else
                            <button class="neo-btn-outline w-100 py-3 text-muted border-dashed" 
                                    style="box-shadow: none !important; transform: none !important; cursor: not-allowed; background-color: var(--color-bg) !important;" disabled>
                                <i class="bi bi-lock-fill fs-6"></i> Repository Locked / Private
                            </button>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Contact Reminder Widget Card -->
            <div class="neo-card p-4 text-center" 
                 style="background: linear-gradient(135deg, rgba(38, 63, 147, 0.05) 0%, rgba(236, 222, 29, 0.05) 100%);">
                <i class="bi bi-chat-left-quote display-6 mb-2 text-muted"></i>
                <h6 class="fw-bold mb-1 font-monospace" style="color: var(--color-primary); font-weight: 800;">Tertarik dengan Sistem ini?</h6>
                <p class="text-muted small mb-4 font-monospace">Dapatkan custom development atau integrasi sistem informasi serupa untuk bisnis Anda.</p>
                <a href="{{ route('contact') }}" class="neo-btn-outline rounded-pill px-4 py-2" style="font-size: 0.8rem;">
                    Hubungi Saya
                </a>
            </div>
        </div>
    </div>
</div>

<style>
/* Engineering absolute visual grids overlay */
.absolute-grid-overlay {
    background-image: 
        radial-gradient(var(--color-secondary) 1px, transparent 1px), 
        radial-gradient(var(--color-secondary) 1px, transparent 1px);
    background-size: 20px 20px;
    background-position: 0 0, 10px 10px;
    width: 100%;
    height: 100%;
}
</style>
@endsection
