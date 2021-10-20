<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campanha extends Model
{
    protected $table = 'campanhas';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['nome', 'flg_ativo'];
}
