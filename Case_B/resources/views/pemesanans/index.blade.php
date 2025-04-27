@extends('layouts.app')

@section('content')


<table class="table table-bordered table-striped align-middle mt-3">
    <thead class="table-light">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Konser</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Kategori</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pemesanans as $index => $item)
        <tr>
            <td>{{ $pemesanans->firstItem() + $index }}</td>
            <td>{{ $item->nama_pemesan }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->nama_konser }}</td>
            <td>{{ $item->tanggal_konser }}</td>
            <td>{{ $item->jumlah_tiket }}</td>
            <td>{{ $item->kategori_tiket }}</td>
            <td>
                @if ($item->status_pemesanan == 'terkonfirmasi')
                    <span class="badge bg-success">{{ ucfirst($item->status_pemesanan) }}</span>
                @elseif ($item->status_pemesanan == 'pending')
                    <span class="badge bg-warning">{{ ucfirst($item->status_pemesanan) }}</span>
                @elseif ($item->status_pemesanan == 'dibatalkan')
                    <span class="badge bg-danger">{{ ucfirst($item->status_pemesanan) }}</span>
                @else
                    <span class="badge bg-secondary">{{ ucfirst($item->status_pemesanan) }}</span>
                @endif
            </td>
            <td>
                <a class="btn btn-warning btn-sm" href="{{ route('pemesanans.edit', $item->id) }}">Edit</a>
                <form action="{{ route('pemesanans.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="pagination">
    {{ $pemesanans->links("pagination::bootstrap-5") }}
</div>
@endsection
