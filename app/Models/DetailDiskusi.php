<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Diskusi;
use App\Models\Pengguna;

class DetailDiskusi extends Model
{
    use HasFactory;

    protected $table = 'diskusi_detail';
    protected $primaryKey = 'id_detail_diskusi';
    protected $guarded = [];
    public $timestamps = false;

    public function diskusi()
    {
        return $this->belongsTo(Diskusi::class, 'id_diskusi');
    }

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna');
    }
}
