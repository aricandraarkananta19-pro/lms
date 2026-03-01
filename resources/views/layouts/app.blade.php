<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'T-LMS Enterprise') }}</title>
    <meta name="description"
        content="T-LMS Enterprise - Corporate Learning & Compliance Platform by Talenta Traincom Indonesia">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0
        }

        :root {
            /* Brand Colors */
            --primary: #4F46E5;
            --primary-light: #6366F1;
            --primary-lighter: #EEF2FF;
            --primary-dark: #4338CA;

            --accent: #0EA5E9;
            --accent-light: #38BDF8;
            --accent-lighter: #E0F2FE;

            --success: #10B981;
            --success-light: #D1FAE5;
            --warning: #F59E0B;
            --warning-light: #FEF3C7;
            --danger: #EF4444;
            --danger-light: #FEE2E2;

            /* Neutrals */
            --bg: #F1F5F9;
            --bg-card: #FFFFFF;
            --bg-sidebar: #FFFFFF;
            --bg-hover: #F8FAFC;

            --text-primary: #0F172A;
            --text-secondary: #475569;
            --text-muted: #94A3B8;
            --text-white: #FFFFFF;

            --border: #E2E8F0;
            --border-light: #F1F5F9;

            --shadow-sm: 0 1px 2px rgba(0, 0, 0, .05);
            --shadow: 0 1px 3px rgba(0, 0, 0, .08), 0 1px 2px rgba(0, 0, 0, .04);
            --shadow-md: 0 4px 6px rgba(0, 0, 0, .06), 0 2px 4px rgba(0, 0, 0, .04);
            --shadow-lg: 0 10px 15px rgba(0, 0, 0, .08), 0 4px 6px rgba(0, 0, 0, .04);

            --sidebar-w: 264px;
            --topbar-h: 64px;
            --radius: 12px;
            --radius-lg: 16px;
        }

        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--bg);
            color: var(--text-primary);
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* ========== SIDEBAR ========== */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-w);
            height: 100vh;
            background: var(--bg-sidebar);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            z-index: 50;
            transition: transform .3s cubic-bezier(.4, 0, .2, 1);
        }

        .sidebar-header {
            padding: 20px 20px 16px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid var(--border-light);
        }

        .sidebar-logo {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 18px;
            color: var(--text-white);
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(79, 70, 229, .3);
        }

        .sidebar-brand {
            font-weight: 800;
            font-size: 15px;
            color: var(--text-primary);
            line-height: 1.2;
        }

        .sidebar-brand small {
            display: block;
            font-weight: 500;
            font-size: 10px;
            color: var(--text-muted);
            margin-top: 2px;
            letter-spacing: .02em;
        }

        .sidebar-nav {
            flex: 1;
            padding: 12px;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .sidebar-nav::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar-nav::-webkit-scrollbar-thumb {
            background: var(--border);
            border-radius: 4px;
        }

        .nav-label {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: .08em;
            color: var(--text-muted);
            padding: 16px 12px 6px;
            font-weight: 700;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 12px;
            border-radius: 10px;
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            transition: all .15s ease;
            margin-bottom: 1px;
            position: relative;
        }

        .nav-item:hover {
            background: var(--primary-lighter);
            color: var(--primary);
        }

        .nav-item.active {
            background: var(--primary-lighter);
            color: var(--primary);
            font-weight: 600;
        }

        .nav-item.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 3px;
            height: 20px;
            background: var(--primary);
            border-radius: 0 4px 4px 0;
        }

        .nav-icon {
            width: 20px;
            height: 20px;
            flex-shrink: 0;
            stroke-width: 1.8;
        }

        .nav-badge {
            margin-left: auto;
            background: var(--danger);
            color: var(--text-white);
            font-size: 10px;
            padding: 2px 7px;
            border-radius: 10px;
            font-weight: 700;
            line-height: 1.4;
        }

        .sidebar-footer {
            padding: 12px;
            border-top: 1px solid var(--border-light);
        }

        .user-card {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 12px;
            background: var(--bg);
            transition: background .15s;
        }

        .user-card:hover {
            background: var(--primary-lighter);
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 13px;
            color: var(--text-white);
            flex-shrink: 0;
        }

        .user-name {
            font-size: 13px;
            font-weight: 600;
            color: var(--text-primary);
        }

        .user-role {
            font-size: 11px;
            color: var(--text-muted);
        }

        .logout-btn {
            background: none;
            border: none;
            cursor: pointer;
            color: var(--text-muted);
            padding: 6px;
            border-radius: 8px;
            transition: all .15s;
            display: flex;
            align-items: center;
        }

        .logout-btn:hover {
            background: var(--danger-light);
            color: var(--danger);
        }

        /* ========== MAIN AREA ========== */
        .main-wrapper {
            margin-left: var(--sidebar-w);
            min-height: 100vh;
        }

        .topbar {
            position: sticky;
            top: 0;
            z-index: 40;
            height: var(--topbar-h);
            padding: 0 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(255, 255, 255, .85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border);
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .topbar-left h1 {
            font-size: 18px;
            font-weight: 700;
            color: var(--text-primary);
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .search-input {
            width: 260px;
            padding: 8px 14px 8px 36px;
            border: 1px solid var(--border);
            border-radius: 10px;
            font-size: 13px;
            font-family: inherit;
            color: var(--text-primary);
            background: var(--bg) url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='none' stroke='%2394A3B8' viewBox='0 0 24 24'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z'/%3E%3C/svg%3E") 12px center no-repeat;
            outline: none;
            transition: all .2s;
        }

        .search-input::placeholder {
            color: var(--text-muted);
        }

        .search-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, .1);
            background-color: var(--bg-card);
        }

        .topbar-btn {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: var(--bg);
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-secondary);
            cursor: pointer;
            position: relative;
            transition: all .15s;
        }

        .topbar-btn:hover {
            background: var(--primary-lighter);
            border-color: var(--primary-lighter);
            color: var(--primary);
        }

        .notif-dot {
            position: absolute;
            top: 8px;
            right: 8px;
            width: 8px;
            height: 8px;
            background: var(--danger);
            border-radius: 50%;
            border: 2px solid var(--bg-card);
        }

        .main-content {
            padding: 24px;
        }

        /* ========== OVERRIDE OLD TAILWIND FOR LIGHT ========== */
        .main-content .bg-gray-50,
        .main-content .bg-gray-100 {
            background: transparent !important;
        }

        .main-content .min-h-screen {
            min-height: auto !important;
        }

        .main-content .bg-white {
            background: var(--bg-card) !important;
            border: 1px solid var(--border) !important;
            box-shadow: var(--shadow-sm) !important;
        }

        .main-content .rounded-xl,
        .main-content .rounded-2xl {
            border-radius: var(--radius-lg) !important;
        }

        .main-content .shadow-sm {
            box-shadow: var(--shadow-sm) !important;
        }

        .main-content .bg-indigo-600 {
            background: var(--primary) !important;
            border-color: transparent !important;
        }

        .main-content .hover\:bg-indigo-700:hover {
            background: var(--primary-dark) !important;
        }

        .main-content .focus\:ring-indigo-500:focus {
            --tw-ring-color: var(--primary) !important;
            border-color: var(--primary) !important;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, .15) !important;
        }

        .main-content .focus\:border-indigo-500:focus {
            border-color: var(--primary) !important;
        }

        .main-content .max-w-7xl,
        .main-content .max-w-4xl,
        .main-content .max-w-3xl {
            max-width: 100% !important;
            padding-left: 0 !important;
            padding-right: 0 !important;
        }

        .main-content .py-8,
        .main-content .py-12 {
            padding-top: 0 !important;
            padding-bottom: 0 !important;
        }

        .main-content .sm\:px-6,
        .main-content .lg\:px-8 {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }

        .main-content input,
        .main-content select,
        .main-content textarea {
            border-radius: 10px !important;
        }

        .main-content input:focus,
        .main-content select:focus,
        .main-content textarea:focus {
            border-color: var(--primary) !important;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, .12) !important;
        }

        /* ========== MOBILE ========== */
        .mobile-toggle {
            display: none;
            background: none;
            border: none;
            color: var(--text-primary);
            cursor: pointer;
            padding: 4px;
        }

        .mobile-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, .4);
            backdrop-filter: blur(4px);
            z-index: 45;
        }

        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
                box-shadow: var(--shadow-lg);
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main-wrapper {
                margin-left: 0;
            }

            .mobile-toggle {
                display: flex;
            }

            .mobile-overlay.show {
                display: block;
            }

            .search-input {
                width: 180px;
            }
        }

        @media (max-width: 640px) {
            .search-input {
                display: none;
            }

            .main-content {
                padding: 16px;
            }
        }
    </style>
    @stack('styles')
</head>

<body>
    <div class="mobile-overlay" id="overlay" onclick="toggleSidebar()"></div>

    <!-- SIDEBAR -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">T</div>
            <div class="sidebar-brand">
                T-LMS Enterprise
                <small>Talenta Traincom Indonesia</small>
            </div>
        </div>

        <nav class="sidebar-nav">
            <div class="nav-label">Overview</div>
            <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Dashboard
            </a>
            <a href="{{ route('analytics.index') }}"
                class="nav-item {{ request()->routeIs('analytics.*') ? 'active' : '' }}">
                <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
                Analitik
            </a>

            <div class="nav-label">Pembelajaran</div>
            <a href="{{ route('courses.index') }}"
                class="nav-item {{ request()->routeIs('courses.*') ? 'active' : '' }}">
                <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                Pelatihan
            </a>
            <a href="{{ route('learning-paths.index') }}"
                class="nav-item {{ request()->routeIs('learning-paths.*') ? 'active' : '' }}">
                <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                </svg>
                Learning Path
            </a>
            <a href="{{ route('tasks.index') }}"
                class="nav-item {{ request()->routeIs('tasks.*') || request()->routeIs('courses.tasks.*') ? 'active' : '' }}">
                <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                </svg>
                Tugas
            </a>
            <a href="{{ route('quizzes.index') }}"
                class="nav-item {{ request()->routeIs('quizzes.*') || request()->routeIs('courses.quizzes.*') ? 'active' : '' }}">
                <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Kuis
            </a>
            <a href="{{ route('webinars.index') }}"
                class="nav-item {{ request()->routeIs('webinars.*') ? 'active' : '' }}">
                <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                </svg>
                Live Webinar
            </a>

            @if(auth()->user()->role === 'admin')
                <div class="nav-label">Manajemen</div>
                <a href="{{ route('employees.index') }}"
                    class="nav-item {{ request()->routeIs('employees.*') ? 'active' : '' }}">
                    <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Karyawan
                </a>
                <a href="{{ route('compliance.index') }}"
                    class="nav-item {{ request()->routeIs('compliance.*') ? 'active' : '' }}">
                    <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    Kepatuhan
                    <span class="nav-badge">5</span>
                </a>
                <a href="{{ route('certifications.index') }}"
                    class="nav-item {{ request()->routeIs('certifications.*') ? 'active' : '' }}">
                    <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                    </svg>
                    Sertifikat
                </a>
            @endif

            <div class="nav-label">Laporan</div>
            <a href="{{ route('profile.edit') }}"
                class="nav-item {{ request()->routeIs('profile.*') ? 'active' : '' }}">
                <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                Pengaturan
            </a>
        </nav>

        <div class="sidebar-footer">
            <div class="user-card">
                <div class="user-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 2)) }}</div>
                <div style="flex:1;min-width:0;">
                    <div class="user-name">{{ Auth::user()->name }}</div>
                    <div class="user-role">{{ Auth::user()->role === 'admin' ? 'HR Admin' : 'Peserta' }}</div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn" title="Keluar">
                        <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- MAIN -->
    <div class="main-wrapper">
        <header class="topbar">
            <div class="topbar-left">
                <button class="mobile-toggle" onclick="toggleSidebar()">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                @isset($header)
                    {{ $header }}
                @endisset
            </div>
            <div class="topbar-right">
                <input type="text" class="search-input" placeholder="Cari pelatihan, karyawan...">
                <div class="topbar-btn" title="Notifikasi">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <span class="notif-dot"></span>
                </div>
            </div>
        </header>

        <main class="main-content">
            {{ $slot }}
        </main>
    </div>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('open');
            document.getElementById('overlay').classList.toggle('show');
        }
    </script>
    @stack('scripts')
</body>

</html>