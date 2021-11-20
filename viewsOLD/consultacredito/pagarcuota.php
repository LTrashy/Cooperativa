<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAgar</title>
</head>
<body>
    <?php require 'views/header.php'?>
    <div class="main">
        <h1 class="center">Pagar cuota # <?php echo $this->cuota->num_cuota;?></h1>
        <div class="center"><?php echo $this->mensaje;?></div>
        <form action="<?php echo constant('URL');?>consultacuota/pagarCuota" method="post" class="center">
            <br>
            <p>
                <label for="valor">Ingrese el valor a pagar</label><br>
                <input type="text" name="valor_cuota" value="<?php echo $this->cuota->saldo_cuota; ?>" require>
            </p>
            
            <p>
                <label for="fecha">Fecha de pago</label><br>
                <input type="date" name="fecha_pago" value="<?php echo $this->cuota->fecha_proyeccion;?>">
            </p>

            <p>
                <br><input type="submit" value="Pagar!">
            </p>
        </form>
    </div>
    <?php require 'views/footer.php'?>
</body>
</html>