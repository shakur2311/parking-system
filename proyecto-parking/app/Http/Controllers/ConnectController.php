<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
#use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Validator, Hash;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class ConnectController extends Controller
{
    public function __Construct(){
        $this->middleware('guest')->except(['getLogout']);
    }
    public function getLogin(){
        return view('connect.login');
    }
    public function getRegister(){
        return view('connect.register');
    }
    public function postRegister(Request $request){
        $rules=[
            'name'=> 'required',
            'lastname'=> 'required',
            'email'=> 'required|email|unique:users,email',
            'password'=> 'required|min:8',
            'cpassword'=> 'required|min:8|same:password'

        ];
        $messages=[
            'name.required'=>'El campo nombre es requerido',
            'lastname.required'=>'El campo apellido es requerido',
            'email.required'=>'El campo email es requerido',
            'email.email'=>'El formato del campo email es invalido',
            'email.unique'=> 'Ya existe un usuario registrado con este email',
            'password.required'=> 'El campo contraseña es requerida',
            'password.min'=> 'La contraseña debe tener al menos 8 carácteres',
            'cpassword.required'=> 'El campo confirmar contraseña es requerida',
            'cpassword.min'=> 'La confirmación de la contraseña debe tener al menos 8 carácteres',
            'cpassword.same'=> 'Las contraseñas no coinciden'



        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error');
        else:
            $user = new User;
            $user->role = 1;
            $user->name = e($request->input('name'));
            $user->lastname = e($request->input('lastname'));
            $user->email=e($request->input('email'));
            $user->password = Hash::make($request->input('password'));
            if($user->save()):
                return redirect()->route('login')->with('message2','Se ha registrado correctamente');
            endif;
        endif;
    }

    public function postLogin(Request $request){
        $rules=[
            'email'=> 'required|email',
            'password'=> 'required|min:8'
        ];
        $messages=[
            'email.required'=>'El campo email es requerido',
            'email.email'=>'El formato del campo email es invalido',
            'password.required'=> 'El campo contraseña es requerida',
            'password.min'=> 'La contraseña debe tener al menos 8 carácteres'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error');
        else:
            if(Auth::attempt(['email'=>$request->input('email'), 'password'=>$request->input('password')])):
                if(Auth::user()->role=="0"):
                    return redirect('admin');
                else:
                    return redirect('user');
                endif;
            else:
                return back()->with('message3','Correo o contraseña invalidos');
            endif;
        endif;

    }
   
    public function getLogout(){
        Auth::logout();
        return redirect('/');
    }
}
