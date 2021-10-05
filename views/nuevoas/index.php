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
                <input type="number" max="11" name="id_persona" require>
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
                <input type="number" max="10" name="telefono" require>
            </p>
            <p>
                <label for="email">Correo Electronico</label><br>
                <input type="email" name="email" require>
            </p>
            <p>
                <label for="birth_date">Fecha nacimiento</label><br>
                <input type="date" name="birth_date" require>
            </p>
            <p>
                <label for="id_asociado">Identificador del asociado</label><br>
                <input type="text" name="id_asociado" require>
            </p>
            <p>
                <label for="create_time">Fecha de ingreso del asociado</label><br>
                <input type="datetime" name="create_time" value="<?php echo date('Y-m-d\TH-i');?>" require disabled>
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