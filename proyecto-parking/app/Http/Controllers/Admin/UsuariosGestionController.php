<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Validator, Hash;

class UsuariosGestionController extends Controller
{
    public function __Construct(){
        $this->middleware('auth');
        $this->middleware('isadmin');

    }
    public function index(){
        $users = DB::table('users')->get();
        $roles = DB::table('roles')->select('descripcion')->get();
        return view('admin.usuarios')->with('users',$users)->with('roles',$roles);
    }
    public function crearUsuario(Request $request){
        $user = new User;
        if($request->input('role_usuario') == "Administrador"):
            $user->role = 0;
        else:
            $user->role = 1;
        endif;
        $user->name = e($request->input('nombres_usuario'));
        $user->lastname = e($request->input('apellidos_usuario'));
        $user->email=e($request->input('correo_usuario'));
        $user->password = Hash::make($request->input('contrasena_usuario'));
        if($user->save()):
            return back()->with('message2','Se ha registrado correctamente');
        endif;
    }
}
