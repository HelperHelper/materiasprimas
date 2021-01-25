@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
     
       <form action="{{route('saveCompra')}}" method="POST" enctype="multipart/form-data" class="col-lg-7">
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

       	<h2>Llenar la información de su Compra</h2>
       	    <hr>
            
       	     <div class="form-group">
       	     	<label for="nombre">Nombre de producto</label>
       	     	<input type="text" class="form-control" id="nombre" name="nombre" value="{{$materiaprima->nombre}}" />
       	     </div>

       	     <div class="form-group">
       	     	<label for="cantidad">Cantidad Disponible</label>
       	     	<input type="text" class="form-control" id="cantidad" name="cantidad" value="{{$materiaprima->cantidad}}"/>
       	     </div>

       	     <div class="form-group">
       	     	<label for="cantidadvendida">Cantidad Requerida</label>
       	     	<input type="number" class="form-control" id="cantidadvendida" name="cantidadvendida" value="" onChange="multiplicar();"/>
       	     </div>

       	     <script type="text/javascript">
       	     	function multiplicar(){
                     cantidad = document.getElementById("cantidadvendida").value;
                     precio = {{$materiaprima->precio}};
                     r = cantidad*precio;
                     document.getElementById("precio").value = r;
                }
       	     </script>

       	     <div class="form-group">
       	     	<label for="precio">precio total</label>
       	     	<input type="number" class="form-control" id="precio" name="precio" />
       	     </div>

       	     <button type="submit" class="btn btn-success">Siguiente</button>

       </form>
      
   </div>
</div>
@endsection