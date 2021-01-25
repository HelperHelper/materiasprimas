@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
     
       <form action="{{route('Updatemateriaprima', ['materiaprima_id' => $materiaprima->id])}}" method="POST" enctype="multipart/form-data" class="col-lg-7">
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

       	<h2>Editar {{$materiaprima->nombre}}</h2>
       	    <hr>

       	     <div class="form-group">
       	     	<label for="nombre">Nombre</label>
       	     	<input type="text" class="form-control" id="nombre" name="nombre" value="{{$materiaprima->nombre}}" />
       	     </div>

             <div class="form-group">
       	     	<label for="imagen">imagen</label>
       	     	<input type="file" class="form-control" id="imagen" name="imagen"/>
       	     </div>

       	     <div class="form-group">
       	     	<label for="cantidad">cantidad</label>
       	     	<input type="text" class="form-control" id="cantidad" name="cantidad" value="{{$materiaprima->cantidad}}"/>
       	     </div>

       	     <div class="form-group">
       	     	<label for="precio">precio</label>
       	     	<input type="text" class="form-control" id="precio" name="precio" value="{{$materiaprima->precio}}"/>
       	     </div>

       	     <div class="form-group">
       	     	<label for="descripcion">descripción</label>
       	     	<textarea  class="form-control" id="descripcion" name="descripcion">{{$materiaprima->descripcion}}</textarea>
       	     </div>

       	     

       	     <button type="submit" class="btn btn-success">Editar MateriaPrima</button>

       </form>
   </div>
</div>
@endsection