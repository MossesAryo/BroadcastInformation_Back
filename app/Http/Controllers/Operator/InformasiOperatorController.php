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
    
    // Get the operator's department ID
    $operatorDepartmentId = $operator->ID_Departemen;
    
    // Query to get information visible to this operator
    $informasi = Informasi::with(['kategori', 'operator', 'targetDepartemen'])
        ->where(function($query) use ($operatorDepartmentId) {
            // Information with no specific target (visible to all)
            $query->whereDoesntHave('targetDepartemen')
                  // OR information specifically targeted to this operator's department
                  ->orWhereHas('targetDepartemen', function($subQuery) use ($operatorDepartmentId) {
                      // Specify the table name to avoid ambiguous column error
                      $subQuery->where('targetdepartemen.ID_Departemen', $operatorDepartmentId);
                  });
        })
        ->orderBy('TanggalMulai', 'desc')
        ->get();


    
    return view('paneloperator.informasi', compact('informasi'));
}

}
