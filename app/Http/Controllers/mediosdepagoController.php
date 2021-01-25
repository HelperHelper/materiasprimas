<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Storage;

use Mail;
use App\Mail\mailFactura;
use App\Mail\mailVentaTienda;
use App\mediodepago;
use App\compra;
use App\User;
use App\factura;
use App\tienda;

class mediosdepagoController extends Controller
{
    

   public function createmediodepago($compra_id){


    $compra= compra::find($compra_id);
    return view('mediodepago.createMediodepago',  array(
    'compra' => $compra 
      ));

   }

   public function SaveMediodepago(Request $request){


     $validatedata = $this->validate($request, [

               'tipodepago'=>'required',
               'numero'=>'required',
               'CVV'=>'required',

     ]);

     $mediodepago = new mediodepago();
     $user = \Auth::user();
     $compras = compra::all();
        foreach ( $compras as $compra) {
    		
    		$mediodepago->compra_id = $compra->id;


    	}

    	$mediodepago->users_id = $user->id;
    	$mediodepago->tipodepago = $request->input('tipodepago');
    	$mediodepago->numero = $request->input('numero');
    	$mediodepago->CVV=$request->input('CVV');

    	$mediodepago->save();
$factura = new factura();
$tiendas = tienda::all();
foreach ($tiendas as $tienda) {
   	$factura->tienda_id = $tienda->id;
   }   
   $factura->compra_id = $compra->id;
   
   $factura->users_id = $user->id;

   $factura->save();

   if($compra->nombre != null){
     Mail::to($user)->send(new mailFactura($compra,$user,$mediodepago,$factura,$tienda));
     Mail::to($tienda)->send(new mailVentaTienda($compra,$user,$mediodepago,$factura,$tienda));
     return redirect()->route('home')->with(array('message' => 'Tú compra se a realizado!!' ));



     }else{
       
     return redirect()->route('home')->with(array('message' => 'No se a podido realizar la compra!!' ));
   }
   	

   }

}
