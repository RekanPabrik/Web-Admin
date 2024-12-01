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
        $data = $this->getDataLaporan($token);

        return view('admin.laporan', ['dataLaporan' => $data]);
    }

    public function getDataLaporan($token)
    {
        $client = new Client();
        try {
            $response = $client->get('http://localhost:4000/melamarPekerjaan/getDataMelamarPekarjaan', [
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
