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

    public function desconto()
    {
        return $this->belongsTo(Desconto::class);
    }

    public function campanha()
    {
        return $this->belongsTo(Campanha::class);
    }

}
