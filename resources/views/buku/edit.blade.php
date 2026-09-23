@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">Ubah Buku</h4>

        <a href="{{ route('buku.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </div>

    <form action="{{ route('buku.update', $buku) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>

            <input
                type="text"
                id="judul"
                name="judul"
                class="form-control @error('judul') is-invalid @enderror"
                value="{{ old('judul', $buku->judul) }}">

            @error('judul')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="penulis" class="form-label">Penulis</label>

            <input
                type="text"
                id="penulis"
                name="penulis"
                class="form-control @error('penulis') is-invalid @enderror"
                value="{{ old('penulis', $buku->penulis) }}">

            @error('penulis')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="penerbit" class="form-label">Penerbit</label>

            <input
                type="text"
                id="penerbit"
                name="penerbit"
                class="form-control @error('penerbit') is-invalid @enderror"
                value="{{ old('penerbit', $buku->penerbit) }}">

            @error('penerbit')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tahun_terbit" class="form-label">Tahun Terbit</label>

            <input
                type="number"
                id="tahun_terbit"
                name="tahun_terbit"
                class="form-control @error('tahun_terbit') is-invalid @enderror"
                value="{{ old('tahun_terbit', $buku->tahun_terbit) }}">

            @error('tahun_terbit')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>

            <input
                type="text"
                id="isbn"
                name="isbn"
                class="form-control @error('isbn') is-invalid @enderror"
                value="{{ old('isbn', $buku->isbn) }}">

            @error('isbn')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>

            <input
                type="number"
                id="stok"
                name="stok"
                class="form-control @error('stok') is-invalid @enderror"
                value="{{ old('stok', $buku->stok) }}"
                min="0">

            @error('stok')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Simpan
        </button>
    </form>
@endsection
