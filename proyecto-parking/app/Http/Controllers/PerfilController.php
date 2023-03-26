<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator, Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function __Construct(){
        $this->middleware('auth');
        
    }
    public function index(){
        return view('layouts.perfil');
    }
    public function postEditPerfil(Request $request){
        $user=Auth::user();
        $user->name=e($request->input('nombre'));
        $user->lastname=e($request->input('apellido'));
        $user->email=e($request->input('correo'));
        /* $user->password=Hash::make($request->input('contrasena')); */
        
        if($user->save()):
            return back()->with('message2','Se ha editado la información');
        endif;


    }
    public function actualizarFotoPerfil(Request $request){
        
        if($request->hasFile('img_usuario')){
            $user=Auth::user();
            $usuario_imagen = $request->file('img_usuario');
            $nombre_usuario_imagen = time(). '.' .$usuario_imagen->getClientOriginalExtension();
            $usuario_imagen->move(public_path('static/img/usuarios'),$nombre_usuario_imagen);
            $user->img = $nombre_usuario_imagen;
            if($user->save()):
                return back()->with('message6','Foto de perfil actualizada correctamente');
            endif;
        }
        else{
            dd('no hay imagen');
        }
    }
}
