<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilai extends Model
{
    use HasFactory;

    protected $fillable = ['pendaftaran_id', 'kursus_id', 'nilai', 'created_at', 'updated_at'];

    public function pendaftaran(){
        return $this->belongsTo(pendaftaran::class);
    }

    public function kursus(){
        return $this->belongsTo(kursus::class);
    }
}
