<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with(['buku', 'anggota'])
            ->latest()
            ->paginate(10);

        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        $buku = Buku::where('stok', '>', 0)->get();
        $anggota = Anggota::all();

        return view('peminjaman.create', compact('buku', 'anggota'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'buku_id' => [
                'required',
                'exists:buku,id',
            ],
            'anggota_id' => [
                'required',
                'exists:anggota,id',
            ],
            'tanggal_pinjam' => [
                'required',
                'date',
            ],
        ]);

        $buku = DB::transaction(function () use ($request) {
            $buku = Buku::whereKey($request->buku_id)
                ->lockForUpdate()
                ->firstOrFail();

            if ($buku->stok < 1) {
                return null;
            }

            Peminjaman::create([
                'buku_id' => $buku->id,
                'anggota_id' => $request->anggota_id,
                'tanggal_pinjam' => $request->tanggal_pinjam,
                'status' => 'dipinjam',
            ]);

            $buku->pinjamkan();

            return $buku;
        });

        if ($buku === null) {
            return back()->with(
                'gagal',
                'Stok buku habis, tidak bisa dipinjam.'
            );
        }

        return redirect()
            ->route('peminjaman.index')
            ->with('sukses', 'Peminjaman berhasil dicatat.');
    }

    public function kembalikan(Peminjaman $peminjaman)
    {
        if ($peminjaman->status === 'kembali') {
            return back()->with(
                'gagal',
                'Buku ini sudah dikembalikan sebelumnya.'
            );
        }

        DB::transaction(function () use ($peminjaman) {
            $peminjaman->update([
                'status' => 'kembali',
                'tanggal_kembali' => now(),
            ]);

            $peminjaman->buku->kembalikan();
        });

        return redirect()
            ->route('peminjaman.index')
            ->with('sukses', 'Buku berhasil dikembalikan.');
    }

    public function destroy(Peminjaman $peminjaman)
    {
        DB::transaction(function () use ($peminjaman) {
            if ($peminjaman->status === 'dipinjam') {
                $peminjaman->buku->kembalikan();
            }

            $peminjaman->delete();
        });

        return redirect()
            ->route('peminjaman.index')
            ->with('sukses', 'Data peminjaman dihapus.');
    }
}
