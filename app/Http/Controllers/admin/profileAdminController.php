<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class profileAdminController extends Controller
{
    public function profileAdmin()
    {
        $token = session('token');
        $userFound = $this->me($token);
        return view('admin.profile', ['userFound' => $userFound]);
    }

    public function me($token)
    {
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

    public function updateProfileAdmin(Request $request)
    {
        $token = session('token');

        if (!$token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        try {
            $client = new Client();
            $response = $client->put('http://localhost:4000/admin/profile', [
                'headers' => [
                    'Authorization' => "Bearer {$token}",
                    'Accept' => 'application/json',
                ],
                'json' => $request->all(),
            ]);

            return response()->json(['success' => true, 'message' => 'Profile updated successfully']);
        } catch (\Throwable $e) {
            return response()->json(['success' => false, 'error' => 'Failed to update profile: ' . $e->getMessage()]);
        }
    }
}
