@extends('layouts.app') 

@section('content')

@if(Auth::check())

<body>
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
           <h1 class="display-3">Adicionar maquina</h1>
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
             <form method="post" action="{{ route('maquinas.store') }}">
                 @csrf
                 <div class="form-group">    
                     <label for="patrimonio">Patrimonio:</label>
                     <input type="text" class="form-control" name="patrimonio"/>
                 </div>
       
                 <div class="form-group">
                     <label for="descricao">Descrição:</label>
                     <input type="text" class="form-control" name="descricao"/>
                 </div>

                 <div class="form-group">     
                  <label for="local">Setor:</label>  
                 <select class="form-control select2" name="lotacao">
                  <option ></option>
                  @foreach($locais AS $local)
                  <option value="{{ $local->id }}" >{{ $local->setor }}</option>
                  @endforeach
                </select>
                 </div>

                 <div class="form-group">
                  <label for="sistema">Sistema:</label>
                  <input type="text" class="form-control" name="sistema"/>
              </div>
              <div class="d-flex justify-content-center">
                 <button type="submit" class="btn btn-outline-primary">Adicionar maquina</button>
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