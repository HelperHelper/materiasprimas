<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class materiaprima extends Model
{

protected $table = "materiaprima";

    // el usuario completo que me a creado esta materia prima, un usuario puede crear muchas materias primas
    public function user(){

    	return $this->belongsTo('App\User', 'users_id');
    }


       public function tienda(){

    	return $this->belongsTo('App\tienda', 'tienda_id');
    }






}
