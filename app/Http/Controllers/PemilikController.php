<?php

namespace App\Http\Controllers;

use App\Models\Pemilik;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemilikController extends Controller
{
    // halaman pemilik
    public function pemilik()
    {
        $data_pemilik = Pemilik::with('user')->paginate(4);

        // Ambil role aktif user
        $Role = Auth::user()->role_user->where('status', 1)->first()->role->nama_role;

        switch ($Role) {
            case 'Administrator':
                return view('Halaman.admin.Pemilik.pemilik', compact('data_pemilik'));

            case 'Resepsionis':
                return view('Halaman.resepsionis.Pemilik.pemilik', compact('data_pemilik'));

            case 'Dokter':
            case 'Perawat':
                return view('Halaman.dokter.Pemilik.pemilik', compact('data_pemilik'));

            default:
                abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }

    //halaman tambah pemilik
    public function tambahPemilik()
    {
        $data_user = User::all();
        // Ambil role aktif user
        $Role = Auth::user()->role_user->where('status', 1)->first()->role->nama_role;

        switch ($Role) {
            case 'Administrator':
                return view('Halaman.admin.Pemilik.tambah-pemilik', compact('data_user'));

            case 'Resepsionis':
                return view('Halaman.resepsionis.Pemilik.tambah-pemilik', compact('data_user'));

            default:
                abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
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

        // Ambil role aktif user
        $Role = Auth::user()->role_user->where('status', 1)->first()->role->nama_role;

        switch ($Role) {
            case 'Administrator':
                return redirect()->route('admin.pemilik')->with('success', 'Pemilik berhasil ditambahkan!');

            case 'Resepsionis':
                return redirect()->route('resepsionis.pemilik')->with('success', 'Pemilik berhasil ditambahkan!');

            default:
                abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }

    // halaman edit pemilik
    public function editPemilik($idpemilik)
    {
        $data_pemilik = Pemilik::with('user')->find($idpemilik);
        $data_user = User::all();
        // Ambil role aktif user
        $Role = Auth::user()->role_user->where('status', 1)->first()->role->nama_role;

        switch ($Role) {
            case 'Administrator':
        return view('Halaman.admin.Pemilik.edit-pemilik', compact('data_pemilik', 'data_user'));

            case 'Resepsionis':
        return view('Halaman.resepsionis.Pemilik.edit-pemilik', compact('data_pemilik', 'data_user'));

            default:
                abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
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

        // Ambil role aktif user
        $Role = Auth::user()->role_user->where('status', 1)->first()->role->nama_role;

        switch ($Role) {
            case 'Administrator':
                return redirect()->route('admin.pemilik')->with('success', 'Pemilik berhasil diupdate!');

            case 'Resepsionis':
                return redirect()->route('resepsionis.pemilik')->with('success', 'Pemilik berhasil diupdate!');

            default:
                abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }

    // function hapus pemilik
    public function destroy($idpemilik)
    {
        // Cari pemilik berdasarkan idpemilik
        $pemilik = Pemilik::find($idpemilik);

        // Hapus pemilik
        $pemilik->delete();

        // Ambil role aktif user
        $Role = Auth::user()->role_user->where('status', 1)->first()->role->nama_role;

        switch ($Role) {
            case 'Administrator':
                return redirect()->route('admin.pemilik')->with('success', 'Pemilik berhasil dihapus!');

            case 'Resepsionis':
                return redirect()->route('resepsionis.pemilik')->with('success', 'Pemilik berhasil dihapus!');

            default:
                abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }
}
