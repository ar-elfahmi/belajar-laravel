<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\DetailRekamMedis;
use App\Models\RekamMedis;
use App\Models\KodeTindakanTerapi;
use Illuminate\Http\Request;

class DetailRekamMedisController extends Controller
{
    // halaman detail rekam medis
    public function detail_rekam_medis()
    {
        $data_detail_rekam_medis = DetailRekamMedis::with('rekamMedis.temuDokter.pet', 'kodeTindakanTerapi')->paginate(4);
        $Role = Auth::user()->role_user->first()->role->nama_role;
        switch ($Role) {
            case 'Administrator':
        return view('Halaman.admin.DetailRekamMedis.detail-rekam-medis', compact('data_detail_rekam_medis'));
                break;

            case 'Resepsionis':
        return view('Halaman.resepsionis.DetailRekamMedis.detail-rekam-medis', compact('data_detail_rekam_medis'));
                break;

            case 'Dokter':
        return view('Halaman.dokter.DetailRekamMedis.detail-rekam-medis', compact('data_detail_rekam_medis'));
                break;

            case 'Perawat':
        return view('Halaman.perawat.DetailRekamMedis.detail-rekam-medis', compact('data_detail_rekam_medis'));
                break;

            case 'Pemilik':
        return view('Halaman.pemilik.DetailRekamMedis.detail-rekam-medis', compact('data_detail_rekam_medis'));
                break;

            default:
                // Jika role tidak dikenali, kembalikan ke halaman login atau home default
                return redirect('/')->with('error', 'Anda tidak memiliki akses.');
                break;
        }
    }

    //halaman tambah detail rekam medis
    public function tambahDetailRekamMedis()
    {
        $data_rekam_medis = RekamMedis::with('temuDokter.pet')->get();
        $data_kode_tindakan_terapi = KodeTindakanTerapi::with('kategori', 'kategoriKlinis')->get();
        return view('Halaman.admin.DetailRekamMedis.tambah-detail-rekam-medis', compact('data_rekam_medis', 'data_kode_tindakan_terapi'));
    }

    // function tambah detail rekam medis
    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'idrekam_medis' => 'required|exists:rekam_medis,idrekam_medis',
            'idkode_tindakan_terapi' => 'required|exists:kode_tindakan_terapi,idkode_tindakan_terapi',
            'detail' => 'required',
        ]);

        // Simpan ke Database
        DetailRekamMedis::create([
            'idrekam_medis' => $request->idrekam_medis,
            'idkode_tindakan_terapi' => $request->idkode_tindakan_terapi,
            'detail' => $request->detail,
        ]);

        return redirect()->route('detail-rekam-medis')->with('success', 'Detail Rekam Medis berhasil ditambahkan!');
    }

    // halaman edit detail rekam medis
    public function editDetailRekamMedis($iddetail_rekam_medis)
    {
        $data_detail_rekam_medis = DetailRekamMedis::with('rekamMedis.temuDokter.pet', 'kodeTindakanTerapi')->find($iddetail_rekam_medis);
        $data_rekam_medis = RekamMedis::with('temuDokter.pet')->get();
        $data_kode_tindakan_terapi = KodeTindakanTerapi::with('kategori', 'kategoriKlinis')->get();
        return view('Halaman.admin.DetailRekamMedis.edit-detail-rekam-medis', compact('data_detail_rekam_medis', 'data_rekam_medis', 'data_kode_tindakan_terapi'));
    }

    // function edit detail rekam medis
    public function update(Request $request, $iddetail_rekam_medis)
    {
        // Validasi
        $request->validate([
            'idrekam_medis' => 'required|exists:rekam_medis,idrekam_medis',
            'idkode_tindakan_terapi' => 'required|exists:kode_tindakan_terapi,idkode_tindakan_terapi',
            'detail' => 'required',
        ]);

        // Ambil data detail rekam medis
        $detail_rekam_medis = DetailRekamMedis::find($iddetail_rekam_medis);

        // Update data detail rekam medis
        $detail_rekam_medis->idrekam_medis = $request->idrekam_medis;
        $detail_rekam_medis->idkode_tindakan_terapi = $request->idkode_tindakan_terapi;
        $detail_rekam_medis->detail = $request->detail;

        // Simpan perubahan
        $detail_rekam_medis->save();

        return redirect()->route('detail-rekam-medis')->with('success', 'Detail Rekam Medis berhasil diupdate!');
    }

    // function hapus detail rekam medis
    public function destroy($iddetail_rekam_medis)
    {
        // Cari detail rekam medis berdasarkan iddetail_rekam_medis
        $detail_rekam_medis = DetailRekamMedis::find($iddetail_rekam_medis);

        // Hapus detail rekam medis
        $detail_rekam_medis->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('detail-rekam-medis')->with('success', 'Detail Rekam Medis berhasil dihapus!');
    }
}
