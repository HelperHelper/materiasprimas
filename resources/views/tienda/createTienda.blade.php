@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
     
       <form action="{{route('saveTienda')}}" method="POST" enctype="multipart/form-data" class="col-lg-7">
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

       	<h2>Llenar la información de su tienda</h2>
       	    <hr>

       	     <div class="form-group">
       	     	<label for="nombre">Nombre de Tienda</label>
       	     	<input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}" />
       	     </div>

       	     <div class="form-group">
       	     	<label for="direccion">Dirección</label>
       	     	<input type="text" class="form-control" id="direccion" name="direccion" value="{{old('direccion')}}"/>
       	     </div>

       	     <div class="form-group">
       	     	<label for="telefono">Telefono</label>
       	     	<input type="text" class="form-control" id="telefono" name="telefono" value="{{old('telefono')}}"/>
       	     </div>

       	     <div class="form-group">
       	     	<label for="imagen">imagen</label>
       	     	<input type="file" class="form-control" id="imagen" name="imagen"/>
       	     </div>
             
             <div class="form-group">
                            <label for="email">{{ __('Email') }}</label>

                            
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            
            </div>

       	     <button type="submit" class="btn btn-success">Crear Tienda</button>

       </form>
   </div>
</div>
@endsection