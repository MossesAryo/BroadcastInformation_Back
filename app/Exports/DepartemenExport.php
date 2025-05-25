<?php

namespace App\Exports;

use App\Models\departemen;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DepartemenExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('export.departemen.excel', [
            'departemen' => departemen::all()
        ]);
    }
}
