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
    $userDepartemenId = $user->ID_Departemen; 
    $informasi = Informasi::with(['kategori', 'operator', 'targetDepartemen'])
        ->where(function($query) use ($userDepartemenId) {
            $query->whereHas('targetDepartemen', function($q) use ($userDepartemenId) {
                $q->where('targetdepartemen.ID_Departemen', $userDepartemenId); 
            })
            ->orWhereDoesntHave('targetDepartemen');
        })
        ->orderBy('TanggalMulai', 'desc')
        ->get();
    return view('PanelOperator.Informasi', compact('informasi'));
}
public function indexWithTargets()
{
    $user = Auth::user();
    $userDepartemenId = $user->ID_Departemen;
    $informasi = Informasi::with(['kategori', 'operator', 'targetDepartemen'])
        ->whereHas('targetDepartemen', function($query) use ($userDepartemenId) {
            $query->where('targetdepartemen.ID_Departemen', $userDepartemenId);
        })
        ->orderBy('TanggalMulai', 'desc')
        ->get();
    
    return view('PanelOperator.Informasi', compact('informasi'));
}
public function indexWithHighlight()
{
    $user = Auth::user();
    $userDepartemenId = $user->ID_Departemen;
    
    $informasi = Informasi::with(['kategori', 'operator', 'targetDepartemen'])
        ->orderBy('TanggalMulai', 'desc')
        ->get();
    
    
    $informasi->each(function($item) use ($userDepartemenId) {
        $item->targets_user_dept = $item->targetDepartemen->pluck('ID_Departemen')->contains($userDepartemenId) 
            || $item->targetDepartemen->isEmpty();
    });
    
    return view('PanelOperator.Informasi', compact('informasi'));
}
}
