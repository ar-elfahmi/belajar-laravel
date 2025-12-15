<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\RekamMedis;
use App\Models\TemuDokter;
use App\Models\RoleUser;
use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
    // halaman rekam medis
    public function rekam_medis()
    {
        $data_rekam_medis = RekamMedis::with('temuDokter.pet', 'dokter.user')->paginate(4);

        // Ambil role aktif user
        $Role = Auth::user()->role_user->where('status', 1)->first()->role->nama_role;

        switch ($Role) {
            case 'Administrator':
                return view('Halaman.admin.RekamMedis.rekam-medis', compact('data_rekam_medis'));

            case 'Perawat':
                return view('Halaman.perawat.RekamMedis.rekam-medis', compact('data_rekam_medis'));

            case 'Dokter':
                return view('Halaman.dokter.RekamMedis.rekam-medis', compact('data_rekam_medis'));

            case 'Pemilik':
                // Pemilik hanya bisa melihat rekam medis milik hewan mereka
                $data_rekam_medis = RekamMedis::with('temuDokter.pet', 'dokter.user')
                    ->whereHas('temuDokter.pet.pemilik.user', function ($query) {
                        $query->where('iduser', Auth::user()->iduser);
                    })
                    ->paginate(4);
                return view('Halaman.pemilik.RekamMedis.rekam-medis', compact('data_rekam_medis'));

            default:
                abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }

    //halaman tambah rekam medis
    public function tambahRekamMedis()
    {
        $data_temu_dokter = TemuDokter::with('pet')->get();
        $data_role_user = RoleUser::whereHas('role', function ($query) {
            $query->where('nama_role', 'Dokter');
        })->with('user')->get();

        // Ambil role aktif user
        $Role = Auth::user()->role_user->where('status', 1)->first()->role->nama_role;

        switch ($Role) {
            case 'Administrator':
                return view('Halaman.admin.RekamMedis.tambah-rekam-medis', compact('data_temu_dokter', 'data_role_user'));

            case 'Perawat':
                return view('Halaman.perawat.RekamMedis.tambah-rekam-medis', compact('data_temu_dokter', 'data_role_user'));

            default:
                abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }

    // function tambah rekam medis
    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'idreservasi_dokter' => 'required|exists:temu_dokter,idreservasi_dokter',
            'anamnesa' => 'required',
            'temuan_klinis' => 'required',
            'diagnosa' => 'required',
            'dokter_pemeriksa' => 'required|exists:role_user,idrole_user',
        ]);

        // Simpan ke Database
        RekamMedis::create([
            'idreservasi_dokter' => $request->idreservasi_dokter,
            'created_at' => now(),
            'anamnesa' => $request->anamnesa,
            'temuan_klinis' => $request->temuan_klinis,
            'diagnosa' => $request->diagnosa,
            'dokter_pemeriksa' => $request->dokter_pemeriksa,
        ]);

        // Ambil role aktif user
        $Role = Auth::user()->role_user->where('status', 1)->first()->role->nama_role;

        switch ($Role) {
            case 'Administrator':
        return redirect()->route('admin.rekam-medis')->with('success', 'Rekam Medis berhasil ditambahkan!');

            case 'Perawat':
        return redirect()->route('perawat.rekam-medis')->with('success', 'Rekam Medis berhasil ditambahkan!');
                
            default:
                abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }

    // halaman edit rekam medis
    public function editRekamMedis($idrekam_medis)
    {
        $data_rekam_medis = RekamMedis::with('temuDokter.pet', 'dokter.user')->find($idrekam_medis);
        $data_temu_dokter = TemuDokter::with('pet')->get();
        $data_role_user = RoleUser::whereHas('role', function ($query) {
            $query->where('nama_role', 'Dokter');
        })->with('user')->get();

        // Ambil role aktif user
        $Role = Auth::user()->role_user->where('status', 1)->first()->role->nama_role;

        switch ($Role) {
            case 'Administrator':
        return view('Halaman.admin.RekamMedis.edit-rekam-medis', compact('data_rekam_medis', 'data_temu_dokter', 'data_role_user'));

            case 'Perawat':
        return view('Halaman.perawat.RekamMedis.edit-rekam-medis', compact('data_rekam_medis', 'data_temu_dokter', 'data_role_user'));
                
            default:
                abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }

    // function edit rekam medis
    public function update(Request $request, $idrekam_medis)
    {
        // Validasi
        $request->validate([
            'idreservasi_dokter' => 'required|exists:temu_dokter,idreservasi_dokter',
            'anamnesa' => 'required',
            'temuan_klinis' => 'required',
            'diagnosa' => 'required',
            'dokter_pemeriksa' => 'required|exists:role_user,idrole_user',
        ]);

        // Ambil data rekam medis
        $rekam_medis = RekamMedis::find($idrekam_medis);

        // Update data rekam medis
        $rekam_medis->idreservasi_dokter = $request->idreservasi_dokter;
        $rekam_medis->anamnesa = $request->anamnesa;
        $rekam_medis->temuan_klinis = $request->temuan_klinis;
        $rekam_medis->diagnosa = $request->diagnosa;
        $rekam_medis->dokter_pemeriksa = $request->dokter_pemeriksa;

        // Simpan perubahan
        $rekam_medis->save();

        // Ambil role aktif user
        $Role = Auth::user()->role_user->where('status', 1)->first()->role->nama_role;

        switch ($Role) {
            case 'Administrator':
        return redirect()->route('admin.rekam-medis')->with('success', 'Rekam Medis berhasil diupdate!');

            case 'Perawat':
        return redirect()->route('perawat.rekam-medis')->with('success', 'Rekam Medis berhasil diupdate!');
                
            default:
                abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }

    // function hapus rekam medis
    public function destroy($idrekam_medis)
    {
        // Cari rekam medis berdasarkan idrekam_medis
        $rekam_medis = RekamMedis::find($idrekam_medis);

        // Hapus rekam medis
        $rekam_medis->delete();

        // Redirect dengan pesan sukses
        // Ambil role aktif user
        $Role = Auth::user()->role_user->where('status', 1)->first()->role->nama_role;

        switch ($Role) {
            case 'Administrator':
        return redirect()->route('admin.rekam-medis')->with('success', 'Rekam Medis berhasil dihapus!');

            case 'Perawat':
        return redirect()->route('perawat.rekam-medis')->with('success', 'Rekam Medis berhasil dihapus!');
                
            default:
                abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }
}
