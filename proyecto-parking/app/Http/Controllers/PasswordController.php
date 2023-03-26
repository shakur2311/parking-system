<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator, Hash;
use App\Mail\DemoEmail;

class PasswordController extends Controller
{
    public function getResetPassword(){
        
        return view('connect.password');
    }
    public function postResetPassword(Request $request){
        $rules=[
            'email'=> 'required|email'
        ];
        $messages=[
            'email.required'=>'El campo email es requerido',
            'email.email'=>'El formato del campo email es invalido'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message5','Se ha producido un error');
        else:
            $objDemo = new \stdClass();
            $objDemo->demo_one = 'Demo One Value';
            $objDemo->demo_two = 'Demo Two Value';
            $objDemo->sender = 'SenderUserName';
            $objDemo->receiver = 'ReceiverUserName';
 
            Mail::to("lamerinom@unac.edu.pe")->send(new DemoEmail($objDemo));
            return back()->with('message4','Correo enviado satisfactoriamente');
        endif;
    }
}
