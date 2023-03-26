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
            <a class="nav-link" href="/admin/dashboard" ><i class="fas fa-chart-line mr-3"></i>Dashboard <span class="badge badge-success"></span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="" style="background: rgba(182, 119, 23 ,1); border-radius:10px;"><i class="fa fa-fw fa-car mr-3"></i>Registros de vehículos</a>
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
<!--modal-insert-vehiculo-->
<div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="insertModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="insertModalLabel">Agregar vehiculo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="" id="FormularioAdd" onSubmit="" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">

          <div class="mb-3">
            <label for="placa_veh" class="form-label">Placa del vehiculo</label>
            <input type="text" class="form-control" name="placa_veh" id="placa_veh" required>
          </div>
          <div class="mb-3">
            <label for="propietario_veh" class="form-label">Propietario del vehiculo</label>
            <select class="form-select mb-3" name="propietario_veh">
              
              @foreach($usuarios as $usuario)
                <option value="{{$usuario->name}} {{$usuario->lastname}}">{{$usuario->name}} {{$usuario->lastname}}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="marca_veh" class="form-label">Marca del vehiculo</label>
            <input type="text" class="form-control" name="marca_veh" id="marca_veh" required>
          </div>
          <div class="mb-3">
            <label for="color_veh" class="form-label">Color del vehiculo</label>
            <input type="text" class="form-control" name="color_veh" id="color_veh" required>
          </div>
          <div class="mb-3">
            <label for="formFile" class="form-label">Imagen del vehículo</label>
            <input class="form-control" type="file" id="img_veh" name="img_veh">
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
          <button type="submit" class="btn" style="background:#B67717; color:#fff; ">Agregar vehiculo</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<!----finish-modal-insert-vehiculo----->
<!-- Modal-editar-vehiculo -->
<div class="modal fade" id="editarVehiculoModal" tabindex="-1" role="dialog" aria-labelledby="insertModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel">Editar vehiculo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="/admin/editarVehiculo" id="FormularioAdd" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-3 mb-3">
                <label for="id_veh_editar" class="form-label">id</label>
                <input type="text" class="form-control" name="id_veh_editar" id="id_veh_editar" readonly>
            </div>
            <div class="form-group col-md-9 mb-3">
                <label for="placa_veh_editar" class="form-label">Placa del vehiculo</label>
                <input type="text" class="form-control" name="placa_veh_editar" id="placa_veh_editar">
            </div>
     
          </div>
          
          <div class="mb-3">
            <label for="propietario_veh" class="form-label">Nombre del propietario</label>
            <input type="text" class="form-control" name="propietario_name_veh_editar" id="propietario_name_veh_editar" readonly>
          </div>
          <div class="mb-3">
            <label for="propietario_veh" class="form-label">Apellidos del propietario</label>
            <input type="text" class="form-control" name="propietario_lastname_veh_editar" id="propietario_lastname_veh_editar" readonly>
          </div>
          <div class="mb-3">
            <label for="marca_veh" class="form-label">Marca del vehiculo</label>
            <input type="text" class="form-control" name="marca_veh_editar" id="marca_veh_editar">
          </div>
          <div class="mb-3">
            <label for="color_veh" class="form-label">Color del vehiculo</label>
            <input type="text" class="form-control" name="color_veh_editar" id="color_veh_editar">
          </div>
          <div class="mb-3">
            <label for="formFile" class="form-label">Imagen del vehículo</label>
            <input class="form-control" type="file" id="img_veh_editar" name="img_veh_editar">
          </div>
  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary" style="background: #1167b1;">Editar vehiculo</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<!-- finish-modal-editar-vehiculo -->
<!-- Modal-eliminar-vehiculo -->
<div class="modal fade" id="eliminarVehiculoModal" tabindex="-1" role="dialog" aria-labelledby="eliminarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="insertModalLabel">Eliminar vehiculo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="/admin/eliminarVehiculo" id="FormularioAdd" onSubmit="">
        @csrf
        <div class="modal-body">
          <h4>Seguro que desea eliminar el vehiculo seleccionado?</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <button type="submit" class="btn btn-primary" style="background: #1167b1;">Sí</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<!-- Finish-Modal-eliminar-vehiculo -->
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Bienvenido {{Auth::user()->name}}!</h2>
            <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Menu</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registros de vehículos</li>
                </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<h2>Registro de vehículos</h2>

<div class="row">
  <div class="col-md-3">
      <!--form-search-->
      <form>
        <div class="form-row align-items-center mb-3">
    <!--       <div class="col">
            <label class="sr-only" for="inlineFormInput">Buscar</label>
            <input onkeyup="buscarVehiculo()" class="form-control me-2" id="vehiculoBuscar" type="search" placeholder="Buscar" aria-label="Search">
          </div> -->

          <div class="col-auto">
            <button type="button" class="btn mb-2" data-toggle="modal" data-target="#insertModal" style="background:rgb(9,7,57) ; color:#fff;"><i class="fas fa-plus"></i></button>        
          </div>
        </div>
          
      </form>
  </div>
  <div class="col-md-1">
    <h3>Exportar en:</h3>
    
  </div>
  <div class="col-sm-2">
    <a href="/admin/exportarPDFvehiculos" title="PDF" target="_blank"><i class="fas fa-file-pdf" style="color: #96240D; font-size:3em" alt="PDF"></i></a>
    <a href="/admin/exportarExcelvehiculos" title="Excel"><i class="fas fa-file-excel" style="color:#094E1E; font-size:3em"></i></a>
  </div>
</div>





<div id="bloque row">
   <div class="col-md-12">
      <!--form-search-finish-->
      <!--table-registros-->
      <table class="table table-striped table-bordered display responsive nowrap" id="tableVehiculos" style="width:100%">
        <thead>
          <tr>
          
            <th scope="col">id</th>
            <th scope="col">Placa</th>
            <th scope="col">Propietario</th>
            <th scope="col">Marca</th>
            <th scope="col">Color</th>
            <th scope="col" style="text-align:center;">Opciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($vehiculos as $vehiculo) 
              <tr>
                
                <td>{{ $vehiculo->id_veh }}</th>
                <td>{{ $vehiculo->placa_veh }}</td>
                <td>{{ $vehiculo->nombrepropietarios_completo }}</td>
                <td>{{ $vehiculo->marca_veh }}</td>
                <td><p>{{ $vehiculo->color_veh }}</p></td>
                <td style="text-align:center;"><button type="button" value= "{{ $vehiculo->id_veh }}" class="btn btn-primary mr-3" data-toggle="modal" data-target="#editarVehiculoModal" onclick="abrirEditarVehiculo(this)">
                  Editar
                </button><button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#eliminarVehiculoModal" >
                  Eliminar
                </button></td>
              </tr>
          @endforeach
          
          
        </tbody>
      </table>  

      <!--table-registros-finish->
      <---->
   </div>
</div>


  

            
 
@stop
@section('scripts')

$(document).ready(function () {
        $('#tableVehiculos').DataTable()({
          responsive: true
        });
        
        });
@stop
