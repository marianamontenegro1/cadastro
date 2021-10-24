<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desconto extends Model
{
    protected $table = 'descontos';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['nome', 'valor'];

    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }
    
}
