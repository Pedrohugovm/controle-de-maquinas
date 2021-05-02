<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Maquinas extends Model
{
    use HasFactory;
    use SoftDeletes;
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


    public static function boot() {
        parent::boot();

        static::deleting(function($maquina) { // before delete() method call this
             $maquina->antendimentos()->delete();
             // do the rest of the cleanup...
        });
    }
}