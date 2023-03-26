@extends('layouts.master')
@section('content-nav')
    @if(Auth::user()->role=="0")
        <li class="nav-item mb-3 mx-auto">
            <a class="" href="/admin/perfil"><img src="{{ URL::asset('static/img/usuarios/'.Auth::user()->img.'')}}" alt="" class="user-avatar-lg rounded-circle"></a>
        </li>
        <li class="nav-item mb-3 mx-auto">
            <h4 style="color:#fff; font-weight:bold;">{{Auth::user()->name}} {{Auth::user()->lastname}}</h4>
        </li>
        <li class="nav-item mb-5 mx-auto">
            <p style="color:#fff; font-weight: italic;">Administrador</p>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="/"><i class="fa fa-fw fa-user-circle mr-3"></i>Inicio <span class="badge badge-success">6</span></a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="/admin/dashboard"><i class="fas fa-chart-line mr-3"></i>Dashboard <span class="badge badge-success"></span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin/vehiculos" ><i class="fa fa-fw fa-car mr-3"></i>Registros de vehículos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin/usuarios"><i class="fas fa-fw fa-user mr-3"></i>Registros de Usuarios</a>                             
        </li>
        <li class="nav-item">
            <a class="nav-link" href="" style="background: rgba(182, 119, 23 ,1); border-radius:10px;"><i class="fas fa-fw fa-box mr-3"></i>Registros de reservas</a>                             
        </li>
        <li class="nav-item" style="bottom:0px;">
                        <a class="nav-link" href="/logout"><i class="fas fa-power-off mr-3"></i>Cerrar Sesión</a>                           
        </li>

    @endif
@stop
@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Bienvenido {{Auth::user()->name}}!</h2>
            <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Menu</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registros de reservas</li>
                </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<h2>Registro de reservas</h2>
<div class="row mb-3">
    <!-- <div class="col-md-2">
        <select class="form-select mb-2" id="filtrarporespacio"  aria-label="Default select example" id="seccionselector"  >
            <option selected value=" ">Todos los espacios</option>
        
            @foreach($espacios as $espacio):
                <option value="{{$espacio->nomespacio}}">{{$espacio->nomespacio}} </option>
        
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <select class="form-select mb-2" id="filtrarporusuario"  aria-label="Default select example" id="usuarioselector" >
            <option selected value=" ">Todos los usuarios</option>
        
            @foreach($usuarios as $usuario):
                <option value="{{$usuario->nombrecompleto}}">{{$usuario->nombrecompleto}} </option>
        
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <select class="form-select mb-2" id="filtrarporestado" aria-label="Default select example" id="estadoselector" >
            <option selected value=" ">Todos los estados</option>
        
           
                <option value="En curso">En curso</option>
                <option value="Terminado">Terminado</option>
        
            
        </select>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn" onclick="filtrarReservas()" style="background:#771C09; color:#fff;">Buscar</button>
        <button type="button" class="btn" onclick="filtrarReservasTodos()" style="background:#052F12; color:#fff">Todos</button>
    </div> -->
    <div class="col-md-3">
        <h3>Exportar en:</h3>
        <a href="/admin/exportarPDFreservas" title="PDF" target="_blank"><i class="fas fa-file-pdf" style="color:#96240D; font-size:3em" alt="PDF"></i></a>
        <a href="/admin/exportarExcelreservas" title="Excel"><i class="fas fa-file-excel" style="color:#094E1E; font-size:3em"></i></a>
    
    </div>
   
    
</div>
<div id="bloque2">
    <table class="table table-striped display responsive nowrap" style="100%;" class="tableReservas" id="tableReservas">
    <thead>
        <tr>
        <th scope="col">id</th>
        <th scope="col">Espacio</th>
        <th scope="col">Usuario</th>
        <th scope="col">Vehiculo</th>
        <th scope="col">fecha de reserva</th>
        <th scope="col">Hora de ingreso</th>
        <th scope="col">Hora de salida</th>
        <th scope="col">Estado</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reservas as $reserva) 
            <tr>
            <th scope="row">{{ $reserva->idreserva }}</th>
            
            <td>{{ $reserva->nomespacio }}</td>
            <td>{{ $reserva->nomusuario }}</td>
            <td>{{ $reserva->nomvehiculo }}</td>
            <td>{{ $reserva->fecha_reserva }}</td>
            <td>{{ $reserva->hora_ingreso }}</td>
            <td>{{ $reserva->hora_salida }}</td>
            @if($reserva->estado=='1')
                <td><p style="padding:10px; background-color:#052F12; width:100px; color:#fff; text-align:center; border-radius:5px;">En curso</p></td>
            @else
                <td><p style="padding:10px; background-color:#771C09; width:100px; color:#fff; text-align:center; border-radius:5px;">Terminado</p></td>
            @endif
            
        
            </tr>
        @endforeach
        
        
    </tbody>
    </table>  
</div> 

@stop
@section('scripts')
$(document).ready(function () {
        $('#tableReservas').DataTable()({
          responsive: true
        });
        
        });
@stop