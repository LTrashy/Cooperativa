<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
</head>
<body>
    <?php require 'views/header.php'; ?>
    <div class="main">
        <div><?php echo $this->mensaje; ?></div>
        <h1 class="center">Sección de consulta</h1>

        <table  class="table" >
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Identificacion</th>
                    <th>Asociado #</th>
                    <th>Total de aportes</th>
                    <th>Fecha en que se unio</th>
                    <th>A</th>
                    <th>D</th>
                </tr>
            </thead>

            <tbody id="tbody-asociados">
            
        <?php
            include_once 'models/asociado.php';
            foreach ($this->asociados as $row) {
                $asociado = new Asociado();
                $asociado = $row;
        ?>
                <tr id="fila-<?php echo $asociado->id_persona; ?>">
                    <td data-titulo="Nombre"><?php echo $asociado->nombre; ?></td>
                    <td data-titulo="Cedula"><?php echo $asociado->cedula; ?></td>
                    <td data-titulo="Asociado #"><?php echo $asociado->id_asociado; ?></td>
                    <td data-titulo="Total Aportes"><?php echo $asociado->total_aportes; ?></td>
                    <td data-titulo="Fecha ingreso"><?php echo $asociado->create_time; ?></td>
                    <td data-link=""><a class="href" href="<?php echo constant('URL') . 'consultaas/verAsociado/' . $asociado->id_persona; ?>">Actualizar</a></td>
                    <td data-link=""><button class="bEliminar" data-id="<?php echo $asociado->id_persona; ?>">Eliminar</button></td> 
                </tr>
        <?php } ?>
            </tbody>
        </table>
    </div>
    <?php require 'views/footer.php'; ?>
    <script src="<?php echo constant('URL'); ?>/public/js/delete.js"></script>
</body>
</html>