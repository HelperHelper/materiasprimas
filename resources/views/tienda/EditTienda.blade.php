
@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
    
       <form action="{{route('UpdateTienda', ['tienda_id' => $tienda->id])}}" method="POST" enctype="multipart/form-data" class="col-lg-7">
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

       	<h2>Editar la información de su tienda</h2>
       	    <hr>

       	     <div class="form-group">
       	     	<label for="nombre">Nombre de Tienda</label>
       	     	<input type="text" class="form-control" id="nombre" name="nombre" value="{{$tienda->name}}" />
       	     </div>

       	     <div class="form-group">
       	     	<label for="direccion">Dirección</label>
       	     	<input type="text" class="form-control" id="direccion" name="direccion" value="{{$tienda->direccion}}"/>
       	     </div>

       	     <div class="form-group">
       	     	<label for="telefono">Telefono</label>
       	     	<input type="text" class="form-control" id="telefono" name="telefono" value="{{$tienda->telefono}}"/>
       	     </div>

       	     <div class="form-group">
       	     	<label for="imagen">imagen</label>
               @if(Storage::disk('images')->has($tienda->imagen))
               <div class="materiaprima-image-thumb">
                    <div class="materiaprima-image-mask">
                      <img src="{{url('/miniatura/'.$tienda->imagen)}}" class="materiaprima-image">
                    </div>  
                </div>
               @endif  
       	     	<input type="file" class="form-control" id="imagen" name="imagen"/>
       	     </div>
             
             <div class="form-group">
                            <label for="email">{{ __('Email') }}</label>

                            
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$tienda->email}}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            
            </div>

       	     <button type="submit" class="btn btn-success">Editar Tienda</button>

       </form>

   </div>
</div>
@endsection