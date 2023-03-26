<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\ReservasExport;
use PDF;
use Excel;
use App;

class ReservasController extends Controller
{
    public function __Construct(){
        $this->middleware('auth');
        $this->middleware('isadmin');

    }
    public function index(){
        $reservas = DB::table('reservas')->get();
        
        
        $reservas2 = [];
        
        for($i=0;$i<count($reservas);$i++){
            $nomespacio = DB::table('espacios')->select('nomespacio')->where('idespacio',$reservas[$i]->idespacio)->get();
            $nomusuario = DB::table('users')->select('name','lastname')->where('id',$reservas[$i]->idusuario)->get();
            $nomusuariocompleto = $nomusuario[0]->name. ' ' .$nomusuario[0]->lastname;
            $nomvehiculo = DB::table('vehiculos')->select('placa_veh','marca_veh','color_veh')->where('id_veh',$reservas[$i]->idvehiculo)->get();
            $nomvehiculocompleto = $nomvehiculo[0]->placa_veh. ' ' .$nomvehiculo[0]->marca_veh. ' ' .$nomvehiculo[0]->color_veh;
            /* Creo una coleccion y lo guardo dentro de array reservas2 para llamarlo con un foreach desde reservas.blade.php */
            $collection = (object) collect(['idreserva' => $reservas[$i]->idreserva,'nomespacio' => $nomespacio[0]->nomespacio, 
            'nomusuario' => $nomusuariocompleto,'nomvehiculo' => $nomvehiculocompleto, 'fecha_reserva' => $reservas[$i]->fecha_reserva,
            'hora_ingreso' => $reservas[$i]->fecha_ingreso,'hora_salida' => $reservas[$i]->fecha_salida,'estado' => $reservas[$i]->estado])->all();
            array_push($reservas2,$collection);
            /* Saco para la lista desplegable, los espacios los usuarios y los estados */
            $nomespacios = DB::table('espacios')->get();
            $nomusuarios = DB::table('users')->select(DB::raw("CONCAT(name,' ',lastname) as nombrecompleto"))->where('role','1')->get();
            
            
            /* -------- */
            
        }
        return view('admin.reservas')->with('reservas',$reservas2)->with('espacios',$nomespacios)->with('usuarios',$nomusuarios);
        
    }
    public function filtrarReservas(Request $request){
        $array_name_lastname = [];
        $estado = null;
        if($request->textofiltrarestado=="Terminado"){
            $estado=0;
        }
        else if($request->textofiltrarestado=="En curso"){
            $estado=1;
        }
        else{
            $estado= null;
        }
        if($request->textofiltrarusuario==null){
            $resultadosFiltrar = DB::table('reservas')->join('espacios','reservas.idespacio','=','espacios.idespacio')->
            join('users','users.id','=','reservas.idusuario')->join('vehiculos','reservas.idvehiculo','=','vehiculos.id_veh')->
            where('espacios.nomespacio','like',$request->textofiltrarespacio.'%')->where('reservas.estado','like',$estado.'%')->orderBy('reservas.idreserva','asc')->select('reservas.idreserva','nomespacio',DB::raw("CONCAT(users.name,' ',users.lastname) as nomusuario"),
            DB::raw("CONCAT(vehiculos.placa_veh,' ',vehiculos.marca_veh,' ',vehiculos.color_veh) as nomvehiculo"),'reservas.fecha_reserva','reservas.fecha_ingreso','reservas.fecha_salida','reservas.estado')->get();
            
        }else{
            
            $array_name_lastname = explode(' ',trim(e($request->textofiltrarusuario)));
            $resultadosFiltrar = DB::table('reservas')->join('espacios','reservas.idespacio','=','espacios.idespacio')->
            join('users','users.id','=','reservas.idusuario')->join('vehiculos','reservas.idvehiculo','=','vehiculos.id_veh')->
            where('espacios.nomespacio','like',$request->textofiltrarespacio.'%')->where('reservas.estado','like',$estado.'%')->where('users.name',$array_name_lastname[0])->
            where('users.lastname',$array_name_lastname[1])->orderBy('reservas.idreserva','asc')->select('reservas.idreserva','nomespacio',DB::raw("CONCAT(users.name,' ',users.lastname) as nomusuario"),
            DB::raw("CONCAT(vehiculos.placa_veh,' ',vehiculos.marca_veh,' ',vehiculos.color_veh) as nomvehiculo"),'reservas.fecha_reserva','reservas.fecha_ingreso','reservas.fecha_salida','reservas.estado')->get();
        }
        
        
       
        return view('admin.tablafiltrarreservas')->with('resultadosFiltrar',$resultadosFiltrar);
        
    }
    public function exportarPDFreservas(){
        $reservas = DB::table('reservas')->join('espacios','reservas.idespacio','=','espacios.idespacio')->
        join('users','users.id','=','reservas.idusuario')->join('vehiculos','reservas.idvehiculo','=','vehiculos.id_veh')->orderBy('reservas.idreserva','asc')->select('reservas.idreserva','nomespacio',DB::raw("CONCAT(users.name,' ',users.lastname) as nomusuario"),
        DB::raw("CONCAT(vehiculos.placa_veh,' ',vehiculos.marca_veh,' ',vehiculos.color_veh) as nomvehiculo"),'reservas.fecha_reserva','reservas.fecha_ingreso','reservas.fecha_salida','reservas.estado')->get();
        
        $data = compact('reservas');
        $pdf = PDF::loadView('admin.tablareservas',$data);
        return $pdf->stream();
    }
    public function exportarExcelreservas(){
        return Excel::download(new ReservasExport, 'reservas.xlsx');
    }
    

}
