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
        <li class="nav-item">
            <a class="nav-link" href="/user" style="background: rgba(182, 119, 23 ,1); border-radius:10px;"><i class="fa fa-fw fa-user-circle mr-3"></i>Inicio <span class="badge badge-success">6</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/user/misvehiculos" ><i class="fa fa-fw fa-car mr-3"></i>Mis vehiculos</a>
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
                        <li class="breadcrumb-item active" aria-current="page">Inicio</li>
                    </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="d-flex justify-content-center">Espacios disponibles</h5>
                            <div class="metric-value d-flex justify-content-center">
                                <h1 class="mb-1">{{ $conteo_espacios_disponibles }}</h1>
                            </div>
                
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-6 mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="d-flex justify-content-center">Mis vehículos</h5>
                                <div class="metric-value d-flex justify-content-center">
                                    <h1 class="mb-1">{{ $conteo_mis_vehiculos }}</h1>
                                </div>
                
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h2>Últimas reservas</h2>
            <table class="table">
                <thead class="thead-dark">
                        <tr>
                            <th style="width:100px;">Vehículo</th>
                            <th style="width:100px;">Espacio</th>
                            <th style="width:100px;">Fecha</th>
                            
                            
                        </tr>
                </thead>
                <tbody>
                        @foreach($mis_ultimas_reservas as $mi_ultima_reserva)
                        <tr>
                            <td>{{$mi_ultima_reserva->placa_veh}} {{$mi_ultima_reserva->marca_veh}} {{$mi_ultima_reserva->color_veh}}</td>
                            <td>{{$mi_ultima_reserva->nomespacio}}</td>
                            <td>{{$mi_ultima_reserva->fecha_reserva}}</td>
                                           
                        </tr>
                        @endforeach
                </tbody>
                        
                        
            </table>
        </div>
            
        
    </div>
    <div class="row map-total-container mt-5">
        <div class="row mb-5">
            <div class="col-md-3">
                <button type="button" class="btn" style="background: var(--color-morado); color:#fff;" onclick="mostrargeneral()">General</button>
            </div>
            <div class="col-md-6">
            <select class="form-select" aria-label="Default select example" id="seccionselector" onchange="cambioselector()">
                <option selected>Elige una sección</option>
                <option value="Sección A">Sección A</option>
                <option value="Sección B">Sección B</option>
                <option value="Sección C">Sección C</option>
                <option value="Sección D">Sección D</option>
            </select>

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
        <div class="row mb-5">
            <div class="col-md-4">
                <h3 style="text-align:center;">Número de reservas por fecha</h3>
                <canvas id="fecha_nreservas_chart" width="400" height="400"></canvas>
            </div>
            <div class="col-md-4">
                <h3 style="text-align:center;">Número de reservas por espacio</h3>
                <canvas id="espacio_nreservas_chart" width="400" height="400"></canvas>
            </div>
            <div class="col-md-4">
                <h3 style="text-align:center;">Top 5 usuarios con mas reservas</h3>
                <canvas id="usuario_nreservas_chart" width="400" height="400"></canvas>
            </div>
        </div>
    </div>


@stop
@section('scripts')
    function fecha_nreservas_chart(){
                var fechas = [];
                var nreservas = [];
                @foreach($graficas_fecha_nreservas as $graficafechanreservas) 
                    fechas.push("{{$graficafechanreservas->fecha_reserva}}");
                    
                @endforeach
                @foreach($graficas_fecha_nreservas as $graficafechanreservas) 
                    nreservas.push({{$graficafechanreservas->totalreservas}});
                @endforeach
                var ctx = document.getElementById('fecha_nreservas_chart').getContext('2d');
        
                var fecha_nreservas_chart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: fechas,
                        datasets: [{
                            label: ['N° de reservas por fecha'],
                            data: nreservas,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
                }
    function espacio_nreservas_chart(){
                    var espacios = [];
                    var nreservas = [];
                    @foreach($graficas_espacio_nreservas as $graficaespacionreservas) 
                        espacios.push("{{$graficaespacionreservas->nomespacio}}");
                        
                    @endforeach
                    @foreach($graficas_espacio_nreservas as $graficaespacionreservas) 
                        nreservas.push({{$graficaespacionreservas->totalreservas}});
                    @endforeach
                    var ctx = document.getElementById('espacio_nreservas_chart').getContext('2d');
                    var espacio_nreservas_chart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: espacios,
                            datasets: [{
                                label: 'My First Dataset',
                                data: nreservas,
                                backgroundColor: [
                                'rgb(9,7,57)',
                                'rgb(54, 162, 235)',
                                '#B67717',
                                '#094E1E',
                                '#96240D'
                                ],
                                hoverOffset: 4
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                }
    function usuario_nreservas_chart(){
                var usuarios=[];
                var nreservas=[];
                @foreach($graficas_usuario_nreservas as $graficausuarionreservas) 
                        usuarios.push("{{$graficausuarionreservas->nombrecompleto}}");
                        
                @endforeach
                @foreach($graficas_usuario_nreservas as $graficausuarionreservas) 
                        nreservas.push({{$graficausuarionreservas->totalreservas}});
                @endforeach
                var ctx = document.getElementById('usuario_nreservas_chart').getContext('2d');
                var usuario_nreservas_chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: usuarios,
                        datasets: [{
                            label: '#5 usuarios con más reservas',
                            data: nreservas,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
    usuario_nreservas_chart();
    fecha_nreservas_chart();
    espacio_nreservas_chart();
@stop
