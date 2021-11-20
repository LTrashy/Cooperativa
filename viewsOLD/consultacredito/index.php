<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require 'views/header.php';?>
    <div class="main">
        <div id="main-container">
            <h1 class="center">Ver Creditos</h1>
            
            <form action="" method="POST" class="center" id="busqueda">
                <p>
                    <label for="cedula">Ingrese su Cedula</label><br>
                    <input type="text" name="cedula" id="cedula" require><br><br>
                </p>
                <p>
                    <input type="button" id="bVerC" value="Ver Credito"><br><br><br>
                </p>
            </form>
        </div>
        <table width="100%" class="table">
            <thead>
                <tr>
                    <th>!</th>
                    <th>Dia de pago</th>
                    <th>Valor del Credito</th>
                    <th>Numero de cuotas</th>
                    <th>Tasa de interes</th>
                    <th>Tasa de mora</th>
                    <th>Fecha del credito</th>
                    <th>Fecha desembolso</th>
                    <th>Saldo</th>
                </tr>
            </thead>
            <tbody id="tbody-creditos">

            </tbody>
        </table>
    </div>
    <?php require 'views/footer.php'?>
    
    <script src="<?php echo constant('URL');?>public/js/tablaCr.js"></script>
</body>
</html>