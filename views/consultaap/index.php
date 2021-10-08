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
        
        <form action="<?php echo constant('URL');?>consultaap/verAportes" method="POST" class="center" id="busqueda">

            <p>
                <label for="cedula">Ingrese su Cedula</label><br>
                <input type="text" name="cedula" require>
            </p>
            <p>
                <input type="button" id="bVer" value="Ver aportes">
            </p>
        </form>
        </div>
        <table width="100%" class="table" >
            <thead>
                <tr>
                    <th>Aporte #</th>
                    <th>Asociado #</th>
                    <th>Valor del aporte</th>
                    <th>Fecha del aporte</th>
                </tr>
            </thead>

            <tbody id="tbody-asociados">
            
        <?php
            include_once 'models/aporte.php';
            foreach ($this->aportes as $row) {
                $aporte = new Aporte();
                $aporte = $row;
        ?>
                <tr id="fila-<?php echo $aporte->id; ?>">
                    <td><?php echo $aporte->id; ?></td>
                    <td><?php echo $aporte->id_asociado; ?></td>
                    <td><?php echo $aporte->valor_aporte; ?></td>
                    <td><?php echo $aparte->create_date; ?></td>
                     
                </tr>
        <?php } ?>
            </tbody>
        </table>
    </div>
    <?php require 'views/footer.php'; ?>

    <script></script>
    <script></script>

</body>
</html>

