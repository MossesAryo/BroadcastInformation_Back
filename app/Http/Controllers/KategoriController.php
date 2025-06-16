<?php

namespace App\Http\Controllers;

use App\Models\kategoriinformasi;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('panel.kategori.kategori', [
            'kategori' => kategoriinformasi::get(),
             
        ]);
        
    }
    public function indexAPI()
    {
        return response()->json(kategoriinformasi::latest()->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.kategori.create', [
            'kategori' => kategoriinformasi::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'NamaKategori' => 'required',
            'Deskripsi' => 'required',
        ]);

        kategoriinformasi::create($request->all());
        return redirect()->route('kategori')->with('success', 'Kategori berhasil ditambahkan');
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
        return view('panel.kategori.edit', [
            'kategori' => kategoriinformasi::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'NamaKategori' => 'required',
            'Deskripsi' => 'required',
        ]);

        kategoriinformasi::find($id)->update($data);
        return redirect()->route('kategori')->with('success', 'Kategori berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = kategoriinformasi::find($id)->delete();

        return redirect()->route('kategori')->with('success', 'Kategori berhasil dihapus');
    }
}
