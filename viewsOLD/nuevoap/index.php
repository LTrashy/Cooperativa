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
        <h1 class="center">Aporte</h1>
        <div class="center"><?php echo $this->mensaje;?></div>
        <form action="<?php echo constant('URL');?>nuevoap/registrarAporte" method="POST" class="center">

            <p>
                <label for="cedula">Ingrese su Cedula</label><br>
                <input type="text" name="cedula" require>
            </p>
            <p>
                <label for="aporte">Ingrese su aporte</label><br>
                <input type="number" name="aporte" require>
            </p>
            <p>
                <label for="create_time">Fecha del aporte</label><br>
                <!--<label for="create_time"><?php echo date('Y-m-d H:i:s');?></label><br>-->
                <input type="text" name="create_time" value="<?php echo date('Y-m-d H:i:s');?>" require readonly><br><br>
              
            </p>
            <p>
                <input type="submit" value="Hacer aporte">
            </p>
        </form>
    </div>
    <?php require 'views/footer.php'; ?>
</body>
</html>