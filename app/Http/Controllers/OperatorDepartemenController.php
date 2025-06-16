<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\departemen;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;
use App\Exports\OperatorExport;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpWord\IOFactory;
use App\Exports\DepartemenExport;
use App\Models\operatordepartemen;
use Maatwebsite\Excel\Facades\Excel;

class OperatorDepartemenController extends Controller
{
    public function index()
    {
        return view('panel.users.operator.operator', [
            'operatordepartemen' => operatordepartemen::get()
        ]);
    }

    public function exportexcel()
    {
        return Excel::download(new OperatorExport, 'Data_Operator.xlsx');
    }
    public function exportpdf()
    {

        $opdepartemen = operatordepartemen::all();

        $pdf = Pdf::loadView('export.operator.pdf', ['operator' => $opdepartemen]);

        return $pdf->download('Data_Operator.pdf');
    }

    public function exportword()
    {
        $operator = OperatorDepartemen::with(['departemen', 'user'])->get();

        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

        // Judul
        $section->addText('Daftar Informasi Operator Departemen', [
            'bold' => true,
            'size' => 16
        ], ['alignment' => 'center']);

        $section->addTextBreak();

        // Tabel
        $table = $section->addTable([
            'borderSize' => 6,
            'borderColor' => '666666',
            'cellMargin' => 50
        ]);

        // Header
        $table->addRow();
        $table->addCell(1000)->addText('ID');
        $table->addCell(3000)->addText('Departemen');
        $table->addCell(3000)->addText('Nama Operator');
        $table->addCell(4000)->addText('Email');
        $table->addCell(3000)->addText('Dibuat Tanggal');

        // Data
        foreach ($operator as $item) {
            $table->addRow();
            $table->addCell()->addText($item->IDOperator);
            $table->addCell()->addText($item->departemen->Nama_Departemen ?? '-');
            $table->addCell()->addText($item->NamaOperatorDepartemen);
            $table->addCell()->addText($item->user->email ?? '-');
            $table->addCell()->addText($item->created_at ? $item->created_at->format('d-m-Y') : '-');
        }

        $filename = 'data_operator.docx';
        $path = storage_path("app/public/{$filename}");

        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save($path);

        return response()->download($path)->deleteFileAfterSend(true);
    }

    public function create()
    {
        return view('panel.users.operator.create', [
            'operatordepartemen' => operatordepartemen::get(),
            'departemen' => departemen::get()
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'NamaOperatorDepartemen' => 'required|string|max:255',
            'ID_Departemen' => 'required',
            'username' => 'required',
        ]);


        $user = User::create([
            'username' => $request->username,
            'email' => strtolower(Str::slug($request->username)) . '@gmail.com',
            'password' => bcrypt('password'),
            'role' => 3
        ]);



        operatordepartemen::create([
            'NamaOperatorDepartemen' => $request->NamaOperatorDepartemen,
            'ID_Departemen' => $request->ID_Departemen,
            'username' => $user->username,
        ]);

        return redirect()->route('op.index')->with('success', 'Operator berhasil ditambahkan');
    }
    public function edit(string $id, string $ID_Departemen, string $username)
    {
        return view('panel.users.operator.edit', [
            'operatordepartemen' => operatordepartemen::find($id),
            'departemen' => departemen::all()
        ]);
    }
    public function update(Request $request, $id, $oldDepartemen, $oldUsername)
    {
        $request->validate([
            'NamaOperatorDepartemen' => 'required|string|max:255',
            'ID_Departemen' => 'required',
            'username' => 'required',
        ]);

        $operator = operatordepartemen::findOrFail($id);

        // Update user lama (cari pakai $oldUsername)
        User::where('username', $oldUsername)->firstOrFail()->update([
            'username' => $request->username
        ]);

        // Update data operator
        $operator->update([
            'NamaOperatorDepartemen' => $request->NamaOperatorDepartemen,
            'ID_Departemen' => $request->ID_Departemen,
            'username' => $request->username
        ]);


        return redirect()->route('op.index')->with('success', 'Data operator berhasil diedit.');
    }

    public function destroy(string $id, string $ID_Departemen, string $username)
    {
        $operator = operatordepartemen::find($id);

        if (!$operator) {
            return redirect()->back()->with('error', 'Data operator tidak ditemukan.');
        }

        $user = User::find($username);
        if ($user) {
            $user->delete();
        }

        $operator->delete();
        return redirect()->route('op.index')->with('success', 'Data operator berhasil dihapus.');
    }
}
