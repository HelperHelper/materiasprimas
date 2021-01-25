<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {

    return view('welcome');
});

Auth::routes();


Route::get('/home', array(
	'as' => 'home',
    'uses' => 'HomeController@index'
	 ));

//Rutas de edición de usuario
Route::get('/editar-user',  array(
	'as' => 'EditUsuario',
     'middleware' => 'auth', 
     'uses' => 'Usercontroller@EditUsuario'
	 ));

Route::post('/update-MateriaPrima{user_id}',  array(
	'as' => 'UpdateUser',
	'middleware' => 'auth',
    'uses' => 'Usercontroller@UpdateUser'
	 ));



//Rutas del controlador de Tiendas

Route::get('/crear-tienda',  array(
	'as' => 'createTienda',
     'middleware' => 'auth', //este middleware comprueba si estoy logueado o no y si estoy logueado me deja pasar si no me devuelve al login
     'uses' => 'TiendaController@createTienda'
	 ));

Route::post('/guardar-tienda',  array(
	'as' => 'saveTienda',
	'middleware' => 'auth',
    'uses' => 'TiendaController@saveTienda'
	 ));

Route::get('/editar-tienda',  array(
	'as' => 'EditTienda',
     'middleware' => 'auth', 
     'uses' => 'TiendaController@EditTienda'
	 ));

Route::post('/update-tienda{tienda_id}', array(
	'as' => 'UpdateTienda',
    'middleware' => 'auth',
    'uses' => 'TiendaController@UpdateTienda'
	 ));


// Rutas del controlador de MateriaPrima

Route::get('/crear-MateriaPrima', array(
	'as' => 'createMateriaPrima',
	'middleware' => 'auth',
	'uses' => 'MateriasPrimasController@createMateriaPrima' 
     ));

Route::post('/guardar-MateriaPrima',  array(
	'as' => 'saveMateriaPrima',
	'middleware' => 'auth',
    'uses' => 'MateriasPrimasController@saveMateriaPrima'
	 ));

Route::get('/editar-materiaprima/{materiaprima_id}',  array(
	'as' => 'EditMateriaPrima',
     'middleware' => 'auth', 
     'uses' => 'MateriasPrimasController@EditMateriaPrima'
	 ));

Route::post('/edit-MateriaPrima{materiaprima_id}',  array(
	'as' => 'Updatemateriaprima',
	'middleware' => 'auth',
    'uses' => 'MateriasPrimasController@Updatemateriaprima'
	 ));

Route::get('/delete-materiaprima{materiaprima_id}', array(
	'as' => 'deletemateriaprima',
	'middleware' => 'auth',
	'uses' => 'MateriasPrimasController@deletemateriaprima'
));


Route::get('/miniatura/{filename}', array(
	'as' => 'imageMateriaprima', 
	'uses' => 'MateriasPrimasController@getImage'
));

Route::get('/buscar/{search?}/{filter?}',[

'as' => 'MateriaprimaSearch',
'uses' => 'MateriasPrimasController@search'

]);



//Rutas del controlador de Compras

Route::get('/crear-compra/{materiaprima_id}',  array(
	'as' => 'createcompra',
     'middleware' => 'auth', //este middleware comprueba si estoy logueado o no y si estoy logueado me deja pasar si no me devuelve al login
     'uses' => 'ComprasController@createcompra'
	 ));


Route::post('/guardar-compra',  array(
	'as' => 'saveCompra',
	'middleware' => 'auth',
    'uses' => 'ComprasController@saveCompra'
	 ));


//Rutas del controlador de mediosdepago
Route::get('/crear-mediodepago/{compra_id}',  array(
	'as' => 'createmediodepago',
     'middleware' => 'auth', //este middleware comprueba si estoy logueado o no y si estoy logueado me deja pasar si no me devuelve al login
     'uses' => 'mediosdepagoController@createmediodepago'
	 ));


Route::post('guardar-mediodepago', array(
	'as' => 'SaveMediodepago',
	'middleware'=> 'auth',
	'uses'=>'mediosdepagoController@SaveMediodepago' 
));


// Cache

Route::get('/clear-cache', function(){
	$code = Artisan::call('cache:clear');
});