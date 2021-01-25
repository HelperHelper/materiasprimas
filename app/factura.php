<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class factura extends Model
{
    protected $table='facturas';


//relaciónes uno a uno, de esta manera la factura me mostrara la información de la compra
    public function compras(){

     return $this->hasOne('App\compra', 'compra_id');

     
    }

// de esta manera la factura tendra la información de la tienda
public function tiendas(){

	return $this->hasOne('App\tienda', 'tienda_id');
}


//relación muchos a uno, el usuario completo que a creado la factura 
 public function users(){

 	return $this->belongsToMany('App\User', 'users_id');
 }
}
