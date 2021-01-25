@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
     
       <form action="{{route('SaveMediodepago')}}" method="POST" enctype="multipart/form-data" class="col-lg-7">
             {!! csrf_field() !!}

            @if($errors->any())
              <div class="alert alert-danger">
              	<ul>
              		@foreach($errors->all() as $error)
                       <li>{{$error}}</li>
              		@endforeach
              	</ul>
              </div>
            @endif

       	<h2>Llenar la información de su Medio de pago</h2>
       	    <hr>
            
       	     <div class="form-group">
       	     	<label for="nombre">Escoja su tipo de pago preferido</label>
       	           <input type="text" list="tipodepago" class="form-control" name="tipodepago" >
       	     	     <datalist id="tipodepago">
                      <option value="Debito"></option>
                      <option value="Credito"></option>
                     </datalist>
       	     </div>

       	     <div class="form-group">
       	     	<label for="cantidad">Numero de su Cuenta</label>
       	     	<input type="number" class="form-control" id="numero" name="numero" value=""/>
       	     </div>

       	     <div class="form-group">
       	     	<label for="cantidadvendida">Codigo CVV de su tarjeta</label>
       	     	<input type="text" class="form-control" id="CVV" name="CVV" value="" />
       	     </div>

 

       	     <button type="submit" class="btn btn-success">Siguiente</button>

       </form>
      
   </div>
</div>
@endsection