<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\operatordepartemen;

class OperatorDepartemenController extends Controller
{
    public function index(){
        return view('panel.users.operator.operator' , [
            'operatordepartemen' => operatordepartemen::get()
        ]);
    }
}
