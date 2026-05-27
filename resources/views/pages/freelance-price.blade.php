@extends('layouts.app')

@section('title', __('freelance.title'))

@section('content')
<div class="container-fluid p-0">
    <!-- Header Section -->
    <div class="row mb-5">
        <div class="col-12 text-center text-md-start">
            <h3 class="fw-bold mb-2 font-monospace" style="color: var(--color-primary); font-weight: 800;">
                <i class="bi bi-tags me-2"></i> {{ __('freelance.title') }}
            </h3>
            <p class="text-muted mb-0 max-width-xl fs-6 font-monospace">
                {{ __('freelance.subtitle') }}
            </p>
        </div>
    </div>

    <!-- Pricing Grid -->
    <div class="row g-4 mb-5">
        @forelse($packages as $package)
            @php
                $isPopular = $package->order === 2; // Highlighting the middle Professional package
            @endphp
            <div class="col-12 col-md-6 col-lg-4">
                <!-- Neo-Brutalist Pricing Window -->
                <div class="neo-window h-100 mb-0 position-relative {{ $isPopular ? 'popular-window' : '' }}">
                    @if($isPopular)
                        <!-- Popular Ribbon/Badge -->
                        <!-- <div class="position-absolute top-0 end-0 px-3 py-1.5 text-dark fw-bold font-monospace neo-card" 
                             style="background-color: #ecde1d; font-size: 0.65rem; border-top-left-radius: 0px; border-bottom-right-radius: 0px; border-top-right-radius: 0px; border-bottom-left-radius: 8px; z-index: 10; border-width: 0px 0px 2px 2px !important; box-shadow: none !important;">
                            <i class="bi bi-star-fill me-1"></i> {{ __('freelance.popular_badge') }}
                        </div> -->
                    @endif

                    <div class="neo-window-header" 
                         style="{{ $isPopular ? 'background-color: #ecde1d !important; color: #000000 !important; border-bottom: var(--neo-border) !important;' : '' }}">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-tag-fill {{ $isPopular ? 'text-dark' : 'text-muted' }}"></i>
                            <span class="neo-window-title font-monospace" 
                                  style="{{ $isPopular ? 'color: #000000 !important;' : '' }}">
                                Pilihan Paket 0{{ $loop->iteration }}
                            </span>
                        </div>
                        <div class="neo-window-dots">
                            <span class="neo-window-dot dot-red"></span>
                            <span class="neo-window-dot dot-yellow"></span>
                            <span class="neo-window-dot dot-green"></span>
                        </div>
                    </div>

                    <div class="neo-window-body d-flex flex-column h-100 p-4 p-md-5">
                        <!-- Package Title & Icon -->
                        <div class="mb-4">
                            <span class="neo-badge mb-3" 
                                  style="font-size: 0.65rem; padding: 0.2rem 0.5rem; {{ $isPopular ? 'background-color: #ecde1d !important; color: #000000 !important; border-color: var(--color-text) !important;' : 'background-color: var(--color-surface); color: var(--color-text);' }}">
                                {{ $package->service_name }}
                            </span>
                            <h3 class="fw-bold m-0 font-monospace" style="color: var(--color-primary); font-size: 2.2rem; font-weight: 800;">
                                <span class="fs-7 align-middle fw-bold text-muted d-block mb-1">{{ __('freelance.currency') }}</span>
                                <span class="fs-4 align-top fw-bold text-muted">Rp</span>
                                <span class="pricing-price">{{ number_format($package->price_start, 0, ',', '.') }}</span>
                            </h3>
                            <p class="text-muted small mt-3 mb-0 font-monospace" style="min-height: 48px; line-height: 1.45;">
                                {{ $package->description }}
                            </p>
                        </div>

                        <hr class="my-4" style="border-top: 2px solid var(--color-text); opacity: 1;">

                        <!-- Package Features List -->
                        <div class="flex-grow-1 mb-5">
                            <h6 class="fw-bold mb-3 font-monospace" style="color: var(--color-primary); font-size: 0.85rem; font-weight: 800;">
                                {{ __('freelance.features_heading') }}
                            </h6>
                            <ul class="list-unstyled d-flex flex-column gap-3 m-0">
                                @foreach($package->features as $feature)
                                    <li class="d-flex align-items-start gap-2.5 text-muted small font-monospace">
                                        <i class="bi bi-check-square-fill text-success fs-6 flex-shrink-0" style="text-shadow: 2px 2px 0px var(--color-text);"></i>
                                        <span class="fw-bold" style="color: var(--color-text);">{{ $feature }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- CTA Call to Action -->
                        <div>
                            @php
                                $whatsappNumber = '6281234567890'; // Default owner WhatsApp
                                $whatsappUrl = 'https://wa.me/' . $whatsappNumber . '?text=' . urlencode('Halo Danil, saya tertarik dengan paket ' . $package->service_name);
                            @endphp
                            @if($isPopular)
                                <a href="{{ $whatsappUrl }}" 
                                   target="_blank"
                                   class="neo-btn-primary w-100 py-3 text-center"
                                   style="background-color: #ecde1d !important; color: #000000 !important; border-color: var(--color-text) !important; font-size: 0.9rem;">
                                    <i class="bi bi-whatsapp me-1"></i>
                                    <span>{{ __('freelance.contact_btn') }}</span>
                                </a>
                            @else
                                <a href="{{ $whatsappUrl }}" 
                                   target="_blank"
                                   class="neo-btn-outline w-100 py-3 text-center"
                                   style="font-size: 0.9rem;">
                                    <i class="bi bi-whatsapp me-1"></i>
                                    <span>{{ __('freelance.contact_btn') }}</span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <i class="bi bi-tag-fill text-muted fs-1 mb-3 d-block"></i>
                <p class="text-muted font-monospace">No pricing packages found.</p>
            </div>
        @endforelse
    </div>
</div>

<style>
/* Saturated Popular pricing window offsets */
.popular-window {
    border-color: var(--color-text) !important;
    box-shadow: 8px 8px 0px #ecde1d !important;
}

.popular-window:hover {
    transform: translate(-3px, -3px) !important;
    box-shadow: 11px 11px 0px #ecde1d !important;
}

/* Brutalist Matrix Table Styling */
.neo-table {
    border: 3px solid var(--color-text) !important;
    border-collapse: separate !important;
    border-spacing: 0 !important;
    background-color: var(--color-bg) !important;
    border-radius: 8px !important;
    overflow: hidden;
    box-shadow: 6px 6px 0px var(--neo-shadow) !important;
}

.neo-table th {
    background-color: var(--color-primary) !important;
    color: #ffffff !important;
    font-family: 'Poppins', sans-serif !important;
    font-weight: 800 !important;
    text-transform: uppercase;
    font-size: 0.8rem !important;
    letter-spacing: 0.05em;
    border: 2px solid var(--color-text) !important;
    padding: 1rem !important;
}

.neo-table td {
    border: 2px solid var(--color-text) !important;
    padding: 1rem !important;
    color: var(--color-text) !important;
    font-size: 0.8rem !important;
    font-family: 'Inter', sans-serif !important;
}

.neo-table tr:hover td {
    background-color: var(--color-surface) !important;
}

.feature-name-col {
    background-color: var(--color-surface) !important;
    font-family: 'Poppins', sans-serif !important;
    font-weight: 800 !important;
    text-transform: uppercase;
    font-size: 0.725rem !important;
    color: var(--color-primary) !important;
}

.pricing-price {
    font-size: 2.25rem;
    font-weight: 800;
    letter-spacing: -0.5px;
}
.max-width-xl {
    max-width: 600px;
}
.max-width-lg {
    max-width: 500px;
}
.gap-2.5 {
    gap: 0.65rem;
}
</style>
@endsection
