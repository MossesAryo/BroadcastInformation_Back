<?php

namespace App\Http\Controllers;

use App\Models\departemen;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Panel.users.departemen.departemen', [
            'departemen' => departemen::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Panel.users.departemen.create', [
            'departemen' => departemen::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nama_Departemen' => 'required',
        ]);

        departemen::create($request->all());
        return redirect()->route('departemen')->with('success', 'Departemen berhasil ditambahkan');
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
        return view('Panel.users.departemen.edit', [
            'departemen' => departemen::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'Nama_Departemen' => 'required',
            'Email_Departemen' => 'required',
        ]);

        departemen::find($id)->update($data);
        return redirect()->route('departemen')->with('success', 'Departemen berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        departemen::find($id)->delete();

        return redirect()->route('departemen')->with('success', 'Departemen berhasil dihapus');
    }
}
