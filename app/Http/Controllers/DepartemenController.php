<?php

namespace App\Http\Controllers;

use App\Models\departemen;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpWord\IOFactory;
use App\Exports\DepartemenExport;
use Maatwebsite\Excel\Facades\Excel;

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
     public function exportexcel()
    {
        return Excel::download(new DepartemenExport, 'Data_Departemen.xlsx');
    }
    public function exportpdf()
    {
        $departemen = departemen::all();
        $pdf = Pdf::loadView('export.departemen.pdf', ['departemen' => $departemen]);
        return $pdf->download('Data_Departemen.pdf');
    }
     public function exportword()
    {
       $departemen = departemen::get();

    $phpWord = new PhpWord();
    $section = $phpWord->addSection();

    
    $section->addText('Daftar Departemen', ['bold' => true, 'size' => 16], ['alignment' => 'center']);
    $section->addTextBreak();

    
    $table = $section->addTable([
        'borderSize' => 6,
        'borderColor' => '999999',
        'cellMargin' => 50
    ]);

    
    $table->addRow();
    $table->addCell(3000)->addText('ID Departemen');
    $table->addCell(5000)->addText('Nama Departemen');

    foreach ($departemen as $g) {
        $table->addRow();
        $table->addCell()->addText($g->ID_Departemen);
        $table->addCell()->addText($g->Nama_Departemen);
    }

    $filename = 'data_departemen.docx';
    $path = storage_path("app/public/{$filename}");

    $writer = IOFactory::createWriter($phpWord, 'Word2007');
    $writer->save($path);

    return response()->download($path)->deleteFileAfterSend(true);
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
