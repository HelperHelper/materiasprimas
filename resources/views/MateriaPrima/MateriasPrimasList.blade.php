     <div id="materiaprima-list">
                  @if(count($materiasprimas) >= 1)
                    @foreach($materiasprimas as $materiaprima)
                      @if($materiaprima->deshabilitar != 1)
                       <div class="materiaprima-item col-md-10 pull-left panel panel-default">
                         <div class="panel-body">
                        <!--Imagen del video -->
                         @if(Storage::disk('images')->has($materiaprima->imagen))
                          <div class="materiaprima-image-thumb col-md-2 pull-left">
                              <div class="materiaprima-image-mask">
                                <br>
                                <img src="{{url('/miniatura/'.$materiaprima->imagen)}}" class="materiaprima-image">
                          </div>  
                        </div>
                         @endif  


                          
                           <div class="data">
                            <br>
                               <h4 class="materiaprima-title">
                               Nombre de producto:
                                {{$materiaprima->nombre}}</h4>
                               <p>Nombre de tienda:{{$materiaprima->tienda->nombre}}</p>
                               <p>Dirección de tienda:{{$materiaprima->tienda->direccion}}</p>
                               <p>telefono de tienda:{{$materiaprima->tienda->telefono}}</p>
                               
                               <p>Cantidad disponible: {{$materiaprima->cantidad}}</p>
                               <p>Precio: {{$materiaprima->precio}}</p>
                               <p>Descripción: {{$materiaprima->descripcion}}</p>
                           </div>
                           

                           <!--Botones de accion-->
                           <a href="{{ route('createcompra', ['materiaprima_id' => $materiaprima->id]) }}" class="btn btn-success">Comprar</a>
                          @if(Auth::check() && Auth::user()->id == $materiaprima->user->id)
                             
                             <a href="{{ route('EditMateriaPrima', ['materiaprima_id' => $materiaprima->id]) }}" class="btn btn-warning">Editar</a>
                                <!-- Botón en HTML (lanza el modal en Bootstrap) -->
                         <a href="#DeleteModal{{$materiaprima->id}}" role="button" class="btn btn-primary" data-toggle="modal">Eliminar</a>
  
           <!-- Modal / Ventana / Overlay en HTML -->
                          <div id="DeleteModal{{$materiaprima->id}}" class="modal fade">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                      <h4 class="modal-title">¿Estás seguro?</h4>
                                  </div>
                                  <div class="modal-body">
                                      <p>¿Seguro que quieres borrar esta materiaprima</p>
                                      <p class="text-info"><small>{{$materiaprima->nombre}}</small></p>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                      <a href="/delete-materiaprima{{$materiaprima->id}}" type="button" class="btn btn-danger">Eliminar</a>
                                  </div>
                              </div>
                          </div>
                          </div>


                        @endif
                       </div>
                      </div>
                      @endif
                    @endforeach
                    @else

                      <div class="alert alert-warning">No hay MateriasPrimas Actualmente</div>
                    @endif
                    
                  <br>
                    <div class="clearfix"></div>
                    {{$materiasprimas->links()}}
                </div>