<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AuthUserController extends Controller
{

    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth/login'); // Arahkan ke Blade view login
    }

    // Memproses login dan mengonsumsi API
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $client = new Client();

        try {

            // Kirim request POST ke API
            $response = $client->post('http://localhost:4000/auth/login', [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'email' => $request->input('email'),
                    'password' => $request->input('password'),
                ],
            ]);

            // Ambil response dan ubah ke array
            $body = json_decode($response->getBody(), true);
            $token = $body['token'];

            session(['token' => $token]);

            $userResponse = $client->get('http://localhost:4000/auth/me', [
                'headers' => [
                    'Authorization' => "Bearer {$token}",
                ],
            ]);

            $userData = json_decode($userResponse->getBody(), true);

            if (isset($userData['data'][0][0]['role'])) {
                $role = $userData['data'][0][0]['role'];

                if ($role === 'admin') {
                    return redirect()->route('admin.dashboard');
                } elseif ($role === 'pelamar') {
                    return redirect()->route('pelamar.dashboard');
                }
            }
            return redirect()->route('login.form')->withErrors(['login' => 'Invalid user role.']);

        } catch (\Exception $e) {
            if ($e->getCode() == 400) {
                return back()->withErrors(['login' => 'Username or password is incorrect.'])->withInput();
            } else {
                return back()->withErrors(['login' => 'Login failed: ' . $e->getMessage()])->withInput();
            }
        }
    }

    public function home()
    {
        $client = new Client();
        $token = session('token'); // Ambil token dari session
       
        if (!$token) {
            return redirect()->route('login.form');
        }
    
        try {
            $userResponse = $client->get('http://localhost:4000/auth/me', [
                'headers' => [
                    'Authorization' => "Bearer {$token}",
                ],
            ]);
    
            $userData = json_decode($userResponse->getBody(), true);
    
            // Pastikan struktur data benar dan ambil user dari array dua dimensi
            if (isset($userData['data'][0][0])) {
                $user = $userData['data'][0][0];
    
                // Pilih view berdasarkan role
                if ($user['role'] === 'admin') {
                    return view('admin.adminPage', compact('user'));
                } elseif ($user['role'] === 'pelamar') {
                    return view('pelamar.pelamarPage', ['user' => $user]);
                }
            } else {
                return redirect()->route('login.form')->withErrors(['login' => 'User data not found.']);
            }
    
        } catch (\Throwable $e) {
            return redirect()->route('login.form')->withErrors(['login' => 'Failed to retrieve user data: ' . $e->getMessage()]);
        }
    }
}    
