@extends('layouts.app')

@section('title', __('experience.title'))

@section('content')
<div class="container-fluid p-0">
    <!-- Header Section -->
    <div class="row mb-5">
        <div class="col-12 text-center text-md-start">
            <h3 class="fw-bold mb-2 font-monospace" style="color: var(--color-primary); font-weight: 800;">
                <i class="bi bi-briefcase me-2"></i> {{ __('experience.title') }}
            </h3>
            <p class="text-muted mb-0 max-width-xl fs-6 font-monospace">
                {{ __('experience.subtitle') }}
            </p>
        </div>
    </div>

    <!-- Timeline Dual Column Layout -->
    <div class="row g-4">
        <!-- Professional Work Timeline (Left) -->
        <div class="col-12 col-lg-6">
            <div class="neo-window h-100 mb-0">
                <div class="neo-window-header">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-briefcase-fill"></i>
                        <span class="neo-window-title">Riwayat Pekerjaan</span>
                    </div>
                    <div class="neo-window-dots">
                        <span class="neo-window-dot dot-red"></span>
                        <span class="neo-window-dot dot-yellow"></span>
                        <span class="neo-window-dot dot-green"></span>
                    </div>
                </div>
                <div class="neo-window-body">
                    <h5 class="fw-bold mb-3 font-monospace" style="color: var(--color-primary); font-weight: 800;">
                        {{ __('experience.work_title') }}
                    </h5>
                    <hr class="mb-4" style="border-top: 2px solid var(--color-text); opacity: 1;">

                    <div class="position-relative ps-4" style="min-height: 200px;">
                        <!-- Solid vertical timeline line -->
                        <div class="position-absolute" style="left: 11px; top: 0.5rem; bottom: 0.5rem; width: 4px; background-color: var(--color-text); z-index: 1;"></div>

                        @forelse($work as $item)
                            <div class="position-relative pb-3">
                                <!-- Bullet marker node -->
                                <div class="position-absolute rounded-circle d-flex justify-content-center align-items-center" 
                                     style="width: 26px; height: 26px; background-color: var(--color-secondary); border: 3px solid var(--color-text); box-shadow: 2px 2px 0px var(--neo-shadow); left: -37px; top: 12px; z-index: 2;">
                                    <span class="d-inline-block rounded-circle bg-success" style="width: 8px; height: 8px;"></span>
                                </div>
                                
                                <!-- Content Card panel -->
                                <div class="neo-card p-4" style="background-color: var(--color-bg); box-shadow: 4px 4px 0px var(--neo-shadow) !important; position: relative; z-index: 2;">
                                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2 gap-2">
                                        <h6 class="fw-bold mb-0 fs-6 font-monospace" style="color: var(--color-primary); font-weight: 800;">
                                            {{ $item->company }}
                                        </h6>
                                        <span class="neo-badge" style="font-size: 0.65rem; padding: 0.2rem 0.5rem; box-shadow: 2px 2px 0px var(--neo-shadow);">
                                            {{ $item->start_date->format('Y') }} - {{ $item->end_date ? $item->end_date->format('Y') : __('experience.present') }}
                                        </span>
                                    </div>
                                    
                                    <h6 class="text-muted fw-bold mb-3 font-monospace" style="font-size: 0.8rem;">
                                        {{ $item->position }}
                                    </h6>
                                    
                                    <p class="text-muted small m-0 font-monospace leading-relaxed" style="text-align: justify; font-size: 0.8rem; line-height: 1.5;">
                                        {{ $item->description }}
                                    </p>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted m-0 small font-monospace">{{ __('experience.no_work') }}</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <!-- Academic Education Timeline (Right) -->
        <div class="col-12 col-lg-6">
            <div class="neo-window h-100 mb-0">
                <div class="neo-window-header">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-mortarboard-fill"></i>
                        <span class="neo-window-title">Riwayat Pendidikan</span>
                    </div>
                    <div class="neo-window-dots">
                        <span class="neo-window-dot dot-red"></span>
                        <span class="neo-window-dot dot-yellow"></span>
                        <span class="neo-window-dot dot-green"></span>
                    </div>
                </div>
                <div class="neo-window-body">
                    <h5 class="fw-bold mb-3 font-monospace" style="color: var(--color-primary); font-weight: 800;">
                        {{ __('experience.edu_title') }}
                    </h5>
                    <hr class="mb-4" style="border-top: 2px solid var(--color-text); opacity: 1;">

                    <div class="position-relative ps-4" style="min-height: 200px;">
                        <!-- Solid vertical timeline line -->
                        <div class="position-absolute" style="left: 11px; top: 0.5rem; bottom: 0.5rem; width: 4px; background-color: var(--color-text); z-index: 1;"></div>

                        @forelse($education as $item)
                            <div class="position-relative pb-4">
                                <!-- Bullet marker node -->
                                <div class="position-absolute rounded-circle d-flex justify-content-center align-items-center" 
                                     style="width: 26px; height: 26px; background-color: var(--color-secondary); border: 3px solid var(--color-text); box-shadow: 2px 2px 0px var(--neo-shadow); left: -37px; top: 12px; z-index: 2;">
                                    <span class="d-inline-block rounded-circle bg-success" style="width: 8px; height: 8px;"></span>
                                </div>
                                
                                <!-- Content Card panel -->
                                <div class="neo-card p-4" style="background-color: var(--color-bg); box-shadow: 4px 4px 0px var(--neo-shadow) !important; position: relative; z-index: 2;">
                                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2 gap-2">
                                        <h6 class="fw-bold mb-0 fs-6 font-monospace" style="color: var(--color-primary); font-weight: 800;">
                                            {{ $item->company }}
                                        </h6>
                                        <span class="neo-badge" style="font-size: 0.65rem; padding: 0.2rem 0.5rem; box-shadow: 2px 2px 0px var(--neo-shadow);">
                                            {{ $item->start_date->format('Y') }} - {{ $item->end_date ? $item->end_date->format('Y') : __('experience.present') }}
                                        </span>
                                    </div>
                                    
                                    <h6 class="text-muted fw-bold mb-3 font-monospace" style="font-size: 0.8rem;">
                                        {{ $item->position }}
                                    </h6>
                                    
                                    <p class="text-muted small m-0 font-monospace leading-relaxed" style="text-align: justify; font-size: 0.8rem; line-height: 1.5;">
                                        {{ $item->description }}
                                    </p>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted m-0 small font-monospace">{{ __('experience.no_edu') }}</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Additional spacing utility */
.pb-3 {
    padding-bottom: 1.2rem;
}
.max-width-xl {
    max-width: 600px;
}
</style>
@endsection
