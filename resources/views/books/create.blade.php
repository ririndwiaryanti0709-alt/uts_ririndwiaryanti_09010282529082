@extends('layouts.app')

@section('title', 'Tambah Buku - Library Hub')

@section('content')

<div class="form-page">

    <div class="form-page-header">

        <div>
            <span class="heading-label">
                KOLEKSI PERPUSTAKAAN
            </span>

            <h1>
                Tambah Buku
            </h1>

            <p>
                Tambahkan buku baru ke dalam koleksi perpustakaan.
            </p>
        </div>

        <a
            href="{{ route('books.index') }}"
            class="back-button"
        >
            ← Kembali
        </a>

    </div>


    <div class="form-card">

        <div class="form-card-header">

            <div class="form-card-icon">
                📖
            </div>

            <div>
                <h2>
                    Informasi Buku
                </h2>

                <p>
                    Lengkapi seluruh informasi buku dengan benar.
                </p>
            </div>

        </div>


        <form
            action="{{ route('books.store') }}"
            method="POST"
            class="book-form"
        >

            @csrf


            <!-- JUDUL -->
            <div class="form-group full-width">

                <label for="title">
                    Judul Buku
                    <span>*</span>
                </label>

                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title') }}"
                    placeholder="Masukkan judul buku"
                    class="@error('title') input-error @enderror"
                    required
                >

                @error('title')
                    <div class="error-message">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <!-- PENULIS -->
            <div class="form-group">

                <label for="author">
                    Penulis
                    <span>*</span>
                </label>

                <input
                    type="text"
                    id="author"
                    name="author"
                    value="{{ old('author') }}"
                    placeholder="Masukkan nama penulis"
                    class="@error('author') input-error @enderror"
                    required
                >

                @error('author')
                    <div class="error-message">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <!-- PENERBIT -->
            <div class="form-group">

                <label for="publisher">
                    Penerbit
                    <span>*</span>
                </label>

                <input
                    type="text"
                    id="publisher"
                    name="publisher"
                    value="{{ old('publisher') }}"
                    placeholder="Masukkan nama penerbit"
                    class="@error('publisher') input-error @enderror"
                    required
                >

                @error('publisher')
                    <div class="error-message">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <!-- TAHUN -->
            <div class="form-group">

                <label for="year">
                    Tahun Terbit
                    <span>*</span>
                </label>

                <input
                    type="number"
                    id="year"
                    name="year"
                    value="{{ old('year') }}"
                    placeholder="Contoh: 2024"
                    min="1900"
                    max="{{ date('Y') }}"
                    class="@error('year') input-error @enderror"
                    required
                >

                @error('year')
                    <div class="error-message">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <!-- STOK -->
            <div class="form-group">

                <label for="stock">
                    Jumlah Stok
                    <span>*</span>
                </label>

                <input
                    type="number"
                    id="stock"
                    name="stock"
                    value="{{ old('stock', 0) }}"
                    placeholder="Masukkan jumlah stok"
                    min="0"
                    class="@error('stock') input-error @enderror"
                    required
                >

                @error('stock')
                    <div class="error-message">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <!-- KATEGORI -->
            <div class="form-group">

                <label for="category_id">
                    Kategori
                    <span>*</span>
                </label>

                <select
                    id="category_id"
                    name="category_id"
                    class="@error('category_id') input-error @enderror"
                    required
                >

                    <option value="">
                        Pilih kategori buku
                    </option>

                    @foreach ($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >
                            {{ $category->name }}
                        </option>

                    @endforeach

                </select>

                @error('category_id')
                    <div class="error-message">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <!-- BUTTON -->
            <div class="form-actions">

                <a
                    href="{{ route('books.index') }}"
                    class="cancel-button"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="save-button"
                >
                    ✓ Simpan Buku
                </button>

            </div>

        </form>

    </div>

</div>


@push('styles')

<style>

    .form-page-header {
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

    .form-page-header h1 {
        font-size: 28px;
        color: #172554;
        margin: 6px 0;
    }

    .form-page-header p {
        color: #6b7280;
        font-size: 13px;
    }

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

    .form-card {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 15px;
        box-shadow: 0 5px 18px rgba(15, 23, 42, 0.04);
        overflow: hidden;
    }

    .form-card-header {
        display: flex;
        align-items: center;
        gap: 13px;
        padding: 22px;
        border-bottom: 1px solid #f0f1f3;
    }

    .form-card-icon {
        width: 45px;
        height: 45px;
        border-radius: 11px;
        background: #eef2ff;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 21px;
    }

    .form-card-header h2 {
        color: #172554;
        font-size: 17px;
        margin-bottom: 4px;
    }

    .form-card-header p {
        color: #9ca3af;
        font-size: 11px;
    }

    .book-form {
        padding: 25px;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .form-group {
        min-width: 0;
    }

    .full-width {
        grid-column: 1 / -1;
    }

    .form-group label {
        display: block;
        color: #374151;
        font-size: 12px;
        font-weight: bold;
        margin-bottom: 8px;
    }

    .form-group label span {
        color: #dc2626;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        height: 46px;
        padding: 0 13px;
        border: 1px solid #dfe3ea;
        border-radius: 8px;
        background: #f9fafb;
        color: #1f2937;
        font-size: 13px;
        outline: none;
        transition: 0.2s ease;
    }

    .form-group input:focus,
    .form-group select:focus {
        background: white;
        border-color: #4f46e5;
        box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.08);
    }

    .input-error {
        border-color: #ef4444 !important;
    }

    .error-message {
        color: #dc2626;
        font-size: 11px;
        margin-top: 6px;
    }

    .form-actions {
        grid-column: 1 / -1;
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        padding-top: 8px;
        border-top: 1px solid #f1f5f9;
        margin-top: 5px;
    }

    .cancel-button,
    .save-button {
        min-width: 120px;
        padding: 11px 17px;
        border-radius: 8px;
        font-size: 12px;
        font-weight: bold;
        text-align: center;
        cursor: pointer;
    }

    .cancel-button {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        color: #64748b;
    }

    .save-button {
        border: none;
        background: linear-gradient(135deg, #172554, #312e81);
        color: white;
    }

    .save-button:hover {
        transform: translateY(-1px);
        box-shadow: 0 8px 18px rgba(23, 37, 84, 0.15);
    }

    @media (max-width: 700px) {

        .form-page-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .back-button {
            width: 100%;
        }

        .book-form {
            grid-template-columns: 1fr;
        }

        .full-width {
            grid-column: auto;
        }

        .form-actions {
            grid-column: auto;
            flex-direction: column-reverse;
        }

        .cancel-button,
        .save-button {
            width: 100%;
        }

    }

</style>

@endpush

@endsection