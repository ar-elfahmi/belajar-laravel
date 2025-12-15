<?php

namespace App\Http\Controllers;

use App\Models\RoleUser;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleUserController extends Controller
{
    // halaman role user
    public function roleUser()
    {
        $data_role_user = RoleUser::with('user', 'role')->paginate(4);
        return view('Halaman.admin.RoleUser.role-user', compact('data_role_user'));
    }

    //halaman tambah role user
    public function tambahRoleUser()
    {
        $data_user = User::all();
        $data_role = Role::all();
        return view('Halaman.admin.RoleUser.tambah-role-user', compact('data_user', 'data_role'));
    }

    // function tambah role user
    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'iduser' => 'required|exists:user,iduser',
            'idrole' => 'required|exists:role,idrole',
            'status' => 'required|boolean',
        ]);

        // Simpan ke Database
        RoleUser::create([
            'iduser' => $request->iduser,
            'idrole' => $request->idrole,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.role-user')->with('success', 'Role User berhasil ditambahkan!');
    }

    // halaman edit role user
    public function editRoleUser($idrole_user)
    {
        $data_role_user = RoleUser::with('user', 'role')->find($idrole_user);
        $data_user = User::all();
        $data_role = Role::all();
        return view('Halaman.admin.RoleUser.edit-role-user', compact('data_role_user', 'data_user', 'data_role'));
    }

    // function edit role user
    public function update(Request $request, $idrole_user)
    {
        // Validasi
        $request->validate([
            'iduser' => 'required|exists:user,iduser',
            'idrole' => 'required|exists:role,idrole',
            'status' => 'required|boolean',
        ]);

        // Ambil data role user
        $role_user = RoleUser::find($idrole_user);

        // Update data role user
        $role_user->iduser = $request->iduser;
        $role_user->idrole = $request->idrole;
        $role_user->status = $request->status;

        // Simpan perubahan
        $role_user->save();

        return redirect()->route('admin.role-user')->with('success', 'Role User berhasil diupdate!');
    }

    // function hapus role user
    public function destroy($idrole_user)
    {
        // Cari role user berdasarkan idrole_user
        $role_user = RoleUser::find($idrole_user);

        // Hapus role user
        $role_user->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.role-user')->with('success', 'Role User berhasil dihapus!');
    }
}
