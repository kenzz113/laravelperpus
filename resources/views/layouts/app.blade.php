<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistem Perpustakaan</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>
    <nav class="navbar navbar-dark bg-dark px-3">
        <div class="container-fluid">
            <a href="{{ route('buku.index') }}" class="navbar-brand">
                Sistem Perpustakaan
            </a>

            <div class="d-flex">
                <a
                    href="{{ route('buku.index') }}"
                    class="text-white text-decoration-none me-3"
                >
                    Buku
                </a>

                <a
                    href="{{ route('anggota.index') }}"
                    class="text-white text-decoration-none me-3"
                >
                    Anggota
                </a>

                <a
                    href="{{ route('peminjaman.index') }}"
                    class="text-white text-decoration-none"
                >
                    Peminjaman
                </a>
            </div>
        </div>
    </nav>

    <main class="container mt-4">
        @if (session('sukses'))
            <div class="alert alert-success">
                {{ session('sukses') }}
            </div>
        @endif

        @if (session('gagal'))
            <div class="alert alert-danger">
                {{ session('gagal') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
