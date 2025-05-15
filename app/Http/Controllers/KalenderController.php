<?php

namespace App\Http\Controllers;

use App\Models\informasi;
use Illuminate\Http\Request;

class KalenderController extends Controller
{
    public function index() {
        
    
    return view('Panel.kalender.kalender', [
      'informasi'   => informasi::get()
    ]);
}
}
