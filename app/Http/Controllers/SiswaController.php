<?php

namespace App\Http\Controllers;

use App\Models\siswa;
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
            'Nama_Siswa' => 'required',
            'name' => 'required',
        ]);

        siswa::create($request->all());
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
    public function update(Request $request, string $id)
    {
        $request->validate([
            'Nama_Siswa' => 'required',
            'name' => 'required',
        ]);

        siswa::find($id)->update($request);
        return redirect()->route('siswa')->with('success', 'Siswa berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        siswa::find($id)->delete();

        return redirect(route('siswa'))->with('success', 'Siswa berhasil dihapus');
    }
}
