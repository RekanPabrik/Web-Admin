<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class perusahaanController extends Controller
{
    public function mainDataPerusahaan()
    {
        $baseUrl = config('api.url');
        $data = $this->getAllPerusahaan($baseUrl);

        return view('home-before-login/aboutUs', ['dataPerusahaan' => $data]);
    }

    public function mainDataPerusahaanBFLogin()
    {
        $baseUrl = config('api.url');
        $data = $this->getAllPerusahaan($baseUrl);

        return view('home-before-login/HomeBFLogin', ['dataPerusahaan' => $data]);
    }

    public function getAllPerusahaan($baseUrl)
    {
        $client = new Client();
        try {
            $response = $client->get("{$baseUrl}/perusahaan/getAllPerusahaan", [
            ]);
            $data = json_decode($response->getBody(), true);
            return $data;
        } catch (\Throwable $th) {
            return redirect()->route('admin.home')->withErrors(['data' => 'Data tidak ditemukan.' . $th->getMessage()]);
        }
    }
}
