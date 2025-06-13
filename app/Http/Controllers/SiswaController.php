<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\siswa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Maatwebsite\Excel\Facades\Excel;


use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = siswa::with('user')->latest();

            // Handle search query
            if ($search = request('search.value')) {
                $query->where(function ($q) use ($search) {
                    $q->where('Nama_Siswa', 'like', "%{$search}%")
                        ->orWhere('ID_Siswa', 'like', "%{$search}%")
                        ->orWhereHas('user', function ($q2) use ($search) {
                            $q2->where('email', 'like', "%{$search}%");
                        });
                });
            }

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('ID_Siswa', function ($siswa) {
                    return $siswa->ID_Siswa;
                })
                ->addColumn('Nama_Siswa', function ($siswa) {
                    return $siswa->Nama_Siswa;
                })
                ->addColumn('email', function ($siswa) {
                    return $siswa->user->email ?? '-';
                })
                ->addColumn('created_at', function ($siswa) {
                    return $siswa->created_at->format('Y-m-d H:i');
                })
                ->addColumn('button', function ($siswa) {
                    return '
                        <div class="flex justify-center space-x-2">
                            <button class="text-blue-600 hover:text-blue-900" title="Edit"
                                onclick="window.location.href=\'' . route('siswa.edit', [$siswa->ID_Siswa, $siswa->username]) . '\'">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"/>
                                    <path fill-rule="evenodd" d="M2 15a1 1 0 011-1h12a1 1 0 110 2H3a1 1 0 01-1-1z" clip-rule="evenodd"/>
                                </svg>
                            </button>

                            <button class="text-red-600 hover:text-red-900" title="Hapus"
                                onclick="openDeleteModal(\'' . $siswa->ID_Siswa . '\')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>';
                })
                ->rawColumns(['button'])
                ->make(true);
        }

        $siswa = siswa::with('user')->latest()->get();
        return view('Panel.users.siswa.siswa', [
            'siswa' => $siswa
        ]);
    }


    public function exportexcel()
    {
        return Excel::download(new SiswaExport, 'Data_Siswa.xlsx');
    }
    public function exportpdf()
    {
        $siswa = siswa::all();

        $pdf = Pdf::loadView('export.siswa.pdf', ['siswa' => $siswa]);

        return $pdf->download('Data_Siswa.pdf');
    }

    public function exportword()
    {
        $siswa = Siswa::with('user')->get();

        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

        $section->addText('Daftar Siswa', ['bold' => true, 'size' => 16]);
        $section->addTextBreak();

        foreach ($siswa as $g) {
            $section->addText("NIP: {$g->ID_Siswa}");
            $section->addText("Nama: {$g->Nama_Siswa}");
            $section->addText("Email: {$g->user->email}");
            $section->addTextBreak();
        }

        $filename = 'data_Siswa.docx';
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

        Excel::import(new SiswaImport, $request->file('file'));

        return redirect()->back()->with('success', 'Data siswa berhasil diimport!');
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
            'ID_Siswa' => 'required',
            'Nama_Siswa' => 'required|string|max:255',
            'username' => 'required|string|max:255',
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => strtolower(Str::slug($request->username)) . '@gmail.com',
            'password' => bcrypt('password'),
            'role' => 4
        ]);

        Siswa::create([
            'ID_Siswa' => $request->ID_Siswa,
            'Nama_Siswa' => $request->Nama_Siswa,
            'username' => $user->username,
        ]);

        return redirect()->route('siswa')->with('success', 'Siswa berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, string $id_user)
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
            'username' => 'required',
        ]);

        User::find($id_user)->update([
            'username' => $request->username
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
        $siswa = siswa::find($id); 
        $user = User::find($id_user);

        if ($siswa) {
            $siswa->delete();
        } else {
            return back()->with('error', 'Data siswa tidak ditemukan');
        }

        if ($user) {
            $user->delete();
        }
        return redirect(route('siswa'))->with('success', 'Siswa berhasil dihapus');
    }
}
