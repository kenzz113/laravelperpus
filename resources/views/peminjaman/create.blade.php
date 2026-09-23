@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">Catat Peminjaman Baru</h4>

        <a
            href="{{ route('peminjaman.index') }}"
            class="btn btn-secondary"
        >
            Kembali
        </a>
    </div>

    <form action="{{ route('peminjaman.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="buku_id" class="form-label">
                Buku
            </label>

            <select
                id="buku_id"
                name="buku_id"
                class="form-select @error('buku_id') is-invalid @enderror"
            >
                <option value="">-- Pilih Buku --</option>

                @foreach ($buku as $item)
                    <option
                        value="{{ $item->id }}"
                        @selected(old('buku_id') == $item->id)
                    >
                        {{ $item->judul }} (stok: {{ $item->stok }})
                    </option>
                @endforeach
            </select>

            @error('buku_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="anggota_id" class="form-label">
                Anggota
            </label>

            <select
                id="anggota_id"
                name="anggota_id"
                class="form-select @error('anggota_id') is-invalid @enderror"
            >
                <option value="">-- Pilih Anggota --</option>

                @foreach ($anggota as $item)
                    <option
                        value="{{ $item->id }}"
                        @selected(old('anggota_id') == $item->id)
                    >
                        {{ $item->nama }}
                    </option>
                @endforeach
            </select>

            @error('anggota_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tanggal_pinjam" class="form-label">
                Tanggal Pinjam
            </label>

            <input
                type="date"
                id="tanggal_pinjam"
                name="tanggal_pinjam"
                class="form-control @error('tanggal_pinjam') is-invalid @enderror"
                value="{{ old('tanggal_pinjam', date('Y-m-d')) }}"
            >

            @error('tanggal_pinjam')
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