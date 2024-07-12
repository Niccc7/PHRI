<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Benefit extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'benefits';
    protected $guarded = [];

    public function laporan()
    {
        return $this->hasMany(Laporan::class);
    }
}
