<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class instruktur extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nama', 'kursus_id', 'created_at', 'updated_at'];
    public function kursus(){
        return $this->belongsTo(kursus::class);
    }
}
