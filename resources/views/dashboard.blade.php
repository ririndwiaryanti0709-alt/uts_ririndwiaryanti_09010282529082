@extends('layouts.app')

@section('title', 'Dashboard - Library Hub')

@section('content')

    <!-- HEADER -->
    <div class="dashboard-header">

        <div>
            <div class="greeting">
                DASHBOARD
            </div>

            <h1>
                Selamat datang kembali, {{ Auth::user()->name }} 👋
            </h1>

            <p>
                Kelola koleksi buku perpustakaan dengan mudah dan terorganisir.
            </p>
        </div>

        <a
            href="{{ route('books.create') }}"
            class="quick-add"
        >
            <span>＋</span>
            Tambah Buku
        </a>

    </div>


    <!-- STATISTICS -->
    <div class="stats-grid">

        <div class="stat-card books-stat">

            <div class="stat-icon">
                📚
            </div>

            <div class="stat-info">
                <span>Total Buku</span>
                <strong>{{ $totalBooks }}</strong>
                <small>Koleksi terdaftar</small>
            </div>

        </div>


        <div class="stat-card category-stat">

            <div class="stat-icon">
                🗂️
            </div>

            <div class="stat-info">
                <span>Total Kategori</span>
                <strong>{{ $totalCategories }}</strong>
                <small>Kategori tersedia</small>
            </div>

        </div>


        <div class="stat-card stock-stat">

            <div class="stat-icon">
                📦
            </div>

            <div class="stat-info">
                <span>Total Stok</span>
                <strong>{{ $totalStock }}</strong>
                <small>Jumlah seluruh stok</small>
            </div>

        </div>

    </div>


    <!-- CONTENT GRID -->
    <div class="dashboard-grid">

        <!-- LATEST BOOKS -->
        <section class="dashboard-card latest-card">

            <div class="card-header">

                <div>
                    <span class="section-label">
                        KOLEKSI TERBARU
                    </span>

                    <h2>
                        Buku Terbaru
                    </h2>
                </div>

                <a href="{{ route('books.index') }}">
                    Lihat Semua →
                </a>

            </div>


            <div class="book-list">

                @forelse ($latestBooks as $book)

                    <div class="book-item">

                        <div class="book-cover">
                            📖
                        </div>

                        <div class="book-detail">

                            <strong>
                                {{ $book->title }}
                            </strong>

                            <span>
                                {{ $book->author }}
                            </span>

                            <small>
                                {{ $book->publisher }}
                            </small>

                        </div>

                        <div class="book-meta">

                            <span class="category-tag">
                                {{ $book->category->name }}
                            </span>

                            <span class="stock-text">
                                Stok {{ $book->stock }}
                            </span>

                        </div>

                    </div>

                @empty

                    <div class="empty-state">
                        Belum ada data buku.
                    </div>

                @endforelse

            </div>

        </section>


        <!-- INFO -->
        <section class="dashboard-card info-card">

            <div class="library-illustration">
                📚
            </div>

            <h2>
                Kelola Perpustakaan
            </h2>

            <p>
                Tambahkan, ubah, lihat detail, atau hapus
                data buku melalui menu Data Buku.
            </p>

            <a
                href="{{ route('books.index') }}"
                class="manage-button"
            >
                Kelola Data Buku
            </a>

        </section>

    </div>


    @push('styles')

    <style>

        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            gap: 20px;
            margin-bottom: 30px;
        }

        .greeting {
            color: #b68b2c;
            font-size: 11px;
            font-weight: bold;
            letter-spacing: 1.5px;
            margin-bottom: 8px;
        }

        .dashboard-header h1 {
            font-size: 28px;
            color: #172554;
            margin-bottom: 8px;
        }

        .dashboard-header p {
            color: #6b7280;
            font-size: 14px;
        }

        .quick-add {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #172554;
            color: white;
            padding: 12px 17px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: bold;
        }

        .quick-add:hover {
            background: #1e3a8a;
        }

        .quick-add span {
            font-size: 18px;
            color: #f4c95d;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 15px;
            padding: 22px;
            display: flex;
            align-items: center;
            gap: 17px;
            box-shadow: 0 5px 18px rgba(15, 23, 42, 0.04);
        }

        .stat-icon {
            width: 52px;
            height: 52px;
            border-radius: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .books-stat .stat-icon {
            background: #eef2ff;
        }

        .category-stat .stat-icon {
            background: #fef3c7;
        }

        .stock-stat .stat-icon {
            background: #ecfdf5;
        }

        .stat-info span {
            display: block;
            color: #6b7280;
            font-size: 12px;
            margin-bottom: 4px;
        }

        .stat-info strong {
            display: block;
            color: #172554;
            font-size: 27px;
            margin-bottom: 4px;
        }

        .stat-info small {
            color: #9ca3af;
            font-size: 11px;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: 1.7fr 1fr;
            gap: 20px;
        }

        .dashboard-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 15px;
            box-shadow: 0 5px 18px rgba(15, 23, 42, 0.04);
        }

        .latest-card {
            overflow: hidden;
        }

        .card-header {
            padding: 22px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #f0f1f3;
        }

        .section-label {
            color: #b68b2c;
            font-size: 10px;
            font-weight: bold;
            letter-spacing: 1.2px;
        }

        .card-header h2 {
            margin-top: 5px;
            font-size: 18px;
            color: #172554;
        }

        .card-header a {
            color: #4338ca;
            font-size: 12px;
            font-weight: bold;
        }

        .book-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 17px 22px;
            border-bottom: 1px solid #f3f4f6;
        }

        .book-item:last-child {
            border-bottom: none;
        }

        .book-cover {
            width: 45px;
            height: 58px;
            flex-shrink: 0;
            border-radius: 7px;
            background: linear-gradient(135deg, #172554, #3730a3);
            color: #f4c95d;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .book-detail {
            min-width: 0;
            flex: 1;
        }

        .book-detail strong {
            display: block;
            color: #1f2937;
            font-size: 13px;
            margin-bottom: 5px;
        }

        .book-detail span {
            display: block;
            color: #6b7280;
            font-size: 12px;
            margin-bottom: 3px;
        }

        .book-detail small {
            color: #9ca3af;
            font-size: 10px;
        }

        .book-meta {
            text-align: right;
        }

        .category-tag {
            display: block;
            background: #eef2ff;
            color: #4338ca;
            padding: 5px 8px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: bold;
            margin-bottom: 6px;
        }

        .stock-text {
            color: #6b7280;
            font-size: 10px;
        }

        .info-card {
            min-height: 100%;
            padding: 35px 27px;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: linear-gradient(160deg, #172554, #312e81);
            color: white;
        }

        .library-illustration {
            width: 75px;
            height: 75px;
            border-radius: 20px;
            background: rgba(244,201,93,0.14);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            margin-bottom: 20px;
        }

        .info-card h2 {
            font-size: 21px;
            margin-bottom: 12px;
        }

        .info-card p {
            color: rgba(255,255,255,0.7);
            font-size: 13px;
            line-height: 1.7;
            max-width: 280px;
            margin-bottom: 24px;
        }

        .manage-button {
            background: #f4c95d;
            color: #172554;
            padding: 11px 18px;
            border-radius: 9px;
            font-size: 12px;
            font-weight: bold;
        }

        .manage-button:hover {
            background: #e6b945;
        }

        .empty-state {
            padding: 35px;
            text-align: center;
            color: #9ca3af;
            font-size: 13px;
        }

        @media (max-width: 950px) {

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }

        }

        @media (max-width: 700px) {

            .dashboard-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .quick-add {
                width: 100%;
                justify-content: center;
            }

            .dashboard-header h1 {
                font-size: 23px;
            }

            .book-meta {
                display: none;
            }

        }

    </style>

    @endpush

@endsection