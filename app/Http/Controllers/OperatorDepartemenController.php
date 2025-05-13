<?php

namespace App\Http\Controllers;

use App\Models\departemen;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\operatordepartemen;

class OperatorDepartemenController extends Controller
{
    public function index(){
        return view('panel.users.operator.operator' , [
            'operatordepartemen' => operatordepartemen::get()
        ]);
    }
    public function create()
    {
        return view('panel.users.operator.create', [
            'operatordepartemen' => operatordepartemen::get(),
            'departemen'=> departemen::get()
        ]);
    }
     public function store(Request $request)
    {
        $request->validate([
            'NamaOperatorDepartemen' => 'required|string|max:255',
            'ID_Departemen' => 'required',
            'name' => 'required',
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => strtolower(Str::slug($request->name)) . '@gmail.com',
            'password' => bcrypt('password'),
        ]);



        operatordepartemen::create([
            'NamaOperatorDepartemen' => $request->NamaOperatorDepartemen,
            'ID_Departemen' => $request->ID_Departemen,
            'id_user' => $user->id,
        ]);

        return redirect()->route('get.op')->with('success', 'Operator berhasil ditambahkan');
    }
}
