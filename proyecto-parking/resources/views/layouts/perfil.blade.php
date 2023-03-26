@extends('layouts.master')
@section('content-nav')
    @if(Auth::user()->role=="0")
        <li class="nav-item mb-3 mx-auto">
            <div class=""><img src="{{ URL::asset('static/img/usuarios/'.Auth::user()->img.'')}}" alt="" class="user-avatar-lg rounded-circle"></div>
        </li>
        <li class="nav-item mb-3 mx-auto">
            <h4 style="color:#fff; font-weight:bold;">{{Auth::user()->name}} {{Auth::user()->lastname}}</h4>
        </li>
        <li class="nav-item mb-5 mx-auto">
            <p style="color:#fff; font-weight: italic;">Administrador</p>
        </li>
        <li class="nav-item">
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
            <a class="nav-link" href="/admin/reservas"><i class="fas fa-fw fa-box mr-3"></i>Registros de reservas</a>                             
        </li>
        <li class="nav-item" style="bottom:0px;">
            <a class="nav-link" href="/logout"><i class="fas fa-power-off mr-3"></i>Cerrar Sesión</a>                           
        </li>
    @elseif(Auth::user()->role=="1")
		<li class="nav-item mb-3 mx-auto">
            <div class=""><img src="{{ URL::asset('static/img/usuarios/'.Auth::user()->img.'')}}" alt="" class="user-avatar-lg rounded-circle"></div>
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
            <a class="nav-link" href="/user/misvehiculos" ><i class="fa fa-fw fa-car mr-3"></i>Mis vehiculos</a>
        </li>
		<li class="nav-item">
            <a class="nav-link" href="/user/misreservas" ><i class="fa fa-fw fa-clipboard mr-3"></i>Mis reservas</a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link" href="/user/reservar" ><i class="fa fa-fw fa-rocket"></i>Reservar</a>
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
    @if(Auth::user()->role == "0")
    <div class="container">
        <div class="row gutters">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
            <div class="card-body">
                <div class="account-settings">
                    <div class="user-profile">
                        <div class="user-avatar">
                            <img src="{{ URL::asset('static/img/usuarios/'.Auth::user()->img.'')}}" alt="imagen usuario">
                        </div>
                        
                        
                                
                        <div class="row mx-auto mb-3">
                            <button class="btn" style="background-color:var(--color-morado); color:#fff; " data-toggle="modal" data-target="#actualizarFotoModal">Actualizar foto</button>		
                        </div>	
                                
                        
                        
                        <h5 class="user-name text-center" style="font-weight:bold;">{{Auth::user()->name}} {{Auth::user()->lastname}} </h5>
                        <h6 class="user-email text-center" style="font-weight:bold;">{{Auth::user()->email}}</h6>
                    </div>
                    
                </div>
            </div>
        </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">

            <div class="card h-100 mt-10">
            
                <div id="datos-card" class="card-body">
                    <form action="/admin/perfil" method="POST">
                    @csrf
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mb-2 h2" style="color: #1167b1;">Información Personal</h6>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="Name">Nombres</label>
                                    <input type="text" class="form-control" id="Name" name="nombre" placeholder="Nombres" value="{{auth::user()->name}}" disabled>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="LastName">Apellidos</label>
                                    <input type="text" class="form-control" id="LastName" name="apellido" placeholder="Apellidos" value="{{auth::user()->lastname}}" disabled>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="eMail">Email</label>
                                    <input type="email" class="form-control" id="eMail" name="correo" placeholder="Email" value="{{auth::user()->email}}" disabled>
                                </div>
                            </div>
                            <!-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="Password">Contraseña</label>
                                    <input type="text" class="form-control" id="Password" name="contrasena" placeholder="Contraseña" disabled>
                                </div>
                            </div> -->
                            
                        </div>
                        <div class="row gutters botones">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right">
                                    
                                    <button onclick="editarPerfilButton()" type="button" id="submit" name="submit" class="btn" style="background:var(--color-verde); color:#fff;">Editar</button>
                                    <button type="submit" id="guardarEditarPerfilButton" name="submit" class="btn" style="background-color:var(--color-morado); color:#fff;" disabled>Guardar</button>	 
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </form>
        </div>
        </div>
        </div>
        <!-- modal actualizar foto -->
        <div class="modal fade" id="actualizarFotoModal" tabindex="-1" role="dialog" aria-labelledby="actualizarFotoModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="row">
                        
                        <div class="col-md-8">
                            
                            <form method="POST" action="/admin/EditarFotoPerfil" id="" enctype="multipart/form-data">
                            @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <input type="file" name="img_usuario">
                                    </div>
                                    
                                    

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary" style="background: #1167b1;">Actualizar Foto</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
        </div>
        <!-- end modal actualizar foto -->
    @elseif(Auth::user()->role == "1")
    <div class="container">
        <div class="row gutters">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
            <div class="card-body">
                <div class="account-settings">
                    <div class="user-profile">
                        <div class="user-avatar">
                            <img src="{{ URL::asset('static/img/usuarios/'.Auth::user()->img.'')}}" alt="imagen usuario">
                        </div>
                        
                        
                        <div class="row mx-auto mb-3">
                            <button class="btn btn" style="background-color:#1167b1; color:#fff;" data-toggle="modal" data-target="#actualizarFotoModal">Actualizar foto</button>	
                        </div> 
                        		
                                
                        
                        
                        <h5 class="user-name text-center">{{Auth::user()->name}} {{Auth::user()->lastname}} </h5>
                        <h6 class="user-email text-center">{{Auth::user()->email}}</h6>
                    </div>
                    
                </div>
            </div>
        </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">

            <div class="card h-100 mt-10">
            
                <div id="datos-card" class="card-body">
                    <form action="/user/perfil" method="POST">
                    @csrf
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mb-2 h2" style="color: #1167b1;">Información Personal</h6>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="Name">Nombres</label>
                                    <input type="text" class="form-control" id="Name" name="nombre" placeholder="Nombres" value="{{auth::user()->name}}" disabled>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="LastName">Apellidos</label>
                                    <input type="text" class="form-control" id="LastName" name="apellido" placeholder="Apellidos" value="{{auth::user()->lastname}}" disabled>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="eMail">Email</label>
                                    <input type="email" class="form-control" id="eMail" name="correo" placeholder="Email" value="{{auth::user()->email}}" disabled>
                                </div>
                            </div>
                            <!-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="Password">Contraseña</label>
                                    <input type="text" class="form-control" id="Password" name="contrasena" placeholder="Contraseña" disabled>
                                </div>
                            </div> -->
                            
                        </div>
                        <div class="row gutters botones">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right">
                                    
                                    <button onclick="editarPerfilButton()" type="button" id="submit" name="submit" class="btn btn-success">Editar</button>
                                    <button type="submit" id="guardarEditarPerfilButton" name="submit" class="btn" style="background-color:#1167b1; color:#fff;" disabled>Guardar</button>	 
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </form>
        </div>
        </div>
        </div>
        <!-- modal actualizar foto -->
        <div class="modal fade" id="actualizarFotoModal" tabindex="-1" role="dialog" aria-labelledby="actualizarFotoModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="row">
                        
                        <div class="col-md-8">
                            
                            <form method="POST" action="/user/EditarFotoPerfil" id="" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <input type="file" name="img_usuario">
                                </div>
                                
                                

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary" style="background: #1167b1;">Actualizar Foto</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
        </div>
        <!-- end modal actualizar foto -->
    @endif
@stop