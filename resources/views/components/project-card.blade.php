@props(['project'])

<div class="neo-window h-100 mb-0">
    <!-- Window Titlebar -->
    <div class="neo-window-header" style="background-color: var(--color-surface); color: var(--color-text);">
        <div class="d-flex align-items-center gap-2">
            <i class="bi bi-folder-fill text-muted"></i>
            <span class="neo-window-title font-monospace" style="color: var(--color-text); font-size: 0.75rem;">
                Proyek {{ str_pad($project->id, 2, '0', STR_PAD_LEFT) }}
            </span>
        </div>
        <div class="neo-window-dots">
            <span class="neo-window-dot dot-red" style="width: 8px; height: 8px;"></span>
            <span class="neo-window-dot dot-yellow" style="width: 8px; height: 8px;"></span>
            <span class="neo-window-dot dot-green" style="width: 8px; height: 8px;"></span>
        </div>
    </div>
    
    <!-- Window Body -->
    <div class="neo-window-body d-flex flex-column h-100 p-3">
        <!-- Thumbnail Graphic Box -->
        <div class="position-relative overflow-hidden neo-card p-0 mb-3 bg-white" style="height: 190px; box-shadow: 4px 4px 0px var(--neo-shadow) !important;">
            @if($project->thumbnail)
                <img src="{{ asset($project->thumbnail) }}" 
                     alt="{{ $project->title }}" 
                     class="w-100 h-100 object-fit-cover" 
                     style="transition: transform 0.5s ease;">
            @else
                <!-- Engineering Fallback Graphic -->
                <div class="w-100 h-100 d-flex flex-column justify-content-between p-4" 
                     style="background: linear-gradient(135deg, var(--color-primary) 0%, #101c42 100%);">
                    <div class="d-flex justify-content-end align-items-center opacity-10">
                        <i class="bi bi-cpu-fill display-2 text-white"></i>
                    </div>
                    <div class="mt-auto">
                        <div class="d-flex align-items-center gap-2">
                            <span class="neo-badge text-dark font-monospace" style="font-size: 0.6rem; padding: 0.15rem 0.35rem; box-shadow: none; background-color: var(--color-secondary);">
                                {{ strtoupper(substr($project->category, 0, 3)) }}
                            </span>
                            <span class="text-white text-opacity-50 small font-monospace" style="font-size: 0.7rem;">NO_#{{ str_pad($project->id, 3, '0', STR_PAD_LEFT) }}</span>
                        </div>
                        <h2 class="text-white text-opacity-15 fw-bold font-monospace m-0 display-4 position-absolute bottom-0 end-0 pe-3 pb-2 select-none" style="pointer-events: none; font-size: 2.2rem;">
                            {{ strtoupper(implode('', array_map(fn($w) => $w[0] ?? '', explode(' ', $project->title)))) }}
                        </h2>
                    </div>
                </div>
            @endif
        </div>

        <!-- Badges & Tags Row -->
        <div class="d-flex flex-wrap gap-2 mb-3">
            <span class="neo-badge" style="font-size: 0.6rem; padding: 0.2rem 0.5rem; background-color: var(--color-primary); color: #ffffff; border-color: var(--color-text);">
                <i class="bi bi-tag-fill me-1"></i> {{ $project->category }}
            </span>
            @if($project->is_featured)
                <span class="neo-badge" style="font-size: 0.6rem; padding: 0.2rem 0.5rem; background-color: var(--color-secondary); color: var(--color-text); border-color: var(--color-text);">
                    <i class="bi bi-star-fill me-1 text-primary"></i> {{ __('projects.featured') }}
                </span>
            @endif
        </div>

        <!-- Text Description Blocks -->
        <h5 class="fw-bold mb-2 font-monospace text-truncate-2" style="color: var(--color-primary); min-height: 2.8rem; font-size: 1.05rem;" title="{{ $project->title }}">
            {{ $project->title }}
        </h5>
        
        <p class="text-muted small leading-relaxed mb-4 font-monospace text-truncate-3" style="text-align: justify; font-size: 0.8rem; min-height: 3.6rem;">
            {{ $project->description }}
        </p>

        <!-- Tech Stack Badge Register -->
        <div class="mt-auto">
            <div class="d-flex flex-wrap mb-4" style="gap: 6px; min-height: 3rem; align-content: flex-start;">
                @foreach($project->tech_stack as $tech)
                    <span class="neo-badge text-muted font-monospace" style="font-size: 0.6rem; padding: 0.15rem 0.4rem; box-shadow: none; background-color: var(--color-bg);">
                        {{ $tech }}
                    </span>
                @endforeach
            </div>

            <hr class="mb-3 opacity-15" style="border-top: 2px solid var(--color-text);">

            <!-- Tactile Buttons -->
            <div class="d-flex gap-2">
                <a href="{{ route('projects.show', $project->id) }}" 
                   class="neo-btn-outline w-50 py-2 fs-8 text-center"
                   style="font-size: 0.75rem;">
                    <i class="bi bi-info-circle me-1"></i> Detail
                </a>
                
                @if($project->demo_url)
                    <a href="{{ $project->demo_url }}" target="_blank" 
                       class="neo-btn-primary w-50 py-2 fs-8 text-center"
                       style="font-size: 0.75rem;">
                        <i class="bi bi-box-arrow-up-right me-1"></i> Demo
                    </a>
                @elseif($project->repo_url)
                    <a href="{{ $project->repo_url }}" target="_blank" 
                       class="neo-btn-primary w-50 py-2 fs-8 text-center"
                       style="background-color: #24292e !important; font-size: 0.75rem;">
                        <i class="bi bi-github me-1"></i> GitHub
                    </a>
                @else
                    <button class="neo-btn-outline w-50 py-2 fs-8 text-muted border-dashed" style="box-shadow: none !important; transform: none !important; cursor: not-allowed; background-color: var(--color-bg) !important;" disabled>
                        <i class="bi bi-lock-fill me-1"></i> Private
                    </button>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
.text-truncate-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.text-truncate-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
