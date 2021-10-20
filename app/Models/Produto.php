<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'campanha_id',
        'desconto_id',
        'nome',
        'valor'
    ];

}
