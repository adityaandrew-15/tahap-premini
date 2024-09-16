<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ulasan extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'pendaftaran_id', 'ulasan', 'created_at', 'updated_at'];
    public function pendaftaran(){
        return $this->belongsTo(pendaftaran::class);
    }
}
