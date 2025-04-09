<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;

    // 🔐 Protezione contro il mass assignment
    protected $fillable = [
        'nome',
        'cognome',
        'email',
        'telefono',
        'messaggio'
    ];
}