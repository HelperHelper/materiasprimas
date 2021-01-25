<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mediodepago extends Model
{
    
     protected $table = 'mediosdepago';


// dentro de un medio de pago puede haber muchas compras, lo que me permitira saber que compras ha realizado un medio de pago, darle información a las tiendas de las ventas que han hecho 

public function compras(){

	return $this->hasMany('App\compra', 'compra_id');
}



// dentro de un medio de pago puede haber un usuario , lo que hara es sacarme el usuario que está haciendo el pago así auto completar el formulario de pago y enviarlo a la tabla de compra
    public function users(){

    	return $this->hasOne('App\User', 'id_user');
    }



}
