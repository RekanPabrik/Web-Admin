<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class pengaduanController extends Controller
{
    public function mainPengaduan()
    {
        $token = session('token');
        $baseUrl = config('api.url');
        $data = $this->getAllPengaduan($token, $baseUrl);

        return view('admin.pengaduan', ['dataPengaduan' => $data]);
    }

    public function getAllPengaduan($token, $baseUrl)
    {
        $client = new Client();
        try {
            $response = $client->get("{$baseUrl}/pengaduan/getAllPengaduan", [
                'headers' => [
                    'Authorization' => "Bearer {$token}",
                ],  
            ]);
            $data = json_decode($response->getBody(), true);
            return $data;
        } catch (\Throwable $th) {
            return redirect()->route('admin.home')->withErrors(['data' => 'Data tidak ditemukan.' . $th->getMessage()]);
        }
    }

    public function addPengaduan(Request $request)
    {
        try {
            $client = new Client();
            $baseUrl = config('api.url');
            $response = $client->post("{$baseUrl}/pengaduan/addPengaduan", [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ],
                'json' => $request->all(),
            ]);

            $result = json_decode($response->getBody(), true);

            if ($result['success']) {
                return response()->json(['success' => true, 'message' => $result['message']]);
            }

            return response()->json(['success' => false, 'error' => $result['error'] ?? 'Terjadi kesalahan.']);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'error' => 'gagal menambahkan pengaduan: ' . $th->getMessage()]);
        }
    }

    public function deletePengaduan(Request $request)
    {
        $token = session('token');
        $baseUrl = config('api.url');
        
        if (!$token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
        $pengaduanID = $request->input('id_Pengaduan');
        
        if (!$pengaduanID) {
            return response()->json(['success' => false, 'error' => 'User ID is required'], 400);
        }

        try {
            $client = new Client();
            $response = $client->delete("{$baseUrl}/pengaduan/deletePengaduan/{$pengaduanID}", [
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
}
