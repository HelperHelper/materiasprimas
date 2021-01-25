<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use App\User;

class Usercontroller extends Controller
{
    



    public function EditUsuario(){

        $user = \Auth::user();
      

      if($user){

        return view('auth.Edituser',array('user' => $user));

       }else{
        return redirect()->route('home');

       }
    }

   public function UpdateUser($user_id, Request $request){
             $validatedata = $this->validate($request, [
                 
            'name' => 'string|max:255',
            'apellido' => 'string|max:255',
            'email' => 'string|email|max:255',
            'telefono' => 'string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = \Auth::user();
        $users = User::findOrFail($user_id);

         $users->name = $request->input('name');
         $users->apellido = $request->input('apellido');
         $users->email = $request->input('email');
         $users->telefono = $request->input('telefono');
         $users->password = Hash::make($request->input('password'));



        $users->update();

        return redirect()->route('home')->with(array('message' => 'El usuario se ha actualizado correctamente!!' ));



    }


}
