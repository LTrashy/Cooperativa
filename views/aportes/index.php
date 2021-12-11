<?php

    $user = $this->d['user'];
    $persona = $this->d['persona'];
    $asociado = $this->d['asociado'];
    $aporte = $this->d['aporte'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= URL ?>public/css/table.css">
    <link rel="stylesheet" href="<?= URL ?>public/css/aporte.css">
    <title>Coop - Aporte</title>
</head>
<body>
    <?php require 'views/dashboard/header.php'?>
    

    <div id="main-container">
        <div id="aporte-container" class="container">
            <div id="aporte-header">
                <div id="aporte-info-container">
                    <div id="aporte-info">
                        <h2>Lista de Aportes</h2>
                    </div>
                </div>
            </div>
            <table class="table" width="100%">
                <thead>
                    <tr>
                        <th id="valor" class="bOrdenar">Valor del aporte <i class="material-icons v">expand_more</i></th>
                        <th id="fecha" class="bOrdenar">Fecha del aporte <i class="material-icons f">expand_more</i></th>
                    </tr>
                </thead>

                <tbody id="tbody-aportes">          
                    <?php 
                        foreach($aporte as $row){
                    ?>  
                            <tr>
                                <td><?= $row->getValorAporte()?></td>
                                <td><?= $row->getCreateTime()?></td>
                            </tr>
                    <?php     
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script type="text/javascript">
        var data = {"id": "", "field" :"", "sentido" : ""};
        
        var id = '<?= $asociado->getId()?>';
        var userSelection = document.getElementsByClassName('bOrdenar');
        var valor = document.querySelector('.v');
        var fecha = document.querySelector('.f');

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
            data['id'] = id;
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
                data['sentido'] = 'ASC';
            }else if(data['sentido'] == 'ASC'){
                data['sentido'] = 'DESC';
            }else{
                data['sentido'] = '';
                data['field']='';

            }
            cargarTodos();
        }
    </script>
</body>
</html>