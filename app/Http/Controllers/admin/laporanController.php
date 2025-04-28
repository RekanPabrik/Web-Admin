<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class laporanController extends Controller
{
    public function mainDataLaporan()
    {
        $token = session('token');
        $baseUrl = config('api.url');
        $data = $this->getDataLaporan($token, $baseUrl);

        return view('admin.laporan', ['dataLaporan' => $data]);
    }

    public function getDataLaporan($token, $baseUrl)
    {
        $client = new Client();
        try {
            $response = $client->get("{$baseUrl}/melamarPekerjaan/getDataMelamarPekarjaan", [
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
}
