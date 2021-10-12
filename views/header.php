<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/default.css">
    <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">

</head>
<body>
    <span class="nav-bar" id="btnMenu"><i class="fas fa-bars"></i> Menu</span>
    <nav class="main-nav">
        <ul class="menu" id="menu">
            <li class="menu__item"><a class="menu__link" href="<?php echo constant('URL');?>main">Inicio</a></li>
            
            <li class="menu__item container-submenu">
                <a class="menu__link submenu-btn" href="#">Servicios <i class="fas fa-angle-down"></i>
                </a>
                <ul class="submenu">
                    <li class="menu__item"><a class="menu__link" href="<?php echo constant('URL');?>nuevoas">Nuevo Asociado</a></li>
                    <li class="menu__item"><a class="menu__link" href="<?php echo constant('URL');?>nuevoap">Nuevo Aporte</a></li>
                    <li class="menu__item"><a class="menu__link" href="<?php echo constant('URL');?>nuevocredito">Nuevo Credito</a></li>
                </ul>
            </li>
            <li class="menu__item container-submenu">
                <a class="menu__link submenu-btn" href="#">Consultas <i class="fas fa-angle-down"></i></a>
                <ul class="submenu">
                    <li class="menu__item"><a class="menu__link" href="<?php echo constant('URL');?>consultaas">Asociados</a></li>
                    <li class="menu__item"><a class="menu__link" href="<?php echo constant('URL');?>consultaap">Aportes</a></li>
                    <li class="menu__item"><a class="menu__link" href="<?php echo constant('URL');?>consultacredito">Creditos</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <script src="<?php echo constant('URL'); ?>public/js/menu.js"></script>
    
</body>
</html>