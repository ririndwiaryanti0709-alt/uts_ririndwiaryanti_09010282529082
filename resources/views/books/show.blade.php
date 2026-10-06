@extends('layouts.app')

@section('title', 'Detail Buku - Library Hub')

@section('content')

<div class="detail-page">

    <!-- HEADER -->
    <div class="detail-header">

        <div>
            <span class="heading-label">
                KOLEKSI PERPUSTAKAAN
            </span>

            <h1>
                Detail Buku
            </h1>

            <p>
                Informasi lengkap mengenai buku yang dipilih.
            </p>
        </div>

        <a
            href="{{ route('books.index') }}"
            class="back-button"
        >
            ← Kembali ke Data Buku
        </a>

    </div>


    <!-- DETAIL CARD -->
    <div class="detail-card">

        <!-- BOOK HERO -->
        <div class="book-hero">

            <div class="large-book-cover">
                📖
            </div>

            <div class="book-main-info">

                <span class="category-badge">
                    {{ $book->category->name }}
                </span>

                <h2>
                    {{ $book->title }}
                </h2>

                <p>
                    {{ $book->author }}
                </p>

                <span class="book-id">
                    ID Buku #{{ $book->id }}
                </span>

            </div>

        </div>


        <!-- INFORMATION -->
        <div class="information-section">

            <div class="section-title">

                <span>
                    INFORMASI BUKU
                </span>

                <h3>
                    Detail Koleksi
                </h3>

            </div>


            <div class="detail-grid">

                <!-- PENULIS -->
                <div class="detail-item">

                    <span class="detail-label">
                        Penulis
                    </span>

                    <strong>
                        {{ $book->author }}
                    </strong>

                </div>


                <!-- PENERBIT -->
                <div class="detail-item">

                    <span class="detail-label">
                        Penerbit
                    </span>

                    <strong>
                        {{ $book->publisher }}
                    </strong>

                </div>


                <!-- TAHUN -->
                <div class="detail-item">

                    <span class="detail-label">
                        Tahun Terbit
                    </span>

                    <strong>
                        {{ $book->year }}
                    </strong>

                </div>


                <!-- STOK -->
                <div class="detail-item">

                    <span class="detail-label">
                        Jumlah Stok
                    </span>

                    <strong class="stock-number">
                        {{ $book->stock }}
                    </strong>

                </div>


                <!-- KATEGORI -->
                <div class="detail-item">

                    <span class="detail-label">
                        Kategori
                    </span>

                    <strong>
                        {{ $book->category->name }}
                    </strong>

                </div>


                <!-- ID -->
                <div class="detail-item">

                    <span class="detail-label">
                        ID Buku
                    </span>

                    <strong>
                        #{{ $book->id }}
                    </strong>

                </div>

            </div>

        </div>


        <!-- ACTION -->
        <div class="detail-actions">

            <a
                href="{{ route('books.edit', $book) }}"
                class="edit-button"
            >
                ✎ Edit Buku
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
                    class="delete-button"
                >
                    🗑 Hapus Buku
                </button>

            </form>

        </div>

    </div>

</div>


@push('styles')

<style>

    /* =========================================
       HEADER
    ========================================= */

    .detail-header {
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

    .detail-header h1 {
        color: #172554;
        font-size: 28px;
        margin: 6px 0;
    }

    .detail-header p {
        color: #6b7280;
        font-size: 13px;
    }


    /* =========================================
       BACK
    ========================================= */

    .back-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        background: white;
        border: 1px solid #e5e7eb;

        color: #475569;

        padding: 10px 15px;

        border-radius: 9px;

        font-size: 12px;
        font-weight: bold;

        transition: 0.2s ease;
    }

    .back-button:hover {
        background: #f8fafc;
        border-color: #cbd5e1;
    }


    /* =========================================
       CARD
    ========================================= */

    .detail-card {
        background: white;

        border: 1px solid #e5e7eb;

        border-radius: 16px;

        box-shadow:
            0 5px 18px rgba(15, 23, 42, 0.04);

        overflow: hidden;
    }


    /* =========================================
       BOOK HERO
    ========================================= */

    .book-hero {
        display: flex;
        align-items: center;

        gap: 22px;

        padding: 30px;

        background:
            linear-gradient(
                135deg,
                #f8fafc,
                #eef2ff
            );

        border-bottom: 1px solid #e5e7eb;
    }


    .large-book-cover {
        width: 100px;
        height: 125px;

        flex-shrink: 0;

        border-radius: 10px;

        background:
            linear-gradient(
                145deg,
                #172554,
                #312e81
            );

        color: #f4c95d;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 43px;

        box-shadow:
            0 12px 25px rgba(23, 37, 84, 0.16);
    }


    .book-main-info {
        min-width: 0;
    }


    .category-badge {
        display: inline-block;

        background: #eef2ff;

        color: #4338ca;

        padding: 5px 10px;

        border-radius: 20px;

        font-size: 10px;

        font-weight: bold;

        margin-bottom: 9px;
    }


    .book-main-info h2 {
        color: #172554;

        font-size: 25px;

        line-height: 1.3;

        margin-bottom: 6px;
    }


    .book-main-info p {
        color: #6b7280;

        font-size: 14px;

        margin-bottom: 9px;
    }


    .book-id {
        color: #9ca3af;

        font-size: 10px;
    }


    /* =========================================
       INFORMATION
    ========================================= */

    .information-section {
        padding: 28px 30px;
    }


    .section-title {
        margin-bottom: 20px;
    }


    .section-title span {
        display: block;

        color: #b68b2c;

        font-size: 9px;

        font-weight: bold;

        letter-spacing: 1.4px;

        margin-bottom: 5px;
    }


    .section-title h3 {
        color: #172554;

        font-size: 18px;
    }


    .detail-grid {
        display: grid;

        grid-template-columns:
            repeat(2, 1fr);

        gap: 14px;
    }


    .detail-item {
        padding: 16px;

        background: #f8fafc;

        border: 1px solid #eef2f6;

        border-radius: 9px;
    }


    .detail-label {
        display: block;

        color: #9ca3af;

        font-size: 10px;

        margin-bottom: 7px;
    }


    .detail-item strong {
        color: #1f2937;

        font-size: 13px;
    }


    .stock-number {
        color: #15803d !important;
    }


    /* =========================================
       ACTIONS
    ========================================= */

    .detail-actions {
        display: flex;

        justify-content: flex-end;

        gap: 10px;

        padding: 20px 30px;

        border-top: 1px solid #f1f5f9;
    }


    .edit-button,
    .delete-button {
        display: inline-flex;

        align-items: center;
        justify-content: center;

        gap: 6px;

        border-radius: 8px;

        padding: 10px 15px;

        font-size: 11px;

        font-weight: bold;

        cursor: pointer;

        transition: 0.2s ease;
    }


    .edit-button {
        background: #fef3c7;

        color: #92400e;

        border: 1px solid #fde68a;
    }


    .edit-button:hover {
        background: #fde68a;
    }


    .delete-button {
        background: #fee2e2;

        color: #b91c1c;

        border: 1px solid #fecaca;
    }


    .delete-button:hover {
        background: #fecaca;
    }


    /* =========================================
       RESPONSIVE
    ========================================= */

    @media (max-width: 700px) {

        .detail-header {
            flex-direction: column;

            align-items: flex-start;
        }

        .back-button {
            width: 100%;
        }

        .book-hero {
            padding: 22px;

            gap: 15px;
        }

        .large-book-cover {
            width: 75px;
            height: 95px;

            font-size: 32px;
        }

        .book-main-info h2 {
            font-size: 19px;
        }

        .detail-grid {
            grid-template-columns: 1fr;
        }

        .information-section {
            padding: 23px;
        }

        .detail-actions {
            padding: 18px 23px;

            flex-direction: column;
        }

        .edit-button,
        .delete-button {
            width: 100%;
        }

    }

</style>

@endpush

@endsection