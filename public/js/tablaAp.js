var data = {"field" :"", "sentido" : ""};

// console.log(id);

var userSelection = document.getElementsByClassName('bOrdenar');
var valor = document.querySelector('.v');
var fecha = document.querySelector('.f');


// console.log(icon);
for(let i = 0; i < userSelection.length; i++) {
  userSelection[i].addEventListener("click", function() {
    // console.log("index: " + i );
    if(i == 0){
        if(valor.textContent == 'expand_more'){
            valor.textContent = 'expand_less'
        }else{
            valor.textContent = 'expand_more'
        }
        // console.log(valor.textContent= 'expand_less');
    }else if(i == 1){
        if(fecha.textContent == 'expand_more'){
            fecha.textContent = 'expand_less'
        }else{
            fecha.textContent = 'expand_more'
        }
    }
    ordenarPor(this.id);
  })
}

function cargarTodos(){
    
    var xmlhttp = new XMLHttpRequest();
    // var cedula =document.getElementById('cedula');
    // var id = cedula.value;
    // data['id'] = id;
    //console.log(data);
    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            
            document.getElementById("tbody-aportes").innerHTML = this.responseText;
        }
    };
    //console.log(id);
    xmlhttp.open("GET", "aporte/order/"+ JSON.stringify(data) , true);
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