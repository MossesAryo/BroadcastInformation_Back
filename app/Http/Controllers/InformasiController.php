<?php

namespace App\Http\Controllers;

use App\Models\informasi;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
   public function index(){
    
    return view('Panel.informasi.informasi',[
        'informasi'=> informasi::latest()->get()
    ]);
   }
}
