<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Storage;

use App\tienda;
use App\User;

class TiendaController extends Controller
{
    public function createTienda(){
        
        return view('tienda.createTienda');
    }

        public function saveTienda(Request $request){

      //validar tienda
        	$validatedata = $this->validate($request, [ 

        		'nombre'=>'required|min:4',
        		'direccion'=>'required',
        		'telefono'=>'required|digits_between:7,30',
            'email' => 'required|string|email|max:255|unique:tiendas',

        	]);

        $Tienda = new tienda();
        $user = \Auth::user();
        $Tienda->users_id = $user->id;
        $Tienda->name = $request->input('nombre');
        $Tienda->direccion = $request->input('direccion');
        $Tienda->telefono = $request->input('telefono');
        $Tienda->email = $request->input('email');

    //subida de la imagen

        $image = $request->file('imagen');
        if($image){
          $image_path = time().$image->getClientOriginalName();
          \Storage::disk('images')->put($image_path, \File::get($image));
          $Tienda->imagen = $image_path;
        }
        $Tienda->save();

        return redirect()->route('home')->with(array('message' => 'La tienda se a almacenado correctamente!!'
             ));

        }


   public function EditTienda(){

        $user = \Auth::user();
       $tiendas = tienda::all();
         foreach( $tiendas as $tienda ) 
         {
             
            
          }
        

    if($user && $tienda->users_id == $user->id){

        return view('tienda.EditTienda',array('tienda' => $tienda));

    }else{
       return redirect()->route('home');

    }


    }

    public function UpdateTienda($tienda_id, Request $request){

            $validatedata = $this->validate($request, [ 

                'nombre'=>'required|min:4',
                'direccion'=>'required',
                'telefono'=>'required|digits_between:7,30',
                'email' => 'required|string|email|max:255',

            ]);

        $user = \Auth::user();
        $tienda = tienda::findOrFail($tienda_id);

         
        $tienda->users_id = $user->id;
        $tienda->name = $request->input('nombre');
        $tienda->direccion = $request->input('direccion');
        $tienda->telefono = $request->input('telefono');
        $tienda->email = $request->input('email');



          $image = $request->file('imagen');
        if($image){
          $image_path = time().$image->getClientOriginalName();
          \Storage::disk('images')->put($image_path, \File::get($image));
          $tienda->imagen = $image_path;
        }

        $tienda->update();

        return redirect()->route('home')->with(array('message' => 'La información de su tienda se ha actualizado correctamente!!' ));


    }



}
