
document.getElementById("bVerC").addEventListener("click",function(){
    cargarTodos();
});


function cargarTodos(){
    
    //var xmlhttp = new XMLHttpRequest();
    var cedula =document.getElementById('cedula');
    var id = cedula.value;
    
    httpRequest("consultacredito/verCreditos/"+id ,function(e){
        document.getElementById("tbody-creditos").innerHTML = this.responseText;
    });
    //console.log(data);
    //xmlhttp.onreadystatechange = function(){
    //   if(this.readyState == 4 && this.status == 200){
            
    //        document.getElementById("tbody-creditos").innerHTML = this.responseText;
    //    }
    //};
    //console.log(id);
    //xmlhttp.open("GET", "consultacredito/verCredito/"+ id , true);
    //xmlhttp.send();

        
}


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
