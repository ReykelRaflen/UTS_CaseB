@extends('layouts.app')

@section('content')
<h2>Edit Pemesanan Tiket</h2>

<form action="{{ route('pemesanans.update', $pemesanan->id) }}" method="POST" style="margin-top: 1rem;">
    @csrf
    @method('PUT')

    <div style="display: grid; gap: 1rem; max-width: 600px;">
        <input type="text" name="nama_pemesan" placeholder="Nama Pemesan" value="{{ old('nama_pemesan', $pemesanan->nama_pemesan) }}" required>

        <input type="email" name="email" placeholder="Email" value="{{ old('email', $pemesanan->email) }}" required>

        <input type="text" name="nama_konser" placeholder="Nama Konser" value="{{ old('nama_konser', $pemesanan->nama_konser) }}" required>

        <input type="date" name="tanggal_konser" value="{{ old('tanggal_konser', $pemesanan->tanggal_konser) }}" required>

        <input type="number" name="jumlah_tiket" min="1" placeholder="Jumlah Tiket" value="{{ old('jumlah_tiket', $pemesanan->jumlah_tiket) }}" required>

        <select name="kategori_tiket" required>
            <option disabled selected>Pilih Kategori Tiket</option>
            @foreach(['VIP', 'Reguler', 'Festival'] as $kategori)
                <option value="{{ $kategori }}" {{ old('kategori_tiket', $pemesanan->kategori_tiket) == $kategori ? 'selected' : '' }}>{{ $kategori }}</option>
            @endforeach
        </select>

        <select name="status_pemesanan" required>
            <option disabled selected>Status Pemesanan</option>
            @foreach(['terkonfirmasi', 'pending', 'dibatalkan'] as $status)
                <option value="{{ $status }}" {{ old('status_pemesanan', $pemesanan->status_pemesanan) == $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
            @endforeach
        </select>

        <button type="submit" class="btn">Update</button>
    </div>

    @if ($errors->any())
        <div style="margin-top: 1rem; color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>⚠️ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</form>
@endsection
