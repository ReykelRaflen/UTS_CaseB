@extends('layouts.app')

@section('content')
<h2>Tambah Pemesanan Tiket</h2>

<form action="{{ route('pemesanans.store') }}" method="POST" style="margin-top: 1rem;">
    @csrf

    <div style="display: grid; gap: 1rem; max-width: 600px;">
        <input type="text" name="nama_pemesan" placeholder="Nama Pemesan" value="{{ old('nama_pemesan') }}" required>

        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>

        <input type="text" name="nama_konser" placeholder="Nama Konser" value="{{ old('nama_konser') }}" required>

        <input type="date" name="tanggal_konser" value="{{ old('tanggal_konser') }}" required>

        <input type="number" name="jumlah_tiket" min="1" placeholder="Jumlah Tiket" value="{{ old('jumlah_tiket') }}" required>

        <select name="kategori_tiket" required>
            <option disabled selected>Pilih Kategori Tiket</option>
            @foreach(['VIP', 'Reguler', 'Festival'] as $kategori)
                <option value="{{ $kategori }}" {{ old('kategori_tiket') == $kategori ? 'selected' : '' }}>{{ $kategori }}</option>
            @endforeach
        </select>

        <select name="status_pemesanan" required>
            <option disabled selected>Status Pemesanan</option>
            @foreach(['terkonfirmasi', 'pending', 'dibatalkan'] as $status)
                <option value="{{ $status }}" {{ old('status_pemesanan') == $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
            @endforeach
        </select>

        <button type="submit" class="btn">Simpan</button>
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
