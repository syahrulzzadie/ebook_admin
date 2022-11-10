<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perpus extends Model
{
    use HasFactory;

    protected $table = 'perpus';
    protected $primaryKey = 'id_perpus';
    protected $guarded = [];
    public $timestamps = false;
}
