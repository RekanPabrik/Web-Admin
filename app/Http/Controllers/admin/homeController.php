<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function homeAdmin()
    {
        $token = session('token');
        $userFound = $this->me($token); 
        $jumlahDataUser = $this->displayCountData($token);
        return view('admin.home', ['userFound' => $userFound, 'jumlahDataUser' => $jumlahDataUser]);
    }

    public function me($token){
        $client = new Client();
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
            if (isset($userData['data'][0][0])) {
                $user = $userData['data'][0][0];
    
                if ($user['role'] === 'admin') {
                    return $user;
                } elseif ($user['role'] === 'pelamar') {
                    return ($user);
                }
            } else {
                return redirect()->route('login.form')->withErrors(['login' => 'User data not found.']);
            }
    
        } catch (\Throwable $e) {
            return redirect()->route('login.form')->withErrors(['login' => 'Failed to retrieve user data: ' . $e->getMessage()]);
        }
    }

    public function displayCountData($token)
    {
        $client = new Client();

        try {
            $userResponse = $client->get('http://localhost:4000/admin/countUser', [
                'headers' => [
                    'Authorization' => "Bearer {$token}",
                ],
            ]);
            $data = json_decode($userResponse->getBody(), true);
            $jumlahData = (object) [
                'jumlahPelamar' => $data['data']['jumlahPelamar'] ?? 0,
                'jumlahPerusahaan' => $data['data']['jumlahPerusahaan'] ?? 0,
                'jumlahAdmin' => $data['data']['jumlahAdmin'] ?? 0,
                'jumlahPostinganPekerjaan' => $data['data']['jumlahPostinganPekerjaan'] ?? 0,
            ];
            return $jumlahData;
        } catch (\Throwable $e) {
            return redirect()->route('admin.home')->withErrors(['data' => 'Data tidak ditemukan.' . $e->getMessage()]);
        }
    }
}
