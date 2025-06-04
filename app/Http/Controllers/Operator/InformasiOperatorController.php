<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\informasi;
use Illuminate\Http\Request;

class InformasiOperatorController extends Controller
{
   public function index(){
   return view('PanelOperator.Informasi',[
    'informasi' => informasi::get()
   ]); 
   }
}
