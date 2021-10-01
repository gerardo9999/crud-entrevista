<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    protected $table = 'clientes';
    protected $primaryKey = 'id';

    public $fillable = [
        'ci',
        'nombres',
        'apellidos',
        'telefono',
        'email',
        'fecha_nac',
    ];

    public $timestamps = false;
}
