<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index(Request $request)
    {
         $search = $request->input('search');
        $sort = $request->input('sort', 'all');
        $query = guru::query();

        // Apply search filter if provided
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('Nama_Guru', 'like', "%{$search}%")
                    ->orWhere('ID_Guru', 'like', "%{$search}%")
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
        $guru = $query->with('user')->paginate(10);

        // Append query parameters to pagination links
        $guru->appends([
            'search' => $search,
            'sort' => $sort
        ]);

        // Check if request is AJAX
        if ($request->ajax() || $request->input('ajax')) {
            return response()->json([
                'guru' => $guru,
                'search' => $search,
                'sort' => $sort
            ]);
        }

        return view('panel.users.guru.guru', [
            'guru' => $guru,
            'search' => $search,
            'sort' => $sort
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
            'username' => 'required|string|max:255',
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => strtolower(Str::slug($request->username)) . '@gmail.com',
            'password' => bcrypt('password'),
        ]);

        guru::create([
            'Nama_Guru' => $request->Nama_Guru,
            'username' => $user->username,
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
            'username' => 'required',
        ]);

        User::where('username', $id_user)->update([
            'username' => $request->username
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
        $guru = guru::find($id);
        $user = User::find($id_user);
        $guru->delete();
        $user->delete();


        return redirect(route('get.guru'))->with('success', 'Guru berhasil dihapus');
    }
}
