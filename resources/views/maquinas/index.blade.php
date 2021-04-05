@extends('layouts.app')

@section('content')

@if(Auth::check())


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  


<div class="row">
  <div class="col-md-8 mt-0">
    <h1 class="display-7" style="margin: 19px">Lista de Máquinas</h1>
  </div> 

    <div>
      <div class="mx-auto pull-right">
        
          <div class="">
              <form action="{{ route('maquinas.index') }}" method="GET" role="search">

                  <div class="input-group">
                      <span class="input-group-btn mr-2 mt-3">
                          <button class="btn btn-info" type="submit" title="Search projects">
                              <span class="fas fa-search"></span>
                          </button>
                      </span>
                      <input type="text" class="form-control mr-2 mt-3" name="term" placeholder="Pesquisar máquinas" id="term">
                      <a href="{{ route('maquinas.index') }}" class=" mt-3">
                          <span class="input-group-btn">
                              <button class="btn btn-danger" type="button" title="Refresh page">
                                  <span class="fas fa-sync-alt"></span>
                              </button>
                              <div class="input-group-btn mr-2 mt-0">
                              <a style="margin: 19px;" href="{{ route('maquinas.create')}}" class="btn btn-primary">Registrar Nova Máquina</a>
                              </div>
                          </span>
                          
                      </a>
                  </div>
              </form>
          </div>
      </div>
  </div>
    
  </div>
  
     
      <table id="maquinas" class="table table-striped" style="width:100%">
        <thead>
          <div class="col-sm-12">
            <table id='tabela' class="table table-striped" style="width:100%">
              <thead>
                  <tr>
                    <td>ID</td>
                    <td>Patrimonio</td>
                    <td>Descrição</td>
                    <td>Lotação</td>
                    <td>Sistema</td>
                    <td colspan = 2>Ações</td>
                  </tr>
              </thead>
              <tbody>
                  @foreach($maquinas as $maquina)
                  <tr>
                      <td>{{$maquina->id}}</td>
                      <td>{{$maquina->patrimonio}}</td>
                      <td>{{$maquina->descricao}}</td>
                      <td>{{$maquina->lotacao}}</td>
                      <td>{{$maquina->sistema}}</td>
                      <td>
                          <a href="{{ route('maquinas.edit',$maquina->id)}}" class="btn btn-primary">Editar</a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
            <span>
            {{$maquinas->links()}}
          </span>
      <br>
    <div>
      <div class="col-sm-12">


        @if(session()->get('success'))
          <div class="alert alert-dismissable alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
            {{ session()->get('success') }}  
          </div>
        @endif
      </div>
    </div>
    
    @else
    <div class="alert alert-warning" role="alert">
      Você precisa estar <a href="#" class="alert-link">logado</a>. para efetuar essa ação.
    </div>   
     
@endif
@endsection