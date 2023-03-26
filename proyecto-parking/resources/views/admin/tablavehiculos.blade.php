
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
    <h2 style="color:#FF7D61;">Lista de vehículos registrados</h2>
    <table style="width:100%;">
        <thead>
            <tr>
                <td>Id</td>
                <td>Placa</td>
                <td>Propietario</td>
                <td>Marca</td>
                <td>Color</td>
            </tr>

        </thead>
        <tbody>
            @foreach($vehiculos as $vehiculo)
            <tr>
                <td>{{$vehiculo->id_veh}}</td>
                <td>{{$vehiculo->placa_veh}}</td>
                <td>{{$vehiculo->name}} {{$vehiculo->lastname}}</td>
                <td>{{$vehiculo->marca_veh}}</td>
                <td>{{$vehiculo->color_veh}}</td>
                    
            </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>