<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\OperatorDepartemen; // Fixed capitalization

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


     public function apiLogin(Request $request)
    {
        try {
            // Validate input
            $validator = Validator::make($request->all(), [
                'login' => 'required|string',
                'password' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $loginInput = $request->login;
            $user = null;
            $operator = null;

            // Check if login input is numeric (ID) or username
            if (is_numeric($loginInput)) {
                $operator = OperatorDepartemen::find($loginInput);
                if ($operator && $operator->username) {
                    $user = User::where('username', $operator->username)->first();
                }
            } else {
                $user = User::where('username', $loginInput)->first();
                if ($user) {
                    $operator = OperatorDepartemen::where('username', $user->username)->first();
                }
            }

            // Validate user and password
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json([
                    'success' => false,
                    'message' => 'ID Operator/Username atau password salah.'
                ], 401);
            }

            // Check if operator exists
            if (!$operator) {
                return response()->json([
                    'success' => false,
                    'message' => 'Operator tidak ditemukan.'
                ], 404);
            }

            // Create token using Sanctum
            $token = $user->createToken('auth-token')->plainTextToken;

            // Prepare response data
            $responseData = [
                'user' => [
                    'id' => $user->id,
                    'username' => $user->username,
                    'role' => $user->role,
                    'created_at' => $user->created_at,
                ],
                'operator' => [
                    'id' => $operator->id,
                    'username' => $operator->username,
                    // Add other operator fields as needed
                    'nama' => $operator->nama ?? null,
                    'departemen' => $operator->departemen ?? null,
                ],
                'token' => $token,
                'token_type' => 'Bearer'
            ];

            return response()->json([
                'success' => true,
                'message' => 'Login successful',
                'data' => $responseData
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Login failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // NEW: API Logout method for Flutter
    public function apiLogout(Request $request)
    {
        try {
            // Revoke current token
            $request->user()->currentAccessToken()->delete();

            return response()->json([
                'success' => true,
                'message' => 'Logout successful'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Logout failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // NEW: API Profile method for Flutter
    public function apiProfile(Request $request)
    {
        try {
            $user = $request->user();
            $operator = OperatorDepartemen::where('username', $user->username)->first();

            if (!$operator) {
                return response()->json([
                    'success' => false,
                    'message' => 'Operator tidak ditemukan.'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => [
                    'user' => [
                        'id' => $user->id,
                        'username' => $user->username,
                        'role' => $user->role,
                        'created_at' => $user->created_at,
                    ],
                    'operator' => [
                        'id' => $operator->id,
                        'username' => $operator->username,
                        'nama' => $operator->nama ?? null,
                        'departemen' => $operator->departemen ?? null,
                    ]
                ]
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to get profile',
                'error' => $e->getMessage()
            ], 500);
        }
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
