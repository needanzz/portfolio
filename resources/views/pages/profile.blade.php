@extends('layouts.app')

@section('title', __('nav.profile'))

@section('content')
<div class="container-fluid p-0">
    <div class="row g-4">
        <!-- Left Column: Profile Card & Socials -->
        <div class="col-12 col-lg-4">
            <!-- Neo-Brutalist Profile Overview Window -->
            <div class="neo-window mb-4">
                <div class="neo-window-header">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-person-bounding-box"></i>
                        <span class="neo-window-title">Informasi Lengkap</span>
                    </div>
                    <div class="neo-window-dots">
                        <span class="neo-window-dot dot-red"></span>
                        <span class="neo-window-dot dot-yellow"></span>
                        <span class="neo-window-dot dot-green"></span>
                    </div>
                </div>
                <div class="neo-window-body text-center">
                    <div class="position-relative d-inline-block mx-auto mb-4 neo-card p-2 bg-white" style="box-shadow: 4px 4px 0px var(--neo-shadow) !important;">
                        <img src="{{ asset('images/profile.jpg') }}" 
                             onerror="this.onerror=null; this.src='https://ui-avatars.com/api/?name=Muhammad+Danil&background=263F93&color=ffffff&size=150&bold=true';" 
                             alt="{{ $profile['full_name'] }}" 
                             class="img-fluid"
                             style="width: 140px; height: 140px; object-fit: cover; border: 2px solid var(--color-text); border-radius: 8px;">
                    </div>
                    
                    <h4 class="fw-bold mb-1 font-monospace" style="color: var(--color-primary); font-weight: 800;">
                        {{ $profile['full_name'] }}
                    </h4>
                    <p class="text-muted mb-4 fs-7 fw-bold font-monospace">
                        Website Developer & Bussines System Specialist
                    </p>
                    
                    <!-- Saturated Social Action Buttons -->
                    <div class="d-flex flex-column gap-3 text-start mt-2">
                        <!-- GitHub -->
                        <a href="https://github.com/needanzz" target="_blank" class="neo-social-btn">
                            <span class="fw-bold font-monospace fs-7" style="color: var(--color-primary);"><i class="bi bi-github fs-5 me-2"></i> GITHUB</span>
                            <i class="bi bi-arrow-up-right-square font-monospace fs-6"></i>
                        </a>
                        
                        <!-- LinkedIn -->
                        <a href="https://www.linkedin.com/in/muhammad-danil-aminuddin-81517b2bb/" target="_blank" class="neo-social-btn">
                            <span class="fw-bold font-monospace fs-7" style="color: var(--color-primary);"><i class="bi bi-linkedin fs-5 me-2 text-primary"></i> LINKEDIN</span>
                            <i class="bi bi-arrow-up-right-square font-monospace fs-6"></i>
                        </a>
                        
                        <!-- Instagram -->
                        <a href="https://www.instagram.com/mhmmd.dniell_/" target="_blank" class="neo-social-btn">
                            <span class="fw-bold font-monospace fs-7" style="color: var(--color-primary);"><i class="bi bi-instagram fs-5 me-2 text-danger"></i> INSTAGRAM</span>
                            <i class="bi bi-arrow-up-right-square font-monospace fs-6"></i>
                        </a>
                        
                        <!-- Email -->
                        <a href="mailto:danielspike95@gmail.com" class="neo-social-btn">
                            <span class="fw-bold font-monospace fs-7" style="color: var(--color-primary);"><i class="bi bi-envelope-fill fs-5 me-2 text-success"></i> EMAIL</span>
                            <i class="bi bi-arrow-up-right-square font-monospace fs-6"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Biography & Education History -->
        <div class="col-12 col-lg-8">
            <!-- Neo-Brutalist Biography Window -->
            <div class="neo-window mb-4">
                <div class="neo-window-header">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-journal-richtext"></i>
                        <span class="neo-window-title">Tentang Saya</span>
                    </div>
                    <div class="neo-window-dots">
                        <span class="neo-window-dot dot-red"></span>
                        <span class="neo-window-dot dot-yellow"></span>
                        <span class="neo-window-dot dot-green"></span>
                    </div>
                </div>
                <div class="neo-window-body">
                    <p class="fs-6 leading-relaxed m-0 text-secondary font-monospace" style="font-weight: 500; text-align: justify; line-height: 1.6;">
                        {{ app()->getLocale() === 'id' ? $profile['bio_id'] : $profile['bio_en'] }}
                    </p>
                </div>
            </div>

            <!-- Neo-Brutalist Education Timeline Window -->
            <div class="neo-window">
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
                    <!-- Timeline Wrapper -->
                    <div class="neo-education-timeline ps-4 position-relative">
                        @forelse($education as $edu)
                            <div class="position-relative mb-4">
                                <!-- Bullet marker node -->
                                <div class="position-absolute rounded-circle d-flex justify-content-center align-items-center" 
                                     style="width: 26px; height: 26px; background-color: var(--color-secondary); border: 3px solid var(--color-text); box-shadow: 2px 2px 0px var(--neo-shadow); left: -37px; top: 12px; z-index: 2;">
                                    <span class="d-inline-block rounded-circle bg-success" style="width: 8px; height: 8px;"></span>
                                </div>
                                
                                <!-- Retro Ledger Content Card -->
                                <div class="neo-card p-4" style="background-color: var(--color-bg); box-shadow: 4px 4px 0px var(--neo-shadow) !important; position: relative; z-index: 2;">
                                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2 gap-2">
                                        <h5 class="fw-bold mb-0 fs-6 font-monospace" style="color: var(--color-primary); font-weight: 800;">
                                            {{ $edu->company }}
                                        </h5>
                                        <span class="neo-badge" style="font-size: 0.65rem; padding: 0.2rem 0.5rem; box-shadow: 2px 2px 0px var(--neo-shadow);">
                                            {{ $edu->start_date->format('Y') }} - {{ $edu->end_date ? $edu->end_date->format('Y') : __('profile.present') }}
                                        </span>
                                    </div>
                                    
                                    <h6 class="text-muted fw-bold mb-3 font-monospace" style="font-size: 0.8rem;">
                                        {{ $edu->position }}
                                    </h6>
                                    
                                    <p class="text-muted small m-0 font-monospace leading-relaxed" style="text-align: justify; font-size: 0.8rem; line-height: 1.5;">
                                        {{ $edu->description }}
                                    </p>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted m-0 small font-monospace">No education records found.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
