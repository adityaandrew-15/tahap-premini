<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendaftaran extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'kursus_id', 'tanggal_mulai', 'tanggal_selesai', 'created_at', 'updated_at'];

    public function kursus(){
        return $this->belongsTo(kursus::class);
    }
}
