<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Reserva;
use App\Models\Espacio;
use Illuminate\Support\Collection;
use DateTime;
use DateTimeZone;
use PDF;
use Excel;
use App;

class IndicadoresController extends Controller
{
    public function __Construct(){
        $this->middleware('auth');
        $this->middleware('isadmin');
    }
    public function index(){
        /* Graficas dashboard */
        /* Graficas de indicadores */
        $hoy = Carbon::now();
        $ayer = $hoy->subDays(1);
       
        $ayer->timezone('America/Lima');     
        
        $ayer = $ayer->format('Y-m-d');
        $flujo_entrada_7_8 = DB::table('reservas')->where('fecha_reserva',$ayer)->where('fecha_ingreso','>','07:00:00')->where('fecha_ingreso','<','08:00:00')->count();
        $flujo_salida_7_8 = DB::table('reservas')->where('fecha_reserva',$ayer)->where('fecha_salida','>','07:00:00')->where('fecha_salida','<','08:00:00')->count();
        $flujo_entrada_8_9 = DB::table('reservas')->where('fecha_reserva',$ayer)->where('fecha_ingreso','>','08:00:00')->where('fecha_ingreso','<','09:00:00')->count();
        $flujo_salida_8_9 = DB::table('reservas')->where('fecha_reserva',$ayer)->where('fecha_salida','>','08:00:00')->where('fecha_salida','<','09:00:00')->count();
        $flujo_entrada_9_10 = DB::table('reservas')->where('fecha_reserva',$ayer)->where('fecha_ingreso','>','09:00:00')->where('fecha_ingreso','<','10:00:00')->count();
        $flujo_salida_9_10 = DB::table('reservas')->where('fecha_reserva',$ayer)->where('fecha_salida','>','09:00:00')->where('fecha_salida','<','10:00:00')->count();
        $flujo_entrada_10_11 = DB::table('reservas')->where('fecha_reserva',$ayer)->where('fecha_ingreso','>','10:00:00')->where('fecha_ingreso','<','11:00:00')->count();
        $flujo_salida_10_11 = DB::table('reservas')->where('fecha_reserva',$ayer)->where('fecha_salida','>','10:00:00')->where('fecha_salida','<','11:00:00')->count();
        $flujo_entrada_11_12 = DB::table('reservas')->where('fecha_reserva',$ayer)->where('fecha_ingreso','>','11:00:00')->where('fecha_ingreso','<','12:00:00')->count();
        $flujo_salida_11_12 = DB::table('reservas')->where('fecha_reserva',$ayer)->where('fecha_salida','>','11:00:00')->where('fecha_salida','<','12:00:00')->count();
        $flujo_entrada_12_13 = DB::table('reservas')->where('fecha_reserva',$ayer)->where('fecha_ingreso','>','12:00:00')->where('fecha_ingreso','<','13:00:00')->count();
        $flujo_salida_12_13 = DB::table('reservas')->where('fecha_reserva',$ayer)->where('fecha_salida','>','12:00:00')->where('fecha_salida','<','13:00:00')->count();
        $flujo_entrada_13_14 = DB::table('reservas')->where('fecha_reserva',$ayer)->where('fecha_ingreso','>','13:00:00')->where('fecha_ingreso','<','14:00:00')->count();
        $flujo_salida_13_14 = DB::table('reservas')->where('fecha_reserva',$ayer)->where('fecha_salida','>','13:00:00')->where('fecha_salida','<','14:00:00')->count();
        $flujo_entrada_14_15 = DB::table('reservas')->where('fecha_reserva',$ayer)->where('fecha_ingreso','>','14:00:00')->where('fecha_ingreso','<','15:00:00')->count();
        $flujo_salida_14_15 = DB::table('reservas')->where('fecha_reserva',$ayer)->where('fecha_salida','>','14:00:00')->where('fecha_salida','<','15:00:00')->count();
        $flujo_entrada_15_16 = DB::table('reservas')->where('fecha_reserva',$ayer)->where('fecha_ingreso','>','15:00:00')->where('fecha_ingreso','<','16:00:00')->count();
        $flujo_salida_15_16 = DB::table('reservas')->where('fecha_reserva',$ayer)->where('fecha_salida','>','15:00:00')->where('fecha_salida','<','16:00:00')->count();
        $flujo_entrada_16_17 = DB::table('reservas')->where('fecha_reserva',$ayer)->where('fecha_ingreso','>','16:00:00')->where('fecha_ingreso','<','17:00:00')->count();
        $flujo_salida_16_17 = DB::table('reservas')->where('fecha_reserva',$ayer)->where('fecha_salida','>','16:00:00')->where('fecha_salida','<','17:00:00')->count();
        $flujo_entrada_17_18 = DB::table('reservas')->where('fecha_reserva',$ayer)->where('fecha_ingreso','>','17:00:00')->where('fecha_ingreso','<','18:00:00')->count();
        $flujo_salida_17_18 = DB::table('reservas')->where('fecha_reserva',$ayer)->where('fecha_salida','>','17:00:00')->where('fecha_salida','<','18:00:00')->count();
        $flujo_entrada_18_19 = DB::table('reservas')->where('fecha_reserva',$ayer)->where('fecha_ingreso','>','18:00:00')->where('fecha_ingreso','<','19:00:00')->count();
        $flujo_salida_18_19 = DB::table('reservas')->where('fecha_reserva',$ayer)->where('fecha_salida','>','18:00:00')->where('fecha_salida','<','19:00:00')->count();
        $flujo_entrada_19_20 = DB::table('reservas')->where('fecha_reserva',$ayer)->where('fecha_ingreso','>','19:00:00')->where('fecha_ingreso','<','20:00:00')->count();
        $flujo_salida_19_20 = DB::table('reservas')->where('fecha_reserva',$ayer)->where('fecha_salida','>','19:00:00')->where('fecha_salida','<','20:00:00')->count();
        $flujo_entrada_20_21 = DB::table('reservas')->where('fecha_reserva',$ayer)->where('fecha_ingreso','>','20:00:00')->where('fecha_ingreso','<','21:00:00')->count();
        $flujo_salida_20_21 = DB::table('reservas')->where('fecha_reserva',$ayer)->where('fecha_salida','>','20:00:00')->where('fecha_salida','<','21:00:00')->count();
        $flujo_entrada_21_22 = DB::table('reservas')->where('fecha_reserva',$ayer)->where('fecha_ingreso','>','21:00:00')->where('fecha_ingreso','<','22:00:00')->count();
        $flujo_salida_21_22 = DB::table('reservas')->where('fecha_reserva',$ayer)->where('fecha_salida','>','21:00:00')->where('fecha_salida','<','22:00:00')->count();

        $numero_espacios_totales = DB::table('espacios')->count();
        $numero_espacios_disponibles_7_8 = $numero_espacios_totales - ($flujo_entrada_7_8 - $flujo_salida_7_8);       
        $numero_espacios_disponibles_8_9 = $numero_espacios_disponibles_7_8 - ($flujo_entrada_8_9 - $flujo_salida_8_9);        
        $numero_espacios_disponibles_9_10 = $numero_espacios_disponibles_8_9 - ($flujo_entrada_9_10 - $flujo_salida_9_10);        
        $numero_espacios_disponibles_10_11 = $numero_espacios_disponibles_9_10 - ($flujo_entrada_10_11 - $flujo_salida_10_11);        
        $numero_espacios_disponibles_11_12 = $numero_espacios_disponibles_10_11 - ($flujo_entrada_11_12 - $flujo_salida_11_12);    
        $numero_espacios_disponibles_12_13 = $numero_espacios_disponibles_11_12 - ($flujo_entrada_12_13 - $flujo_salida_12_13);        
        $numero_espacios_disponibles_13_14 = $numero_espacios_disponibles_12_13 - ($flujo_entrada_13_14 - $flujo_salida_13_14);       
        $numero_espacios_disponibles_14_15 = $numero_espacios_disponibles_13_14 - ($flujo_entrada_14_15 - $flujo_salida_14_15);        
        $numero_espacios_disponibles_15_16 = $numero_espacios_disponibles_14_15 - ($flujo_entrada_15_16 - $flujo_salida_15_16);        
        $numero_espacios_disponibles_16_17 = $numero_espacios_disponibles_15_16 - ($flujo_entrada_16_17 - $flujo_salida_16_17);        
        $numero_espacios_disponibles_17_18 = $numero_espacios_disponibles_16_17 - ($flujo_entrada_17_18 - $flujo_salida_17_18);        
        $numero_espacios_disponibles_18_19 = $numero_espacios_disponibles_17_18 - ($flujo_entrada_18_19 - $flujo_salida_18_19);       
        $numero_espacios_disponibles_19_20 = $numero_espacios_disponibles_18_19 - ($flujo_entrada_19_20 - $flujo_salida_19_20);       
        $numero_espacios_disponibles_20_21 = $numero_espacios_disponibles_19_20 - ($flujo_entrada_20_21 - $flujo_salida_20_21);      
        $numero_espacios_disponibles_21_22 = $numero_espacios_disponibles_20_21 - ($flujo_entrada_21_22 - $flujo_salida_21_22);
        
        
        
        /* Graficas extras */
        $groupby_fecha_nreservas = DB::table('reservas')->select('fecha_reserva',DB::raw('count(idreserva) as totalreservas'))->groupByRaw('fecha_reserva')->get();
        $groupby_espacio_nreservas = DB::table('reservas')->join('espacios', 'reservas.idespacio', '=', 'espacios.idespacio')
        ->select('nomespacio',DB::raw('count(nomespacio) as totalreservas'))->groupByRaw('nomespacio')->take(5)->get();

        $groupby_usuarios_nreservas = DB::table('reservas')->join('users','reservas.idusuario','=','users.id')
        ->select(DB::raw("CONCAT(name,' ',lastname) as nombrecompleto"),DB::raw('count(idusuario) as totalreservas'))->groupByRaw('nombrecompleto, idusuario')
        ->orderByRaw('totalreservas DESC')->take(5)->get();

        return view('admin.indicadores')->with('graficas_fecha_nreservas',$groupby_fecha_nreservas)
        ->with('graficas_espacio_nreservas',$groupby_espacio_nreservas)->with('graficas_usuario_nreservas',$groupby_usuarios_nreservas)->with('flujo_entrada_7_8',$flujo_entrada_7_8)->with('flujo_salida_7_8',$flujo_salida_7_8)
        ->with('flujo_entrada_8_9',$flujo_entrada_8_9)->with('flujo_salida_8_9',$flujo_salida_8_9)->with('flujo_entrada_9_10',$flujo_entrada_9_10)->with('flujo_salida_9_10',$flujo_salida_9_10)->with('flujo_entrada_10_11',$flujo_entrada_10_11)
        ->with('flujo_salida_10_11',$flujo_salida_10_11)->with('flujo_entrada_11_12',$flujo_entrada_11_12)->with('flujo_salida_11_12',$flujo_salida_11_12)->with('flujo_entrada_12_13',$flujo_entrada_12_13)->with('flujo_salida_12_13',$flujo_salida_12_13)
        ->with('flujo_entrada_13_14',$flujo_entrada_13_14)->with('flujo_salida_13_14',$flujo_salida_13_14)->with('flujo_entrada_14_15',$flujo_entrada_14_15)->with('flujo_salida_14_15',$flujo_salida_14_15)
        ->with('flujo_entrada_15_16',$flujo_entrada_15_16)->with('flujo_salida_15_16',$flujo_salida_15_16)->with('flujo_entrada_16_17',$flujo_entrada_16_17)->with('flujo_salida_16_17',$flujo_salida_16_17)
        ->with('flujo_entrada_17_18',$flujo_entrada_17_18)->with('flujo_salida_17_18',$flujo_salida_17_18)->with('flujo_entrada_18_19',$flujo_entrada_18_19)->with('flujo_salida_18_19',$flujo_salida_18_19)
        ->with('flujo_entrada_19_20',$flujo_entrada_19_20)->with('flujo_salida_19_20',$flujo_salida_19_20)->with('flujo_entrada_20_21',$flujo_entrada_20_21)->with('flujo_salida_20_21',$flujo_salida_20_21)
        ->with('flujo_entrada_21_22',$flujo_entrada_21_22)->with('flujo_salida_21_22',$flujo_salida_21_22)->with('ayer',$ayer)
        ->with('numero_espacios_disponibles_7_8',$numero_espacios_disponibles_7_8)->with('numero_espacios_disponibles_8_9',$numero_espacios_disponibles_8_9)
        ->with('numero_espacios_disponibles_9_10',$numero_espacios_disponibles_9_10)->with('numero_espacios_disponibles_10_11',$numero_espacios_disponibles_10_11)
        ->with('numero_espacios_disponibles_11_12',$numero_espacios_disponibles_11_12)->with('numero_espacios_disponibles_12_13',$numero_espacios_disponibles_12_13)
        ->with('numero_espacios_disponibles_13_14',$numero_espacios_disponibles_13_14)->with('numero_espacios_disponibles_14_15',$numero_espacios_disponibles_14_15)
        ->with('numero_espacios_disponibles_15_16',$numero_espacios_disponibles_15_16)->with('numero_espacios_disponibles_16_17',$numero_espacios_disponibles_16_17)
        ->with('numero_espacios_disponibles_17_18',$numero_espacios_disponibles_17_18)->with('numero_espacios_disponibles_18_19',$numero_espacios_disponibles_18_19)
        ->with('numero_espacios_disponibles_19_20',$numero_espacios_disponibles_19_20)->with('numero_espacios_disponibles_20_21',$numero_espacios_disponibles_20_21)
        ->with('numero_espacios_disponibles_21_22',$numero_espacios_disponibles_21_22);
    }
}
