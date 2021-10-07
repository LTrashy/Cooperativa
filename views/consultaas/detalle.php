<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar</title>
</head>
<body>
    <?php require 'views/header.php'; ?>
    <div class="main">
        <h1 class="center">Detalle de: <?php echo $this->asociado->cedula;?></h1>
        <div class="center"><?php echo $this->mensaje;?></div>
        <form action="<?php echo constant('URL');?>consultaas/actualizarAsociado" method="post" class="center">
            <p>
                <label for="id">Identificacion</label><br>
                <input type="number"  name="cedula" value="<?php echo $this->asociado->cedula;?>"require readonly>
            </p>
            <p>
                <label for="nombre">Nombre completo</label><br>
                <input type="text" name="nombre" value="<?php echo $this->asociado->nombre;?>" require>
            </p>
            <p>
                <label for="direccion">Direccion</label><br>
                <input type="text" name="direccion" value="<?php echo $this->asociado->direccion;?>" require>
            </p>
            <p>
                <label for="telefono">Telefono</label><br>
                <input type="number" name="telefono" value="<?php echo $this->asociado->telefono;?>" require>
            </p>
            <p>
                <label for="email">Correo Electronico</label><br>
                <input type="email" name="email"  value="<?php echo $this->asociado->email;?>" require>
            </p>
            <p>
                <label for="birth_date">Fecha nacimiento</label><br>
                <input type="date" name="birth_date" value="<?php echo $this->asociado->birth_date;?>" require>
            </p>
            <p>
                <br><input type="submit" value="Actualizar Asociado">
            </p>
        
        </form>

    </div>
    <?php require 'views/footer.php';?>
</body>
</html>