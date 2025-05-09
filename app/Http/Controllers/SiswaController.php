<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\siswa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('panel.users.siswa.siswa', [
            'siswa' => siswa::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.users.siswa.create', [
            'siswa' => siswa::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nama_Siswa' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
        ]);


        $user = User::create([
            'name' => $request->nama,
            'email' => strtolower(Str::slug($request->nama)) . '@gmail.com',
            'password' => bcrypt('password'),
        ]);



        Siswa::create([
            'Nama_Siswa' => $request->Nama_Siswa,
            'id_user' => $user->id,
        ]);

        return redirect()->route('siswa')->with('success', 'Siswa berhasil ditambahkan');
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
        return view('panel.users.siswa.edit', [
            'siswa' => siswa::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, string $id_user)
    {
        $request->validate([
            'Nama_Siswa' => 'required',
            'name' => 'required',
        ]);

        User::find($id_user)->update([
            'name' => $request->name
        ]);
        siswa::find($id)->update([
            'Nama_Siswa' => $request->Nama_Siswa
        ]);

        return redirect()->route('siswa')->with('success', 'Siswa berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, string $id_user)
    {
        siswa::find($id)->delete();
        User::find($id_user)->delete();

        return redirect(route('siswa'))->with('success', 'Siswa berhasil dihapus');
    }
}
