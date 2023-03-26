@extends('layouts.master')
@section('content-nav')
    @if(Auth::user()->role=="1")
        <li class="nav-item mb-3 mx-auto">
            <a class="" href="/user/perfil"><img src="{{ URL::asset('static/img/usuarios/'.Auth::user()->img.'')}}" alt="" class="user-avatar-lg rounded-circle"></a>
        </li>
        <li class="nav-item mb-3 mx-auto">
            <h4 style="color:#fff; font-weight:bold;">{{Auth::user()->name}} {{Auth::user()->lastname}}</h4>
        </li>
        <li class="nav-item mb-5 mx-auto">
            <p style="color:#fff; font-weight: italic;">Usuario</p>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="/user" ><i class="fa fa-fw fa-user-circle mr-3"></i>Inicio <span class="badge badge-success">6</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/user/misvehiculos" ><i class="fa fa-fw fa-car mr-3"></i>Mis vehiculos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="" style="background: rgba(182, 119, 23 ,1); border-radius:10px;" ><i class="fa fa-fw fa-clipboard mr-3"></i>Mis reservas</a>
        </li>

        <!-- <li class="nav-item">
            <a class="nav-link" href="/user/reservas" ><i class="fa fa-fw fa-rocket"></i>Reservar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/user/historial"><i class="fas fa-fw fa-chart-pie"></i>Historial</a>                             
        </li> -->
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
                        <li class="breadcrumb-item active" aria-current="page">Mis reservas</li>
                    </ol>
                    </nav>
                </div>
            </div>
        </div>
</div>
<div class="row">
    <table class="table">
        <thead class="thead">
            <tr>
                <th>Vehículo</th>
                <th>Espacio</th>
                <th>Fecha</th>
                <th>Hora de ingreso</th>
                <th>Hora de salida</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mis_reservas as $mireserva)
            <tr>
                <td>{{$mireserva->placa_veh}} {{$mireserva->marca_veh}} {{$mireserva->color_veh}} </td>
                <td>{{$mireserva->nomespacio}}</td>
                <td>{{$mireserva->fecha_reserva}}</td>
                <td>{{$mireserva->fecha_ingreso}}</td>
                <td>{{$mireserva->fecha_salida}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop