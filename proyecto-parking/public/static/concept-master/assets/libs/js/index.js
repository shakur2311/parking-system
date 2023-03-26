getVehiculosdePropietario();
/*Admin-dashboard*/

function abrirReservarEspacio(a){
    window.nomespacio = a.querySelector('#espaciotext').innerHTML;
    document.getElementById("espacioReserva").innerHTML=nomespacio;
    document.getElementById("nomespacio").value=nomespacio
    document.getElementById("texto-vertical").innerHTML=nomespacio;
    

}
function reservarEspacio(){
    console.log(nomespacio);
}
function abrirConcluirReservarEspacio(a){
    
    window.nomespacio2 = a.querySelector('#espaciotext').innerHTML;
    /* label espacio reservado */
    document.getElementById("espacioReserva2").innerHTML=nomespacio2;
    document.getElementById("texto-vertical2").innerHTML=nomespacio2;
    
    /* --- */
    document.getElementById("espacioOcupado").value=nomespacio2;
    const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
    data = new FormData();
    data.append('nomespacio',nomespacio2);

    fetch('/admin/abrirliberar',{
        
        method:'POST',
        headers:{
            
            "X-CSRF-Token": csrfToken
        },
        body: data

    }).then(response => response.json()).then(data => {
        
        document.getElementById('propietarioOcupado').value=data.nomusuariocompleto;
        document.getElementById('vehiculoOcupado').value=data.nomvehiculocompleto;
        document.getElementById('fecha_ingresoOcupado').value=data.fecha_reserva;
        document.getElementById('hora_ingresoOcupado').value=data.fecha_ingreso;

    })
}


function getVehiculosdePropietario(){
    const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
    bloquevehiculosdepropietario = document.getElementById("veh");
    bloquevehiculosdepropietario.innerText = "";
    data = new FormData();
    propietario = document.getElementById("propietario_veh").value;
    data.append('propietario',propietario);
    fetch('/admin/propietario',{
        
        method:'POST',
        headers:{
            
            "X-CSRF-Token": csrfToken
        },
        body: data

    }).then(response => response.json()).then(data => {
        for(let i=0;i<data.datos.length;i++){
            bloquevehiculosdepropietario.innerHTML += `<option>${data.datos[i].placa_veh} ${data.datos[i].marca_veh} ${data.datos[i].color_veh}</option>`;
        }
        
    })
    
}


function editarPerfilButton(){
    document.getElementById("guardarEditarPerfilButton").disabled = false; 
    document.getElementById("Name").removeAttribute("disabled");
    document.getElementById("LastName").removeAttribute("disabled");
    document.getElementById("eMail").removeAttribute("disabled");
    document.getElementById("contrasena").removeAttribute("disabled");  
    
}

/*Admin-Vehiculos*/
function buscarVehiculo(){
    texto = document.getElementById("vehiculoBuscar").value
    fetch(`/admin/vehiculos/buscador?texto=${texto}`,{
        method:'get'

    }).then(response => response.text()).then(data => {
        document.getElementById("bloque").innerHTML = data;
    })
    
}
function abrirEditarVehiculo(a){
    const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
    window.idvehiculoeditar = a.value;   
    data = new FormData();
    data.append('idvehiculoeditar',idvehiculoeditar);

    fetch('/admin/abrirEditarVehiculo',{
        
        method:'POST',
        headers:{
            
            "X-CSRF-Token": csrfToken
        },
        body: data

    }).then(response => response.json()).then(data => {
        document.getElementById('id_veh_editar').value = data.datos.id_veh;
        document.getElementById('placa_veh_editar').value = data.datos.placa_veh;
        document.getElementById('propietario_name_veh_editar').value = data.datos.name;
        document.getElementById('propietario_lastname_veh_editar').value = data.datos.lastname;
        document.getElementById('marca_veh_editar').value = data.datos.marca_veh;
        document.getElementById('color_veh_editar').value = data.datos.color_veh;

    })
}



/* Admin-Reservas */ 

function filtrarReservas(){
    
    textofiltrarespacio = document.getElementById("filtrarporespacio").value;
    textofiltrarusuario = document.getElementById("filtrarporusuario").value;
    textofiltrarestado = document.getElementById("filtrarporestado").value;
    
        const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
        data = new FormData();
        data.append('textofiltrarespacio',textofiltrarespacio);
        data.append('textofiltrarusuario',textofiltrarusuario);
        data.append('textofiltrarestado',textofiltrarestado);
        fetch('/admin/reservas/filtro',{
            method:'POST',
            headers:{
                
                "X-CSRF-Token": csrfToken
            },
            body: data
        }).then(response=>response.text()).then(data=>{
            console.log(data);
            document.getElementById("bloque2").innerHTML = data;
        })
   
    
}
function filtrarReservasTodos(){
    document.getElementById("filtrarporespacio").value = " "
    document.getElementById("filtrarporusuario").value = " "
    document.getElementById("filtrarporestado").value = " "
    filtrarReservas();

}
/* function filtrarPorEspacio(){
    texto = document.getElementById("filtrarporespacio").value;
    
    fetch(`/admin/reservas/filtro?texto=${texto}`,{
        method:'get'

    }).then(response => response.text()).then(data => {
        console.log(data);
        document.getElementById("bloque2").innerHTML = data;
    })
} */

/* -------- */