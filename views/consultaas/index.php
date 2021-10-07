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

        <table width="100%" class="table" >
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Identificacion</th>
                    <th>Asociado #</th>
                    <th>Total de aportes</th>
                    <th>Fecha en que se unio</th>
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
                    <td><?php echo $asociado->nombre; ?></td>
                    <td><?php echo $asociado->cedula; ?></td>
                    <td><?php echo $asociado->id_asociado; ?></td>
                    <td><?php echo $asociado->total_aportes; ?></td>
                    <td><?php echo $asociado->create_time; ?></td>
                    <td><a href="<?php echo constant('URL') . 'consultaas/verAsociado/' . $asociado->id_persona; ?>">Actualizar</a></td>
                    <td><button class="bEliminar" data-matricula="<?php echo $asociado->id_persona; ?>">Eliminar</button></td> 
                </tr>
        <?php } ?>
            </tbody>
        </table>
    </div>
    <?php require 'views/footer.php'; ?>
    <script src="<?php echo constant('URL'); ?>/public/js/main.js"></script>
</body>
</html>