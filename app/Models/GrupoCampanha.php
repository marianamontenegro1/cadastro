<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoCampanha extends Model
{
    protected $table = 'grupo_campanha';    
    public $timestamps = false;

    protected $fillable = ['grupo_id', 'categoria_id'];
}
