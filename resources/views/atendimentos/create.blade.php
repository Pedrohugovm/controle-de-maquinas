@extends('layouts.app') 

@section('content')

@if(Auth::check())

<body>
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
           <h1 class="display-3 ">Novo atendimento</h1>
         <div>
           @if ($errors->any())
             <div class="alert alert-danger">
               <ul>
                   @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                   @endforeach
               </ul>
             </div><br />
           @endif
             <form method="post" action="{{ route('atendimentos.store') }}">
                 @csrf
                 <div class="form-group">    
                     <label for="descricao_problema">Descrição do problema:</label>
                     <input type="text" class="form-control" name="descricao_problema" required/>
                 </div>
       
                 <div hidden class="form-group">
                     <label for="descricao_fechamento">Descrição do fechamento: (se houver)</label>
                     <input type="text" class="form-control" name="descricao_fechamento"/>
                 </div>
       
                 <div class="form-group">
                     <label for="data_abertura">Data da abertura:</label>
                     <input type="date" class="form-control" name="data_abertura"/>
                 </div>

                 <div hidden class="form-group">
                  <label for="data_fechamento">Data de fechamento: (se houver)</label>
                  <input type="date" min='{{date('Y-m-d')}}' class="form-control" name="data_fechamento"/>
              </div>

              <div class="form-group">
                  <input type="hidden" class="form-control" name="id_maquina" value="{{$id}}"/>
              </div>

              <div hidden class="form-group">
              <label for="status">Status:</label>
              <select class="form-control mb-5" aria-label=".form-select-lg example" name="status">
                <option selected value="Aberto">Aberto</option>
                <option value="Fechado">Fechado</option>
              </select>
            </div>

                 <div class="d-flex justify-content-center">
                 <button type="submit" class="btn btn-outline-primary">Adicionar detalhes de atendimento</button>
                </div>
             </form>
         </div>
       </div>
       </div>
</body>
@else
<div class="alert alert-warning" role="alert">
  Você precisa estar <a href="#" class="alert-link">logado</a>. para efetuar essa ação.
</div>
@endif
@endsection