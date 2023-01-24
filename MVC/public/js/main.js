

const botones = document.querySelectorAll(".bEliminar");

botones.forEach(boton=>{
    boton.addEventListener("click",function(){
       const matricula = this.dataset.matricula;
       const confirm = window.confirm(`Deseas Eliminar al alumno ${matricula}`);

       if(confirm){
            //solicitud ajax
            httpRequest("http://localhost/curso/MVC/consulta/eliminarAlumno/"+matricula,function(){
                //console.log(this.responseText);
                    document.querySelector("#respuesta").innerHTML = this.responseText;
                const tbody = document.getElementById("tbody-alumnos");
                const fila = document.querySelector("#fila-"+matricula );

                tbody.removeChild(fila);
            })
       }else{
    
       }

    })
});

function httpRequest(url,callback){
    const http = new XMLHttpRequest();
    http.open("GET",url);
    http.send();

    http.onreadystatechange = function(){
        if(this.readyState == 4 &&  this.status == 200){
                callback.apply(http);
        }
    }

}