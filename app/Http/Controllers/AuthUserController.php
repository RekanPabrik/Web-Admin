<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\UsersResource;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthUserController extends Controller
{

    public function Login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = Admin::where('email', $request->email)->first();
        
        if (! $user) {
            throw ValidationException::withMessages([
                ['anda belum membuat akun.'],
            ]);
        }

        if (Hash::check($request->password, $user->password) ) {

            if ($user->role === 'admin') {
                return redirect()->route('adminPage');
            }
                
        } else {
            throw ValidationException::withMessages([
                ['Email atau password salah.'],
            ]);
        }
    }

    // public function Register(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|string|email|max:100|unique:users',
    //         'password' => 'required|string|max:100',
    //         'nama_depan' => 'required|string|max:50',
    //         'nama_belakang' => 'required|string|max:20',
    //         'usia' => 'required|integer',
    //         'kelamin' => 'required|in:Laki-Laki,Perempuan',
    //         'tanggal_lahir' => 'required|date',
    //         'role' => 'required|in:Pelamar,HRD,Admin'
    //     ]);

    //     $chekedUser = User::where('email', $request->email)->first();
    //     if ($chekedUser) {
    //         return response()->json(['message' => 'Email sudah terdaftar']);
    //     }
        
    //     $newUser = new User();
    //     $newUser->email = $request->email;
    //     $newUser->password = Hash::make($request->Password);
    //     $newUser->nama_depan = $request->nama_depan;
    //     $newUser->nama_belakang = $request->nama_belakang;
    //     $newUser->usia = $request->usia;
    //     $newUser->kelamin = $request->kelamin;
    //     $newUser->tanggal_lahir = $request->tanggal_lahir;
    //     $newUser->role = $request->role;

    //     $newUser->save();

    //     return response()->json(['message' => 'User created successfully', 'user' => $newUser], 200);
    // }

    // public function Logout(Request $request)
    // {
    //     $request->user()->currentAccessToken()->delete();

    //     return response()->json(['message' => 'Successfully logged out']);
    // }

    // public function me(Request $request)
    // {
    //     $user = auth::user();

    //     return response() -> json([
    //         'id_Akun' => $user -> ID_AKUN,
    //         'password' => $user -> password,
    //         'nama_depan'=> $user -> nama_depan,
    //         'nama_belakang'=> $user -> nama_belakang,
    //         'usia'=> $user -> usia,
    //         'kelamin'=> $user -> kelamin,
    //         'tanggal_lahir' => date_format($user->tanggal_lahir, "d/m/Y"),
    //         'role'=> $user -> role,
    //         'foto_profile' => $user -> Foto_Profile,
    //         'foto_beranda'=> $user -> Foto_Beranda,
    //     ]);
    // }
}
