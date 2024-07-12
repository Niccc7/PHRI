<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;
    protected $table = 'mitras';
    protected $guarded = [];

    public function jenis_usaha(){
        return $this->belongsTo(Jenis_usaha::class, 'jenis_usaha_id');
    }
}
