<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gradient extends Model
{
    use HasFactory;

    protected $primaryKey = 'title';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'title', 'style', 'direction', 'color1', 'color2'
    ];
}
