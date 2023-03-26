<!--form-search-finish-->
<!--table-registros-->
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Placa</th>
      <th scope="col">Propietario</th>
      <th scope="col">Marca</th>
      <th scope="col">Color</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($vehiculos2 as $vehiculo) 
        <tr>
        <th scope="row">{{ $vehiculo->id_veh }}</th>
        <td>{{ $vehiculo->placa_veh }}</td>
        <td>{{ $vehiculo->propietario_veh }}</td>
        <td>{{ $vehiculo->marca_veh }}</td>
        <td>{{ $vehiculo->color_veh }}</td>
        </tr>
    @endforeach
    
    
  </tbody>
</table>   

<!--table-registros-finish->
<---->