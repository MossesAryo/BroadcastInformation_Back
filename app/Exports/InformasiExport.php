<?php

namespace App\Exports;


use App\Models\informasi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class InformasiExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
   public function view(): View
    {
        return view('export.informasi.excel', [
            'informasi' => informasi::all()
        ]);
    }
}
