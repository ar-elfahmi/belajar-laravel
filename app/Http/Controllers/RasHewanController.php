<?php

namespace App\Http\Controllers;

use App\Models\RasHewan;
use App\Models\JenisHewan;
use Illuminate\Http\Request;

class RasHewanController extends Controller
{
    // halaman ras hewan
    public function rasHewan()
    {
        $data_ras_hewan = RasHewan::with(['jenisHewan'])->paginate(4);
        $data_jenis_hewan = JenisHewan::all();
        return view('Halaman.admin.RasHewan.ras-hewan', compact('data_ras_hewan', 'data_jenis_hewan'));
    }

    //halaman tambah ras hewan
    public function tambahRasHewan()
    {
        $data_jenis_hewan = JenisHewan::all();
        return view('Halaman.admin.RasHewan.tambah-ras-hewan', compact('data_jenis_hewan'));
    }

    // function tambah ras hewan
    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'nama_ras' => 'required',
            'idjenis_hewan' => 'required|exists:jenis_hewan,idjenis_hewan',
        ]);

        // Simpan ke Database
        RasHewan::create([
            'nama_ras' => $request->nama_ras,
            'idjenis_hewan' => $request->idjenis_hewan,
        ]);

        return redirect()->route('admin.ras-hewan')->with('success', 'Ras Hewan berhasil ditambahkan!');
    }

    // halaman edit ras hewan
    public function editRasHewan($idras_hewan)
    {
        $data_ras_hewan = RasHewan::find($idras_hewan);
        $data_jenis_hewan = JenisHewan::all();
        return view('Halaman.admin.RasHewan.edit-ras-hewan', compact('data_ras_hewan', 'data_jenis_hewan'));
    }

    // function edit ras hewan
    public function update(Request $request, $idras_hewan)
    {
        // Validasi
        $request->validate([
            'nama_ras' => 'required',
            'idjenis_hewan' => 'required|exists:jenis_hewan,idjenis_hewan',
        ]);

        // Ambil data ras hewan
        $ras_hewan = RasHewan::find($idras_hewan);

        // Update data ras hewan
        $ras_hewan->nama_ras = $request->nama_ras;
        $ras_hewan->idjenis_hewan = $request->idjenis_hewan;

        // Simpan perubahan
        $ras_hewan->save();

        return redirect()->route('admin.ras-hewan')->with('success', 'Ras Hewan berhasil diupdate!');
    }

    // function hapus ras hewan
    public function destroy($idras_hewan)
    {
        // Cari ras hewan berdasarkan idras_hewan
        $ras_hewan = RasHewan::find($idras_hewan);

        // Hapus ras hewan
        $ras_hewan->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.ras-hewan')->with('success', 'Ras Hewan berhasil dihapus!');
    }
}
