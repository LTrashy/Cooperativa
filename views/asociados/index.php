<?php
    $user = $this->d['user'];
    $persona = $this->d['persona'];
    $asociados = $this->d['asociados'];

    // var_dump($asociados);
    // die();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="<?= URL ?>public/css/table.css">
    <link rel="stylesheet" href="<?= URL ?>public/css/aporte.css">
    <title>coop - Asociados</title>
</head>
<body>
    <?php include 'views/admin/header.php'?>
    
    <div id="main-container">
        <div id="aporte-container" class="container">
            <div id="aporte-header">

                <div id="aporte-info-container">
                    <div id="aporte-info">
                        <h2>Lista de Asociados</h2>
                    </div>
                </div>
            </div>
            <table class="table" width="100%">
                <thead>
                <tr>
                    <th id="cedula" class="bOrdenar">Cedula</th>
                    <th id="nombre" class="bOrdenar">Nombre</th>
                    <th id="fechaa" class="bOrdenar">Fecha de ingreso <i class="material-icons f">horizontal_rule</i></th>
                    <th id="valorr" class="bOrdenar">Valor de aportes <i class="material-icons f">horizontal_rule</i></th>
                    <th>Aportes</th>
                </tr>
            </thead>
            <tbody id="tbody-asociados">
                <?php
                    foreach($asociados as $row){
                ?>
                        <tr>
                            <td><?= $row->getCedula()?></td>
                            <td><?= $row->getNombre()?></td>
                            <td><?= $row->getCreateTime()?></td>
                            <td><?= $row->getTotalAportes()?></td>
                            <td><a href="<?= URL?>aporte/renderPerId/<?= $row->getIdAsociado()?>"><i class="material-icons">read_more</i></a></td>
                        </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>