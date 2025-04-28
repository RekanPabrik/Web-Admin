<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class resetPassword extends Controller
{
    public function showResetPasswordForm($token)
    {
        session(['token' => $token]);
        $userData = $this->me($token);
        return view('auth/resetPasswordPage', ['token' => $token, 'userData' => $userData]);
    }

    public function me($token)
    {
        $baseUrl = config('api.url');
        $client = new Client();
        if (!$token) {
            return redirect()->route('login.form');
        }

        try {
            $userResponse = $client->get("{$baseUrl}/auth/me", [
                'headers' => [
                    'Authorization' => "Bearer {$token}",
                ],
            ]);
            $userData = json_decode($userResponse->getBody(), true);
            if (isset($userData['data'][0][0])) {
                $user = $userData['data'][0][0];
                return $user;
            } else {
                return redirect()->route('login.form')->withErrors(['login' => 'User data not found.']);
            }
            return redirect()->route('login.form')->withErrors(['login' => 'User data not found.']);
        } catch (\Throwable $th) {
            return redirect()->route('login.form')->withErrors(['data' => 'Data tidak ditemukan.' . $th->getMessage()]);
        }

    }

    public function requestResetPass(Request $request)
    {
        $baseUrl = config('api.url');
        try {
            $client = new Client();
            $response = $client->post("{$baseUrl}/auth/requestResetPassword", [
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
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'error' => 'gagal mengirimkan permintaan: ' . $th->getMessage()]);
        }
    }

    public function resetPassword(Request $request)
    {
        $token = session('token');
        $baseUrl = config('api.url');
        if (!$token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
         
        try {
            $client = new Client();
            $response = $client->post("{$baseUrl}/auth/resetPasword", [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => "Bearer {$token}",
                ],
                'json' => $request->all(),
            ]);

            $result = json_decode($response->getBody(), true);

            if ($result['success']) {
                return response()->json(['success' => true, 'message' => $result['message']]);
            }
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'error' => 'gagal mengirimkan permintaan: ' . $th->getMessage()]);
        }
    }
}
