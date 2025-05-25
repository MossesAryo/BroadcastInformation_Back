<?php

namespace App\Exports;

use App\Models\operatordepartemen;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OperatorExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
   public function view(): View
    {
        return view('export.operator.excel', [
            'operator' => operatordepartemen::all()
        ]);
    }
}
