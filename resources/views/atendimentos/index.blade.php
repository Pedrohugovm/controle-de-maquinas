@extends('layouts.app')

@section('content')

    @if (Auth::check())



        <div class="container-fluid">
            <div class="row ">
                <div class="col">
                    <h1 class="display-7" style="margin: 19px">Lista de Atendimentos</h1>
                </div>

                
        
        </div>

        <div class="container-fuid">
            <table id='tabela' class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th hidden>ID</th>
                        <th>Descrição do problema</th>
                        <th>Fechamento do atendimento</th>
                        <th>Data de abertura</th>
                        <th>Data de fechamento</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($atendimentos as $atendimento)
                        <tr>
                            <td hidden>{{$atendimento->id}}</td>
                            <td>{{ $atendimento->descricao_problema }}</td>
                            <td>{{ $atendimento->descricao_fechamento }}</td>
                            <td>{{ date('d/m/Y', strtotime($atendimento->data_abertura))}}</td>
                            <td>{{ $atendimento->data_fechamento != null ? $atendimento->data_fechamento->format('d/m/Y') : '' }}
                            </td>
                            <td>{{ $atendimento->status }}</td>
                            <td>
                                <a href="{{ route('atendimentos.edit',$atendimento->id)}}" class="btn btn-primary">Editar</a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
        </div>
        </table>
        </div>
        </div>
        

            @else
  <div class="alert alert-warning" role="alert">
    Você precisa estar <a href="#" class="alert-link">logado</a>. para efetuar essa ação.
  </div>   
    @endif

  
@endsection
