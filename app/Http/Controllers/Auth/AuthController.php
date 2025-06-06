<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\OperatorDepartemen;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    private function logActivity($type, $title, $description, $status, $color, $badge_color, $icon)
    {
        $user = Auth::user();
        $operator_id = null;

        if ($user) {
            $operator = OperatorDepartemen::where('username', $user->username)->first();
            $operator_id = $operator ? $operator->IDOperator : null;
        }

        $activity = [
            'created_at' => now()->setTimezone('Asia/Jakarta')->toDateTimeString(),
            'activity_type' => $type,
            'title' => $title,
            'description' => $description,
            'status' => $status,
            'color' => $color,
            'badge_color' => $badge_color,
            'icon' => $icon,
            'operator_id' => $operator_id,
        ];

        $activities = session('activity_logs', []);
        $activities[] = $activity;
        session(['activity_logs' => $activities]);
    }

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

        $operator = OperatorDepartemen::where('username', $user->username)->first();
        if ($operator) {
            session(['operator' => $operator]);
        }

        $this->logActivity(
            'login',
            'System Login',
            "User {$user->username} logged in to the system",
            'Login',
            'bg-blue-500',
            'bg-blue-100 text-blue-800',
            'fas fa-sign-in-alt'
        );

        return redirect()->intended('/');
    }

    public function logout(Request $request)
    {
        $user = Auth::user();
        $username = $user ? $user->username : 'Unknown';
        $this->logActivity(
            'logout',
            'System Logout',
            "User {$username} logged out from the system",
            'Logout',
            'bg-gray-500',
            'bg-gray-100 text-gray-800',
            'fas fa-sign-out-alt'
        );

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
