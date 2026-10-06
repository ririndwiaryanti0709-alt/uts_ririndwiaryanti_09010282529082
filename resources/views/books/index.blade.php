@extends('layouts.app')

@section('title', 'Data Buku - Library Hub')

@section('content')

    <!-- HEADER -->
    <div class="page-heading">

        <div>
            <span class="heading-label">
                KOLEKSI PERPUSTAKAAN
            </span>

            <h1>
                Data Buku
            </h1>

            <p>
                Kelola seluruh koleksi buku yang tersedia di perpustakaan.
            </p>
        </div>

        <a
            href="{{ route('books.create') }}"
            class="add-book-button"
        >
            <span>＋</span>
            Tambah Buku
        </a>

    </div>


    <!-- SUCCESS MESSAGE -->
    @if (session('success'))

        <div class="success-alert">

            <span class="alert-icon">
                ✓
            </span>

            {{ session('success') }}

        </div>

    @endif


    <!-- SUMMARY -->
    <div class="books-summary">

        <div class="summary-card">

            <div class="summary-icon">
                📚
            </div>

            <div>
                <span>Total Koleksi</span>
                <strong>{{ $books->count() }}</strong>
            </div>

        </div>


        <div class="summary-card">

            <div class="summary-icon">
                🗂️
            </div>

            <div>
                <span>Total Kategori</span>
                <strong>
                    {{ $books->pluck('category_id')->unique()->count() }}
                </strong>
            </div>

        </div>


        <div class="summary-card">

            <div class="summary-icon">
                📦
            </div>

            <div>
                <span>Total Stok</span>
                <strong>{{ $books->sum('stock') }}</strong>
            </div>

        </div>

    </div>


    <!-- TABLE CARD -->
    <div class="books-card">

        <!-- TABLE HEADER -->
        <div class="table-top">

            <div>
                <span class="table-label">
                    DAFTAR KOLEKSI
                </span>

                <h2>
                    Semua Buku
                </h2>

                <p>
                    Data buku yang tersimpan dalam sistem perpustakaan.
                </p>
            </div>

            <div class="collection-badge">
                📚 Koleksi Perpustakaan
            </div>

        </div>


        <!-- SEARCH & FILTER -->
        <div class="search-panel">

            <form
                action="{{ route('books.index') }}"
                method="GET"
                class="search-form"
            >

                <div class="search-input-wrapper">

                    <span class="search-icon">
                        🔎
                    </span>

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari berdasarkan judul atau penulis..."
                    >

                </div>


                <select name="category_id">

                    <option value="">
                        Semua Kategori
                    </option>

                    @foreach ($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            {{ request('category_id') == $category->id ? 'selected' : '' }}
                        >
                            {{ $category->name }}
                        </option>

                    @endforeach

                </select>


                <button
                    type="submit"
                    class="search-button"
                >
                    Cari
                </button>


                @if (request('search') || request('category_id'))

                    <a
                        href="{{ route('books.index') }}"
                        class="reset-button"
                    >
                        Reset
                    </a>

                @endif

            </form>

        </div>


        <!-- TABLE -->
        <div class="table-container">

            <table>

                <thead>

                    <tr>

                        <th style="width: 5%;">
                            No
                        </th>

                        <th style="width: 23%;">
                            Informasi Buku
                        </th>

                        <th style="width: 13%;">
                            Penulis
                        </th>

                        <th style="width: 13%;">
                            Penerbit
                        </th>

                        <th style="width: 8%;">
                            Tahun
                        </th>

                        <th style="width: 10%;">
                            Stok
                        </th>

                        <th style="width: 10%;">
                            Kategori
                        </th>

                        <th style="width: 18%;">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse ($books as $book)

                        <tr>

                            <!-- NO -->
                            <td class="number-cell">
                                {{ $loop->iteration }}
                            </td>


                            <!-- BUKU -->
                            <td>

                                <div class="book-info-cell">

                                    <div class="mini-book-cover">
                                        📖
                                    </div>

                                    <div class="book-text">

                                        <strong>
                                            {{ $book->title }}
                                        </strong>

                                        <span>
                                            ID Buku #{{ $book->id }}
                                        </span>

                                    </div>

                                </div>

                            </td>


                            <!-- PENULIS -->
                            <td>
                                {{ $book->author }}
                            </td>


                            <!-- PENERBIT -->
                            <td>
                                {{ $book->publisher }}
                            </td>


                            <!-- TAHUN -->
                            <td>
                                <span class="year-badge">
                                    {{ $book->year }}
                                </span>
                            </td>


                            <!-- STOK -->
                            <td>

                                @if ($book->stock > 0)

                                    <span class="stock-badge">
                                        {{ $book->stock }}
                                    </span>

                                @else

                                    <span class="empty-stock-badge">
                                        Habis
                                    </span>

                                @endif

                            </td>


                            <!-- KATEGORI -->
                            <td>

                                <span class="category-badge">
                                    {{ $book->category->name }}
                                </span>

                            </td>


                            <!-- AKSI -->
                            <td>

                                <div class="action-group">

                                    <a
                                        href="{{ route('books.show', $book) }}"
                                        class="action detail-action"
                                        title="Lihat detail buku"
                                    >
                                        Detail
                                    </a>


                                    <a
                                        href="{{ route('books.edit', $book) }}"
                                        class="action edit-action"
                                        title="Edit buku"
                                    >
                                        Edit
                                    </a>


                                    <form
                                        action="{{ route('books.destroy', $book) }}"
                                        method="POST"
                                        onsubmit="return confirm('Apakah kamu yakin ingin menghapus buku ini?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="action delete-action"
                                            title="Hapus buku"
                                        >
                                            Hapus
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>


                    @empty

                        <tr>

                            <td colspan="8">

                                <div class="empty-table">

                                    <div class="empty-icon">
                                        📚
                                    </div>

                                    <h3>
                                        Belum Ada Buku
                                    </h3>

                                    <p>
                                        Belum terdapat data buku dalam perpustakaan.
                                    </p>

                                    <a
                                        href="{{ route('books.create') }}"
                                        class="add-book-button"
                                    >
                                        <span>＋</span>
                                        Tambah Buku Pertama
                                    </a>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    @push('styles')

    <style>

        /* =========================================
           PAGE HEADER
        ========================================= */

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            gap: 20px;
            margin-bottom: 25px;
        }

        .heading-label {
            color: #b68b2c;
            font-size: 10px;
            font-weight: bold;
            letter-spacing: 1.5px;
        }

        .page-heading h1 {
            font-size: 28px;
            color: #172554;
            margin: 6px 0;
        }

        .page-heading p {
            color: #6b7280;
            font-size: 13px;
            line-height: 1.5;
        }


        /* =========================================
           TAMBAH BUKU BUTTON
        ========================================= */

        .add-book-button {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 7px;
            background: #172554;
            color: white;
            padding: 11px 16px;
            border-radius: 9px;
            font-size: 12px;
            font-weight: bold;
            white-space: nowrap;
            transition: 0.2s ease;
        }

        .add-book-button:hover {
            background: #1e3a8a;
            transform: translateY(-1px);
        }

        .add-book-button span {
            color: #f4c95d;
            font-size: 17px;
        }


        /* =========================================
           SUCCESS ALERT
        ========================================= */

        .success-alert {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #ecfdf5;
            border: 1px solid #bbf7d0;
            color: #166534;
            border-radius: 10px;
            padding: 12px 15px;
            font-size: 13px;
            margin-bottom: 20px;
        }

        .alert-icon {
            width: 22px;
            height: 22px;
            border-radius: 50%;
            background: #22c55e;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: bold;
        }


        /* =========================================
           SUMMARY
        ========================================= */

        .books-summary {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-bottom: 20px;
        }

        .summary-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 16px 18px;
            display: flex;
            align-items: center;
            gap: 13px;
            box-shadow: 0 4px 14px rgba(15, 23, 42, 0.03);
        }

        .summary-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #eef2ff;
            font-size: 18px;
            flex-shrink: 0;
        }

        .summary-card:nth-child(2) .summary-icon {
            background: #fef3c7;
        }

        .summary-card:nth-child(3) .summary-icon {
            background: #ecfdf5;
        }

        .summary-card span {
            display: block;
            color: #6b7280;
            font-size: 10px;
            margin-bottom: 4px;
        }

        .summary-card strong {
            display: block;
            color: #172554;
            font-size: 22px;
        }


        /* =========================================
           TABLE CARD
        ========================================= */

        .books-card {
            width: 100%;
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 15px;
            box-shadow: 0 5px 18px rgba(15, 23, 42, 0.04);
            overflow: hidden;
        }


        /* =========================================
           TABLE HEADER
        ========================================= */

        .table-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            padding: 20px 22px;
            border-bottom: 1px solid #f0f1f3;
        }

        .table-label {
            display: block;
            color: #b68b2c;
            font-size: 9px;
            font-weight: bold;
            letter-spacing: 1.3px;
            margin-bottom: 5px;
        }

        .table-top h2 {
            font-size: 17px;
            color: #172554;
            margin-bottom: 4px;
        }

        .table-top p {
            font-size: 11px;
            color: #9ca3af;
        }

        .collection-badge {
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            color: #6b7280;
            padding: 8px 11px;
            border-radius: 8px;
            font-size: 10px;
            white-space: nowrap;
        }


        /* =========================================
           TABLE CONTAINER
        ========================================= */

        .table-container {
            width: 100%;
            overflow: hidden;
        }


        /* =========================================
           TABLE
        ========================================= */

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        thead th {
            text-align: left;
            padding: 11px 10px;
            background: #fafafa;
            color: #6b7280;
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            border-bottom: 1px solid #e5e7eb;
            white-space: nowrap;
        }

        tbody td {
            padding: 11px 10px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 11px;
            color: #4b5563;
            vertical-align: middle;
        }

        tbody tr {
            transition: background 0.15s ease;
        }

        tbody tr:hover {
            background: #fafbff;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        th,
        td {
            overflow: hidden;
            text-overflow: ellipsis;
        }


        /* =========================================
           NOMOR
        ========================================= */

        .number-cell {
            color: #9ca3af;
            font-weight: bold;
            text-align: center;
        }


        /* =========================================
           INFORMASI BUKU
        ========================================= */

        .book-info-cell {
            display: flex;
            align-items: center;
            gap: 9px;
            min-width: 0;
        }

        .mini-book-cover {
            width: 33px;
            height: 41px;
            background: linear-gradient(135deg, #172554, #3730a3);
            color: #f4c95d;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 14px;
        }

        .book-text {
            min-width: 0;
        }

        .book-info-cell strong {
            display: block;
            color: #1f2937;
            font-size: 11px;
            line-height: 1.35;
            margin-bottom: 3px;

            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .book-info-cell span {
            display: block;
            color: #9ca3af;
            font-size: 8px;
        }


        /* =========================================
           YEAR
        ========================================= */

        .year-badge {
            display: inline-block;
            color: #475569;
            background: #f1f5f9;
            padding: 4px 7px;
            border-radius: 5px;
            font-size: 9px;
            font-weight: bold;
        }


        /* =========================================
           STOCK
        ========================================= */

        .stock-badge {
            display: inline-block;
            background: #ecfdf5;
            color: #15803d;
            padding: 4px 7px;
            border-radius: 5px;
            font-size: 9px;
            font-weight: bold;
        }

        .empty-stock-badge {
            display: inline-block;
            background: #fef2f2;
            color: #b91c1c;
            padding: 4px 7px;
            border-radius: 5px;
            font-size: 9px;
            font-weight: bold;
        }


        /* =========================================
           CATEGORY
        ========================================= */

        .category-badge {
            display: inline-block;
            background: #eef2ff;
            color: #4338ca;
            padding: 4px 7px;
            border-radius: 20px;
            font-size: 9px;
            font-weight: bold;
            white-space: nowrap;
        }


        /* =========================================
           ACTION
        ========================================= */

        .action-group {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .action {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: none;
            border-radius: 6px;
            padding: 6px 7px;
            font-size: 9px;
            cursor: pointer;
            white-space: nowrap;
            transition: 0.15s ease;
        }

        .action:hover {
            opacity: 0.82;
            transform: translateY(-1px);
        }

        .detail-action {
            background: #e0f2fe;
            color: #0369a1;
        }

        .edit-action {
            background: #fef3c7;
            color: #92400e;
        }

        .delete-action {
            background: #fee2e2;
            color: #b91c1c;
        }


        /* =========================================
           EMPTY TABLE
        ========================================= */

        .empty-table {
            text-align: center;
            padding: 55px 20px;
        }

        .empty-icon {
            font-size: 38px;
            margin-bottom: 10px;
        }

        .empty-table h3 {
            color: #374151;
            margin-bottom: 6px;
            font-size: 15px;
        }

        .empty-table p {
            color: #9ca3af;
            font-size: 11px;
            margin-bottom: 17px;
        }

        /* =========================================
        SEARCH & FILTER
        ========================================= */

        .search-panel {
            padding: 15px 22px;
            background: #fafbff;
            border-bottom: 1px solid #eef0f4;
        }

        .search-form {
            display: flex;
            align-items: center;
            gap: 9px;
            width: 100%;
        }

        .search-input-wrapper {
            position: relative;
            flex: 1;
        }

        .search-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 13px;
            pointer-events: none;
        }

        .search-input-wrapper input {
            width: 100%;
            height: 40px;
            padding: 0 12px 0 36px;

            border: 1px solid #dfe3ea;
            border-radius: 8px;

            background: white;
            color: #1f2937;

            font-size: 11px;
            outline: none;

            transition: 0.2s ease;
        }

        .search-input-wrapper input:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.07);
        }

        .search-input-wrapper input::placeholder {
            color: #a3aab5;
        }

        .search-form select {
            width: 180px;
            height: 40px;

            padding: 0 10px;

            border: 1px solid #dfe3ea;
            border-radius: 8px;

            background: white;
            color: #475569;

            font-size: 11px;

            outline: none;
        }

        .search-form select:focus {
            border-color: #4f46e5;
        }

        .search-button {
            height: 40px;

            padding: 0 16px;

            border: none;
            border-radius: 8px;

            background: #172554;
            color: white;

            font-size: 11px;
            font-weight: bold;

            cursor: pointer;

            transition: 0.2s ease;
        }

        .search-button:hover {
            background: #1e3a8a;
        }

        .reset-button {
            height: 40px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            padding: 0 13px;

            border-radius: 8px;

            background: #f1f5f9;
            border: 1px solid #e2e8f0;

            color: #64748b;

            font-size: 11px;
            font-weight: bold;
        }

        .reset-button:hover {
            background: #e2e8f0;
        }
        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 1050px) {

            .page-heading h1 {
                font-size: 25px;
            }

            .main-content {
                margin-left: 75px;
            }

            .books-summary {
                grid-template-columns: repeat(3, 1fr);
            }

        }


        @media (max-width: 850px) {

            .books-summary {
                grid-template-columns: 1fr;
            }

            .table-top {
                flex-direction: column;
                align-items: flex-start;
            }

            .collection-badge {
                display: none;
            }

            .table-container {
                overflow-x: auto;
            }

            table {
                min-width: 900px;
            }

        }


        @media (max-width: 700px) {

            .page-heading {
                flex-direction: column;
                align-items: flex-start;
            }

            .add-book-button {
                width: 100%;
            }

            .books-summary {
                grid-template-columns: 1fr;
            }

        }

        @media (max-width: 700px) {

        .search-form {
            flex-wrap: wrap;
        }

        .search-input-wrapper {
            width: 100%;
            flex: none;
        }

        .search-form select {
            flex: 1;
            width: auto;
        }

        .search-button,
        .reset-button {
            flex: 0 0 auto;
        }

    }
    </style>

    @endpush

@endsection