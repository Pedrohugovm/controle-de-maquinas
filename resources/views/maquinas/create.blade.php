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
                <select class="form-control select2" aria-label=".form-select-lg example" name="sistema">
                  <option selected value="Desconhecido">Desconhecido</option>
                  <option value="Windows 10">Windows 10</option>
                  <option value="Windows 8">Windows 8</option>
                  <option value="Windows 7">Windows 7</option>
                  <option value="Windows XP">Windows XP</option>
                  <option value="Windows Vista">Windows Vista</option>
                  <option value="Windows 98">Windows 98</option>
                  <option value="Windows Server">Windows Server</option>
                  <option value="Mac OS">Mac OS</option>
                  <option value="Ubuntu">Ubuntu</option>
                  <option value="Linux Mint">Linux Mint</option>
                </select>
              </div>
  

                 {{-- <div class="form-group">
                  <label for="sistema">Sistema:</label>
                  <input type="text" class="form-control" name="sistema"/>
              </div> --}}
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