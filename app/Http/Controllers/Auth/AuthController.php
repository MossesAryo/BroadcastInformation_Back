<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\OperatorDepartemen; // Fixed capitalization
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        return view('Auth.Login.login');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        $loginInput = $request->login;
        $user = null;

        if (is_numeric($loginInput)) {
            $operator = OperatorDepartemen::find($loginInput);
            if ($operator && $operator->username) {
                $user = User::where('username', $operator->username)->first();
            }
        } else {
            $user = User::where('username', $loginInput)->first();
        }

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['login' => 'ID Operator/Username atau password salah.']);
        }

        // Login dulu
        Auth::login($user);
        $request->session()->regenerate();

        // Ambil operator ulang berdasarkan username
        $operator = OperatorDepartemen::where('username', $user->username)->first();

        // dd($operator);


        // Pastikan operator ditemukan
        if (!$operator) {
            Auth::logout();
            return back()->withErrors(['login' => 'Operator tidak ditemukan.']);
        }

        // Simpan ke session
        session(['operator' => $operator->toArray()]);
        
        if($user -> role == '0'){
          return redirect()->route('dashboard');
        }
        return redirect()->route('get.info.op');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
