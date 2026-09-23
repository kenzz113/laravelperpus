@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Data Anggota</h4>

        <a href="{{ route('anggota.create') }}" class="btn btn-primary">
            + Tambah Anggota
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Nama</th>
                    <th>NIS / NIP</th>
                    <th>Alamat</th>
                    <th>No. HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($anggota as $item)
                    <tr>
                        <td>{{ $item->nama }}</td>

                        <td>{{ $item->nis_nip }}</td>

                        <td>{{ $item->alamat ?? '-' }}</td>

                        <td>{{ $item->no_hp ?? '-' }}</td>

                        <td>
                            <a
                                href="{{ route('anggota.edit', $item) }}"
                                class="btn btn-sm btn-warning"
                            >
                                Ubah
                            </a>

                            <form
                                action="{{ route('anggota.destroy', $item) }}"
                                method="POST"
                                class="d-inline"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Hapus anggota ini?')"
                                >
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            Belum ada data anggota.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $anggota->links() }}
    </div>
@endsection
