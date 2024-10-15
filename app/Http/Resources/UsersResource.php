<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UsersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_Akun' => $this -> ID_AKUN,
            'email' => $this->email,
            'password' => $this -> password,
            'nama_depan'=> $this -> nama_depan,
            'nama_belakang'=> $this -> nama_belakang,
            'usia'=> $this -> usia,
            'kelamin'=> $this -> kelamin,
            'tanggal_lahir' => date_format($this->tanggal_lahir, "d/m/Y"),
            'role'=> $this -> role,
            'foto_profile' => $this -> Foto_Profile,
            'foto_beranda'=> $this -> Foto_Beranda,
        ];
    }
}
