<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;

    public $table = 'uploads';

    protected $fillable = [
        'name', 'description', 'file'
    ];
}
