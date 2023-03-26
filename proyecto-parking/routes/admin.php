<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\VehiculosController;
use App\Http\Controllers\Admin\UsuariosGestionController;
use App\Http\Controllers\Admin\ReservasController;
use App\Http\Controllers\Admin\IndicadoresController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\User\DashboardUserController;
use App\Http\Controllers\User\MisvehiculosController;
use App\Http\Controllers\User\MisreservasController;



Route::group(['prefix'=>'user','namespace'=>'User','middleware'=>['auth']],function(){
    Route::get('/',[DashboardUserController::class, 'index']);
    Route::get('/perfil',[PerfilController::class, 'index']);
    Route::post('/perfil',[PerfilController::class, 'postEditPerfil']);
    Route::get('/misvehiculos',[MisvehiculosController::class, 'index']);
    Route::post('/EditarFotoPerfil',[PerfilController::class, 'actualizarFotoPerfil']);
    Route::post('/misvehiculos',[MisvehiculosController::class, 'postMivehiculo']);
    Route::get('/misreservas',[MisreservasController::class, 'index']);


});

Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','isadmin']],function(){
    Route::get('/',[DashboardController::class, 'index']);
    Route::post('/reservar',[DashboardController::class, 'postReserva']);
    Route::post('/abrirliberar',[DashboardController::class, 'postAbrirLiberarReserva']);
    Route::post('/liberar',[DashboardController::class, 'postLiberarReserva']);
    Route::post('/propietario',[DashboardController::class, 'getVehiculosdePropietario']);
    Route::get('/vehiculos',[VehiculosController::class, 'index']);
    Route::get('/vehiculos/buscador',[VehiculosController::class, 'buscarVehiculo']);
    Route::post('/vehiculos',[VehiculosController::class,'postVehiculo']);
    Route::post('/abrirEditarVehiculo',[VehiculosController::class,'abrirEditarVehiculo']);
    Route::post('/editarVehiculo',[VehiculosController::class,'postEditVehiculo']);
    Route::post('/eliminarVehiculo',[VehiculosController::class,'postEliminarVehiculo']);
    Route::get('/reservas',[ReservasController::class, 'index']);
    Route::post('/reservas/filtro',[ReservasController::class, 'filtrarReservas']);
    Route::get('/usuarios',[UsuariosGestionController::class, 'index']);
    Route::post('/usuarios',[UsuariosGestionController::class, 'crearUsuario']);
    Route::get('/perfil',[PerfilController::class, 'index']);
    Route::post('/perfil',[PerfilController::class, 'postEditPerfil']);
    Route::post('/EditarFotoPerfil',[PerfilController::class, 'actualizarFotoPerfil']);
    Route::get('/exportarPDFvehiculos',[VehiculosController::class,'exportarPDFvehiculos']);
    Route::get('/exportarExcelvehiculos',[VehiculosController::class,'exportarExcelvehiculos']);
    Route::get('/exportarPDFreservas',[ReservasController::class,'exportarPDFreservas']);
    Route::get('/exportarExcelreservas',[ReservasController::class,'exportarExcelreservas']);
    Route::post('/exportarPDFvoucherreserva',[DashboardController::class,'exportarPDFvoucherreserva']);
    Route::get('/dashboard',[IndicadoresController::class,'index']);

    
    
});