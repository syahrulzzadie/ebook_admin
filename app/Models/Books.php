<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Pengguna;

class Books extends Model
{
    use HasFactory;

    protected $table = 'books';
    protected $primaryKey = 'id_books';
    protected $guarded = [];
    public $timestamps = false;

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna');
    }
}
