<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // halaman kategori
    public function kategori()
    {
        $data_kategori = Kategori::paginate(4);
        return view('Halaman.admin.Kategori.kategori', compact('data_kategori'));
    }

    //halaman tambah kategori
    public function tambahKategori()
    {
        return view('Halaman.admin.Kategori.tambah-kategori');
    }

    // function tambah kategori
    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'nama_kategori' => 'required',
        ]);

        // Simpan ke Database
        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('admin.kategori')->with('success', 'Kategori berhasil ditambahkan!');
    }

    // halaman edit kategori
    public function editKategori($idkategori)
    {
        $data_kategori = Kategori::find($idkategori);
        return view('Halaman.admin.Kategori.edit-kategori', compact('data_kategori'));
    }

    // function edit kategori
    public function update(Request $request, $idkategori)
    {
        // Validasi
        $request->validate([
            'nama_kategori' => 'required',
        ]);

        // Ambil data kategori
        $kategori = Kategori::find($idkategori);

        // Update data kategori
        $kategori->nama_kategori = $request->nama_kategori;

        // Simpan perubahan
        $kategori->save();

        return redirect()->route('admin.kategori')->with('success', 'Kategori berhasil diupdate!');
    }

    // function hapus kategori
    public function destroy($idkategori)
    {
        // Cari kategori berdasarkan idkategori
        $kategori = Kategori::find($idkategori);

        // Hapus kategori
        $kategori->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.kategori')->with('success', 'Kategori berhasil dihapus!');
    }
}
