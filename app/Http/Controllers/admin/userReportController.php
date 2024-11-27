<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class userReportController extends Controller
{
    public function userReportsAdmin()
    {
        $token = session('token');
        $jumlahDataUser = $this->displayCountData($token);
        $dataPelamar = $this->getAllPelamar($token);
        $dataPerusahaan = $this->getAllPerusahaan($token);
        $dataAdmin = $this->getAllAdmin($token);

        $dataUser = (object) [
            'jumlahPelamar' => $dataPelamar,
            'jumlahPerusahaan' => $dataPerusahaan,
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
                'jumlahPerusahaan' => $data['data']['jumlahPerusahaan'] ?? 0,
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

    public function getAllPerusahaan($token)
    {
        $client = new Client();

        try {
            $dataPerusahaanResponse = $client->get('http://localhost:4000/perusahaan/getAllPerusahaan', [
                'headers' => [
                    'Authorization' => "Bearer {$token}",
                ],
            ]);
            $dataPerusahaan = json_decode($dataPerusahaanResponse->getBody(), true);
            return $dataPerusahaan;
        } catch (\Throwable $e) {
            return redirect()->route('admin.user')->withErrors(['data' => 'Data tidak ditemukan.' . $e->getMessage()]);
        }
    }

    public function deletePelamar(Request $request)
    {
        $token = session('token');
        
        if (!$token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
        $userId = $request->input('id_pelamar');
        
        if (!$userId) {
            return response()->json(['success' => false, 'error' => 'User ID is required'], 400);
        }

        try {
            $client = new Client();
            $response = $client->delete('http://localhost:4000/pelamar/deletePelamar', [
                'headers' => [
                    'Authorization' => "Bearer {$token}",
                    'Accept' => 'application/json',
                ],
               'json' => $request->all(), 
            ]);

            return response()->json(['success' => true, 'message' => 'Pelamar berhasil dihapus']);
        } catch (\Throwable $e) {
            return response()->json(['success' => false, 'error' => 'gagal menghapus pelamar: ' . $e->getMessage()]);
        }
    }

    public function deleteAdmin(Request $request)
    {
        $token = session('token');
        
        if (!$token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
        $userId = $request->input('id_admin');
        
        if (!$userId) {
            return response()->json(['success' => false, 'error' => 'User ID is required'], 400);
        }

        try {
            $client = new Client();
            $response = $client->delete('http://localhost:4000/admin/deleteAdmin', [
                'headers' => [
                    'Authorization' => "Bearer {$token}",
                    'Accept' => 'application/json',
                ],
               'json' => $request->all(), 
            ]);

            return response()->json(['success' => true, 'message' => 'admin berhasil dihapus']);
        } catch (\Throwable $e) {
            return response()->json(['success' => false, 'error' => 'gagal menghapus admin: ' . $e->getMessage()]);
        }
    }

    public function deletePerusahaan(Request $request)
    {
        $token = session('token');
        
        if (!$token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
        $userId = $request->input('id_perusahaan');
        
        if (!$userId) {
            return response()->json(['success' => false, 'error' => 'User ID is required'], 400);
        }

        try {
            $client = new Client();
            $response = $client->delete('http://localhost:4000/perusahaan/deletePerusahaan', [
                'headers' => [
                    'Authorization' => "Bearer {$token}",
                    'Accept' => 'application/json',
                ],
               'json' => $request->all(), 
            ]);

            return response()->json(['success' => true, 'message' => 'perusahaan berhasil dihapus']);
        } catch (\Throwable $e) {
            return response()->json(['success' => false, 'error' => 'gagal menghapus perusahaan: ' . $e->getMessage()]);
        }
    }

    public function addAdmin(Request $request)
    {
        $token = session('token');

        if (!$token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        try {
            $client = new Client();
            $response = $client->post("http://localhost:4000/auth/registerAdmin", [
                'headers' => [
                    'Authorization' => "Bearer {$token}",
                    'Accept' => 'application/json',
                ],
                'json' => $request->all(),
            ]);

            return response()->json(['success' => true, 'message' => 'admin berhasil ditambahkan']);
        } catch (\Throwable $e) {
            return response()->json(['success' => false, 'error' => 'gagal menambahkan admin: ' . $e->getMessage()]);
        }
    }
}
