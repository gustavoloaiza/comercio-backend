<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use SebastianBergmann\Environment\Console;

class UserController extends Controller
{
    //
    function register(Request $req)
    {
        $user = new User;
        $user->nombre = $req->input('nombre');
        $user->apellido = $req->input('apellido');
        $user->email = $req->input('email');
        $user->password = Hash::make($req->input('password'));
        $user->tipo = $req->input('tipo');
        $user->celular = $req->input('celular');
        $user->save();
        return $user;
    }

    function login(Request $req)
    {
        $user = User::where('email', $req->email)->first();
        if (!$user || !Hash::check($req->password, $user->password)) {
            return ["error" => "ups algo salio mal revisa los datos ingresados"];
        }
        return $user;
    }

    function list()
    {
        return User::all();
    }

    
    function getUser($id)
    {
        return User::find($id);
    }

    function updateUser($id, Request $req)
    {

        $usuario = User::find($id);

        if(!is_null($req->input('nombre')) and !($req->input('name') == "undefined") ){
            $usuario->nombre = $req->input('nombre');            
        }
        if(!is_null($req->input('apellido'))and !($req->input('description') == "undefined") ){
            $usuario->apellido = $req->input('apellido');

        }
        if(!is_null($req->input('email'))and !($req->input('email') == "undefined") ){
            $usuario->email = $req->input('email');

        }
        if(!is_null($req->input('celular'))and !($req->input('celular') == "undefined") ){
            $usuario->celular = $req->input('celular');

        }
        if(!is_null($req->input('lat'))and !($req->input('lat') == "null") ){
            $usuario->lat = $req->input('lat');
        }
        if(!is_null($req->input('lng'))and !($req->input('lng') == "null") ){
            $usuario->lng = $req->input('lng');
        }


        $usuario->save();
        return $usuario;
    }
}
