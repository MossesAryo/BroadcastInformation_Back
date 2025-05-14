<?php

namespace App\Http\Controllers;

use App\Models\informasi;
use Illuminate\Http\Request;
use App\Http\Requests\InformasiRequest;
use App\Models\departemen;
use App\Models\kategoriinformasi;
use App\Models\operatordepartemen;
use Illuminate\Support\Facades\Storage;

class InformasiController extends Controller
{
    public function index()
    {

        return view('Panel.informasi.informasi', [
            'informasi' => informasi::latest()->get()
        ]);
    }

    public function indexAPI()
    {
        return response()->json(Informasi::latest()->get());
    }

    public function create()
    {
        return view('Panel.informasi.createinformasi', [
            'informasi' => informasi::latest()->get(),
            'kategori' => kategoriinformasi::get(),
            'departemens' => operatordepartemen::get()
        ]);
    }

    public function store(InformasiRequest $request)
    {
        $data = $request->validated();

        $file = $request->file('Thumbnail'); //img
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension(); //jpg,dll
        $path = Storage::disk('public')->putFileAs('images', $file, $fileName); //public/back/aasdvndavkd.jpg
        $data['Thumbnail'] = $path;
        Informasi::create([
        'IDOperator' => $request->IDOperator,
        'IDKategoriInformasi' => $request->IDKategoriInformasi,
        'TanggalMulai' => $request->TanggalMulai,
        'TanggalSelesai' => $request->TanggalSelesai,
        'Thumbnail' => $path,
        'Judul' => $request->Judul,
        'Deskripsi' => $request->Deskripsi,
    ]);

        return redirect()->route('get.info')->with('success', 'Article data has been created');
    }


    public function show($id)
    {
        try {
            $informasi = Informasi::with(['kategori', 'operator'])
                ->where('IDInformasi', $id)
                ->firstOrFail();
                
            return view('panel.informasi.viewinformasi', compact('informasi'));
            
        } catch (\Exception $e) {
            return redirect()->route('index.info')
                ->with('error', 'Informasi tidak ditemukan: ' . $e->getMessage());
        }
    }

    public function destroy(String $id){
        informasi::find($id)->delete();
        return back()->with('success','Information has been deleted');
    }
}
