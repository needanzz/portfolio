<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard') | IS-Portfolio</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS & JS Assets (Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <!-- Synchronous theme restoration to prevent flashing before page render -->
    <script>
        (function () {
            const theme = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-bs-theme', theme);
            if (theme === 'dark') {
                document.body.classList.add('dark-mode');
            }
        })();
    </script>

    <div id="app-wrapper">
        <!-- Sidebar Navigation -->
        @include('components.sidebar')

        <!-- Mobile Sidebar Overlay -->
        <div class="sidebar-overlay" onclick="toggleSidebar()"></div>

        <!-- Main Content Area -->
        <div id="main-content">
            <!-- Navbar Header -->
            @include('components.navbar')

            <!-- Dynamic Page Content -->
            <main id="page-content">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
