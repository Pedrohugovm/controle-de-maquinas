@extends('layouts.app')

@section('content')

@if(Auth::check())




<div class="row container-fluid">
  <div class="col">
    <h1 class="display-7" style="margin: 19px">Lista de Máquinas  <a href="{{ route('maquinas.create')}}" ><i class="fas fa-plus-square"></i></a></h1>
  </div> 
</div>

<div class="container-fluid">
  <table id='tabela' class="table table-striped" style="width:100%">
    <thead>
        <tr>
          <th>ID</th>
          <th>Patrimonio</th>
          <th>Descrição</th>
          <th>Lotação</th>
          <th>Sistema</th>
          <th>Ações</th>
          
        </tr>
    </thead>
    <tbody>
        @foreach($maquinas as $maquina)
        <tr>
           <td>{{$maquina->id}}</td>
            <td> <a href="{{ route('maquinas.show',$maquina->id)}}">{{$maquina->patrimonio}}</a></td>
            <td>{{$maquina->descricao}}</td>
            <td>{{$maquina->setor}}</td>
            <td>{{$maquina->sistema}}</td>
            
            <td>
                <a href="{{ route('maquinas.edit',$maquina->id)}}" class="btn btn-primary">Editar</a>
            </td>

        </tr>
        @endforeach
    </tbody>
  </table>
</div>

        
      {{-- <div class="d-flex justify-content-center">
      <span>
        {{$maquinas->links()}}

      </span>
      </div> --}}
    <br>
  <div>
    <div class="col-sm-12">


@can('isAdmin')
<div class="btn btn-success btn-lg">
  Administrador
</div>
@endcan


      @if(session()->get('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <h5 class='m-0'>Processo efetuado com sucesso!</h5> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        </div>
      @endif
    </div>
  </div>  
  
  @else
  <div class="alert alert-warning" role="alert">
    Você precisa estar <a href="#" class="alert-link">logado</a>. para efetuar essa ação.
  </div>   
</div>  


<div class="card-body">
  @if (session('status'))
      <div class="alert alert-success" role="alert">
          {{ session('status') }}
      </div>
  @endif


</div>



@endif
@endsection
