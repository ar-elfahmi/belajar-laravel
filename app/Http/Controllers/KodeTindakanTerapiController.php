<?php

namespace App\Http\Controllers;

use App\Models\KodeTindakanTerapi;
use App\Models\Kategori;
use App\Models\KategoriKlinis;
use Illuminate\Http\Request;

class KodeTindakanTerapiController extends Controller
{
    // halaman kode tindakan terapi
    public function kodeTindakanTerapi()
    {
        $data_kode_tindakan_terapi = KodeTindakanTerapi::with(['kategori', 'kategoriKlinis'])->paginate(4);
        $data_kategori = Kategori::all();
        $data_kategori_klinis = KategoriKlinis::all();
        return view('Halaman.admin.KodeTindakanTerapi.kode-tindakan-terapi', compact('data_kode_tindakan_terapi', 'data_kategori', 'data_kategori_klinis'));
    }

    //halaman tambah kode tindakan terapi
    public function tambahKodeTindakanTerapi()
    {
        $data_kategori = Kategori::all();
        $data_kategori_klinis = KategoriKlinis::all();
        return view('Halaman.admin.KodeTindakanTerapi.tambah-kode-tindakan-terapi', compact('data_kategori', 'data_kategori_klinis'));
    }

    // function tambah kode tindakan terapi
    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'kode' => 'required|unique:kode_tindakan_terapi,kode',
            'deskripsi_tindakan_terapi' => 'required',
            'idkategori' => 'required|exists:kategori,idkategori',
            'idkategori_klinis' => 'required|exists:kategori_klinis,idkategori_klinis',
        ]);

        // Simpan ke Database
        KodeTindakanTerapi::create([
            'kode' => $request->kode,
            'deskripsi_tindakan_terapi' => $request->deskripsi_tindakan_terapi,
            'idkategori' => $request->idkategori,
            'idkategori_klinis' => $request->idkategori_klinis,
        ]);

        return redirect()->route('admin.kode-tindakan-terapi')->with('success', 'Kode Tindakan Terapi berhasil ditambahkan!');
    }

    // halaman edit kode tindakan terapi
    public function editKodeTindakanTerapi($idkode_tindakan_terapi)
    {
        $data_kode_tindakan_terapi = KodeTindakanTerapi::find($idkode_tindakan_terapi);
        $data_kategori = Kategori::all();
        $data_kategori_klinis = KategoriKlinis::all();
        return view('Halaman.admin.KodeTindakanTerapi.edit-kode-tindakan-terapi', compact('data_kode_tindakan_terapi', 'data_kategori', 'data_kategori_klinis'));
    }

    // function edit kode tindakan terapi
    public function update(Request $request, $idkode_tindakan_terapi)
    {
        // Validasi
        $request->validate([
            'kode' => 'required|unique:kode_tindakan_terapi,kode,' . $idkode_tindakan_terapi . ',idkode_tindakan_terapi',
            'deskripsi_tindakan_terapi' => 'required',
            'idkategori' => 'required|exists:kategori,idkategori',
            'idkategori_klinis' => 'required|exists:kategori_klinis,idkategori_klinis',
        ]);

        // Ambil data kode tindakan terapi
        $kode_tindakan_terapi = KodeTindakanTerapi::find($idkode_tindakan_terapi);

        // Update data kode tindakan terapi
        $kode_tindakan_terapi->kode = $request->kode;
        $kode_tindakan_terapi->deskripsi_tindakan_terapi = $request->deskripsi_tindakan_terapi;
        $kode_tindakan_terapi->idkategori = $request->idkategori;
        $kode_tindakan_terapi->idkategori_klinis = $request->idkategori_klinis;

        // Simpan perubahan
        $kode_tindakan_terapi->save();

        return redirect()->route('admin.kode-tindakan-terapi')->with('success', 'Kode Tindakan Terapi berhasil diupdate!');
    }

    // function hapus kode tindakan terapi
    public function destroy($idkode_tindakan_terapi)
    {
        // Cari kode tindakan terapi berdasarkan idkode_tindakan_terapi
        $kode_tindakan_terapi = KodeTindakanTerapi::find($idkode_tindakan_terapi);

        // Hapus kode tindakan terapi
        $kode_tindakan_terapi->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.kode-tindakan-terapi')->with('success', 'Kode Tindakan Terapi berhasil dihapus!');
    }
}
