<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\tienda;
use App\User;
use App\materiaprima;


class MateriasPrimasController extends Controller
{
    public function createMateriaPrima(){

     return view('MateriaPrima.createMateriaPrima');

    }

    public function saveMateriaPrima(Request $request){

    	//validar materia prima
    	 $validatedata = $this->validate($request, [
                 
                 'nombre'=> 'required',
                 'imagen' => 'required|image',
                 'cantidad'=>'required|numeric|digits_between:1,1000',
                 'precio' => 'required|numeric',
                 'descripcion' => 'required',

           ]);

    	 $Materiaprima = new materiaprima();
    	 $user = \Auth::user();
    	 $tiendas = tienda::all();
         foreach( $tiendas as $tienda ) 
         {
             $Materiaprima->tienda_id = $tienda->id;
            
          }

         $Materiaprima->users_id = $user->id;
         $Materiaprima->nombre = $request->input('nombre');
         $Materiaprima->cantidad = $request->input('cantidad');
         $Materiaprima->precio = $request->input('precio');
         $Materiaprima->descripcion = $request->input('descripcion');


          $image = $request->file('imagen');
        if($image){
          $image_path = time().$image->getClientOriginalName();
          \Storage::disk('images')->put($image_path, \File::get($image));
          $Materiaprima->imagen = $image_path;
        }
        $Materiaprima->save();

        return redirect()->route('home')->with(array('message' => 'Tu materia prima ahora se encuentra en venta!!'
             ));

    }

       public function getImage($filename){
       
        $file = Storage::disk('images')->get($filename);
        return new Response($file, 200);

    }

    public function EditMateriaPrima($materiaprima_id){

        $user = \Auth::user();
        $materiaprima = materiaprima::findOrFail($materiaprima_id);

    if($user && $materiaprima->users_id == $user->id){

        return view('MateriaPrima.Edit',array('materiaprima' => $materiaprima));

    }else{
       return redirect()->route('home');

    }


    }

    public function Updatemateriaprima($materiaprima_id, Request $request){
     

        $user = \Auth::user();
        $materiaprima = materiaprima::findOrFail($materiaprima_id);

         $materiaprima->users_id = $user->id;
         $materiaprima->nombre = $request->input('nombre');
         $materiaprima->cantidad = $request->input('cantidad');
         $materiaprima->precio = $request->input('precio');
         $materiaprima->descripcion = $request->input('descripcion');


          $image = $request->file('imagen');
        if($image){
          $image_path = time().$image->getClientOriginalName();
          \Storage::disk('images')->put($image_path, \File::get($image));
          $materiaprima->imagen = $image_path;
        }

        $materiaprima->update();

        return redirect()->route('home')->with(array('message' => 'La materiaprima se ha actualizado correctamente!!' ));



    }

    public function deletemateriaprima($materiaprima_id){

  

        $user = \Auth::user();
        $materiaprima = materiaprima::findOrFail($materiaprima_id);


      
      if($user && $materiaprima->users_id == $user->id){

        $materiaprima->users_id = $user->id;
        $materiaprima->deshabilitar=1;

        $materiaprima->update();


          return redirect()->route('home')->with(array('message' => 'La materiaprima se ha eliminado correctamente!!' ));
      }
       

    }


    public function search($search = null, $filter = null){


       if(is_null($search)){

        $search= \Request::get('search');

        return redirect()->route('MateriaprimaSearch', array(
            'search' => $search , ));


       }

       if(is_null($filter) && \Request::get('filter') && !is_null($search)){

        $filter= \Request::get('filter');

       return redirect()->route('MateriaprimaSearch', array(
            'search' => $search , 'filter' => $filter ));

       }

        $column = 'id';
        $order = 'desc';
        if(!is_null($filter)){
            
            if($filter == 'new'){
                $column = 'id';
                $order = 'desc';
                
            }
             
            if($filter == 'old'){
                $column = 'id';
                $order = 'asc';
            }

            if($filter == 'alfa'){
                $column = 'nombre';
                $order = 'asc';
            } 

        }

        $result = materiaprima::where('nombre', 'LIKE', '%'.$search.'%')
                                ->orderBy($column,$order)
                                ->paginate(5);


 // los '%' me sirven para buscar todo lo que contenga search, si lo dejo sin el '%' solo tendría que buscar por el titulo que yo este buscando y acabar por cualquier cosa el 'LIKE' funciona como si fuera un igual

        return view('materiaprima.search', array(
            'materiasprimas' => $result,
            'search' => $search 
        ));
    }


}
