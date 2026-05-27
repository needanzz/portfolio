import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap-icons/font/bootstrap-icons.css';
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

// Toggle Sidebar function
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    if (sidebar) {
        sidebar.classList.toggle('collapsed');
        const isCollapsed = sidebar.classList.contains('collapsed');
        localStorage.setItem('sidebar_collapsed', isCollapsed ? 'true' : 'false');
    }
}

// Toggle Dark Mode function
function toggleDarkMode() {
    const body = document.body;
    body.classList.toggle('dark-mode');
    
    const isDark = body.classList.contains('dark-mode');
    const newTheme = isDark ? 'dark' : 'light';
    localStorage.setItem('theme', newTheme);
    
    // Set Bootstrap 5 dark theme attribute
    document.documentElement.setAttribute('data-bs-theme', newTheme);
}

// DOMContentLoaded listener to restore state
document.addEventListener('DOMContentLoaded', () => {
    // Restore sidebar state
    const sidebar = document.getElementById('sidebar');
    if (sidebar) {
        const sidebarCollapsed = localStorage.getItem('sidebar_collapsed');
        if (sidebarCollapsed === 'true' || (sidebarCollapsed === null && window.innerWidth < 768)) {
            sidebar.classList.add('collapsed');
        } else {
            sidebar.classList.remove('collapsed');
        }
    }

    // Restore dark mode theme state
    const currentTheme = localStorage.getItem('theme') || 'light';
    if (currentTheme === 'dark') {
        document.body.classList.add('dark-mode');
        document.documentElement.setAttribute('data-bs-theme', 'dark');
    } else {
        document.body.classList.remove('dark-mode');
        document.documentElement.setAttribute('data-bs-theme', 'light');
    }
});

// Expose functions to window object
window.toggleSidebar = toggleSidebar;
window.toggleDarkMode = toggleDarkMode;