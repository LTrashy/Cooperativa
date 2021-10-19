
document.getElementById("bVerC").addEventListener("click",function(){
    cargarTodos();
});

function cargarTodos(){
    
    var xmlhttp = new XMLHttpRequest();
    var cedula =document.getElementById('cedula');
    var id = cedula.value;
    
    //console.log(data);
    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            
            document.getElementById("tbody-creditos").innerHTML = this.responseText;
        }
    };
    //console.log(id);
    xmlhttp.open("GET", "http://192.168.0.6/consultacredito/verCredito/"+ id , true);
    xmlhttp.send();
}


