@extends('layouts.app')

@section('content')

@if(Auth::check())

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Atualizar máquina</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('maquinas.update', $maquina->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="patrimonio">Patrimônio:</label>
                <input type="text" class="form-control" name="patrimonio" value="{{ $maquina->patrimonio}}" />
            </div>

            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <input type="text" class="form-control" name="descricao" value="{{ $maquina->descricao}}" />
            </div>

            <div class="form-group">     
                <label for="local">Setor:</label>  
               <select class="form-control select2" name="lotacao">
                @foreach($locais AS $local)
                <option selected value="{{ $local->id }}" >{{ $local->setor }}</option>
                @endforeach
              </select>
               </div>


            <div class="form-group">
                <label for="sistema">Sistema Operacional:</label>
                <input type="text" class="form-control" name="sistema" value="{{ $maquina->sistema }}" />
            </div>

            <div class="form-group">
                <input type="hidden" class="form-control" name="id" value="{{$maquina->id}}"/>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
</div>
@else
<div class="alert alert-warning" role="alert">
  Você precisa estar <a href="#" class="alert-link">logado</a>. para efetuar essa ação.
</div>
@endif
@endsection