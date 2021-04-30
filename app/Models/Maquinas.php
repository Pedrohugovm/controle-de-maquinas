<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maquinas extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['patrimonio', 'descricao', 'lotacao', 'sistema'];

    public function antendimentos(){
        return $this->hasMany(Atendimentos::class,'id_maquina');
    }

    public function local(){
        return $this->belongsTo(local::class,'lotacao');
    }
}
