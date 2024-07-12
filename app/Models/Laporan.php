<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $table = 'laporans';
    protected $guarded = [];

    public function benefits()
    {
        return $this->belongsTo(Benefit::class);
    }
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
