function mostrargeneral(){
    document.getElementById("seccionselector").selectedIndex = "0";;
    document.getElementById("mapacompleto").style.display ='block';
    document.getElementById("secciona").style.display ='none';
    document.getElementById("seccionb").style.display ='none';
    document.getElementById("seccionc").style.display ='none';
    document.getElementById("secciond").style.display ='none';
}
function cambioselector(){
    let seccionselector = document.getElementById("seccionselector").value; 
    if(seccionselector=="Sección A"){
        document.getElementById("mapacompleto").style.display ='none';
        document.getElementById("secciona").style.display ='block';
        document.getElementById("seccionb").style.display ='none';
        document.getElementById("seccionc").style.display ='none';
        document.getElementById("secciond").style.display ='none';
    }
    else{
        if(seccionselector=="Sección B"){
            document.getElementById("mapacompleto").style.display ='none';
            document.getElementById("secciona").style.display ='none';
            document.getElementById("seccionb").style.display ='block';
            document.getElementById("seccionc").style.display ='none';
            document.getElementById("secciond").style.display ='none';

        }
        else{
            if(seccionselector=="Sección C"){
                document.getElementById("mapacompleto").style.display ='none';
                document.getElementById("secciona").style.display ='none';
                document.getElementById("seccionb").style.display ='none';
                document.getElementById("seccionc").style.display ='block';
                document.getElementById("secciond").style.display ='none';
            }
            else{
                if(seccionselector=="Sección D"){
                    document.getElementById("mapacompleto").style.display ='none';
                    document.getElementById("secciona").style.display ='none';
                    document.getElementById("seccionb").style.display ='none';
                    document.getElementById("seccionc").style.display ='none';
                    document.getElementById("secciond").style.display ='block';
                }
            }
        }
    }
}