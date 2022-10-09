<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Pengguna;

class Diskusi extends Model
{
    use HasFactory;

    protected $table = 'diskusi';
    protected $primaryKey = 'id_diskusi';
    protected $guarded = [];
    public $timestamps = false;

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna');
    }
}
