<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiAuthController extends Controller
{
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
            $guru = null;
            $siswa = null;
            $userType = null;

            // Only allow numeric ID login (ID_Guru or ID_Siswa)
            if (!is_numeric($loginInput)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Login harus menggunakan ID Guru atau ID Siswa.'
                ], 422);
            }

            // Try to find guru by ID first
            $guru = Guru::find($loginInput);
            if ($guru && $guru->username) {
                $user = User::where('username', $guru->username)->first();
                $userType = 'guru';
            } else {
                // If not found in guru, try siswa
                $siswa = Siswa::find($loginInput);
                if ($siswa && $siswa->username) {
                    $user = User::where('username', $siswa->username)->first();
                    $userType = 'siswa';
                }
            }

            // Validate user and password
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json([
                    'success' => false,
                    'message' => 'ID Guru/Siswa atau password salah.'
                ], 401);
            }

            // Check if guru or siswa exists
            if (!$guru && !$siswa) {
                return response()->json([
                    'success' => false,
                    'message' => 'User tidak ditemukan sebagai guru atau siswa.'
                ], 404);
            }

            // Create token using Sanctum
            $token = $user->createToken('auth-token')->plainTextToken;

            // Prepare response data based on user type
            $responseData = [
                'user' => [
                    'id' => $user->id,
                    'username' => $user->username,
                    'role' => $user->role,
                    'created_at' => $user->created_at,
                ],
                'user_type' => $userType,
                'token' => $token,
                'token_type' => 'Bearer'
            ];

            // Add specific user data based on type
            if ($userType === 'guru' && $guru) {
                $responseData['guru'] = [
                    'id' => $guru->ID_Guru,
                    'username' => $guru->username,
                    'nama' => $guru->Nama_Guru,
                ];
            } elseif ($userType === 'siswa' && $siswa) {
                $responseData['siswa'] = [
                    'id' => $siswa->ID_Siswa,
                    'username' => $siswa->username,
                    'nama' => $siswa->Nama_Siswa,
                ];
            }

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

    public function apiLogout(Request $request)
    {
        try {
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

    public function apiProfile(Request $request)
    {
            $user = $request->user();
            $guru = Guru::where('username', $user->username)->first();
            $siswa = Siswa::where('username', $user->username)->first();

            if (!$guru && !$siswa) {
                return response()->json([
                    'success' => false,
                    'message' => 'User tidak ditemukan sebagai guru atau siswa.'
                ], 404);
            }

            $responseData = [
                'user' => [
                    'id' => $user->id,
                    'username' => $user->username,
                    'role' => $user->role,
                    'created_at' => $user->created_at,
                ]
            ];

            // Add specific user data based on type
            if ($guru) {
                $responseData['user_type'] = 'guru';
                $responseData['guru'] = [
                    'id' => $guru->ID_Guru,
                    'username' => $guru->username,
                    'nama' => $guru->Nama_Guru,
                ];
            } elseif ($siswa) {
                $responseData['user_type'] = 'siswa';
                $responseData['siswa'] = [
                    'id' => $siswa->ID_Siswa,
                    'username' => $siswa->username,
                    'nama' => $siswa->Nama_Siswa,
                ];
            }

            return response()->json([
                'success' => true,
                'data' => $responseData
            ], 200);

        }
    } 