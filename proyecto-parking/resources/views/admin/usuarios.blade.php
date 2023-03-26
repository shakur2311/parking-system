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
            <a class="nav-link" href="" style="background: rgba(182, 119, 23 ,1); border-radius:10px;"><i class="fas fa-fw fa-user mr-3"></i>Registros de Usuarios</a>                             
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
<!--modal-insert-usuario-->
<div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="insertModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="insertModalLabel">Agregar usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="/admin/usuarios" id="FormularioAdd" onSubmit="" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
          <select class="form-select" name="role_usuario" id="role_usuario">
            @foreach($roles as $role)
                <option>{{$role->descripcion}}</option>
            @endforeach
            
          </select>
          </div>
          <div class="mb-3">
            <label for="nombres_usuario" class="form-label">Nombres</label>
            <input type="text" class="form-control" name="nombres_usuario" id="nombres_usuario" required>
          </div>
          <div class="mb-3">
            <label for="apellidos_usuario" class="form-label">Apellidos</label>
            <input type="text" class="form-control" name="apellidos_usuario" id="apellidos_usuario" required>
          </div>
          <div class="mb-3">
            <label for="correo_usuario" class="form-label">Correo</label>
            <input type="text" class="form-control" name="correo_usuario" id="correo_usuario" required>
          </div>
          <div class="mb-3">
            <label for="contraseña_usuario" class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="contrasena_usuario" id="contrasena_usuario" required>
          </div>
       
          <!-----
          <div class="mb-3">
            <label for="marca_veh">Responsable de la tarea</label>
            <select id="marca_veh" name="marca_veh" class="form-control">
            </select>
            
          </div>
          --->
          

        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-dismiss="modal" style="color:#fff; background:#96240D;">Cerrar</button>
          <button type="submit" class="btn" style="background:#B67717; color:#fff; ">Agregar usuario</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- finish-modal-insert-usuario -->
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Bienvenido {{Auth::user()->name}}!</h2>
            <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Menu</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registros de usuarios</li>
                </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<h2>Registro de usuarios</h2>
<div class="row">
    <div class="form-row align-items-center mb-3">
        
            <div class="col-auto">
                <button type="button" class="btn mb-2" data-toggle="modal" data-target="#insertModal" style="background:rgb(9,7,57) ; color:#fff;"><i class="fas fa-plus"></i></button>        
            </div>
    </div>
</div>
<table class="table table-striped table-bordered display responsive nowrap" id="tableUsuarios" style="width:100%">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">rol</th>
      <th scope="col">Nombres</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Email</th>
      <th scope="col">Fecha de creación</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $user) 
        <tr>
        <th scope="row">{{ $user->id }}</th>
        @if($user->role=="0")
            <td>Administrador</td>
        @else
            @if($user->role=="1")
                <td>Usuario</td>
            @endif
        @endif
        <td>{{ $user->name }}</td>
        <td>{{ $user->lastname }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->created_at }}</td>
        </tr>
    @endforeach
    
    
  </tbody>
</table>   
@stop

@section('scripts')
$(document).ready(function () {
        $('#tableUsuarios').DataTable()({
          responsive: true
        });
        
        });
@stop