<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credito</title>
</head>
<body>
    <?php require 'views/header.php'?>
    <div class="main">
        <h1 class="center">Nuevo Credito</h1>
        <div class="center"><?php echo $this->mensaje;  ?></div>
        <form action="<?php echo constant('URL');?>nuevocredito/crearCredito" method="POST" class="center">
            <P>
                <label for="cedula">Ingrese su cedula</label><br>
                <input type="text" name="cedula" require>
            </P>
            <P>
                <label for="valor_credito">Valor del Credito</label><br>
                <input type="text" name="valor_credito" require>
            </P>
            <P>
                <label for="num_cuotas">Numero de cuotas</label><br>
                <input type="number" name="num_cuotas" require>
            </P>
            <P>
                <label for="tasa_interes">Tasa del interes</label><br>
                <input type="text" name="tasa_interes" require>
            </P>
            <P>
                <label for="tasa_mora">Tasa por mora</label><br>
                <input type="text" name="tasa_mora" require>
            </P>
            <P>
                <label for="fecha_credito">Fecha creacion</label><br>
                <input type="text" name="fecha_credito" value="<?php echo date('Y-m-d H:i:s');?>" readonly require>
            </P>
            <P>
                <label for="fecha_desembolso">Fecha en que se desembolsa</label><br>
                <input type="date" name="fecha_desembolso"  require ><br><br>
            </P>
            <p>
                <input type="submit" value="Crear Credito">
            </p>

        </form>
    </div>
    
    <?php require 'views/footer.php'?>
</body>
</html>