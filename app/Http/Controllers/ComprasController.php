<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;


use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Storage;


use App\materiaprima;
use App\compra;
use App\User;
use App\mediodepago;


class ComprasController extends Controller
{
    
    public function createcompra($materiaprima_id){


      $materiaprima= materiaprima::find($materiaprima_id);
      return view('compra.createCompra',  array(
        'materiaprima' => $materiaprima 
      ));
    	
    }

    public function saveCompra(Request $request){

    	$validatedata = $this->validate($request, [

            'nombre'=>'required',
            'cantidad'=>'required',
            'precio'=>'required',
            'cantidadvendida'=>'required',

    	]);

    	$compra = new compra();
    	$user= \Auth::user();
    	$materiasprimas = materiaprima::all();
    	foreach ( $materiasprimas as $materiaprima) {
    		
    		$compra->materiaprima_id = $materiaprima->id;


    	}

    	  $compra->users_id = $user->id;
    	  $compra->nombre = $request->input('nombre');
    	  $compra->cantidad = $request->input('cantidad');
    	  $compra->precio = $request->input('precio');
    	  $compra->cantidadvendida = $request->input('cantidadvendida');

    	  

    	  $materiaprima->cantidad = $materiaprima->cantidad - $compra->cantidadvendida;
    	  
          if($materiaprima->cantidad <= 0){

            return redirect()->route('home')->with(array('message' => 'No puedes comprar está materia prima debido a que no hay disponibilidad actualmente!!' ));
          }else if($materiaprima->cantidad >= $compra->cantidadvendida){

            
            $compra->save();
            $materiaprima->update();
            return redirect()->route('createmediodepago', ['compra_id' => $compra->id])->with(array('message' => 'Tú compra se a realizado!!'
             ));


          }

    	  
    }
}
