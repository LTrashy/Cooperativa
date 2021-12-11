<?php
    $user = $this->d['user'];
    $persona = $this->d['persona'];
    $asociado = $this->d['asociado'];
    $aporte = $this->d['aporte'];
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
    <!-- <h1>holaaaa hasbo</h1> -->
    <div id="main-container">
        <?php $this->showMessages();?>
        <div id="asociado-container" class="container">
            <div id="left-container">
                <div id="asociado-summary">
                    <div>
                        <h2>Bienvenido <?= ($persona->getNombre() != '') ? $persona->getNombre() : $user->getUsername()?></h2>
                    </div>
                    <div class="cards-container">
                        <div class="card w-100">
                            <div class="total-aportes">
                                <span class="total-aportes-text">
                                    Aportes realizados
                                </span>
                            </div>
                            <div class="total-value">
                                <?php
                                    if($asociado->getTotalAportes() === null){
                                        echo "Hubo un problema al cargar los datos";
                                    }else{?>
                                        <span class="" >
                                            $<?= number_format($asociado->getTotalAportes(), 2)?> COP
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

                            <div class="total-value">
                                <?php
                                    if($aporte->getCreateTime() === null){
                                        echo "Hubo un problema al cargar los datos";
                                    }else{?>
                                        <span class="" >
                                            <?= date($aporte->getCreateTime())?>
                                        </span>
                            <?php   } ?>
                            </div>
                        </div>

                        <div class="card w-50">
                            <div class="total-aportes">
                                <span class="total-aportes-text">
                                    Valor del ultimo Aporte
                                </span>
                            </div>

                            <div class="total-value">
                                <?php
                                    if($aporte->getValorAporte() === null){
                                        echo "Hubo un problema al cargar los datos";
                                    }else{?>
                                        <span class="" >
                                            $<?= number_format($aporte->getValorAporte(), 2)?> COP
                                        </span>
                            <?php   } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="right-container">
                <div class="transactions-container">
                    <section class="operations-container">
                        <h2>Acciones</h2>
                        <button class="btn-main" id="new-aporte">
                            <i class="material-icons">add</i>
                            <span>Registrar nuevo aporte</span>
                        </button>

                    </section>
                </div>
            </div>
        </div>
    </div>
</body>
</html>