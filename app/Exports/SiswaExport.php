<?php

namespace App\Exports;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

use App\Models\Siswa;
class SiswaExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('export.siswa.excel', [
            'siswa' => Siswa::all()
        ]);
    }
}
