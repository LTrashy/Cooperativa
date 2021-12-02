<?php
    $user = $this->d['user'];
    $persona = $this->d['persona'];
    $asociado = $this->d['asociado'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coop - Dashboard</title>
</head>
<body>
    <?php require 'header.php';?>
    <h1>holaaaa hasbo</h1>
    <div id="main-container">
        <?php $this->showMessages();?>
        <div id="asociado-container" class="container">
            <div id="id-container">
                <div id="asociado-sumary">
                    <div>
                        <h2>Bienvenido <?= $persona->getNombre()?></h2>
                    </div>
                    <div class="cards-container">
                        <div class="card w-100">
                            <div class="total-aportes">
                                <span class="total-aportes-text">
                                    Aportes realizados
                                </span>
                            </div>
                            <div class="total-aportes-value">
                                <?php
                                    if($asociado->getTotalAportes() === null){
                                        echo "Hubo un problema al cargar los datos";
                                    }else{?>
                                        <span class="" >
                                            $<?= number_format($asociado->getTotalAportes(), 2)?>
                                        </span>
                            <?php   } ?>
                            </div>
                        </div>
                    </div>

                    <div class="cards-container">
                        <div class="card w-50">
                            <div class="total-aportes">
                                <span class="total-aportes-text">
                                    Fecha del ultimo aporte
                                </span>
                            </div>

                            <div class="total-aportes-value">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>