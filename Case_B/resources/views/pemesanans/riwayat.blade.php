@extends('layouts.app')

@section('content')
<h2>Riwayat Pemesanan Dihapus</h2>

<!-- Tabel daftar pemesanan yang sudah dihapus -->
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pemesan</th>
            <th>Email</th>
            <th>Nama Konser</th>
            <th>Tanggal Konser</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <!-- Loop data pemesanan -->
        @foreach ($pemesanans as $index => $item)
        <tr>
            <!-- Menampilkan nomor urut berdasarkan halaman pagination -->
            <td>{{ $pemesanans->firstItem() + $index }}</td>

            <!-- Menampilkan detail pemesanan -->
            <td>{{ $item->nama_pemesan }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->nama_konser }}</td>
            <td>{{ $item->tanggal_konser }}</td>
            <td>{{ $item->status_pemesanan }}</td>

            <!-- Tombol aksi untuk Restore dan Force Delete -->
            <td>
                <!-- Tombol Pulihkan -->
                <form action="{{ route('pemesanans.restore', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button class="btn btn-success btn-sm" onclick="return confirm('Pulihkan pemesanan ini?')">
                        Pulihkan
                    </button>
                </form>

                <!-- Tombol Hapus Permanen -->
                <form action="{{ route('pemesanans.forceDelete', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus permanen pemesanan ini?')">
                        Hapus Permanen
                    </button>
                </form>
            </td>
        </tr>
        @endforeach

        <!-- Jika data kosong -->
        @if ($pemesanans->isEmpty())
            <tr>
                <td colspan="7" class="text-center">Belum ada data pemesanan yang dihapus.</td>
            </tr>
        @endif
    </tbody>
</table>

<!-- Pagination di kanan bawah -->
<div class="d-flex justify-content-end mt-3">
    {{ $pemesanans->links("pagination::bootstrap-5") }}
</div>

<!-- Tombol kembali ke halaman utama -->
<div class="mt-4">
    <a href="{{ route('pemesanans.index') }}" class="btn btn-secondary">
        &larr; Kembali ke Daftar Pemesanan
    </a>
</div>
@endsection
