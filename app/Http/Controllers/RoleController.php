<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // halaman role
    public function role()
    {
        $data_role = Role::paginate(4);
        return view('Halaman.admin.Role.role', compact('data_role'));
    }

    // halaman tambah role
    public function tambahRole()
    {
        return view('Halaman.admin.Role.tambah-role');
    }

    // function tambah role
    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'nama_role' => 'required|string|max:255|unique:role,nama_role',
        ]);

        // Simpan ke Database
        Role::create([
            'nama_role' => $request->nama_role,
        ]);

        return redirect()->route('role')->with('success', 'Role berhasil ditambahkan!');
    }

    // halaman edit role
    public function editRole($idrole)
    {
        $data_role = Role::find($idrole);
        return view('Halaman.admin.Role.edit-role', compact('data_role'));
    }

    // function edit role
    public function update(Request $request, $idrole)
    {
        // Validasi
        $request->validate([
            'nama_role' => 'required|string|max:255|unique:role,nama_role,' . $idrole . ',idrole',
        ]);

        // Ambil data role
        $role = Role::find($idrole);

        // Update data role
        $role->nama_role = $request->nama_role;

        // Simpan perubahan
        $role->save();

        return redirect()->route('role')->with('success', 'Role berhasil diupdate!');
    }

    // function hapus role
    public function destroy($idrole)
    {
        // Cari role berdasarkan idrole
        $role = Role::find($idrole);

        // Hapus role
        $role->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('role')->with('success', 'Role berhasil dihapus!');
    }
}
