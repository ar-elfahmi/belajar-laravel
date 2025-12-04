<?php

namespace App\Http\Controllers;

use App\Models\JenisHewan;
use Illuminate\Http\Request;

class JenisHewanController extends Controller
{
    // halaman jenis hewan
    public function jenisHewan()
    {
        $data_jenis_hewan = JenisHewan::paginate(4);
        return view('Halaman.admin.JenisHewan.jenis-hewan', compact('data_jenis_hewan'));
    }

    //halaman tambah jenis hewan
    public function tambahJenisHewan()
    {
        return view('Halaman.admin.JenisHewan.tambah-jenis-hewan');
    }

    // function tambah jenis hewan
    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'nama_jenis_hewan' => 'required',
        ]);

        // Simpan ke Database
        JenisHewan::create([
            'nama_jenis_hewan' => $request->nama_jenis_hewan,
        ]);

        return redirect()->route('jenis-hewan')->with('success', 'Jenis Hewan berhasil ditambahkan!');
    }

    // halaman edit jenis hewan
    public function editJenisHewan($idjenis_hewan)
    {
        $data_jenis_hewan = JenisHewan::find($idjenis_hewan);
        return view('Halaman.admin.JenisHewan.edit-jenis-hewan', compact('data_jenis_hewan'));
    }

    // function edit jenis hewan
    public function update(Request $request, $idjenis_hewan)
    {
        // Validasi
        $request->validate([
            'nama_jenis_hewan' => 'required',
        ]);

        // Ambil data jenis hewan
        $jenis_hewan = JenisHewan::find($idjenis_hewan);

        // Update data jenis hewan
        $jenis_hewan->nama_jenis_hewan = $request->nama_jenis_hewan;

        // Simpan perubahan
        $jenis_hewan->save();

        return redirect()->route('jenis-hewan')->with('success', 'Jenis Hewan berhasil diupdate!');
    }

    // function hapus jenis hewan
    public function destroy($idjenis_hewan)
    {
        // Cari jenis hewan berdasarkan idjenis_hewan
        $jenis_hewan = JenisHewan::find($idjenis_hewan);

        // Hapus jenis hewan
        $jenis_hewan->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('jenis-hewan')->with('success', 'Jenis Hewan berhasil dihapus!');
    }
}
