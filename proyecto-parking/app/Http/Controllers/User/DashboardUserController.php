<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use DateTime;
use DateTimeZone;

class DashboardUserController extends Controller
{
    public function __Construct(){
        $this->middleware('auth');
        
    }
    public function index(){
        $conteo_mis_vehiculos = DB::table('vehiculos')->where('propietario_veh',Auth::User()->id)->count();
        $conteo_espacios_disponibles = DB::table('espacios')->where('estado','0')->count();
        $mis_ultimas_reservas = DB::table('espacios')->join('reservas','espacios.idespacio','=','reservas.idespacio')
        ->join('vehiculos','reservas.idvehiculo','=','vehiculos.id_veh')->where('reservas.idusuario',Auth::user()->id)->orderByRaw('fecha_reserva DESC')->take(5)->get();
        $groupby_fecha_nreservas = DB::table('reservas')->select('fecha_reserva',DB::raw('count(idreserva) as totalreservas'))->groupByRaw('fecha_reserva')->get();
        $groupby_espacio_nreservas = DB::table('reservas')->join('espacios', 'reservas.idespacio', '=', 'espacios.idespacio')
        ->select('nomespacio',DB::raw('count(nomespacio) as totalreservas'))->groupByRaw('nomespacio')->get();

        $groupby_usuarios_nreservas = DB::table('reservas')->join('users','reservas.idusuario','=','users.id')
        ->select(DB::raw("CONCAT(name,' ',lastname) as nombrecompleto"),DB::raw('count(idusuario) as totalreservas'))->groupByRaw('nombrecompleto, idusuario')
        ->orderByRaw('totalreservas DESC')->take(5)->get();

        return view('user.dashboard-user')->with('conteo_mis_vehiculos',$conteo_mis_vehiculos)->with('mis_ultimas_reservas',$mis_ultimas_reservas)->with('conteo_espacios_disponibles', $conteo_espacios_disponibles)->with('graficas_fecha_nreservas',$groupby_fecha_nreservas)
        ->with('graficas_espacio_nreservas',$groupby_espacio_nreservas)->with('graficas_usuario_nreservas',$groupby_usuarios_nreservas);
    }
}
