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

       

        Informasi::create($data);

        return redirect()->route('get.info')->with('success', 'Article data has been created');
    }
}
