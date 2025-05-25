<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\operatordepartemen;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    function index()
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

        $operator = OperatorDepartemen::where('username', $user->username)->first();
        if ($operator) {
            session(['operator' => $operator]);
        }

        return redirect()->intended('/');
    }


    function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
}
