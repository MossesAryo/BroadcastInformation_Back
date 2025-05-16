<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\siswa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'all');

        $query = siswa::query();

        // Apply search filter if provided
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('Nama_Siswa', 'like', "%{$search}%")
                    ->orWhere('ID_Siswa', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where('email', 'like', "%{$search}%")
                            ->orWhere('username', 'like', "%{$search}%");
                    });
            });
        }

        // Apply sort filter
        if ($sort === 'latest') {
            $query->reorder()->orderBy('created_at', 'desc');
        } elseif ($sort === 'earliest') {
            $query->reorder()->orderBy('created_at', 'asc');
        } elseif ($sort === 'all') {
            // Default sorting from the global scope will apply
        }

        // Get paginated results (10 per page)
        $siswa = $query->paginate(10);

        // Append query parameters to pagination links
        $siswa->appends([
            'search' => $search,
            'sort' => $sort
        ]);

        return view('panel.users.siswa.siswa', [
            'siswa' => $siswa,
            'search' => $search,
            'sort' => $sort
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.users.siswa.create', [
            'siswa' => siswa::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nama_Siswa' => 'required|string|max:255',
            'username' => 'required|string|max:255',
        ]);
        $user = User::create([
            'username' => $request->username,
            'email' => strtolower(Str::slug($request->username)) . '@gmail.com',
            'password' => bcrypt('password'),
        ]);
        Siswa::create([
            'Nama_Siswa' => $request->Nama_Siswa,
            'username' => $user->username,
        ]);
        return redirect()->route('siswa')->with('success', 'Siswa berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('panel.users.siswa.edit', [
            'siswa' => siswa::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, string $id_user)
    {
        $request->validate([
            'Nama_Siswa' => 'required',
            'username' => 'required',
        ]);
        User::find($id_user)->update([
            'username' => $request->username
        ]);
        siswa::find($id)->update([
            'Nama_Siswa' => $request->Nama_Siswa
        ]);
        return redirect()->route('siswa')->with('success', 'Siswa berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, string $id_user)
    {
        siswa::find($id)->delete();
        User::find($id_user)->delete();
        return redirect(route('siswa'))->with('success', 'Siswa berhasil dihapus');
    }
}
