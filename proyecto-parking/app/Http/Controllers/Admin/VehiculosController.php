<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vehiculo;
use App\Exports\VehiculosExport;
use PDF;
use Excel;
use App;


class VehiculosController extends Controller
{
    public function __Construct(){
        $this->middleware('auth');
        $this->middleware('isadmin');
    }
    public function index(){

        
        $vehiculos = DB::table('vehiculos')->get();
        
        $nombrepropietarios = [];
        for($i=0;$i<count($vehiculos);$i++){
            $nombrepropietarios = DB::table('users')->select('name','lastname')->where('id',$vehiculos[$i]->propietario_veh)->get();
            $nombrepropietarios_completo = $nombrepropietarios[0]->name. ' ' .$nombrepropietarios[0]->lastname;
            $vehiculos[$i]->nombrepropietarios_completo = $nombrepropietarios_completo;
            
                  
        }
       
        $usuarios = DB::table('users')->select('id','name','lastname')->where('role',1)->get();
        return view('admin.vehiculos')->with('vehiculos', $vehiculos)->with('usuarios', $usuarios);
    }
    public function postVehiculo(Request $request){
        
        
        $vehiculo = new Vehiculo;
        $vehiculo->placa_veh = e($request->input('placa_veh'));
        $propietario_veh = e($request->input('propietario_veh'));
        $usuarioid = DB::table('users')->select('id')->where(DB::raw("CONCAT(`name`, ' ', `lastname`)"),'like','%'.$propietario_veh.'%')->get();
        $vehiculo->propietario_veh = $usuarioid[0]->id;    
        $vehiculo->marca_veh = e($request->input('marca_veh'));
        $vehiculo->color_veh = e($request->input('color_veh'));
        
        if($request->hasFile('img_veh')):
            $vehiculo_imagen = $request->file('img_veh');
            $nombre_vehiculo_imagen = time(). '.' .$vehiculo_imagen->getClientOriginalExtension();
            $vehiculo_imagen->move(public_path('static/img/vehiculos'),$nombre_vehiculo_imagen);
            $vehiculo->img_veh = $nombre_vehiculo_imagen;
        endif;
       
        if($vehiculo->save()):
            return back()->with('message1','Se ha registrado el vehiculo correctamente');
        endif;

    }
   
    public function buscarVehiculo(Request $request){

        
        $usuarios = DB::table('users')->select('users.name','users.lastname')->where('role',1)->get();
        $vehiculos2= DB::table('vehiculos')->where('placa_veh','like',$request->texto.'%')->get();
        
        return view('admin.tablabuscarvehiculos')->with('vehiculos2', $vehiculos2)->with('usuarios', $usuarios);
    }
    public function abrirEditarVehiculo(Request $request){
        
        $infovehiculoeditar = DB::table('vehiculos')->join('users','vehiculos.propietario_veh','=','users.id')
        ->where('vehiculos.id_veh',$request->idvehiculoeditar)->get();
        
        return response()->json(
            [
                'datos' => $infovehiculoeditar[0]
            ]
        );
        
    }
    public function postEditVehiculo(Request $request){
        $id_veh_editar = $request->input('id_veh_editar');
        $placa_veh_editar = e($request->input('placa_veh_editar'));
        $marca_veh_editar = e($request->input('marca_veh_editar'));
        $color_veh_editar = e($request->input('color_veh_editar'));
        
        
        
        $vehiculo = Vehiculo::find($id_veh_editar);
        $vehiculo->placa_veh = $placa_veh_editar;
        $vehiculo->marca_veh = $marca_veh_editar;
        $vehiculo->color_veh = $color_veh_editar;
        if($request->hasFile('img_veh_editar')){
            $vehiculo_imagen = $request->file('img_veh_editar');
            $nombre_vehiculo_imagen = time(). '.' .$vehiculo_imagen->getClientOriginalExtension();
            $vehiculo_imagen->move(public_path('static/img/vehiculos'),$nombre_vehiculo_imagen);
            $vehiculo->img_veh = $nombre_vehiculo_imagen;
        }
        $vehiculo->save();
        if($vehiculo->save() ):
            return back()->with('message7','Se ha editado el vehiculo correctamente');
        endif;

    }
    public function exportarPDFvehiculos(){
        
        $vehiculos = DB::table('vehiculos')->join('users','vehiculos.propietario_veh','=','users.id')->get();
        $data = compact('vehiculos');
        $pdf = PDF::loadView('admin.tablavehiculos',$data);
        return $pdf->stream();
        
    }
    public function exportarExcelvehiculos(){
        return Excel::download(new VehiculosExport, 'vehiculos.xlsx');
    }
    
}
