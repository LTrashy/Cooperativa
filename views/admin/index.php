<?php
    $user = $this->d['user'];
    $persona = $this->d['persona'];
    $asociados = $this->d['asociados'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>coop - Admin</title>
</head>
<body>
    <?php require 'header.php'?>
    <div id="main-container">
        <?php $this->showMessages();?>
        <div id="asociado-container" class="container">
            <div id="left-container">
                <div id="asociado-summary">
                    <div>
                        <h2>Bienvenido Administrador, <?= ($persona->getNombre() != '') ? $persona->getNombre() : $user->getUsername()?></h2>
                        
                    </div>
                    <div class="cards-container">
                        <div class="card w-100">
                            <div class="total-aportes">
                                <span class="total-aportes-text">
                                    Total de capital
                                </span>
                            </div>
                            <div class="total-value">
                                <?php
                                    if($asociados === null){
                                        echo "Hubo un problema al cargar los datos";
                                    }else{?>
                                        <span class="">
                                            $<?php 
                                                foreach($asociados as $p){
                                                    $suma += $p->getTotalAportes();
                                                }
                                                echo number_format($suma, 2)
                                            ?> COP
                                        </span>
                                <?php   }?>
                            </div>
                        </div>
                    </div>

                    <div class="cards-container">
                        <div class="card w-100">
                            <div class="total-aportes">
                                <span class="total-aportes-text">
                                    Dinero en prestamo
                                </span>
                            </div>
                            <div class="total-value">
                                <?php
                                    if($asociados === null){
                                        echo "Hubo un problema al cargar los datos";
                                    }else{?>
                                        <span class="">
                                            $<?php 
                                                foreach($asociados as $p){
                                                    $suma += $p->getTotalAportes();
                                                }
                                                echo number_format($suma, 2)
                                            ?> COP
                                        </span>
                                <?php   }?>
                            </div>
                        </div>
                    </div>
                    <div class="cards-container">
                        <div class="card w-100">
                            <div class="total-aportes">
                                <span class="total-aportes-text">
                                    Ganancias totales
                                </span>
                            </div>
                            <div class="total-value">
                                <?php
                                    if($asociados === null){
                                        echo "Hubo un problema al cargar los datos";
                                    }else{?>
                                        <span class="">
                                            $<?php 
                                                foreach($asociados as $p){
                                                    $suma += $p->getTotalAportes();
                                                }
                                                echo number_format($suma, 2)
                                            ?> COP
                                        </span>
                                <?php   }?>
                            </div>
                        </div>
                    </div>
                    <div class="cards-container">
                        <div class="card w-100">
                            <div class="total-aportes">
                                <span class="total-aportes-text">
                                    Dinero Disponible
                                </span>
                            </div>
                            <div class="total-value">
                                <?php
                                    if($asociados === null){
                                        echo "Hubo un problema al cargar los datos";
                                    }else{?>
                                        <span class="">
                                            $<?php 
                                                foreach($asociados as $p){
                                                    $suma += $p->getTotalAportes();
                                                }
                                                echo number_format($suma, 2)
                                            ?> COP
                                        </span>
                                <?php   }?>
                            </div>
                        </div>
                    </div>

                    

                </div>
            </div>
        </div>
    </div>
</body>
</html>