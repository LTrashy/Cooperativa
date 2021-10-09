<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Aporte</title>
</head>
<body>
    <?php require 'views/header.php'; ?>
    <div class="main">
        <div id="main-container">
        <h1 class="center">Ver Aportes</h1>
        
        <form action="" method="POST" class="center" id="busqueda">

            <p>
                <label for="cedula">Ingrese su Cedula</label><br>
                <input type="text" name="cedula" id="cedula" require><br><br>
            </p>
            <p>
                <input type="button" id=bVer  value="Ver Aporte"><br><br><br>
            </p>
        </form>
        </div>
        <table width="100%" class="table" >
            <thead>
                <tr>
                    <th id="valor" class="bOrdenar">Valor del aporte</th>
                    <th id="fecha" class="bOrdenar">Fecha del aporte</th>
                    
                </tr>
            </thead>

            <tbody id="tbody-aportes">          
        
            </tbody>
        </table>
    </div>
    <?php require 'views/footer.php'; ?>

    <script src="<?php echo constant('URL'); ?>public/js/tabla.js"></script>
    

</body>
</html>

