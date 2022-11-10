<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Pengguna;

class Saran extends Model
{
    use HasFactory;

    protected $table = 'saran';
    protected $primaryKey = 'id_saran';
    protected $guarded = [];
    public $timestamps = false;

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna');
    }
}
