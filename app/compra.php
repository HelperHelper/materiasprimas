<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class compra extends Model
{
   protected $table='compras';

// una compra puede tener muchas materias primas o dentro de una compra pueden haber muchas materias primas, que materias primas se compran más, llevar un stock de cuantas materias primas se venden, darle información a las tiendas de que cosas se venden más o al usuario
 public function materiaprima(){

 return $this->hasMany('App\materiaprima', 'materiaprima_id');

 }

//relación muchos a muchos, muchos usuarios pueden hacer muchas compras 
 public function users(){

 	return $this->belongsToMany('App\User', 'id_user');
 }


//una compra puede tener una factura ,  lo que hace es crearme la propiedad factura en cada objeto que yo saque de tipo compra y me adjunta  la factura que este relacionada con la compra
public function facturas(){

  return $this->hasOne('App\factura');

}

// una tienda puede tener muchas compras o "ventas", lo que hace es crearme la propiedad tienda en cada objeto que yo saque de tipo compra y me adjunta  las tiendas que esten relacionadas con la compra, para poder saber a que tiendas les estoy comprando determinados productos
public function tiendas(){

return $this->hasMany('App\tienda');
}


// un medio de pago puede tener muchas compras, lo que hace es crearme la propiedad medio de pago en cada objeto que yo saque de tipo compra y me adjunta  el medio de pago que este relacionado con la compra, para poder saber con que medio de pago estoy comprando
public function mediosdepago(){

return $this->hasMany('App\mediodepago');

}




}
