<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB, Auth;
use App\Models\Vehiculo;


class MisvehiculosController extends Controller
{
    public function __Construct(){
        $this->middleware('auth');
        
    }
    public function index(){
        $misvehiculos = DB::table('vehiculos')->where('propietario_veh',Auth::user()->id)->get();
        return view('user.misvehiculos-user')->with('misvehiculos',$misvehiculos);
    }
    public function postMivehiculo(Request $request){
        $vehiculo = new Vehiculo;
        /* Obtengo el file de imagen desde em form y le asigno un nombre_vehiculo_imagen con extension de la imagen, luego movemos la 
        imagen a una ruta dentro de public/static/img/vehiculos con el nombre de nombre_vehiculo_imagen */
        
       
        $vehiculo->placa_veh = e($request->input('placa_veh'));
        $vehiculo->marca_veh = e($request->input('marca_veh'));
        $vehiculo->propietario_veh = Auth::user()->id;        
        $vehiculo->color_veh = e($request->input('color_veh'));
        if($request->hasFile('img_veh')):
            $vehiculo_imagen = $request->file('img_veh');
            $nombre_vehiculo_imagen = time(). '.' .$vehiculo_imagen->getClientOriginalExtension();
            $vehiculo_imagen->storeAs('public/static/img/vehiculos',$nombre_vehiculo_imagen);
            $vehiculo->img_veh = $nombre_vehiculo_imagen;
        endif;
       
        if($vehiculo->save()):
            return back()->with('message3','Se ha registrado el vehiculo correctamente');
        endif;

    }
}
