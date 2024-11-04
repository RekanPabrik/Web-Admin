<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class adminController extends Controller
{

    public function mainAdmin()
    {

    }

    public function displayCountData()
    {
        $client = new Client();
        $token = session('token');

        try {
            $userResponse = $client->get('http://localhost:4000/admin/countUser', [
                'headers' => [
                    'Authorization' => "Bearer {$token}",
                ],
            ]);

            $jumlahPelamar = $jumlahAdmin = $jumlahPerusahaan = $jumlahPostinganPekerjaan = 0;

            $data = json_decode($userResponse->getBody(), true);
            $jumlahPelamar = $data['data']['jumlahPelamar'] ?? 0;
            $jumlahHRD = $data['data']['jumlahHRD'] ?? 0;
            $jumlahAdmin = $data['data']['jumlahAdmin'] ?? 0;
            $jumlahPostinganPekerjaan = $data['data']['jumlahPostinganPekerjaan'] ?? 0;

            return view('admin.home', compact('jumlahPelamar', 'jumlahAdmin', 'jumlahPerusahaan', 'jumlahPostinganPekerjaan'));
        } catch (\Throwable $e) {
            return redirect()->route('admin.home')->withErrors(['data' => 'Data tidak ditemukan.' . $e->getMessage()]);
        }
    }

    public function home()
    {
        $client = new Client();
        $token = session('token'); 

        if (!$token) {
            return redirect()->route('login.form');
        }
    
        try {
            $userResponse = $client->get('http://localhost:4000/auth/me', [
                'headers' => [
                    'Authorization' => "Bearer {$token}",
                ],
            ]);

            $countData = $client->get('http://localhost:4000/admin/countUser', [
                'headers' => [
                    'Authorization' => "Bearer {$token}",
                ],
            ]);

            $jumlahPelamar = $jumlahAdmin = $jumlahPerusahaan = $jumlahPostinganPekerjaan = 0;

            $data = json_decode($countData->getBody(), true);
            $jumlahPelamar = $data['data']['jumlahPelamar'] ?? 0;
            $jumlahPerusahaan = $data['data']['jumlahPerusahaan'] ?? 0;
            $jumlahAdmin = $data['data']['jumlahAdmin'] ?? 0;
            $jumlahPostinganPekerjaan = $data['data']['jumlahPostinganPekerjaan'] ?? 0;
    
            $userData = json_decode($userResponse->getBody(), true);
            if (isset($userData['data'][0][0])) {
                $user = $userData['data'][0][0];
    
                if ($user['role'] === 'admin') {
                    $jumlahPelamar = 1;
                    return view('admin.home', compact('user', 'jumlahPelamar', 'jumlahAdmin', 'jumlahPerusahaan', 'jumlahPostinganPekerjaan'));
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
