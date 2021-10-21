<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = 'grupos';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['nome'];

    public function cidades()
    {
        return $this->hasMany(Cidade::class);
    }

    public function campanhas()
    {
        return $this->belongsToMany(Campanha::class, "grupo_campanha");
    }
}
