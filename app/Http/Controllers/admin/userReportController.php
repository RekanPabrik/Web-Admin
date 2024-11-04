<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class userReportController extends Controller
{
    public function userReportsAdmin()
    {
        $token = session('token');
        $jumlahDataUser = $this->displayCountData($token);
        $dataPelamar = $this->getAllPelamar($token);
        $dataHRD = $this->getAllHRD($token);
        $dataAdmin = $this->getAllAdmin($token);

        $dataUser = (object) [
            'jumlahPelamar' => $dataPelamar,
            'jumlahHRD' => $dataHRD,
            'jumlahAdmin' => $dataAdmin,
        ];

        return view('admin.user', ['jumlahDataUser' => $jumlahDataUser, 'data' => $dataUser]);
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
                'jumlahHRD' => $data['data']['jumlahPerusahaan'] ?? 0,
                'jumlahAdmin' => $data['data']['jumlahAdmin'] ?? 0,
                'jumlahPostinganPekerjaan' => $data['data']['jumlahPostinganPekerjaan'] ?? 0,
            ];
            return $jumlahData;
        } catch (\Throwable $e) {
            return redirect()->route('admin.user')->withErrors(['data' => 'Data tidak ditemukan.' . $e->getMessage()]);
        }
    }

    public function getAllAdmin($token)
    {
        $client = new Client();

        try {
            $dataAdminResponse = $client->get('http://localhost:4000/admin/getAllAdmin', [
                'headers' => [
                    'Authorization' => "Bearer {$token}",
                ],
            ]);
            $dataAdmin = json_decode($dataAdminResponse->getBody(), true);
            return $dataAdmin;
        } catch (\Throwable $e) {
            return redirect()->route('admin.user')->withErrors(['data' => 'Data tidak ditemukan.' . $e->getMessage()]);
        }
    }

    public function getAllPelamar($token)
    {
        $client = new Client();

        try {
            $dataPelamarResponse = $client->get('http://localhost:4000/pelamar/getAllPelamar', [
                'headers' => [
                    'Authorization' => "Bearer {$token}",
                ],
            ]);
            $dataPelamar = json_decode($dataPelamarResponse->getBody(), true);
            return $dataPelamar;
        } catch (\Throwable $e) {
            return redirect()->route('admin.user')->withErrors(['data' => 'Data tidak ditemukan.' . $e->getMessage()]);
        }
    }

    public function getAllHRD($token)
    {
        $client = new Client();

        try {
            $dataHRDResponse = $client->get('http://localhost:4000/perusahaan/getAllPerusahaan', [
                'headers' => [
                    'Authorization' => "Bearer {$token}",
                ],
            ]);
            $dataHRD = json_decode($dataHRDResponse->getBody(), true);
            return $dataHRD;
        } catch (\Throwable $e) {
            return redirect()->route('admin.user')->withErrors(['data' => 'Data tidak ditemukan.' . $e->getMessage()]);
        }
    }
}
