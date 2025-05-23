<?php

namespace App\Exports;

use App\Models\guru;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class GuruExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('export.exportguru', [
            'guru' => Guru::all()
        ]);
    }
}
