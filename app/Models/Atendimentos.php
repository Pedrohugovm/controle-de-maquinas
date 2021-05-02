<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Atendimentos extends Model
{
    use HasFactory;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['descricao_problema','descricao_fechamento','data_abertura','data_fechamento','status','id_maquina'];

    public function maquina()
    {
        return $this->belongsTo(Maquinas::class,'id_maquina');
    }
}
