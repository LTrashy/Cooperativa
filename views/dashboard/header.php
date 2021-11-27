<link rel="stylesheet" href="<?= constant('URL')?>public/css/default.css">
<link rel="stylesheet" href="<?= constant('URL')?>public/css/dashboard.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<span class="nav-bar" id="btnMenu"><i class="material-icons">menu</i> Menu</span>
<div id="header">
    <ul class="menu" id="menu">
        <li><a class="menu__link" href="<?= constant('URL')?>dashboard">Home</a></li>
        <li><a class="menu__link" href="<?= constant('URL')?>expenses">Aportes</a></li>
        <li><a class="menu__link" href="<?= constant('URL')?>logout">Logout</a></li>
    </ul>

    <div id="profile-container">
        <a class="submenu-btn" href="#">
            <div class="name"><?= ($persona->getNombre() != '') ? $persona->getNombre() : $user->getUsername()?></div>
            <div class="photo">
                <i class="material-icons">account_circle</i>
            </div>
        </a>
        <div id="submenu">
            <ul>
                <li><a href="<?= constant('URL')?>user">Ver perfil</a></li>
                <li class='divisor'></li>
                <li><a href="<?= constant('URL')?>logout">Cerrar sesión</a></li>
            </ul>
        </div>
    </div>
</div>

<script src="<?php echo constant('URL'); ?>public/js/menu.js"></script>