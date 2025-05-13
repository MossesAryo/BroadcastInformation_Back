<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class GuruController extends Controller
{
     public function index()
    {
        return view('panel.users.guru.guru', [
            'guru' => guru::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.users.guru.create', [
            'guru' => guru::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'Nama_Guru' => 'required|string|max:255',
        'name' => 'required|string|max:255',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => strtolower(Str::slug($request->name)) . '@gmail.com',
        'password' => bcrypt('password'),
    ]);

    guru::create([
        'Nama_Guru' => $request->Nama_Guru,
        'id_user' => $user->id,
    ]);

    return redirect()->route('get.guru')->with('success', 'Guru berhasil ditambahkan');
}



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('panel.users.guru.edit', [
            'guru' => guru::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, string $id_user)
    {
        $request->validate([
            'Nama_Guru' => 'required',
            'name' => 'required',
        ]);

        User::find($id_user)->update([
            'name' => $request->name
        ]);
        guru::find($id)->update([
            'Nama_Guru' => $request->Nama_Guru
        ]);

        return redirect()->route('get.guru')->with('success', 'guru berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, string $id_user)
    {
        guru::find($id)->delete();
        User::find($id_user)->delete();

        return redirect(route('get.guru'))->with('success', 'guru berhasil dihapus');
    }
}
