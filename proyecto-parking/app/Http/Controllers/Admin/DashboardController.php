<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Reserva;
use App\Models\Espacio;
use Illuminate\Support\Collection;
use DateTime;
use DateTimeZone;
use PDF;
use Excel;
use App;
use Carbon\Carbon;


class DashboardController extends Controller
{
    public function __Construct(){
        $this->middleware('auth');
        $this->middleware('isadmin');
    }
    public function index(){
        $usuariosocupados = [];
        $usuariosreservaspendientes = DB::table('users')->join('reservas','users.id','=','reservas.idusuario')->where('reservas.estado',1)->distinct()->get();
        
        foreach($usuariosreservaspendientes as $usuarioreservapendiente){
            array_push($usuariosocupados,$usuarioreservapendiente->id);
        }
      
        $usuarios = DB::table('users')->select('users.name','users.lastname')->where('role',1)->whereNotIn('users.id',$usuariosocupados)->distinct()->get();
        
        $conteo_espacios_disponibles = DB::table('espacios')->where('estado','0')->count();
        $conteo_vehiculos = DB::table('vehiculos')->count();
        $conteo_usuarios = DB::table('users')->count();
        $conteo_reservas = DB::table('reservas')->count();
        $espacios=DB::table('espacios')->get();
        
        
        return view('admin.dashboard')->with('conteo_vehiculos',
        $conteo_vehiculos)->with('conteo_usuarios',$conteo_usuarios)->with('conteo_reservas',$conteo_reservas)
        ->with('conteo_espacios_disponibles', $conteo_espacios_disponibles)
        ->with('espacios',$espacios)->with('usuarios',$usuarios);
    }
    public function getVehiculosdePropietario(Request $request){
        

        $propietario = DB::table('users')->select('id')->where(DB::raw("CONCAT(`name`, ' ' ,`lastname`)"),'like','%'.e($request->propietario).'%')->get();
        
        $vehiculosdepropietario = DB::table('vehiculos')->select('placa_veh','marca_veh','color_veh')->where('propietario_veh',$propietario[0]->id)->get();
        return response()->json(
            [
                'datos' => $vehiculosdepropietario,
                'success' => true
            ]
            );
            
    }
    public function postReserva(Request $request){
        $reserva = new Reserva;
        /* Obtenemos el input del veh, lo separamos en un array y busco el id con esos datos para guardarlo en la reserva */
      
        $idvehiculo = DB::table('vehiculos')->select('id_veh')->where(DB::raw("CONCAT(`placa_veh`, ' ' ,`marca_veh`, ' ' ,`color_veh`)"),'like','%'.e($request->input('veh')).'%')->get();
        $reserva->idvehiculo = $idvehiculo[0]->id_veh;
        /* ---- */
        /* Obtenemos el input del nomespacio como A1 y buscamos el id del espacio para guardarlo en la reserva */
        $idespacio = DB::table('espacios')->select('idespacio')->where('nomespacio',$request->input('nomespacio'))->get();
        $reserva->idespacio = $idespacio[0]->idespacio;
        /* ----- */
        /* Cambiamos el estado del espacio a 1 */
        DB::table('espacios')->where('estado', '0')->where('idespacio',$idespacio[0]->idespacio)->update(array('estado' => '1'));  
        /* ---- */
        /* Obtenemos el input propietario y lo separamos en un array, luego buscamos el idpropietario para guardarlo en la reserva */
        
        $propietario=DB::table('users')->select('id')->where(DB::raw("CONCAT(`name`, ' ', `lastname`)"),'like','%'.e($request->input('propietario_veh')).'%')->get();
        $reserva->idusuario = $propietario[0]->id;
        /* ----- */
        /* Guardo las fechas de reserva, hora de ingreso , hora de salida y el estado */
        $fechaActual=new DateTime();
        $fechaActual->setTimeZone(new DateTimeZone('America/Lima'));
        $reserva->fecha_reserva = $fechaActual->format('Y-m-d');
        
        $city["Name"] = "Lima";
        $city["GMT"] = 6.0;
        $city["actualDST"] = 1.0; //Because it's summer time
        $gmt_diff = $city["GMT"]+$city["actualDST"]; //your functions for getting the hour difference betweer the city and the GMT
        $city_time = time()+($gmt_diff*3600) + 60*60*12; //sum the timestamps
        $reserva->fecha_ingreso = gmdate("H:i:s",$city_time); 
        /* $reserva->fecha_salida = null; */
        $reserva->estado = "1";
        /* ---- */
        /* Creamos el pdf con los datos de la reserva */
        
        
        
        if($reserva->save()):
            return back()->with('message4','Se ha registrado la reserva correctamente');
            
        endif;
        
    }
    public function exportarPDFvoucherreserva(Request $request){
        $data = new Collection;
        $data->espacioOcupado = e($request->input('espacioOcupado'));
        $data->propietarioOcupado = $request->input('propietarioOcupado');
        $data->vehiculoOcupado = $request->input('vehiculoOcupado');
        $data->fecha_ingresoOcupado = $request->input('fecha_ingresoOcupado');
        $data->hora_ingresoOcupado = $request->input('hora_ingresoOcupado');
   
        $datos = compact('data');
        $pdf = PDF::loadView('admin.voucherreserva',$datos);
        
        return $pdf->stream();
    }
    public function postAbrirLiberarReserva(Request $request){
        /* Obtengo el idespacio segun el nomespacio dado */
        $idespacio = DB::table('espacios')->select('idespacio')->where('nomespacio',$request->nomespacio)->get();
        /* -------- */
        /* Obtengo los datos del espacio ocupado */
        $reservas = DB::table('reservas')->select('idusuario','idvehiculo','fecha_reserva','fecha_ingreso')->where('idespacio',$idespacio[0]->idespacio)->where('estado','1')->get();
        $nomusuario = DB::table('users')->select('name','lastname')->where('id',$reservas[0]->idusuario)->get();
        $nomusuariocompleto = $nomusuario[0]->name. ' ' .$nomusuario[0]->lastname;
        $nomvehiculo = DB::table('vehiculos')->select('placa_veh','marca_veh','color_veh')->where('id_veh',$reservas[0]->idvehiculo)->get();
        $nomvehiculocompleto= $nomvehiculo[0]->placa_veh. ' ' .$nomvehiculo[0]->marca_veh. ' ' .$nomvehiculo[0]->color_veh;
        
        return response()->json(
            [
        
                'nomusuariocompleto' => $nomusuariocompleto,
                'nomvehiculocompleto' => $nomvehiculocompleto,
                'fecha_reserva' => $reservas[0]->fecha_reserva,
                'fecha_ingreso' => $reservas[0]->fecha_ingreso,
                
            ]
            );
    }
    public function postLiberarReserva(Request $request){
        $idespacio = DB::table('espacios')->select('idespacio')->where('nomespacio',$request->input('espacioOcupado'))->get();
        
        $idpropietario = DB::table('users')->select('id')->where(DB::raw("CONCAT(`name`, ' ' ,`lastname`)"),'like','%'.e($request->input('propietarioOcupado')))->get();
      
        $idvehiculo = DB::table('vehiculos')->select('id_veh')->where(DB::raw("CONCAT(`placa_veh`, ' ' ,`marca_veh`, ' ' ,`color_veh`)"),'like','%'.e($request->input('vehiculoOcupado')))->get();
        $fecha_reserva = e($request->input('fecha_ingresoOcupado'));
        $hora_ingreso = e($request->input('hora_ingresoOcupado'));
        /* hora actual */
        $city["Name"] = "Lima";
        $city["GMT"] = 6.0;
        $city["actualDST"] = 1.0; //Because it's summer time
        $gmt_diff = $city["GMT"]+$city["actualDST"]; //your functions for getting the hour difference betweer the city and the GMT
        $city_time = time()+($gmt_diff*3600) + 60*60*12; //sum the timestamps
        $hora_salida = gmdate("H:i:s",$city_time);
        /* cambiamos el estado de la reserva a 0 y agregamos hora de salida */
        DB::table('reservas')->where('idespacio',$idespacio[0]->idespacio)->where('idusuario',$idpropietario[0]->id)
        ->where('idvehiculo',$idvehiculo[0]->id_veh)->where('fecha_reserva',$fecha_reserva)->where('fecha_ingreso',$hora_ingreso)
        ->update(array('estado' => '0', 'fecha_salida' => $hora_salida));
        /* -- */
        /* cambiamos el estado del espacio a disponible osea 0 */
        DB::table('espacios')->where('idespacio',$idespacio[0]->idespacio)->where('estado','1')->update(array('estado' => '0'));
        /* ---- */
        return back()->with('message5','Espacio liberado');
    }

}
