const botones = document.querySelectorAll(".bEliminar");

botones.forEach(boton => {
    boton.addEventListener("click", function(){
        const id_persona = this.dataset.id;
        //console.log(id_persona);
        const confirm = window.confirm("Deseas eliminar el elemento?");

        if(confirm){
            httpRequest("consultaas/eliminarAsociado/" + id_persona, function(e){
                console.log(this.responseText);
                const tbody = document.querySelector("#tbody-asociados");
                const fila  = document.querySelector("#fila-" + id_persona);
                tbody.removeChild(fila);
            })
        }
    });
});


function httpRequest(url, callback){
    const http = new XMLHttpRequest();
    http.open("GET", url);
    http.send();

    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            callback.apply(http);
        }
    }
}