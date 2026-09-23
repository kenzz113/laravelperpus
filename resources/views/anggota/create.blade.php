@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">Tambah Anggota</h4>

        <a href="{{ route('anggota.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </div>

    <form action="{{ route('anggota.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>

            <input
                type="text"
                id="nama"
                name="nama"
                class="form-control @error('nama') is-invalid @enderror"
                value="{{ old('nama') }}"
            >

            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nis_nip" class="form-label">NIS / NIP</label>

            <input
                type="text"
                id="nis_nip"
                name="nis_nip"
                class="form-control @error('nis_nip') is-invalid @enderror"
                value="{{ old('nis_nip') }}"
            >

            @error('nis_nip')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>

            <textarea
                id="alamat"
                name="alamat"
                rows="3"
                class="form-control @error('alamat') is-invalid @enderror"
            >{{ old('alamat') }}</textarea>

            @error('alamat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="no_hp" class="form-label">No. HP</label>

            <input
                type="text"
                id="no_hp"
                name="no_hp"
                class="form-control @error('no_hp') is-invalid @enderror"
                value="{{ old('no_hp') }}"
            >

            @error('no_hp')
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
