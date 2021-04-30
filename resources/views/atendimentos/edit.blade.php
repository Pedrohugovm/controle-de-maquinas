@extends('layouts.app')

@section('content')

@if(Auth::check())

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Atualizar maquina</h1>

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
        <form method="post" action="{{ route('atendimentos.update', $atendimento->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="descricao_problema">Descricao do problema:</label>
                <input type="text" class="form-control" name="descricao_problema" value="{{ $atendimento->descricao_problema}}" />
            </div>

            <div class="form-group">
                <label for="descricao_fechamento">Descricao do fechamento:</label>
                <input type="text" class="form-control" name="descricao_fechamento" value="{{ $atendimento->descricao_fechamento}}" />
            </div>

            <div class="form-group">
                <label for="data_abertura">Data da abertura:</label>
                <input type="date" class="form-control" name="data_abertura" value="{{ $atendimento->data_abertura }}" />
            </div>

            <div class="form-group">
                <label for="data_fechamento">Data do fechamento:</label>
                <input type="date" class="form-control" name="data_fechamento" value="{{ $atendimento->data_fechamento }}" />
            </div>

            <div class="form-group">
                <input type="hidden" class="form-control" name="id_maquina" value="{{$atendimento->id_maquina}}"/>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
              <select class="form-control mb-5" aria-label=".form-select-lg example" name="status">
                <option selected value="Aberto">Aberto</option>
                <option value="Fechado">Fechado</option>
              </select>
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