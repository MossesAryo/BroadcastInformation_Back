<?php

namespace App\Http\Controllers;

use App\Models\informasi;
use Illuminate\Http\Request;
use App\Http\Requests\InformasiRequest;
use App\Models\departemen;
use App\Models\kategoriinformasi;
use App\Models\operatordepartemen;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class InformasiController extends Controller
{
    public function index()
    {

        if (request()->ajax()) {
            $informasi = informasi::with(['kategori', 'operator'])->latest()->get();
      
            return DataTables::of($informasi)
                ->addIndexColumn()
                ->addcolumn('IDKategoriInformasi', function ($informasi) {
                    return $informasi->kategori->NamaKategori;
                })
                ->addcolumn('IDOperator', function ($informasi) {
                    return $informasi->operator->NamaOperatorDepartemen;
                })
                ->addcolumn('button', function ($informasi) {
                  return '
    <div class="flex justify-center space-x-2">
        <button class="text-gray-600 hover:text-gray-900" title="View"
            onclick="window.location.href=\'' . route('show.info', $informasi->IDInformasi) . '\'">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                <path fill-rule="evenodd"
                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                    clip-rule="evenodd" />
            </svg>
        </button>

        <button class="text-red-600 hover:text-red-900" title="Delete"
             onclick="openDeleteModal(\'' . $informasi->IDInformasi . '\')">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                    clip-rule="evenodd" />
            </svg>
        </button>
    </div>
';


                })


                ->rawcolumns(['IDKategoriInformasi', 'IDOperator', 'button'])
                ->make();
        }
        return view('Panel.informasi.informasi');
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

        return redirect()->route('get.info')->with('success', 'informasi data has been created');
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

    public function destroy(String $id)
    {
        $data = informasi::find($id);
        Storage::disk('public')->delete('public/', $data->Thumbnail);
        $data->delete();

        return back()->with('success', 'Information has been deleted');
    }
}
