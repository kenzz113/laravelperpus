@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Data Peminjaman</h4>

        <a
            href="{{ route('peminjaman.create') }}"
            class="btn btn-primary" >
            + Catat Peminjaman
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Buku</th>
                    <th>Anggota</th>
                    <th>Tgl. Pinjam</th>
                    <th>Tgl. Kembali</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($peminjaman as $item)
                    <tr>
                        <td>{{ $item->buku->judul }}</td>

                        <td>{{ $item->anggota->nama }}</td>

                        <td>{{ $item->tanggal_pinjam }}</td>

                        <td>
                            {{ $item->tanggal_kembali ?? '-' }}
                        </td>

                        <td>
                            <span
                                class="badge bg-{{ $item->status === 'dipinjam' ? 'warning text-dark' : 'success' }}"
                            >
                                {{ ucfirst($item->status) }}
                            </span>
                        </td>

                        <td>
                            @if ($item->status === 'dipinjam')
                                <form
                                    action="{{ route('peminjaman.kembalikan', $item) }}"
                                    method="POST"
                                    class="d-inline" >
                                    @csrf
                                    @method('PATCH')

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-success"   >
                                        Kembalikan
                                    </button>
                                </form>
                            @else
                                <span class="text-muted">Selesai</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">
                            Belum ada data peminjaman.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $peminjaman->links() }}
    </div>
@endsection
