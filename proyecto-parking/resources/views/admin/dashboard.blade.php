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
            <a class="nav-link" href="" style="background: rgba(182, 119, 23 ,1); border-radius:10px;"><i class="fa fa-fw fa-home mr-3" ></i>Inicio <span class="badge badge-success"></span></a>
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
            <a class="nav-link" href="/admin/reservas"><i class="fas fa-fw fa-box mr-3"></i>Registros de reservas</a>                             
        </li>
        <li class="nav-item" style="bottom:0px;">
            <a class="nav-link" href="/logout"><i class="fas fa-power-off mr-3"></i>Cerrar Sesión</a>                           
        </li>
        
    @endif
@stop
@section('content')
<!--modal-insert--reservamodal-->
<div class="modal fade" id="reservaModal" tabindex="-1" role="dialog" aria-labelledby="insertModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="row">
                <div class="col-md-4" id="contenedor-texto-vertical">
                    <h1 id="texto-vertical"></h1>
                </div>
                <div class="col-md-8">
                    <div class="modal-header">
                        <h5 class="modal-title" id="insertModalLabel">Reservar Espacio: <span id="espacioReserva"></span> </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="admin/reservar" id="" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nomespacio" class="form-label">Espacio</label>
                            <input type="text" id="nomespacio" name="nomespacio" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="propietario_veh" class="form-label">Propietario del vehiculo</label>
                            <select id="propietario_veh" name="propietario_veh" class="form-control" onchange="getVehiculosdePropietario()" required>
                            @foreach($usuarios as $usuario)
                                <option>{{$usuario->name}} {{$usuario->lastname}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="veh" class="form-label">Vehiculo</label>
                    
                            <select id="veh" name="veh" class="form-control" required>
                                
                            </select>                                                
                        </div>
                        

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-dismiss="modal" style="background: #96240D; color:#fff;">Cerrar</button>
                        <button type="submit" class="btn" style="background: rgb(9,7,57); color:#fff;">Reservar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
  </div>
  <!--  -->
  <!--modal-insert--limpiarreservamodal-->
    <div class="modal fade"  id="limpiarreservaModal" tabindex="-1" role="dialog" aria-labelledby="insertModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="row">
                <div class="col-md-4 " id="contenedor-texto-vertical">
                    <h1 id="texto-vertical2"></h1>
                </div>
                <div class="col-md-8">
                    <div class="modal-header">
                        <h5 class="modal-title" id="insertModalLabel">Liberar espacio <span id="espacioReserva2"></span> </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" id="">
                    @csrf
                    <div class="modal-body">
                        <div class="form-row ">
                            <div class="form-group col-md-4">
                                <label for="espacioOcupado" class="form-label">Espacio</label>
                                <input type="text" id="espacioOcupado" name="espacioOcupado" class="form-control" readonly>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="propietarioOcupado" class="form-label">Propietario</label>
                                <input type="text" id="propietarioOcupado" name="propietarioOcupado" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="vehiculoocupado" class="form-label">Vehiculo</label>
                            <input type="text" id="vehiculoOcupado" name="vehiculoOcupado" class="form-control" readonly>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="fecha_ingresoOcupado" class="form-label">Fecha de ingreso</label>
                                <input type="text" id="fecha_ingresoOcupado" name="fecha_ingresoOcupado" class="form-control" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="hora_ingresoOcupado" class="form-label">Hora de ingreso</label>
                                <input type="text" id="hora_ingresoOcupado" name="hora_ingresoOcupado" class="form-control" readonly>
                            </div>
                        </div>
                        

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" formaction="/admin/exportarPDFvoucherreserva" target="_blank">Imprimir ticket</button>
                        <button type="button" class="btn" data-dismiss="modal" style="background: #96240D; color:#fff;">Cerrar</button>
                        <button type="submit" class="btn" style="background: rgb(9,7,57); color:#fff;" formaction="/admin/liberar">Liberar espacio</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
  <!--  -->
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Bienvenido {{Auth::user()->name}}!</h2>
            <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Menu</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Inicio</li>
                </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
    <h2>Dashboard</h2>
    
    <div class="row">
        <div class="col-md-3">
            <div class="card carta-1" style="background:#B67717 ; border-radius:15px;">
                <div class="card-body">
                    <h5 class="d-flex justify-content-center" style="color:#fff;font-weight:bold;">Número de espacios disponibles</h5>
                    <div class="metric-value d-flex justify-content-center">
                        <h1 class="mb-1" style="color:#fff; font-weight:bold;">{{ $conteo_espacios_disponibles }}</h1>
                    </div>
        
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card carta-2" style="background: #B67717; border-radius:15px;">
                <div class="card-body">
                    <h5 class="d-flex justify-content-center" style="color:#fff; font-weight:bold;">Número de vehiculos registrados</h5>
                    <div class="metric-value d-flex justify-content-center">
                        <h1 class="mb-1" style="color:#fff; font-weight:bold;">{{ $conteo_vehiculos }}</h1>
                    </div>
    
                </div>
            </div>
        </div>
        <div class="col-md-3">
             <div class="card carta-3" style="background:#B67717 ; border-radius:15px;">
                <div class="card-body">
                    <h5 class="d-flex justify-content-center" style="color:#fff; font-weight:bold;">Número de usuarios registrados</h5>
                    <div class="metric-value d-flex justify-content-center">
                        <h1 class="mb-1" style="color:#fff; font-weight:bold;">{{ $conteo_usuarios }}</h1>
                    </div>
                </div>
                    
            </div>
        </div>
            <div class="col-md-3">
                <div class="card carta-4" style="background:#B67717 ; border-radius:15px;">
                    <div class="card-body">
                        <h5 class="d-flex justify-content-center" style="color:#fff; font-weight:bold;">Número de reservas registradas</h5>
                        <div class="metric-value d-flex justify-content-center">
                            <h1 class="mb-1" style="color:#fff; font-weight:bold;">{{ $conteo_reservas }}</h1>
                        </div>

                    </div>
                
                </div>
        </div>
        
    </div>
    <div class="row map-total-container">
        <div class="row mb-5">
            <div class="col-md-3 mb-3">
                <button type="button" class="btn" style="background: rgb(9,7,57); color:#fff;" onclick="mostrargeneral()">General</button>
            </div>
            <div class="col-md-6 mb-3">
            <select class="form-select" aria-label="Default select example" id="seccionselector" onchange="cambioselector()">
                <option selected>Elige una sección</option>
                <option value="Sección A">Sección A</option>
                <option value="Sección B">Sección B</option>
                <option value="Sección C">Sección C</option>
                <option value="Sección D">Sección D</option>
            </select>

            </div>

        </div>
        <div class="row">
            <h2>Espacios</h2>
        </div>
        <div class="row">
            @foreach($espacios as $espacio)
            <div class="col-md-2"><a id="espacio" type="button" onclick="{{ ($espacio->estado==0 ? 'abrirReservarEspacio(this)' : 'abrirConcluirReservarEspacio(this)') }}" class="espacio" value="{{$espacio->nomespacio}}"  data-toggle="modal" data-target="{{ ($espacio->estado==0 ? '#reservaModal' : '#limpiarreservaModal') }}"><span class="fa-layers fa-fw" style="font-size:5em;"><i class="fas fa-car" style="{{  ($espacio->estado == 1 ? 'color:#96240D;' : 'color:#094E1E;') }}"></i><span id="espaciotext" value="{{$espacio->nomespacio}}" class="fa-layers-text fa-inverse" data-fa-transform="shrink-8 down-3" style="font-size:0.5em;font-weight:900">{{$espacio->nomespacio}}</span></span></a></div>
            @endforeach
        </div>
        
    </div>    
        
                 
    <div class="row mt-5">
        <div class="parking-box shadow p-3 mb-5 bg-white rounded" style="{position:relative;}">
            <img src="{{ URL::asset('static/img/mapa_completo.png') }}" class="mapacompleto" id="mapacompleto"></img> 
            <img src="{{ URL::asset('static/img/sector_a.png') }}" style="{position:relative;}" class="secciona" id="secciona" alt="Workplace" usemap="#secciona"></img>     
            <img src="{{ URL::asset('static/img/sector_b.png') }}" class="seccionb" id="seccionb"></img>               
            <img src="{{ URL::asset('static/img/sector_c.png') }}" class="seccionc" id="seccionc"></img>             
            <img src="{{ URL::asset('static/img/sector_d.png') }}" class="secciond" id="secciond"></img>
            <div id="rectangle" style="{width:200px;height:100px;background:blue; position:absolute; top:30px; right:30px;}"></div>
                           
        </div>    
    </div>  
    
    
         
@stop

