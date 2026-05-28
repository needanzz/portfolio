@extends('layouts.app')

@section('title', __('projects.title'))

@section('content')
<div class="container-fluid p-0">
    <!-- Header Section -->
    <div class="row mb-5">
        <div class="col-12 text-center text-md-start">
            <h3 class="fw-bold mb-2 font-monospace" style="color: var(--color-primary); font-weight: 800;">
                <i class="bi bi-folder2-open me-2"></i> {{ __('projects.title') }}
            </h3>
            <p class="text-muted mb-0 max-width-xl fs-6 font-monospace">
                {{ __('projects.subtitle') }}
            </p>
        </div>
    </div>

    <!-- Filter & Search Toolbar Window -->
    <div class="neo-window mb-5">
        <div class="neo-window-header">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-sliders"></i>
                <span class="neo-window-title font-monospace">Pencarian & Penyaringan</span>
            </div>
            <div class="neo-window-dots">
                <span class="neo-window-dot dot-red"></span>
                <span class="neo-window-dot dot-yellow"></span>
                <span class="neo-window-dot dot-green"></span>
            </div>
        </div>
        <div class="neo-window-body p-4">
            <div class="row g-4 align-items-center justify-content-between">
                <!-- Category Pills Trigger -->
                <div class="col-12 col-xl-7 order-2 order-xl-1">
                    <div class="d-flex flex-wrap gap-2 filter-pills-container" id="category-pills">
                        <!-- 'All' Pill -->
                        <button class="btn filter-pill active" data-category="all">
                            <i class="bi bi-grid-fill me-1.5"></i> {{ __('projects.all_categories') }}
                        </button>
                        <!-- Dynamic Pills -->
                        @foreach($categories as $category)
                            <button class="btn filter-pill" data-category="{{ $category }}">
                                @if(strtolower($category) === 'web')
                                    <i class="bi bi-globe me-1.5"></i>
                                @elseif(strtolower($category) === 'mobile')
                                    <i class="bi bi-phone me-1.5"></i>
                                @else
                                    <i class="bi bi-tag-fill me-1.5"></i>
                                @endif
                                {{ $category }}
                            </button>
                        @endforeach
                    </div>
                </div>
                <!-- Search Bar Input -->
                <div class="col-12 col-xl-4 order-1 order-xl-2">
                    <div class="input-group search-input-group p-0 bg-body" 
                         style="border: 2px solid var(--color-text); border-radius: 6px; box-shadow: 3px 3px 0 var(--neo-shadow); overflow: hidden;">
                        <span class="input-group-text border-0 bg-transparent pe-1">
                            <i class="bi bi-search text-muted"></i>
                        </span>
                        <input type="text" 
                               id="search-input" 
                               class="form-control border-0 py-2.5 bg-transparent font-monospace font-medium shadow-none fs-7" 
                               placeholder="{{ __('projects.search_placeholder') }}" 
                               autocomplete="off">
                        <span class="input-group-text border-0 bg-transparent ps-1" id="search-clear-btn" style="cursor: pointer; display: none;">
                            <i class="bi bi-x-circle-fill text-muted hover-text-danger"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Projects Grid Container -->
    <div class="row g-4" id="projects-grid">
        @forelse($projects as $project)
            <div class="col-12 col-md-6 col-lg-4 col-xxl-3 project-card-wrapper">
                <x-project-card :project="$project" />
            </div>
        @empty
            <div class="col-12 text-center py-5" id="no-projects-blade-fallback">
                <div class="neo-card p-5 d-inline-block text-center max-width-md mx-auto" style="background-color: var(--color-surface);">
                    <i class="bi bi-folder-x display-3 text-muted mb-3 d-block"></i>
                    <h5 class="fw-bold mb-2 font-monospace">{{ __('projects.no_projects') }}</h5>
                </div>
            </div>
        @endforelse
    </div>
</div>

<style>
/* Brutalist Filter Pills Styling */
.filter-pill {
    background-color: var(--color-bg) !important;
    border: 2px solid var(--color-text) !important;
    color: var(--color-text) !important;
    padding: 0.45rem 1.15rem !important;
    font-size: 0.75rem !important;
    font-weight: 800 !important;
    font-family: 'Poppins', sans-serif !important;
    text-transform: uppercase;
    border-radius: 6px !important;
    box-shadow: 3px 3px 0px var(--neo-shadow) !important;
    transition: transform 0.1s ease, box-shadow 0.1s ease, background-color 0.15s ease !important;
}

.filter-pill:hover {
    transform: translate(-2px, -2px) !important;
    box-shadow: 5px 5px 0px var(--neo-shadow) !important;
    background-color: var(--color-surface) !important;
}

.filter-pill.active {
    background-color: var(--color-primary) !important;
    color: #ffffff !important;
    box-shadow: 2px 2px 0px var(--neo-shadow) !important;
    transform: translate(1px, 1px) !important;
}

/* Neo Brutalist Skeleton Card */
.skeleton-card {
    height: 480px;
    background-color: var(--color-surface);
    border: 2px solid var(--color-text) !important;
    border-radius: 8px !important;
    box-shadow: 6px 6px 0px var(--neo-shadow) !important;
    overflow: hidden;
    position: relative;
}
.skeleton-thumbnail {
    height: 190px;
    background: linear-gradient(90deg, var(--color-border) 25%, var(--color-bg) 50%, var(--color-border) 75%);
    background-size: 200% 100%;
    animation: shimmer 1.5s infinite;
    border-bottom: 2px solid var(--color-text);
}
.skeleton-body {
    padding: 1.5rem;
}
.skeleton-title {
    height: 1.5rem;
    width: 75%;
    background: linear-gradient(90deg, var(--color-border) 25%, var(--color-bg) 50%, var(--color-border) 75%);
    background-size: 200% 100%;
    animation: shimmer 1.5s infinite;
    border-radius: 0.25rem;
    margin-bottom: 1rem;
    border: 1.5px solid var(--color-text);
}
.skeleton-text {
    height: 0.8rem;
    background: linear-gradient(90deg, var(--color-border) 25%, var(--color-bg) 50%, var(--color-border) 75%);
    background-size: 200% 100%;
    animation: shimmer 1.5s infinite;
    border-radius: 0.25rem;
    margin-bottom: 0.6rem;
}
.skeleton-badge {
    height: 1.5rem;
    width: 60px;
    display: inline-block;
    background: linear-gradient(90deg, var(--color-border) 25%, var(--color-bg) 50%, var(--color-border) 75%);
    background-size: 200% 100%;
    animation: shimmer 1.5s infinite;
    border-radius: 0.25rem;
    margin-right: 0.5rem;
    border: 1.5px solid var(--color-text);
}

@keyframes shimmer {
    0% { background-position: 200% 0; }
    100% { background-position: -200% 0; }
}

/* Fade-in Animation for Cards */
.fade-in-item {
    animation: fadeIn 0.3s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    opacity: 0;
    transform: translateY(10px);
}
@keyframes fadeIn {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

<!-- Live JS Implementation Engine -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search-input');
    const clearBtn = document.getElementById('search-clear-btn');
    const categoryPills = document.querySelectorAll('.filter-pill');
    const projectsGrid = document.getElementById('projects-grid');
    
    let activeCategory = 'all';
    let searchQuery = '';
    let debounceTimer;

    // Define translations directly mapping from localized Blade strings
    const langDict = {
        featured: "{{ __('projects.featured') }}",
        noProjects: "{{ __('projects.no_projects') }}",
        viewDetails: "{{ __('projects.view_details') }}"
    };

    // Helper utility to sanitize dynamic strings to prevent DOM-based XSS
    function escapeHtml(str) {
        if (!str) return '';
        return String(str)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }

    // 1. Debounced Search input handler
    searchInput.addEventListener('input', function(e) {
        searchQuery = e.target.value;
        
        // Show/hide clear button
        if (searchQuery.length > 0) {
            clearBtn.style.display = 'flex';
        } else {
            clearBtn.style.display = 'none';
        }

        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(() => {
            fetchFilteredProjects();
        }, 300); // 300ms debounce to prevent API pounding
    });

    // 2. Clear Search input
    clearBtn.addEventListener('click', function() {
        searchInput.value = '';
        searchQuery = '';
        clearBtn.style.display = 'none';
        fetchFilteredProjects();
    });

    // 3. Category Pill Toggle Handler
    categoryPills.forEach(pill => {
        pill.addEventListener('click', function() {
            // Set active classes
            categoryPills.forEach(p => p.classList.remove('active'));
            this.classList.add('active');

            activeCategory = this.getAttribute('data-category');
            fetchFilteredProjects();
        });
    });

    // 4. Main fetch filtered projects API handler
    function fetchFilteredProjects() {
        // Render beautiful skeletons in grid
        renderSkeletons();

        // Build URL query params
        const params = new URLSearchParams();
        if (activeCategory !== 'all') {
            params.append('category', activeCategory);
        }
        if (searchQuery.trim() !== '') {
            params.append('search', searchQuery.trim());
        }

        const url = `/api/projects?${params.toString()}`;

        // Retrieve dynamically with native fetch
        fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => {
            if (!response.ok) throw new Error('API failure');
            return response.json();
        })
        .then(result => {
            if (result.success) {
                renderProjects(result.data);
            }
        })
        .catch(err => {
            console.error('Filtering error:', err);
            projectsGrid.innerHTML = `
                <div class="col-12 text-center py-5">
                    <div class="neo-card p-4 d-inline-block text-center max-width-md mx-auto" style="background-color: var(--color-surface);">
                        <i class="bi bi-exclamation-triangle-fill display-4 text-danger mb-3 d-block"></i>
                        <h6 class="fw-bold mb-1 font-monospace">Failed to fetch data</h6>
                        <p class="text-muted small m-0 font-monospace">Please check your database connectivity.</p>
                    </div>
                </div>
            `;
        });
    }

    // 5. Render Skeletons for smooth shimmers
    function renderSkeletons() {
        let skeletonsHTML = '';
        for (let i = 0; i < 4; i++) {
            skeletonsHTML += `
                <div class="col-12 col-md-6 col-lg-4 col-xxl-3">
                    <div class="skeleton-card">
                        <div class="skeleton-thumbnail"></div>
                        <div class="skeleton-body">
                            <div class="skeleton-title"></div>
                            <div class="skeleton-text" style="width: 95%;"></div>
                            <div class="skeleton-text" style="width: 85%;"></div>
                            <div class="skeleton-text" style="width: 90%;"></div>
                            <div class="mt-4">
                                <span class="skeleton-badge"></span>
                                <span class="skeleton-badge"></span>
                                <span class="skeleton-badge"></span>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }
        projectsGrid.innerHTML = skeletonsHTML;
    }

    // 6. Build high-fidelity dynamic DOM elements matching project-card.blade.php
    function renderProjects(projects) {
        projectsGrid.innerHTML = '';

        if (projects.length === 0) {
            projectsGrid.innerHTML = `
                <div class="col-12 text-center py-5 fade-in-item">
                    <div class="neo-card p-5 d-inline-block text-center max-width-md mx-auto" style="background-color: var(--color-surface);">
                        <i class="bi bi-folder-x display-3 text-muted mb-3 d-block"></i>
                        <h5 class="fw-bold mb-2 font-monospace">${langDict.noProjects}</h5>
                    </div>
                </div>
            `;
            return;
        }

        projects.forEach((project, index) => {
            // Build elements
            const col = document.createElement('div');
            col.className = `col-12 col-md-6 col-lg-4 col-xxl-3 project-card-wrapper fade-in-item`;
            col.style.animationDelay = `${index * 0.04}s`; // staggered clean animations!

            // Add safe defaults fallbacks to prevent TypeError crashes
            const projectTitle = project.title || '';
            const projectCategory = project.category || 'Web';
            const projectDescription = project.description || '';
            const projectDemoUrl = project.demo_url || '';
            const projectRepoUrl = project.repo_url || '';
            const projectTechStack = Array.isArray(project.tech_stack) ? project.tech_stack : [];

            // Cast properties safely with HTML escaping
            const techBadges = projectTechStack.map(tech => `
                <span class="neo-badge text-muted font-monospace" style="font-size: 0.6rem; padding: 0.15rem 0.4rem; box-shadow: none; background-color: var(--color-bg);">
                    ${escapeHtml(tech)}
                </span>
            `).join('');

            // Fallback Initials calculation safely
            const initials = projectTitle.split(' ').map(w => w[0] || '').join('').toUpperCase();

            // Thumbnail visual construction safely
            let thumbnailHTML = '';
            if (project.thumbnail) {
                thumbnailHTML = `
                    <img src="/${project.thumbnail}" 
                         alt="${escapeHtml(projectTitle)}" 
                         class="w-100 h-100 object-fit-cover" 
                         style="transition: transform 0.5s ease;">
                `;
            } else {
                thumbnailHTML = `
                    <div class="w-100 h-100 d-flex flex-column justify-content-between p-4" 
                         style="background: linear-gradient(135deg, var(--color-primary) 0%, #101c42 100%);">
                        <div class="d-flex justify-content-end align-items-center opacity-10">
                            <i class="bi bi-cpu-fill display-2 text-white"></i>
                        </div>
                        <div class="mt-auto">
                            <div class="d-flex align-items-center gap-2">
                                <span class="neo-badge text-dark font-monospace" style="font-size: 0.6rem; padding: 0.15rem 0.35rem; box-shadow: none; background-color: var(--color-secondary);">
                                    ${escapeHtml(projectCategory.toUpperCase().substring(0, 3))}
                                </span>
                                <span class="text-white text-opacity-50 small font-monospace" style="font-size: 0.7rem;">NO_#${String(project.id).padStart(3, '0')}</span>
                            </div>
                            <h2 class="text-white text-opacity-15 fw-bold font-monospace m-0 display-4 position-absolute bottom-0 end-0 pe-3 pb-2 select-none" style="pointer-events: none; font-size: 2.2rem;">
                                ${escapeHtml(initials)}
                            </h2>
                        </div>
                    </div>
                `;
            }

            // Featured Badge check
            const featuredBadge = project.is_featured ? `
                <span class="neo-badge" style="font-size: 0.6rem; padding: 0.2rem 0.5rem; background-color: var(--color-secondary); color: var(--color-text); border-color: var(--color-text);">
                    <i class="bi bi-star-fill me-1 text-primary"></i> ${langDict.featured}
                </span>
            ` : '';

            // Buttons configuration
            let buttonPrimaryHTML = '';
            if (projectDemoUrl) {
                buttonPrimaryHTML = `
                    <a href="${projectDemoUrl}" target="_blank" 
                       class="neo-btn-primary w-50 py-2 fs-8 text-center"
                       style="font-size: 0.75rem;">
                        <i class="bi bi-box-arrow-up-right me-1"></i> Demo
                    </a>
                `;
            } else if (projectRepoUrl) {
                buttonPrimaryHTML = `
                    <a href="${projectRepoUrl}" target="_blank" 
                       class="neo-btn-primary w-50 py-2 fs-8 text-center"
                       style="background-color: #24292e !important; font-size: 0.75rem;">
                        <i class="bi bi-github me-1"></i> GitHub
                    </a>
                `;
            } else {
                buttonPrimaryHTML = `
                    <button class="neo-btn-outline w-50 py-2 fs-8 text-muted border-dashed" style="box-shadow: none !important; transform: none !important; cursor: not-allowed; background-color: var(--color-bg) !important;" disabled>
                        <i class="bi bi-lock-fill me-1"></i> Private
                    </button>
                `;
            }

            col.innerHTML = `
                <div class="neo-window h-100 mb-0">
                    <div class="neo-window-header" style="background-color: var(--color-surface); color: var(--color-text);">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-folder-fill text-muted"></i>
                            <span class="neo-window-title font-monospace" style="color: var(--color-text); font-size: 0.75rem;">
                                Proyek ${String(project.id).padStart(2, '0')}
                            </span>
                        </div>
                        <div class="neo-window-dots">
                            <span class="neo-window-dot dot-red" style="width: 8px; height: 8px;"></span>
                            <span class="neo-window-dot dot-yellow" style="width: 8px; height: 8px;"></span>
                            <span class="neo-window-dot dot-green" style="width: 8px; height: 8px;"></span>
                        </div>
                    </div>
                    
                    <div class="neo-window-body d-flex flex-column h-100 p-3">
                        <div class="position-relative overflow-hidden neo-card p-0 mb-3 bg-white" style="height: 190px; box-shadow: 4px 4px 0px var(--neo-shadow) !important;">
                            ${thumbnailHTML}
                        </div>

                        <div class="d-flex flex-wrap gap-2 mb-3">
                            <span class="neo-badge" style="font-size: 0.6rem; padding: 0.2rem 0.5rem; background-color: var(--color-primary); color: #ffffff; border-color: var(--color-text);">
                                <i class="bi bi-tag-fill me-1"></i> ${escapeHtml(projectCategory)}
                            </span>
                            ${featuredBadge}
                        </div>

                        <h5 class="fw-bold mb-2 font-monospace text-truncate-2" style="color: var(--color-primary); min-height: 2.8rem; font-size: 1.05rem;" title="${escapeHtml(projectTitle)}">
                            ${escapeHtml(projectTitle)}
                        </h5>
                        
                        <p class="text-muted small leading-relaxed mb-4 font-monospace text-truncate-3" style="text-align: justify; font-size: 0.8rem; min-height: 3.6rem;">
                            ${escapeHtml(projectDescription)}
                        </p>

                        <div class="mt-auto">
                            <div class="d-flex flex-wrap mb-4" style="gap: 6px; min-height: 3rem; align-content: flex-start;">
                                ${techBadges}
                            </div>

                            <hr class="mb-3 opacity-15" style="border-top: 2px solid var(--color-text);">

                            <div class="d-flex gap-2">
                                <a href="/projects/${project.id}" 
                                   class="neo-btn-outline w-50 py-2 fs-8 text-center"
                                   style="font-size: 0.75rem;">
                                    <i class="bi bi-info-circle me-1"></i> Detail
                                </a>
                                ${buttonPrimaryHTML}
                            </div>
                        </div>
                    </div>
                </div>
            `;
            projectsGrid.appendChild(col);
        });
    }
});
</script>
@endsection
