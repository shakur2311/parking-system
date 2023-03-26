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
            <a class="nav-link" href="/"><i class="fa fa-fw fa-home mr-3" ></i>Inicio <span class="badge badge-success"></span></a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="" style="background: rgba(182, 119, 23 ,1); border-radius:10px;"><i class="fas fa-chart-line mr-3"></i>Dashboard <span class="badge badge-success"></span></a>
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
<div class="row mt-5 mb-7">
        <div class="col-md-12">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Indicador 1: Volumen de tránsito</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Indicador 2: Número de espacios disponibles</button>
                    
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" style="padding:30px;">
                    <h3>Post-Test en periodo de prueba (15 dias)</h3>
                    <div class="row mb-5">
                        <div class="col-md-4">
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>
                                            Fecha
                                        </th>
                                        <th>
                                            Flujo Vehicular
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>27/11/2021</td>
                                        <td>30</td>

                                    </tr>
                                    <tr>
                                        <td>28/11/2021</td>
                                        <td>32</td>

                                    </tr>
                                    <tr>
                                        <td>29/11/2021</td>
                                        <td>26</td>

                                    </tr>
                                    <tr>
                                        <td>30/11/2021</td>
                                        <td>28</td>

                                    </tr>
                                    <tr>
                                        <td>01/12/2021</td>
                                        <td>22</td>

                                    </tr>
                                    <tr>
                                        <td>02/12/2021</td>
                                        <td>20</td>

                                    </tr>
                                    <tr>
                                        <td>03/12/2021</td>
                                        <td>30</td>

                                    </tr>
                                    <tr>
                                        <td>04/12/2021</td>
                                        <td>28</td>

                                    </tr>
                                    <tr>
                                        <td>05/12/2021</td>
                                        <td>28</td>

                                    </tr>
                                    <tr>
                                        <td>06/12/2021</td>
                                        <td>26</td>

                                    </tr>
                                    <tr>
                                        <td>07/12/2021</td>
                                        <td>26</td>

                                    </tr>
                                    <tr>
                                        <td>08/12/2021</td>
                                        <td>20</td>

                                    </tr>
                                    <tr>
                                        <td>09/12/2021</td>
                                        <td>28</td>

                                    </tr>
                                    <tr>
                                        <td>10/12/2021</td>
                                        <td>20</td>

                                    </tr>
                                    <tr>
                                        <td>11/12/2021</td>
                                        <td>18</td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-7">
                            <h3 style="text-align:center;">Flujo Vehicular</h3>
                            <canvas id="posttest_flujo_vehicular_chart" width="400" height="300"></canvas>
                        </div>
                    </div>
                
                    <h3>Registro de Flujo vehicular diario</h3>
                    <table class="table table-striped text-center" >
                        <thead>
                            <tr>
                                <th>Horas</th>
                                <th>Flujo Vehicular</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>07:00-08:00</td>
                                <td>{{$flujo_entrada_7_8 + $flujo_salida_7_8}}</td>
                            </tr>
                            <tr>
                                <td>08:00-09:00</td>
                                <td>{{$flujo_entrada_8_9 + $flujo_salida_8_9}}</td>
                            </tr>
                            <tr>
                                <td>09:00-10:00</td>
                                <td>{{$flujo_entrada_9_10 + $flujo_salida_9_10}}</td>
                            </tr>
                            <tr>
                                <td>10:00-11:00</td>
                                <td>{{$flujo_entrada_10_11 + $flujo_salida_10_11}}</td>
                            </tr>
                            <tr>
                                <td>11:00-12:00</td>
                                <td>{{$flujo_entrada_11_12 + $flujo_salida_11_12}}</td>
                            </tr>
                            <tr>
                                <td>12:00-13:00</td>
                                <td>{{$flujo_entrada_12_13 + $flujo_salida_12_13}}</td>
                            </tr>
                            <tr>
                                <td>13:00-14:00</td>
                                <td>{{$flujo_entrada_13_14 + $flujo_salida_13_14}}</td>
                            </tr>
                            <tr>
                                <td>14:00-15:00</td>
                                <td>{{$flujo_entrada_14_15 + $flujo_salida_14_15}}</td>
                            </tr>
                            <tr>
                                <td>15:00-16:00</td>
                                <td>{{$flujo_entrada_15_16 + $flujo_salida_15_16}}</td>
                            </tr>
                            <tr>
                                <td>16:00-17:00</td>
                                <td>{{$flujo_entrada_16_17 + $flujo_salida_16_17}}</td>
                            </tr>
                            <tr>
                                <td>17:00-18:00</td>
                                <td>{{$flujo_entrada_17_18 + $flujo_salida_17_18}}</td>
                            </tr>
                            <tr>
                                <td>18:00-19:00</td>
                                <td>{{$flujo_entrada_18_19 + $flujo_salida_18_19}}</td>
                            </tr>
                            <tr>
                                <td>19:00-20:00</td>
                                <td>{{$flujo_entrada_19_20 + $flujo_salida_19_20}}</td>
                            </tr>
                            <tr>
                                <td>20:00-21:00</td>
                                <td>{{$flujo_entrada_20_21 + $flujo_salida_20_21}}</td>
                            </tr>
                            <tr>
                                <td>21:00-22:00</td>
                                <td>{{$flujo_entrada_21_22 + $flujo_salida_21_22}}</td>
                            </tr>
                        </tbody>
                    </table>

                    <h3 style="text-align:center;" class="mt-5">Flujo Vehicular</h3>
                    <canvas id="hora_volumen_transito_chart"></canvas>
                    
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" style="padding:30px;">
                    <h3>Post-Test en periodo de prueba (8 dias)</h3>
                    <div class="row mb-5">
                        <div class="col-md-4">
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>
                                            Fecha
                                        </th>
                                        <th>
                                            Número de espacios disponibles
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>27/11/2021</td>
                                        <td>22</td>

                                    </tr>
                                    <tr>
                                        <td>28/11/2021</td>
                                        <td>40</td>

                                    </tr>
                                    <tr>
                                        <td>29/11/2021</td>
                                        <td>12</td>

                                    </tr>
                                    <tr>
                                        <td>30/11/2021</td>
                                        <td>14</td>

                                    </tr>
                                    <tr>
                                        <td>01/12/2021</td>
                                        <td>16</td>

                                    </tr>
                                    <tr>
                                        <td>02/12/2021</td>
                                        <td>12</td>

                                    </tr>
                                    <tr>
                                        <td>03/12/2021</td>
                                        <td>20</td>

                                    </tr>
                                    <tr>
                                        <td>04/12/2021</td>
                                        <td>22</td>

                                    </tr>
                                 
                                   
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-7">
                            <h3 style="text-align:center;">Número de espacios disponibles</h3>
                            <canvas id="posttest_numero_espacios_disponibles_chart" width="400" height="300"></canvas>
                        </div>
                    </div>
                
                    <h3>Registro de espacios disponibles diario</h3>
                    <table class="table table-striped text-center" >
                        <thead>
                            <tr>
                                <th>Horas</th>
                                <th>Espacio disponibles</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>07:00-08:00</td>
                                <td>{{$numero_espacios_disponibles_7_8}}</td>
                            </tr>
                            <tr>
                                <td>08:00-09:00</td>
                                <td>{{$numero_espacios_disponibles_8_9}}</td>
                            </tr>
                            <tr>
                                <td>09:00-10:00</td>
                                <td>{{$numero_espacios_disponibles_9_10}}</td>
                            </tr>
                            <tr>
                                <td>10:00-11:00</td>
                                <td>{{$numero_espacios_disponibles_10_11}}</td>
                            </tr>
                            <tr>
                                <td>11:00-12:00</td>
                                <td>{{$numero_espacios_disponibles_11_12}}</td>
                            </tr>
                            <tr>
                                <td>12:00-13:00</td>
                                <td>{{$numero_espacios_disponibles_12_13}}</td>
                            </tr>
                            <tr>
                                <td>13:00-14:00</td>
                                <td>{{$numero_espacios_disponibles_13_14}}</td>
                            </tr>
                            <tr>
                                <td>14:00-15:00</td>
                                <td>{{$numero_espacios_disponibles_14_15}}</td>
                            </tr>
                            <tr>
                                <td>15:00-16:00</td>
                                <td>{{$numero_espacios_disponibles_15_16}}</td>
                            </tr>
                            <tr>
                                <td>16:00-17:00</td>
                                <td>{{$numero_espacios_disponibles_16_17}}</td>
                            </tr>
                            <tr>
                                <td>17:00-18:00</td>
                                <td>{{$numero_espacios_disponibles_17_18}}</td>
                            </tr>
                            <tr>
                                <td>18:00-19:00</td>
                                <td>{{$numero_espacios_disponibles_18_19}}</td>
                            </tr>
                            <tr>
                                <td>19:00-20:00</td>
                                <td>{{$numero_espacios_disponibles_19_20}}</td>
                            </tr>
                            <tr>
                                <td>20:00-21:00</td>
                                <td>{{$numero_espacios_disponibles_20_21}}</td>
                            </tr>
                            <tr>
                                <td>21:00-22:00</td>
                                <td>{{$numero_espacios_disponibles_21_22}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <h3 style="text-align:center;" class="mt-5">Número de espacios disponibles por hora</h3>
                    <canvas id="hora_numero_espacios_disponibles_chart"></canvas>
                </div>
            
            </div>
        </div>
    </div>
    <div class="row mt-5 mb-5">
        <div class="col-md-4">
            <h3 style="text-align:center;">Número de reservas por fecha</h3>
            <canvas id="fecha_nreservas_chart" width="400" height="400"></canvas>
        </div>
        <div class="col-md-4">
            <h3 style="text-align:center;">Número de reservas por espacio (Top 5)</h3>
            <canvas id="espacio_nreservas_chart" width="400" height="400"></canvas>
        </div>
        <div class="col-md-4">
            <h3 style="text-align:center;">Usuarios con mas reservas (Top 5)</h3>
            <canvas id="usuario_nreservas_chart" width="400" height="400"></canvas>
        </div>
    </div>
@stop
@section('scripts')
    function posttest_flujo_vehicular_chart(){
        const ctx = document.getElementById('posttest_flujo_vehicular_chart').getContext('2d');
        const posttest_flujo_vehicular_chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['27/11/2021', '28/11/2021', '29/11/2021', '30/11/2021', '01/12/2021', '02/12/2021','03/12/2021','04/12/2021','05/12/2021','06/12/2021','07/12/2021','08/12/2021','09/12/2021','10/12/2021','11/12/2021'],
                datasets: [{
                    label: 'Flujo Vehicular (Post-Test)',
                    data: [30, 32, 26, 28, 22, 20, 30, 28, 28, 26, 26, 20, 28, 20, 18],
                    tension: 0.1,
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
    function posttest_numero_espacios_disponibles_chart(){
        const ctx = document.getElementById('posttest_numero_espacios_disponibles_chart').getContext('2d');
        const posttest_numero_espacios_disponibles_chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['27/11/2021', '28/11/2021', '29/11/2021', '30/11/2021', '01/12/2021', '02/12/2021','03/12/2021','04/12/2021'],
                datasets: [{
                    label: 'Número de espacios disponibles (Post-Test)',
                    data: [22,40,12,14,16,12,20,22],
                    tension: 0.1,
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
    function hora_volumen_transito_chart(){
        var horas = ["7:00-8:00","8:00-9:00","9:00-10:00","10:00-11:00","11:00-12:00","12:00-13:00","13:00-14:00","14:00-15:00","15:00-16:00","16:00-17:00","17:00-18:00","18:00-19:00","19:00-20:00","20:00-21:00","21:00-22:00"];
        var flujo_volumen_7_8 = JSON.parse("{{ json_encode($flujo_entrada_7_8) }}") + JSON.parse("{{ json_encode($flujo_salida_7_8) }}") ;
        var flujo_volumen_8_9 = JSON.parse("{{ json_encode($flujo_entrada_8_9) }}") + JSON.parse("{{ json_encode($flujo_salida_8_9) }}") ;
        var flujo_volumen_9_10 = JSON.parse("{{ json_encode($flujo_entrada_9_10) }}") + JSON.parse("{{ json_encode($flujo_salida_9_10) }}") ;
        var flujo_volumen_10_11 = JSON.parse("{{ json_encode($flujo_entrada_10_11) }}") + JSON.parse("{{ json_encode($flujo_salida_10_11) }}") ;
        var flujo_volumen_11_12 = JSON.parse("{{ json_encode($flujo_entrada_11_12) }}") + JSON.parse("{{ json_encode($flujo_salida_11_12) }}") ;
        var flujo_volumen_12_13 = JSON.parse("{{ json_encode($flujo_entrada_12_13) }}") + JSON.parse("{{ json_encode($flujo_salida_12_13) }}") ;
        var flujo_volumen_13_14 = JSON.parse("{{ json_encode($flujo_entrada_13_14) }}") + JSON.parse("{{ json_encode($flujo_salida_13_14) }}") ;
        var flujo_volumen_14_15 = JSON.parse("{{ json_encode($flujo_entrada_14_15) }}") + JSON.parse("{{ json_encode($flujo_salida_14_15) }}") ;
        var flujo_volumen_15_16 = JSON.parse("{{ json_encode($flujo_entrada_15_16) }}") + JSON.parse("{{ json_encode($flujo_salida_15_16) }}") ;
        var flujo_volumen_16_17 = JSON.parse("{{ json_encode($flujo_entrada_16_17) }}") + JSON.parse("{{ json_encode($flujo_salida_16_17) }}") ;
        var flujo_volumen_17_18 = JSON.parse("{{ json_encode($flujo_entrada_17_18) }}") + JSON.parse("{{ json_encode($flujo_salida_17_18) }}") ;
        var flujo_volumen_18_19 = JSON.parse("{{ json_encode($flujo_entrada_18_19) }}") + JSON.parse("{{ json_encode($flujo_salida_18_19) }}") ;
        var flujo_volumen_19_20 = JSON.parse("{{ json_encode($flujo_entrada_19_20) }}") + JSON.parse("{{ json_encode($flujo_salida_19_20) }}") ;
        var flujo_volumen_20_21 = JSON.parse("{{ json_encode($flujo_entrada_20_21) }}") + JSON.parse("{{ json_encode($flujo_salida_20_21) }}") ;
        var flujo_volumen_21_22 = JSON.parse("{{ json_encode($flujo_entrada_21_22) }}") + JSON.parse("{{ json_encode($flujo_salida_21_22) }}") ;
        var volumen = [flujo_volumen_7_8,flujo_volumen_8_9,flujo_volumen_9_10,flujo_volumen_10_11,
        flujo_volumen_11_12,flujo_volumen_12_13,flujo_volumen_13_14,flujo_volumen_14_15,flujo_volumen_15_16,flujo_volumen_16_17,
        flujo_volumen_17_18,flujo_volumen_18_19,flujo_volumen_19_20, flujo_volumen_20_21,flujo_volumen_21_22];
        
        var ctx = document.getElementById('hora_volumen_transito_chart').getContext('2d');
                    var hora_volumen_transito_chart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: horas,
                            datasets: [{
                                label: 'Flujo Vehicular {{$ayer}} ',
                                data: volumen,
                                backgroundColor: [
                                'rgb(9,7,57)',
                                'rgb(54, 162, 235)',
                                '#B67717',
                                '#094E1E',
                                '#96240D',
                                '#FFDEB8',
                                '#76448A',
                                '#1F618D',
                                '#239B56',
                                '#B7950B ',
                                '#B9770E',
                                '#A04000',
                                '#B3B6B7',
                                '#616A6B ',
                                '#283747 '
                                ],
                                hoverOffset: 4
                            }]
                        },
                        options: {
                            indexAxis: 'y',
                            scales: {
                                y: {
                                    beginAtZero: true
                                    
                                }
                            },
                            ticks: {
                                precision: 0
                            }
                            

                        }
                    });

        }
    function hora_numero_espacios_disponibles_chart(){
        var horas = ["7:00-8:00","8:00-9:00","9:00-10:00","10:00-11:00","11:00-12:00","12:00-13:00","13:00-14:00","14:00-15:00","15:00-16:00","16:00-17:00","17:00-18:00","18:00-19:00","19:00-20:00","20:00-21:00","21:00-22:00"];
        var numero_espacios_disponibles_7_8 = JSON.parse("{{ json_encode($numero_espacios_disponibles_7_8) }}")
        var numero_espacios_disponibles_8_9 = JSON.parse("{{ json_encode($numero_espacios_disponibles_8_9) }}")
        var numero_espacios_disponibles_9_10 = JSON.parse("{{ json_encode($numero_espacios_disponibles_9_10) }}")
        var numero_espacios_disponibles_10_11 = JSON.parse("{{ json_encode($numero_espacios_disponibles_10_11) }}")
        var numero_espacios_disponibles_11_12 = JSON.parse("{{ json_encode($numero_espacios_disponibles_11_12) }}")
        var numero_espacios_disponibles_12_13 = JSON.parse("{{ json_encode($numero_espacios_disponibles_12_13) }}")
        var numero_espacios_disponibles_13_14 = JSON.parse("{{ json_encode($numero_espacios_disponibles_13_14) }}")
        var numero_espacios_disponibles_14_15 = JSON.parse("{{ json_encode($numero_espacios_disponibles_14_15) }}")
        var numero_espacios_disponibles_15_16 = JSON.parse("{{ json_encode($numero_espacios_disponibles_15_16) }}")
        var numero_espacios_disponibles_16_17 = JSON.parse("{{ json_encode($numero_espacios_disponibles_16_17) }}")
        var numero_espacios_disponibles_17_18 = JSON.parse("{{ json_encode($numero_espacios_disponibles_17_18) }}")
        var numero_espacios_disponibles_18_19 = JSON.parse("{{ json_encode($numero_espacios_disponibles_18_19) }}")
        var numero_espacios_disponibles_19_20 = JSON.parse("{{ json_encode($numero_espacios_disponibles_19_20) }}")
        var numero_espacios_disponibles_20_21 = JSON.parse("{{ json_encode($numero_espacios_disponibles_20_21) }}")
        var numero_espacios_disponibles_21_22 = JSON.parse("{{ json_encode($numero_espacios_disponibles_21_22) }}")
        console.log(numero_espacios_disponibles_9_10);
        var numero_espacios_disponibles = [numero_espacios_disponibles_7_8,numero_espacios_disponibles_8_9,numero_espacios_disponibles_9_10,numero_espacios_disponibles_10_11,
        numero_espacios_disponibles_11_12,numero_espacios_disponibles_12_13,numero_espacios_disponibles_13_14,numero_espacios_disponibles_14_15,numero_espacios_disponibles_15_16,numero_espacios_disponibles_16_17,
        numero_espacios_disponibles_17_18,numero_espacios_disponibles_18_19,numero_espacios_disponibles_19_20,numero_espacios_disponibles_20_21,numero_espacios_disponibles_21_22];
        var ctx = document.getElementById('hora_numero_espacios_disponibles_chart').getContext('2d');
                    var hora_numero_espacios_disponibles_chart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: horas,
                            datasets: [{
                                label: 'Número de espacios disponibles {{$ayer}} ',
                                data: numero_espacios_disponibles,
                                backgroundColor: [
                                'rgb(9,7,57)',
                                'rgb(54, 162, 235)',
                                '#B67717',
                                '#094E1E',
                                '#96240D',
                                '#922B21',
                                '#76448A',
                                '#1F618D',
                                '#239B56',
                                '#B7950B ',
                                '#B9770E',
                                '#A04000',
                                '#B3B6B7',
                                '#616A6B ',
                                '#283747 '

                                ],
                                hoverOffset: 4
                            }]
                        },
                        options: {
                            indexAxis: 'y',
                            scales: {
                                x: {
                                        beginAtZero: true
                                    }
                            }
                            
                        } });

        }
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
                                'rgb(9,7,57)',
                                'rgb(54, 162, 235)',
                                '#B67717',
                                '#094E1E',
                                '#96240D',
                                '#922B21',
                                '#76448A',
                                '#1F618D',
                                '#239B56',
                                '#B7950B ',
                                '#B9770E',
                                '#A04000',
                                '#B3B6B7',
                                '#616A6B ',
                                '#283747 '
                            ],
                            borderColor: [
                                
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
                                '#96240D',
                                '#922B21',
                                '#76448A',
                                '#1F618D',
                                '#239B56',
                                '#B7950B ',
                                '#B9770E',
                                '#A04000',
                                '#B3B6B7',
                                '#616A6B ',
                                '#283747 '
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
                                'rgb(9,7,57)',
                                'rgb(54, 162, 235)',
                                '#B67717',
                                '#094E1E',
                                '#96240D',
                                '#922B21',
                                '#76448A',
                                '#1F618D',
                                '#239B56',
                                '#B7950B ',
                                '#B9770E',
                                '#A04000',
                                '#B3B6B7',
                                '#616A6B ',
                                '#283747 '
                            ],
                            borderColor: [
                                
                            ],
                            borderWidth: 0
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
    hora_volumen_transito_chart();
    hora_numero_espacios_disponibles_chart();
    posttest_flujo_vehicular_chart();
    posttest_numero_espacios_disponibles_chart();
@stop