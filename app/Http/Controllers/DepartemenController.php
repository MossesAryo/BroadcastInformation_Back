<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    
    public function index(Request $request) // controller buat nyari data
    {
        $search = $request->input('search');
        $status = $request->input('status');
        
        $query = Departemen::query();
        
        // Pencarian
        if ($search) {
            $query->where('Nama_Departemen', 'like', "%{$search}%")
                  ->orWhere('Email_Departemen', 'like', "%{$search}%");
        }
        
        // Filter berdasarkan status jika ada
        if ($status && $status != 'all') {
            $query->where('status', $status);
        }
        
        $departemen = $query->get();
        
        return view('Panel.users.departemen.departemen', compact('departemen'));
    }

   
    public function create()
    {
        return view('Panel.users.departemen.create');
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'Nama_Departemen' => 'required|string|max:255',
            'Email_Departemen' => 'required|email|unique:departemen,Email_Departemen',
            'Tanggal_Dibuat' => 'required|date',
        ]);
        
        Departemen::create([
            'Nama_Departemen' => $request->Nama_Departemen,
            'Email_Departemen' => $request->Email_Departemen,
            'Tanggal_Dibuat' => $request->Tanggal_Dibuat,
        ])->save();
        
          
        
        return redirect()->route('departemen.index')
                        ->with('success', 'Departemen berhasil ditambahkan.');
    }
  
    
    // Redirect with success message


  
    public function show(Departemen $departemen)
    {
        return view('Panel.users.departemen.departemen', [
            'departemen' => Departemen::get(),
        ]);
    }

 
    public function edit(Departemen $departemen)
    {
        return view('Panel.users.departemen.departemen', compact('departemen'));
    }

    
    public function update(Request $request, Departemen $departemen)
    {
        $request->validate([
            'Nama_Departemen' => 'required|string|max:255',
            'Email_Departemen' => 'required|email|unique:departemen,email'. $departemen->ID_Departemen,
            'Tanggal_Dibuat' => 'required|date',

        ]);
        
        $departemen->update([
           'Nama_Departemen' => $request->Nama_Departemen,
            'Email_Departemen' => $request->Email_Departemen,
            'Tanggal_Dibuat' => $request->Tanggal_Dibuat,
        ]);
        
        return redirect()->route('Panel.users.departemen')
                        ->with('success', 'Departemen berhasil diperbarui.');
    }

  
    public function destroy(string $id)
    {
        // $departemen->delete();
        Departemen::find($id)->delete();
        
        return redirect()->route('departemen.index')
                        ->with('success', 'Departemen berhasil dihapus.');
    }
}