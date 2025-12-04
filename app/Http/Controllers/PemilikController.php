<?php

namespace App\Http\Controllers;

use App\Models\Pemilik;
use App\Models\User;
use Illuminate\Http\Request;

class PemilikController extends Controller
{
    // halaman pemilik
    public function pemilik()
    {
        $data_pemilik = Pemilik::with('user')->paginate(4);
        return view('Halaman.admin.Pemilik.pemilik', compact('data_pemilik'));
    }

    //halaman tambah pemilik
    public function tambahPemilik()
    {
        $data_user = User::all();
        return view('Halaman.admin.Pemilik.tambah-pemilik', compact('data_user'));
    }

    // function tambah pemilik
    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'no_wa' => 'required',
            'alamat' => 'required',
            'iduser' => 'required|exists:user,iduser',
        ]);

        // Simpan ke Database
        Pemilik::create([
            'no_wa'   => $request->no_wa,
            'alamat'  => $request->alamat,
            'iduser'  => $request->iduser,
        ]);

        return redirect()->route('pemilik')->with('success', 'Pemilik berhasil ditambahkan!');
    }

    // halaman edit pemilik
    public function editPemilik($idpemilik)
    {
        $data_pemilik = Pemilik::with('user')->find($idpemilik);
        $data_user = User::all();
        return view('Halaman.admin.Pemilik.edit-pemilik', compact('data_pemilik', 'data_user'));
    }

    // function edit pemilik
    public function update(Request $request, $idpemilik)
    {
        // Validasi
        $request->validate([
            'no_wa' => 'required',
            'alamat' => 'required',
            'iduser' => 'required|exists:user,iduser',
        ]);

        // Ambil data pemilik
        $pemilik = Pemilik::find($idpemilik);

        // Update data pemilik
        $pemilik->no_wa = $request->no_wa;
        $pemilik->alamat = $request->alamat;
        $pemilik->iduser = $request->iduser;

        // Simpan perubahan
        $pemilik->save();

        return redirect()->route('pemilik')->with('success', 'Pemilik berhasil diupdate!');
    }

    // function hapus pemilik
    public function destroy($idpemilik)
    {
        // Cari pemilik berdasarkan idpemilik
        $pemilik = Pemilik::find($idpemilik);

        // Hapus pemilik
        $pemilik->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('pemilik')->with('success', 'Pemilik berhasil dihapus!');
    }
}
