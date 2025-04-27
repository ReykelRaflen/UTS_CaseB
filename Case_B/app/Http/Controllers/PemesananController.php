<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    // Menampilkan daftar semua pemesanan dengan pagination
    public function index()
    {
        $pemesanans = Pemesanan::latest()->paginate(8);
        return view('pemesanans.index', compact('pemesanans'));
    }

    // Menampilkan form tambah pemesanan
    public function create()
    {
        return view('pemesanans.create');
    }

    // Menyimpan data pemesanan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_pemesan' => 'required|string|max:255',
            'email' => 'required|email',
            'nama_konser' => 'required|string',
            'tanggal_konser' => 'required|date',
            'jumlah_tiket' => 'required|integer|min:1',
            'kategori_tiket' => 'required|in:VIP,Reguler,Festival',
            'status_pemesanan' => 'required|in:terkonfirmasi,pending,dibatalkan'
        ]);

        Pemesanan::create($request->all());
        return redirect()->route('pemesanans.index')->with('success', 'Pemesanan berhasil ditambahkan');
    }

    // Menampilkan form edit untuk pemesanan tertentu
    public function edit($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        return view('pemesanans.edit', compact('pemesanan'));
    }

    // Menyimpan perubahan pada pemesanan yang diedit
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pemesan' => 'required|string|max:255',
            'email' => 'required|email',
            'nama_konser' => 'required|string',
            'tanggal_konser' => 'required|date',
            'jumlah_tiket' => 'required|integer|min:1',
            'kategori_tiket' => 'required|in:VIP,Reguler,Festival',
            'status_pemesanan' => 'required|in:terkonfirmasi,pending,dibatalkan'
        ]);

        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->update($request->all());

        return redirect()->route('pemesanans.index')->with('success', 'Pemesanan berhasil diperbarui');
    }

    // Menghapus (soft delete) pemesanan tertentu
    public function destroy($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->delete();
        return redirect()->route('pemesanans.index')->with('success', 'Pemesanan berhasil dihapus');
    }

    // Menampilkan daftar pemesanan yang sudah dihapus (soft delete)
    public function riwayat()
    {
        $pemesanans = Pemesanan::onlyTrashed()->paginate(8);
        return view('pemesanans.riwayat', compact('pemesanans'));
    }

    // Memulihkan data pemesanan yang telah dihapus
    public function restore($id)
    {
        $pemesanan = Pemesanan::onlyTrashed()->findOrFail($id);
        $pemesanan->restore();
        return redirect()->route('pemesanans.riwayat')->with('success', 'Pemesanan berhasil dipulihkan');
    }

    public function forceDelete($id)
{
    // Menghapus data secara permanen
    $pemesanan = Pemesanan::withTrashed()->find($id);
    $pemesanan->forceDelete();

    return redirect()->route('pemesanans.riwayat')->with('success', 'Pemesanan berhasil dihapus permanen!');
}

}
