<?php

namespace App\Http\Controllers\Operator;

use App\Models\informasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class InformasiOperatorController extends Controller
{
  public function index()
{
    $user = Auth::user();
    $operator = $user->operator;
    
    
    if (!$operator) {
        return redirect()->back()->with('error', 'You are not registered as an operator.');
    }
    $operatorDepartmentId = $operator->ID_Departemen;
    $informasi = Informasi::with(['kategori', 'operator', 'targetDepartemen'])
        ->where(function($query) use ($operatorDepartmentId) {  
            $query->whereDoesntHave('targetDepartemen')       
                  ->orWhereHas('targetDepartemen', function($subQuery) use ($operatorDepartmentId) {
                      $subQuery->where('targetdepartemen.ID_Departemen', $operatorDepartmentId);
                  });
        })
        ->orderBy('TanggalMulai', 'desc')
        ->get();


    
    return view('paneloperator.informasi', compact('informasi'));
}

}
