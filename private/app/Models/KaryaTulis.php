<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Pengguna;

class KaryaTulis extends Model
{
    use HasFactory;

    protected $table = 'karya_tulis';
    protected $primaryKey = 'id_karya_tulis';
    protected $guarded = [];
    public $timestamps = false;

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna');
    }
}
