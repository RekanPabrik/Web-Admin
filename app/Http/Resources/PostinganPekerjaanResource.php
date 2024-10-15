<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostinganPekerjaanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'ID_POS_PEKERJAAN' => $this -> ID_POS_PEKERJAAN,
            'JUDUL_PEKERJAAN' => $this -> JUDUL_PEKERJAAN,
            'NAMA_PERUSAHAAN' => $this -> NAMA_PERUSAHAAN,
            'DESKRIPSI_PEKERJAAN' => $this -> DESKRIPSI_PEKERJAAN,
            'RENTANG_GAJI' => $this -> RENTANG_GAJI,
            'PERSYARATAN_USIA' => $this -> PERSYARATAN_USIA,
            'PERSYARATAN_PENDIDIKAN' => $this -> PERSYARATAN_PENDIDIKAN,
            'PERSYARATAN_KELAMIN' => $this -> PERSYARATAN_KELAMIN,
            'LOKASI' => $this -> LOKASI,
            'Foto_Perusahaan' => $this -> Foto_Perusahaan,
            'Foto_Logo_Perusahaan'=> $this -> Foto_Logo_Perusahaan,
            'postedBy' => [
                'nama' => $this->postedBy->nama_depan . ' ' . $this->postedBy->nama_belakang,
                // 'nama_depan' => $this->postedBy->nama_depan,
                // 'nama_belakang' => $this->postedBy->nama_belakang,
                'Role' => $this->postedBy->role,
                'Foto_Profile' => $this->postedBy->Foto_Profile,
            ],
        ];
    }
}
