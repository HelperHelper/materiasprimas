<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tienda extends Model
{

    protected $table='tiendas';

    //relación de uno a muchos,  todas las compras que esten relacionadas a una tienda o todas las compras que se allán hecho  de está tienda
    public function compras(){

 return $this->hasMany('App\compra', 'compra_id');
    }



       // el usuario completo que me a creado esta tienda, un usuario puede crear muchas tiendas
    public function users(){

    	return $this->belongsTo('App\User', 'users_id');
    }

      // relación  One to Many - de uno a muchos
// lo que hace es crearme la propiedad facturas en cada objeto que yo saque de tipo tienda y me adjunta todos las facturas que esten relacionadas con la tienda
   public function facturas(){
        
        return $this->hasMany('App\factura');
       

   }

   public function materiaprima(){

    
    return $this->hasMany('App\materiaprima');

   }

}
