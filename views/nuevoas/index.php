<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nuevo</title>
</head>
<body>
    <?php require 'views/header.php'; ?>
    <div class="main">
        <h1 class="center">Nuevo Asociado</h1>
        <div class="center"><?php echo $this->mensaje;?></div>
        <form action="<?php echo constant('URL');?>nuevoas/registrarAsociado" method="post" class="center">
            <p>
                <label for="id">Identificacion</label><br>
                <input type="number"  name="cedula" require>
            </p>
            <p>
                <label for="nombre">Nombre completo</label><br>
                <input type="text" name="nombre" require>
            </p>
            <p>
                <label for="direccion">Direccion</label><br>
                <input type="text" name="direccion" require>
            </p>
            <p>
                <label for="telefono">Telefono</label><br>
                <input type="text" name="telefono" require>
            </p>
            <p>
                <label for="email">Correo Electronico</label><br>
                <input type="email" name="email" require>
            </p>
            <p>
                <label for="birth_date">Fecha nacimiento</label><br>
                <input type="date" name="birth_date" min="1960-01-01" max="2003-12-31" require>
            </p>
            <p>
                <label for="create_time">Fecha de ingreso del asociado</label><br>
                <!--<label for="create_time"><?php echo date('Y-m-d H:i:s');?></label><br>-->
                <input type="text" name="create_time" value="<?php echo date('Y-m-d H:i:s');?>" require readonly>
              
            </p>
            <p>
                <label for="total_aportes">Total de aportes</label><br>
                <input type="text" name="total_aportes" require ><br><br>
            </p>
            <p>
                <input type="submit" value="Registrar Asociado">
            </p>
        
        </form>

    </div>
    <?php require 'views/footer.php';?>
</body>
</html>