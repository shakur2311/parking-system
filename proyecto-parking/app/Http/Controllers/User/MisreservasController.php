<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB, Auth;
use Illuminate\Http\Request;

class MisreservasController extends Controller
{
    public function __Construct(){
        $this->middleware('auth');
        
    }
    public function index(){
        $mis_reservas = DB::table('espacios')->join('reservas','espacios.idespacio','=','reservas.idespacio')
        ->join('vehiculos','reservas.idvehiculo','=','vehiculos.id_veh')->where('reservas.idusuario',Auth::user()->id)->orderByRaw('fecha_reserva DESC')->get();
        
        return view('user.misreservas-user')->with('mis_reservas',$mis_reservas);
    }

}
