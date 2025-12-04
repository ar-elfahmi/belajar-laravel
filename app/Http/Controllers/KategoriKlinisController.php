<?php

namespace App\Http\Controllers;

use App\Models\KategoriKlinis;
use Illuminate\Http\Request;

class KategoriKlinisController extends Controller
{
    // halaman kategori klinis
    public function kategoriKlinis()
    {
        $data_kategori_klinis = KategoriKlinis::paginate(4);
        return view('Halaman.admin.KategoriKlinis.kategori-klinis', compact('data_kategori_klinis'));
    }

    //halaman tambah kategori klinis
    public function tambahKategoriKlinis()
    {
        return view('Halaman.admin.KategoriKlinis.tambah-kategori-klinis');
    }

    // function tambah kategori klinis
    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'nama_kategori_klinis' => 'required',
        ]);

        // Simpan ke Database
        KategoriKlinis::create([
            'nama_kategori_klinis' => $request->nama_kategori_klinis,
        ]);

        return redirect()->route('kategori-klinis')->with('success', 'Kategori Klinis berhasil ditambahkan!');
    }

    // halaman edit kategori klinis
    public function editKategoriKlinis($idkategori_klinis)
    {
        $data_kategori_klinis = KategoriKlinis::find($idkategori_klinis);
        return view('Halaman.admin.KategoriKlinis.edit-kategori-klinis', compact('data_kategori_klinis'));
    }

    // function edit kategori klinis
    public function update(Request $request, $idkategori_klinis)
    {
        // Validasi
        $request->validate([
            'nama_kategori_klinis' => 'required',
        ]);

        // Ambil data kategori klinis
        $kategori_klinis = KategoriKlinis::find($idkategori_klinis);

        // Update data kategori klinis
        $kategori_klinis->nama_kategori_klinis = $request->nama_kategori_klinis;

        // Simpan perubahan
        $kategori_klinis->save();

        return redirect()->route('kategori-klinis')->with('success', 'Kategori Klinis berhasil diupdate!');
    }

    // function hapus kategori klinis
    public function destroy($idkategori_klinis)
    {
        // Cari kategori klinis berdasarkan idkategori_klinis
        $kategori_klinis = KategoriKlinis::find($idkategori_klinis);

        // Hapus kategori klinis
        $kategori_klinis->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('kategori-klinis')->with('success', 'Kategori Klinis berhasil dihapus!');
    }
}
