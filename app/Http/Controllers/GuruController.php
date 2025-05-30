<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\User;
use App\Exports\GuruExport;
use App\Imports\GuruImport;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpWord\IOFactory;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class GuruController extends Controller
{
    public function index()
    {

        if (request()->ajax()) {
            $guru = guru::with(['user'])->latest()->get();

            return DataTables::of($guru)
                ->addIndexColumn()
                ->addcolumn('username', function ($guru) {
                    return $guru->user->username;
                })
                ->addcolumn('usernames', function ($guru) {
                    return $guru->user->email;
                })
                ->addcolumn('button', function ($guru) {
                    return '
        <div class="flex justify-center space-x-2">
        <button title="Edit" onclick="window.location=\'' . url('/guru/edit/' . $guru->ID_Guru . '/' . $guru->user->username) . '\'">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="#57B4BA" class="w-5 h-5">
                <path d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z" />
            </svg>
        </button>
        <button class="text-red-600 hover:text-red-900" title="Delete" onclick="openDeleteModal(\'' . $guru->ID_Guru . ',' . $guru->user->username . '\')">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>
';
                })


                ->rawcolumns(['username', 'usernames', 'button'])
                ->make();
        }
        return view('Panel.users.guru.guru');
    }
    public function exportexcel()
    {
        return Excel::download(new GuruExport, 'Data_Guru.xlsx');
    }
    public function exportpdf()
    {

        $guru = guru::all();

        $pdf = Pdf::loadView('export.guru.pdf', ['guru' => $guru]);

        return $pdf->download('Data_Users.pdf');
    }

    public function exportword()
    {
       $guru = Guru::with('user')->get();

    $phpWord = new PhpWord();
    $section = $phpWord->addSection();

    
    $section->addText('Daftar Guru', ['bold' => true, 'size' => 16], ['alignment' => 'center']);
    $section->addTextBreak();

    
    $table = $section->addTable([
        'borderSize' => 6,
        'borderColor' => '999999',
        'cellMargin' => 50
    ]);

    
    $table->addRow();
    $table->addCell(3000)->addText('NIP');
    $table->addCell(5000)->addText('Nama Guru');
    $table->addCell(6000)->addText('Email');

    
    foreach ($guru as $g) {
        $table->addRow();
        $table->addCell()->addText($g->ID_Guru);
        $table->addCell()->addText($g->Nama_Guru);
        $table->addCell()->addText($g->user->email ?? '-');
    }

    $filename = 'data_guru.docx';
    $path = storage_path("app/public/{$filename}");

    $writer = IOFactory::createWriter($phpWord, 'Word2007');
    $writer->save($path);

    return response()->download($path)->deleteFileAfterSend(true);
    }



    public function import(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,xls,csv|max:10240',
    ]);

    Excel::import(new GuruImport, $request->file('file'));

    return redirect()->back()->with('success', 'Data Guru berhasil diimport!');
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.users.guru.create', [
            'guru' => guru::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nama_Guru' => 'required|string|max:255',
            'username' => 'required|string|max:255',
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => strtolower(Str::slug($request->username)) . '@gmail.com',
            'password' => bcrypt('password'),
        ]);

        guru::create([
            'Nama_Guru' => $request->Nama_Guru,
            'username' => $user->username,
        ]);

        return redirect()->route('get.guru')->with('success', 'Guru berhasil ditambahkan');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('panel.users.guru.edit', [
            'guru' => guru::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, string $id_user)
    {
        $request->validate([
            'Nama_Guru' => 'required',
            'username' => 'required',
        ]);

        User::where('username', $id_user)->update([
            'username' => $request->username
        ]);

        guru::find($id)->update([
            'Nama_Guru' => $request->Nama_Guru
        ]);

        return redirect()->route('get.guru')->with('success', 'guru berhasil diedit');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, string $id_user)
    {
        $guru = guru::find($id);
        $user = User::find($id_user);
        $guru->delete();
        $user->delete();


        return redirect(route('get.guru'))->with('success', 'Guru berhasil dihapus');
    }
}
