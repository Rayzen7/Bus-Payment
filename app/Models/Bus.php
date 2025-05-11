<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Bus extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'image',
        'price',
        'class',
    ];

    protected $casts = [
        'facility' => 'array'
    ];
}
