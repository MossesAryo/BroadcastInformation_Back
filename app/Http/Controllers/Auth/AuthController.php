<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\OperatorDepartemen;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


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
        Auth::login($user);
        $request->session()->regenerate();

        $operator = OperatorDepartemen::where('username', $user->username)->first();


        if (!$operator) {
            Auth::logout();
            return back()->withErrors(['login' => 'Operator tidak ditemukan.']);
        }



        
        session(['operator' => $operator->toArray()]);
        
        if($user -> role == '0'){
          return redirect()->route('dashboard');
        }else{
        return redirect()->route('get.info.op');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
