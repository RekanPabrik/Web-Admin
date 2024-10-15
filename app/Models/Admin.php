<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    public $incrementing = true;
    public $updated_at = false;
    public $created_at = false;

    protected $fillable = [
        'email',
        'password',
        'role',
        'nama_depan',
        'nama_belakang',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'role' => 'string',
    ];
}
