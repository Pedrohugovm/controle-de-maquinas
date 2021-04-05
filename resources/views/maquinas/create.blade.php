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
                     <label for="patrimonio">patrimonio:</label>
                     <input type="text" class="form-control" name="patrimonio"/>
                 </div>
       
                 <div class="form-group">
                     <label for="descricao">descrição:</label>
                     <input type="text" class="form-control" name="descricao"/>
                 </div>
       
                 <div class="form-group">
                     <label for="lotacao">lotação:</label>
                     <input type="text" class="form-control" name="lotacao"/>
                 </div>

                 <div class="form-group">
                  <label for="sistema">sistema:</label>
                  <input type="text" class="form-control" name="sistema"/>
              </div>
                 
                 <button type="submit" class="btn btn-primary-outline">Adicionar maquina</button>
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