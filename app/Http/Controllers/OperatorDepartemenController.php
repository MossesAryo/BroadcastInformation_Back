<?php

namespace App\Http\Controllers;

use App\Models\departemen;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\operatordepartemen;

class OperatorDepartemenController extends Controller
{
    public function index()
    {
        return view('panel.users.operator.operator', [
            'operatordepartemen' => operatordepartemen::get()
        ]);
    }
    public function create()
    {
        return view('panel.users.operator.create', [
            'operatordepartemen' => operatordepartemen::get(),
            'departemen' => departemen::get()
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'NamaOperatorDepartemen' => 'required|string|max:255',
            'ID_Departemen' => 'required',
            'username' => 'required',
        ]);


        $user = User::create([
            'username' => $request->username,
            'email' => strtolower(Str::slug($request->username)) . '@gmail.com',
            'password' => bcrypt('password'),
        ]);



        operatordepartemen::create([
            'NamaOperatorDepartemen' => $request->NamaOperatorDepartemen,
            'ID_Departemen' => $request->ID_Departemen,
            'username' => $user->username,
        ]);

        return redirect()->route('get.op')->with('success', 'Operator berhasil ditambahkan');
    }
    public function edit(string $id)
    {
        return view('panel.users.operator.edit', [
            'operatordepartemen' => operatordepartemen::find($id),
            'departemen' => departemen::all()
        ]);
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'NamaOperatorDepartemen' => 'required|string|max:255',
            'ID_Departemen' => 'required',
            'username' => 'required',
        ]);
        $operator = operatordepartemen::findOrFail($id);


        User::findOrFail($operator->username)->update([
            'username' => $request->username
        ]);


        $operator->update([
            'NamaOperatorDepartemen' => $request->NamaOperatorDepartemen,
            'ID_Departemen' => $request->ID_Departemen,
        ]);

        return redirect()->route('get.op')->with('success', 'Siswa berhasil diedit');
    }
    public function destroy(string $id)
    {
        $operator = operatordepartemen::find($id);

        if (!$operator) {
            return redirect()->back()->with('error', 'Data operator tidak ditemukan.');
        }
        $user = User::find($operator->id_user);
        if ($user) {
            $user->delete();
        }
        $operator->delete();
        return redirect()->route('get.op')->with('success', 'Data operator berhasil dihapus.');
    }
}
