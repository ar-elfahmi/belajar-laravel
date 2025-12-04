<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // halaman user
    public function user()
    {
        $data_user = User::paginate(4);
        return view('Halaman.admin.User.user', compact('data_user'));
    }
    //halaman tambah user
    public function tambahUser()
    {
        return view('Halaman.admin.User.tambah-user');
    }
    // function tambah user
    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:6',
        ]);

        // Simpan ke Database
        User::create([
            'nama'     => $request->nama,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user')->with('success', 'User berhasil ditambahkan!');
    }

    // halaman edit user
    public function editUser($iduser)
    {
        $data_user = User::find($iduser);
        return view('Halaman.admin.User.edit-user', compact('data_user'));
    }

    // function edit user
    public function update(Request $request, $iduser)
    {
        // Validasi
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:user,email,' . $iduser . ',iduser',
            'password' => 'nullable|min:6',
        ]);

        // Ambil data user
        $user = User::find($iduser);

        // Update data user
        $user->nama = $request->nama;
        $user->email = $request->email;

        // Jika password diisi, update password
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Simpan perubahan
        $user->save();

        return redirect()->route('user')->with('success', 'User berhasil diupdate!');
    }

    // function hapus user
    public function destroy($iduser)
    {
        // Cari user berdasarkan iduser
        $user = User::find($iduser);

        // Hapus user
        $user->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('user')->with('success', 'User berhasil dihapus!');
    }
}
