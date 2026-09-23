@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Data Buku</h4>

        <a href="{{ route('buku.create') }}" class="btn btn-primary">
            + Tambah Buku
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                    <th>ISBN</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($buku as $item)
                    <tr>
                        <td>{{ $item->judul }}</td>

                        <td>{{ $item->penulis }}</td>

                        <td>{{ $item->penerbit ?? '-' }}</td>

                        <td>{{ $item->tahun_terbit ?? '-' }}</td>

                        <td>{{ $item->isbn }}</td>

                        <td>
                            <span
                                class="badge bg-{{ $item->stok > 0 ? 'success' : 'danger' }}"
                            >
                                {{ $item->stok }}
                            </span>
                        </td>

                        <td>
                            <a
                                href="{{ route('buku.edit', $item) }}"
                                class="btn btn-sm btn-warning"
                            >
                                Ubah
                            </a>

                            <form
                                action="{{ route('buku.destroy', $item) }}"
                                method="POST"
                                class="d-inline"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Hapus buku ini?')"
                                >
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">
                            Belum ada data buku.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $buku->links() }}
    </div>
@endsection
