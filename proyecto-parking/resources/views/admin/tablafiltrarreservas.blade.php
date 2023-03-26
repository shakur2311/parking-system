<table class="table table-striped" id="tableReservas">
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
        @foreach ($resultadosFiltrar as $resultadoFiltrar) 
            <tr>
            <th scope="row">{{ $resultadoFiltrar->idreserva }}</th>
            
            <td>{{ $resultadoFiltrar->nomespacio }}</td>
            <td>{{ $resultadoFiltrar->nomusuario }}</td>
            <td>{{ $resultadoFiltrar->nomvehiculo }}</td>
            <td>{{ $resultadoFiltrar->fecha_reserva }}</td>
            <td>{{ $resultadoFiltrar->fecha_ingreso }}</td>
            <td>{{ $resultadoFiltrar->fecha_salida }}</td>
            @if($resultadoFiltrar->estado=='1')
                <td><p style="padding:10px; background-color: #094E1E; width:100px; color:#fff; text-align:center; border-radius:5px;">En curso</p></td>
            @else
                <td><p style="padding:10px; background-color:#96240D; width:100px; color:#fff; text-align:center; border-radius:5px;">Terminado</p></td>
            @endif
            
        
            </tr>
        @endforeach
        
        
    </tbody>
    </table>  