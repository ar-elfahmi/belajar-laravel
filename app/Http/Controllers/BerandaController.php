<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Role = Auth::user()->role_user->first()->role->nama_role;
        switch ($Role) {
            case 'Administrator':
                return view('HalamanDepan.beranda-admin');
                break;

            case 'Resepsionis':
                return view('HalamanDepan.beranda-resepsionis');
                break;

            case 'Dokter':
                return view('HalamanDepan.beranda-dokter');
                break;

            case 'Perawat':
                return view('HalamanDepan.beranda-perawat');
                break;

            case 'Pemilik':
                return view('HalamanDepan.beranda-pemilik');
                break;

            default:
                // Jika role tidak dikenali, kembalikan ke halaman login atau home default
                return redirect('/')->with('error', 'Anda tidak memiliki akses.');
                break;
        }
    }


    public function profile()
    {
        $Role = Auth::user()->role_user->first()->role->nama_role;
        switch ($Role) {
            case 'Administrator':
                return view('HalamanDepan.profile-admin');
                break;

            case 'Resepsionis':
                return view('HalamanDepan.profile-resepsionis');
                break;

            case 'Dokter':
                return view('HalamanDepan.profile-dokter');
                break;

            case 'Perawat':
                return view('HalamanDepan.profile-perawat');
                break;

            case 'Pemilik':
                return view('HalamanDepan.profile-pemilik');
                break;

            default:
                // Jika role tidak dikenali, kembalikan ke halaman login atau home default
                return redirect('/')->with('error', 'Anda tidak memiliki akses.');
                break;
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
