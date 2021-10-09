var data = {"id" : "", "field" :"", "sentido" : ""};
document.getElementById("bVer").addEventListener("click",function(){
    cargarTodos();
});
var userSelection = document.getElementsByClassName('bOrdenar');

for(let i = 0; i < userSelection.length; i++) {
  userSelection[i].addEventListener("click", function() {
    //console.log("Clicked index: " + i);
    ordenarPor(this.id);
  })
}

function cargarTodos(){
    
    var xmlhttp = new XMLHttpRequest();
    var cedula =document.getElementById('cedula');
    var id = cedula.value;
    data['id'] = id;
    //console.log(data);
    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            
            document.getElementById("tbody-aportes").innerHTML = this.responseText;
        }
    };
    //console.log(id);
    xmlhttp.open("GET", "http://dali.test/consultaap/verAporte/"+ JSON.stringify(data) , true);
    xmlhttp.send();
}


function ordenarPor(field){
    if(data['field'] != field){
        data['sentido'] = '';
    }
    data['field']=field;
    //console.log(data);
    if(data['sentido'] == ''){
        data['sentido'] = 'asc';
    }else if(data['sentido'] == 'asc'){
        data['sentido'] = 'desc';
    }else{
        data['sentido'] = '';
        data['field']='';

    }
    cargarTodos();
}