<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Perpustakaan')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logoririn.png') }}">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f6fa;
            color: #1f2937;
        }

        a {
            text-decoration: none;
        }

        /* ===============================
           LAYOUT
        =============================== */

        .app-layout {
            min-height: 100vh;
            display: flex;
        }

        /* ===============================
           SIDEBAR
        =============================== */

        .sidebar {
            width: 245px;
            min-height: 100vh;
            background: linear-gradient(180deg, #172554, #1e1b4b);
            color: white;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            z-index: 10;
        }

        .sidebar-brand {
            height: 80px;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 24px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .brand-logo {
            width: 42px;
            height: 42px;
            background: linear-gradient(135deg, #f4c95d, #d4a72c);
            color: #172554;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
            font-weight: bold;
        }

        .brand-text h2 {
            font-size: 17px;
            margin-bottom: 3px;
        }

        .brand-text span {
            font-size: 10px;
            color: rgba(255,255,255,0.6);
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .sidebar-menu {
            padding: 25px 14px;
        }

        .menu-label {
            color: rgba(255,255,255,0.4);
            font-size: 10px;
            font-weight: bold;
            letter-spacing: 1.2px;
            margin: 0 12px 12px;
            text-transform: uppercase;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 12px;
            color: rgba(255,255,255,0.72);
            padding: 12px 13px;
            margin-bottom: 6px;
            border-radius: 10px;
            font-size: 14px;
            transition: 0.2s ease;
        }

        .menu-item:hover {
            background: rgba(255,255,255,0.08);
            color: white;
        }

        .menu-item.active {
            background: linear-gradient(
                90deg,
                rgba(244,201,93,0.18),
                rgba(244,201,93,0.06)
            );
            color: #f4c95d;
            border-left: 3px solid #f4c95d;
        }

        .menu-icon {
            width: 25px;
            text-align: center;
            font-size: 16px;
        }

        .sidebar-bottom {
            position: absolute;
            left: 14px;
            right: 14px;
            bottom: 20px;
        }

        .logout-menu {
            width: 100%;
            border: 1px solid rgba(255,255,255,0.08);
            background: rgba(255,255,255,0.05);
            color: rgba(255,255,255,0.75);
            border-radius: 10px;
            padding: 11px 13px;
            cursor: pointer;
            text-align: left;
            font-size: 14px;
        }

        .logout-menu:hover {
            background: rgba(239,68,68,0.15);
            color: #fca5a5;
        }

        /* ===============================
           MAIN
        =============================== */

        .main-content {
            width: 100%;
            margin-left: 245px;
            min-height: 100vh;
        }

        /* ===============================
           TOPBAR
        =============================== */

        .topbar {
            height: 80px;
            background: white;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 0 35px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background: #eef2ff;
            color: #4338ca;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            font-weight: bold;
        }

        .user-details {
            text-align: left;
        }

        .user-details strong {
            display: block;
            font-size: 13px;
            color: #1f2937;
        }

        .user-details span {
            display: block;
            font-size: 11px;
            color: #9ca3af;
            margin-top: 3px;
        }

        /* ===============================
           PAGE
        =============================== */

        .page-content {
            padding: 35px;
        }

        /* ===============================
           RESPONSIVE
        =============================== */

        @media (max-width: 850px) {
            .sidebar {
                width: 75px;
            }

            .sidebar-brand {
                justify-content: center;
                padding: 0;
            }

            .brand-text,
            .menu-label {
                display: none;
            }

            .menu-item {
                justify-content: center;
                padding: 13px 5px;
            }

            .menu-item.active {
                border-left: none;
                border-bottom: 3px solid #f4c95d;
            }

            .sidebar-bottom {
                left: 10px;
                right: 10px;
            }

            .logout-menu {
                text-align: center;
            }

            .logout-menu span {
                display: none;
            }

            .main-content {
                margin-left: 75px;
            }

            .page-content {
                padding: 25px 20px;
            }
        }

        @media (max-width: 600px) {
            .topbar {
                height: 65px;
                padding: 0 18px;
            }

            .user-details {
                display: none;
            }

            .page-content {
                padding: 20px 15px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

<div class="app-layout">

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="sidebar-brand">

            <div class="brand-logo">
                📚
            </div>

            <div class="brand-text">
                <h2>Library Hub</h2>
                <span>Management System</span>
            </div>

        </div>

        <div class="sidebar-menu">

            <div class="menu-label">
                Menu Utama
            </div>

            <a
                href="{{ route('dashboard') }}"
                class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}"
            >
                <span class="menu-icon">⌂</span>
                <span>Dashboard</span>
            </a>

            <a
                href="{{ route('books.index') }}"
                class="menu-item {{ request()->routeIs('books.*') ? 'active' : '' }}"
            >
                <span class="menu-icon">📖</span>
                <span>Data Buku</span>
            </a>

        </div>

        <div class="sidebar-bottom">

            <form action="{{ route('logout') }}" method="POST">

                @csrf

                <button type="submit" class="logout-menu">
                    <span class="menu-icon">↪</span>
                    <span>Keluar</span>
                </button>

            </form>

        </div>

    </aside>


    <!-- MAIN -->
    <div class="main-content">

        <header class="topbar">

            <div class="user-info">

                <div class="user-avatar">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>

                <div class="user-details">
                    <strong>{{ Auth::user()->name }}</strong>
                    <span>Administrator</span>
                </div>

            </div>

        </header>


        <main class="page-content">

            @yield('content')

        </main>

    </div>

</div>

</body>
</html>