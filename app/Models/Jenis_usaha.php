<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jenis_usaha extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'jenis_usahas';
    protected $guarded = [];

    public function member()
    {
        return $this->hasMany(Member::class);
    }
    public function mitra()
    {
        return $this->hasMany(Mitra::class);
    }
}
