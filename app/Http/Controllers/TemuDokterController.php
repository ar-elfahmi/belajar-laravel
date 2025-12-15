<?php

namespace App\Http\Controllers;

use App\Models\TemuDokter;
use App\Models\Pet;
use App\Models\RoleUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TemuDokterController extends Controller
{
    // halaman temu dokter
    public function temu_dokter()
    {
        $data_temu_dokter = TemuDokter::with('pet', 'roleUser')->paginate(4);

        // Ambil role aktif user
        $Role = Auth::user()->role_user->where('status', 1)->first()->role->nama_role;

        switch ($Role) {
            case 'Administrator':
                return view('Halaman.admin.TemuDokter.temu-dokter', compact('data_temu_dokter'));

            case 'Resepsionis':
                return view('Halaman.resepsionis.TemuDokter.temu-dokter', compact('data_temu_dokter'));

            case 'Pemilik':
                // Pemilik hanya bisa melihat temu dokter milik hewan mereka
                $data_temu_dokter = TemuDokter::with('pet', 'roleUser')
                    ->whereHas('pet.pemilik.user', function ($query) {
                        $query->where('iduser', Auth::user()->iduser);
                    })
                    ->paginate(4);
                return view('Halaman.pemilik.TemuDokter.temu-dokter', compact('data_temu_dokter'));

            default:
                abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }

    //halaman tambah temu dokter
    public function tambahTemuDokter()
    {
        $data_pet = Pet::all();
        $data_role_user = RoleUser::all();

        // Ambil role aktif user
        $Role = Auth::user()->role_user->where('status', 1)->first()->role->nama_role;

        switch ($Role) {
            case 'Administrator':
        return view('Halaman.admin.TemuDokter.tambah-temu-dokter', compact('data_pet', 'data_role_user'));

            case 'Resepsionis':
        return view('Halaman.resepsionis.TemuDokter.tambah-temu-dokter', compact('data_pet', 'data_role_user'));

            default:
                abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }

    // function tambah temu dokter
    public function store(Request $request)
    {
        // 1. Validasi (Hapus no_urut dari validasi input)
        $request->validate([
            'waktu_daftar' => 'required|date',
            'status'       => 'required|in:0,1,2',
            'idpet'        => 'required|exists:pet,idpet',
            'idrole_user'  => 'required|exists:role_user,idrole_user',
        ]);

        // 2. Logika Membuat Nomor Urut Otomatis (Reset Per Hari)

        // Ambil tanggal saja dari input waktu_daftar (Format Y-m-d)
        $tanggalDaftar = Carbon::parse($request->waktu_daftar)->format('Y-m-d');

        // Cari nomor urut tertinggi pada TANGGAL TERSEBUT
        // Catatan: Jika antrian harus per Dokter, tambahkan ->where('idrole_user', $request->idrole_user)
        $maxNoUrut = TemuDokter::whereDate('waktu_daftar', $tanggalDaftar)
            ->max('no_urut');

        // Jika sudah ada antrian, tambah 1. Jika belum ada (null), mulai dari 1.
        $nextNoUrut = $maxNoUrut ? ($maxNoUrut + 1) : 1;

        // 3. Simpan ke Database
        TemuDokter::create([
            'no_urut'      => $nextNoUrut, // Masukkan hasil hitungan otomatis
            'waktu_daftar' => $request->waktu_daftar,
            'status'       => $request->status,
            'idpet'        => $request->idpet,
            'idrole_user'  => $request->idrole_user,
        ]);

        // Ambil role aktif user
        $Role = Auth::user()->role_user->where('status', 1)->first()->role->nama_role;

        switch ($Role) {
            case 'Administrator':
        return redirect()->route('admin.temu-dokter')->with('success', 'Temu Dokter berhasil ditambahkan dengan No Urut: ' . $nextNoUrut);

            case 'Resepsionis':
        return redirect()->route('resepsionis.temu-dokter')->with('success', 'Temu Dokter berhasil ditambahkan dengan No Urut: ' . $nextNoUrut);

            default:
                abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }

    // halaman edit temu dokter
    public function editTemuDokter($idreservasi_dokter)
    {
        $data_temu_dokter = TemuDokter::with('pet', 'roleUser')->find($idreservasi_dokter);
        $data_pet = Pet::all();
        $data_role_user = RoleUser::all();

        // Ambil role aktif user
        $Role = Auth::user()->role_user->where('status', 1)->first()->role->nama_role;

        switch ($Role) {
            case 'Administrator':
        return view('Halaman.admin.TemuDokter.edit-temu-dokter', compact('data_temu_dokter', 'data_pet', 'data_role_user'));

            case 'Resepsionis':
        return view('Halaman.resepsionis.TemuDokter.edit-temu-dokter', compact('data_temu_dokter', 'data_pet', 'data_role_user'));

            default:
                abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }

    // function edit temu dokter
    public function update(Request $request, $idreservasi_dokter)
    {
        // Validasi
        $request->validate([
            'no_urut' => 'required|integer',
            'waktu_daftar' => 'required|date',
            'status' => 'required|in:0,1,2',
            'idpet' => 'required|exists:pet,idpet',
            'idrole_user' => 'required|exists:role_user,idrole_user',
        ]);

        // Ambil data temu dokter
        $temu_dokter = TemuDokter::find($idreservasi_dokter);

        // Update data temu dokter
        $temu_dokter->no_urut = $request->no_urut;
        $temu_dokter->waktu_daftar = $request->waktu_daftar;
        $temu_dokter->status = $request->status;
        $temu_dokter->idpet = $request->idpet;
        $temu_dokter->idrole_user = $request->idrole_user;

        // Simpan perubahan
        $temu_dokter->save();

        // Ambil role aktif user
        $Role = Auth::user()->role_user->where('status', 1)->first()->role->nama_role;

        switch ($Role) {
            case 'Administrator':
        return redirect()->route('admin.temu-dokter')->with('success', 'Temu Dokter berhasil diupdate!');

            case 'Resepsionis':
        return redirect()->route('resepsionis.temu-dokter')->with('success', 'Temu Dokter berhasil diupdate!');

            default:
                abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }

    // function hapus temu dokter
    public function destroy($idreservasi_dokter)
    {
        // Cari temu dokter berdasarkan idreservasi_dokter
        $temu_dokter = TemuDokter::find($idreservasi_dokter);

        // Hapus temu dokter
        $temu_dokter->delete();

        // Redirect dengan pesan sukses
        // Ambil role aktif user
        $Role = Auth::user()->role_user->where('status', 1)->first()->role->nama_role;

        switch ($Role) {
            case 'Administrator':
        return redirect()->route('admin.temu-dokter')->with('success', 'Temu Dokter berhasil dihapus!');

            case 'Resepsionis':
        return redirect()->route('resepsionis.temu-dokter')->with('success', 'Temu Dokter berhasil dihapus!');

            default:
                abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }
}
