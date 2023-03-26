
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        table{
            border: 3px solid #FF7D61;
            background:#FF7D61;
            border-radius:5px;

        }
        thead{
            background:#76E1F6 ;
        }
    </style>
</head>
<body>
    <h2 style="color:#FF7D61;">Lista de reservas</h2>
    <table style="width:100%;">
        <thead>
            <tr>
                <td>Id</td>
                <td>Espacio</td>
                <td>Usuario</td>
                <td>Vehículo</td>
                <td>Fecha reserva</td>
                <td>Hora ingreso</td>
                <td>Hora salida</td>
                <td>Estado</td>
            </tr>

        </thead>
        <tbody>
            @foreach($reservas as $reserva)
            <tr>
                <td>{{$reserva->idreserva}}</td>
                <td>{{$reserva->nomespacio}}</td>
                <td>{{$reserva->nomusuario}}</td>
                <td>{{$reserva->nomvehiculo}}</td>
                <td>{{$reserva->fecha_reserva}}</td>
                <td>{{$reserva->fecha_ingreso}}</td>
                <td>{{$reserva->fecha_salida}}</td>
                @if($reserva->estado=='1')
                <td><p style="padding:10px; background-color: #094E1E; width:100px; color:#fff; text-align:center; border-radius:5px;">En curso</p></td>
                @else
                <td><p style="padding:10px; background-color:#96240D;#FF4C4C; width:100px; color:#fff; text-align:center; border-radius:5px;">Terminado</p></td>
                @endif
                
                
                    
            </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>