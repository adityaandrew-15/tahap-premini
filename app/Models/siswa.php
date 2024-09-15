<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;

    protected $fillable = ['pendaftaran_id', 'foto', 'kelas_id', 'alamat', 'status', 'created_at', 'updated_at'];

    public function pendaftaran(){
        return $this->belongsTo(pendaftaran::class);
    }

    public function kelas(){
        return $this->belongsTo(kelas::class);
    }
}
