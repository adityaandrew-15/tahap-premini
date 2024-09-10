<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kursus extends Model
{
    use HasFactory;

    protected $fillable = ['kursus', 'deskripsi', 'created_at', 'updated_at'];
}
