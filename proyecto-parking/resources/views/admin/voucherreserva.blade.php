<html>
<head>
    <style type="text/css">

        body {
            font-family:  Helvetica;
            
        }

        .voucher {
            width:130mm;
            height:180mm;
            border: 1px solid black;
            margin: 50px 0 0 90px
        }

        .voucher-image {
            height:105mm;
            position:relative;
        
            
        }
        .voucher-image img{
            position:absolute;
            left:8em;
            top:1em;

        }
        .voucher-text {
            height:303px;
        }

        .voucher-code {
            height:15px;
            font-size: 11px;
            color: #444444;
            text-align: right;
            padding: 0 5px 3px 0;
        }

        .voucher-info {
            padding-left:10px;
            background-color: #eeecec;
            border-top:1px solid #b6b5b5;
        }

        .voucher-info-table {
            width:100%;
        }

        .voucher-info td {
            font-size: 10pt;
            color: #444444;
            width:33%;
        }

        .header {
            padding-top: 20px;
            text-align:center;
            font-size: 2em;
        }

        .voucher-value-header {
            padding-top: 10px;
            text-align:center;
            font-size: 1.4em;
        }

        .voucher-value-description {
            padding-top: 10px;
            text-align:center;
            font-size: 1.0em;
        }

        .voucher-text-left {
            text-align: left;
            padding-left:20px;
        }

        .voucher-text-message {
            padding: 15px 20px 0 0;
        }

        

        .toName {
            margin-left:10px;
            font-size: 1.4em;
        }

		

		

    </style>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
</head>
<body>
    <div class="voucher">
        <div class="voucher-image">
            <img src="https://i.imgur.com/yZCi7Zm.png" style="max-width:50%;">
        </div>
            

        <div class="voucher-text">
            <div class="header">
                
            </div>


            

            <div class="voucher-text-left">
                <h3>Reserva de estacionamiento</h3>
                <p>Espacio reservado: {{$data->espacioOcupado}} </p>
                <p>Propietario del vehículo: {{$data->propietarioOcupado}} </p>
                <p>Descripción del vehículo: {{$data->vehiculoOcupado}} </p>
                <p>Fecha de reserva: {{$data->fecha_ingresoOcupado}} </p>
                <p>Hora de ingreso: {{$data->hora_ingresoOcupado}} </p>
            </div>
        </div>

    
        <div class="voucher-info">
           <table class="voucher-info-table">
               <tr>
                   <td>
                       
                   </td>

                   <td>
                       <div>UNAC</div>
                        <div>Bellavista Callao</div>
                        <div>Av Juan Pablo II 306</div>
                   </td>

                   <td>
                        <div>Telefono: </div>
                        <div>eMail: </div>
                        
                   </td>
               </tr>
           </table>
        </div>

    </div>
</body>
</html>