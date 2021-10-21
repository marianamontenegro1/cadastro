<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $table = 'cidades';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['grupo_id', 'nome'];
    
    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }
}
