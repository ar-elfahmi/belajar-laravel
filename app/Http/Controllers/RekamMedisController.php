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
        $Role = Auth::user()->role_user->first()->role->nama_role;
        switch ($Role) {
            case 'Administrator':
                return view('Halaman.admin.RekamMedis.rekam-medis', compact('data_rekam_medis'));
                break;

            case 'Resepsionis':
                return view('Halaman.resepsionis.RekamMedis.rekam-medis', compact('data_rekam_medis'));
                break;

            case 'Dokter':
                return view('Halaman.dokter.RekamMedis.rekam-medis', compact('data_rekam_medis'));
                break;

            case 'Perawat':
                return view('Halaman.perawat.RekamMedis.rekam-medis', compact('data_rekam_medis'));
                break;
                
            default:
                // Jika role tidak dikenali, kembalikan ke halaman login atau home default
                return redirect('/')->with('error', 'Anda tidak memiliki akses.');
                break;
        }
    }

    //halaman tambah rekam medis
    public function tambahRekamMedis()
    {
        $data_temu_dokter = TemuDokter::with('pet')->get();
        $data_role_user = RoleUser::whereHas('role', function ($query) {
            $query->where('nama_role', 'Dokter');
        })->with('user')->get();
        return view('Halaman.admin.RekamMedis.tambah-rekam-medis', compact('data_temu_dokter', 'data_role_user'));
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

        return redirect()->route('rekam-medis')->with('success', 'Rekam Medis berhasil ditambahkan!');
    }

    // halaman edit rekam medis
    public function editRekamMedis($idrekam_medis)
    {
        $data_rekam_medis = RekamMedis::with('temuDokter.pet', 'dokter.user')->find($idrekam_medis);
        $data_temu_dokter = TemuDokter::with('pet')->get();
        $data_role_user = RoleUser::whereHas('role', function ($query) {
            $query->where('nama_role', 'Dokter');
        })->with('user')->get();
        return view('Halaman.admin.RekamMedis.edit-rekam-medis', compact('data_rekam_medis', 'data_temu_dokter', 'data_role_user'));
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

        return redirect()->route('rekam-medis')->with('success', 'Rekam Medis berhasil diupdate!');
    }

    // function hapus rekam medis
    public function destroy($idrekam_medis)
    {
        // Cari rekam medis berdasarkan idrekam_medis
        $rekam_medis = RekamMedis::find($idrekam_medis);

        // Hapus rekam medis
        $rekam_medis->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('rekam-medis')->with('success', 'Rekam Medis berhasil dihapus!');
    }
}
