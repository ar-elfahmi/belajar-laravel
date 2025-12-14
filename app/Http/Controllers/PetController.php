<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Pemilik;
use App\Models\RasHewan;
use Illuminate\Http\Request;

class PetController extends Controller
{
    // halaman pet
    public function pet()
    {
        $data_pet = Pet::with('pemilik.user', 'rasHewan')->paginate(4);
        return view('Halaman.admin.Pet.pet', compact('data_pet'));
    }

    //halaman tambah pet
    public function tambahPet()
    {
        $data_pemilik = Pemilik::all();
        $data_ras_hewan = RasHewan::all();
        return view('Halaman.admin.Pet.tambah-pet', compact('data_pemilik', 'data_ras_hewan'));
    }

    // function tambah pet
    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'nama' => 'required',
            'tanggal_lahir' => 'required|date',
            'warna_tanda' => 'required',
            'jenis_kelamin' => 'required|in:J,L',
            'idpemilik' => 'required|exists:pemilik,idpemilik',
            'idras_hewan' => 'required|exists:ras_hewan,idras_hewan',
        ]);

        // Simpan ke Database
        Pet::create([
            'nama'           => $request->nama,
            'tanggal_lahir'  => $request->tanggal_lahir,
            'warna_tanda'    => $request->warna_tanda,
            'jenis_kelamin'  => $request->jenis_kelamin,
            'idpemilik'      => $request->idpemilik,
            'idras_hewan'    => $request->idras_hewan,
        ]);

        return redirect()->route('pet')->with('success', 'Pet berhasil ditambahkan!');
    }

    // halaman edit pet
    public function editPet($idpet)
    {
        $data_pet = Pet::with('pemilik', 'rasHewan')->find($idpet);
        $data_pemilik = Pemilik::all();
        $data_ras_hewan = RasHewan::all();
        return view('Halaman.admin.Pet.edit-pet', compact('data_pet', 'data_pemilik', 'data_ras_hewan'));
    }

    // function edit pet
    public function update(Request $request, $idpet)
    {
        // Validasi
        $request->validate([
            'nama' => 'required',
            'tanggal_lahir' => 'required|date',
            'warna_tanda' => 'required',
            'jenis_kelamin' => 'required|in:J,L',
            'idpemilik' => 'required|exists:pemilik,idpemilik',
            'idras_hewan' => 'required|exists:ras_hewan,idras_hewan',
        ]);

        // Ambil data pet
        $pet = Pet::find($idpet);

        // Update data pet
        $pet->nama = $request->nama;
        $pet->tanggal_lahir = $request->tanggal_lahir;
        $pet->warna_tanda = $request->warna_tanda;
        $pet->jenis_kelamin = $request->jenis_kelamin;
        $pet->idpemilik = $request->idpemilik;
        $pet->idras_hewan = $request->idras_hewan;

        // Simpan perubahan
        $pet->save();

        return redirect()->route('pet')->with('success', 'Pet berhasil diupdate!');
    }

    // function hapus pet
    public function destroy($idpet)
    {
        // Cari pet berdasarkan idpet
        $pet = Pet::find($idpet);

        // Hapus pet
        $pet->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('pet')->with('success', 'Pet berhasil dihapus!');
    }
}
