const boton_eliminar = document.querySelectorAll(".btn_eliminar");
const boton_editar = document.querySelectorAll('.btn_editar');

boton_eliminar.forEach(boton => {
    boton.addEventListener("click", function(){

       const id_alumno = this.dataset.id_alumno;

       const confirm = window.confirm("¿Deseas eliminar el alumno "+id_alumno);
       if(confirm){
           //solicitud AJAX
           httpRequest("http://localhost/mvc_php/alumnoajax/eliminar/"+id_alumno, function () {
               console.log(this.responseText);

               const tbody = document.querySelector("#tbody-alumnos");
               const fila = document.querySelector("#fila-"+id_alumno);

               tbody.removeChild(fila);
           });
       }
   })
});

boton_editar.forEach(boton => {
    boton.addEventListener("click", function(){

        const id_alumno = this.dataset.id_alumno;
        const fila = document.querySelector("#fila-"+id_alumno);

    })
});

function httpRequest(url, callback){
    const http = new XMLHttpRequest();
    http.open("GET", url);
    http.send();
    
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200){
            callback.apply(http);
        }
    }
}