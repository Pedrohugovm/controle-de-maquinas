<?php

namespace App\Models;

use App\Models\Atendimentos;
use Dyrynda\Database\Support\CascadeSoftDeletes;
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

    protected $cascadeDeletes = ['maquinas'];

    protected $atendimentos = ['deleted_at'];


    protected $fillable = ['patrimonio', 'descricao', 'lotacao', 'sistema'];

    public function antendimentos(){
        return $this->hasMany(Atendimentos::class, 'id_maquina');
    }

    public function local(){
        return $this->belongsTo(local::class,'lotacao');
    }


    public static function boot() {
        parent::boot();

        static::deleting(function($maquina) { // before delete() method call this
             $maquina->atendimentos()->delete();
             $maquina->where('maquina->antendimentos->id_maquina', '=', $maquina->id)->delete();
             $maquina->atendimento()->delete();
             // do the rest of the cleanup...
        });
    }
}