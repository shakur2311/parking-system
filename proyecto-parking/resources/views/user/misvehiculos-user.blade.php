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
            <a class="nav-link" href="/user"><i class="fa fa-fw fa-user-circle mr-3"></i>Inicio <span class="badge badge-success">6</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="" style="background: rgba(182, 119, 23 ,1); border-radius:10px;"><i class="fa fa-fw fa-car mr-3"></i>Mis vehiculos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/user/misreservas" ><i class="fa fa-fw fa-clipboard mr-3"></i>Mis reservas</a>
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
                        <li class="breadcrumb-item active" aria-current="page">Mis Vehiculos</li>
                    </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!--modal-insert-->
        <div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="insertModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="insertModalLabel">Agregar vehículo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form method="POST" action="" id="FormularioAdd" onSubmit="" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                <div class="mb-3">
                    <label for="placa_veh" class="form-label">Placa del vehículo</label>
                    <input type="text" class="form-control" name="placa_veh" id="placa_veh" required>
                </div>
                
                <div class="mb-3">
                    <label for="marca_veh" class="form-label">Marca del vehículo</label>
                    <input type="text" class="form-control" name="marca_veh" id="marca_veh" required>
                </div>
                <div class="mb-3">
                    <label for="color_veh" class="form-label">Color del vehículo</label>
                    <input type="text" class="form-control" name="color_veh" id="color_veh" required>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Imagen del vehículo</label>
                    <input class="form-control" type="file" id="img_veh" name="img_veh" required>
                </div>
               
                

                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" style="background: #1167b1;">Agregar vehículo</button>
                </div>
                </form>
            </div>
            </div>
        </div>
        <!----finish-modal-insert----->
        <div class="row mb-3">
            <div class="col-auto">
                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#insertModal" style="background: #1167b1;"><i class="fas fa-plus"></i></button>
                <a href="/user/misvehiculos"><button type="button" class="btn btn-primary mb-2" style="background: #1167b1;"><i class="fas fa-sync-alt"></i></button></a>
            </div>
        </div>
        @foreach($misvehiculos as $mivehiculo)
            
            <div class="col-md-3">
                <div class="card" style="height:400px;">
                    <div class="img" style="position:relative; height:350px;">
                        <img class="card-img-top" src="{{ URL::asset('static/img/vehiculos/'.$mivehiculo->img_veh.'')}}" alt="imagen-vehiculo" style="height:100%; position:absolute;">
                    </div>
                    
                    <div class="card-body">
                        <h5 class="card-title">{{$loop->iteration}} - {{$mivehiculo->placa_veh}}</h5>
                        <p class="card-text">{{$mivehiculo->marca_veh}} {{$mivehiculo->color_veh}}  </p>
                        
                    </div>
                </div>
            </div>
            
        @endforeach
    </div>
@stop  