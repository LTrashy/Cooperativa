<?php
    $user = $this->d['user'];
    $persona = $this->d['persona'];
    $role = $this->d['role'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/user.css">
    <title>Coop - User</title>
</head>
<body>

    <?php
        
        if($role == 'admin'){
            require 'views/admin/header.php';
        }else if($role == 'user'){
            require 'views/dashboard/header.php';
        }
    ?>
    

    <div id="main-container">
        <?php $this->showMessages();?>
        <div id="user-container" class="container">
            <div id="user-header">
                <div id="user-info-container">
                    <div id="user-info">
                        <h2>Hi, <?= ($persona->getNombre() != '') ? $persona->getNombre() : $user->getUsername()?></h2>
                    </div>
                </div>
            </div>
            <div id="side-menu">
                <ul>
                    <li><a href="#info-user-container">Datos del usuario</a></li>
                    <li><a href="#password-user-container">Cambiar contraseña</a></li>
                    <!-- <li><a href=""></a></li> -->
                </ul>
            </div>

            <div id="user-section-container">

                <section id="info-user-container">
                    <form action="<?= URL ?>user/updateData" method="POST">
                        <div class="section">
                            <label for="name">Nombre</label>
                            <input type="text" name="nombre" id="nombre" autocomplete="off" require value="<?= $persona->getNombre()?>">
                            <label for="direccion">Direccion</label>
                            <input type="text" name="direccion" id="direccion" autocomplete="off" require value="<?= $persona->getDireccion()?>">
                            <label for="telefono">Telefono</label>
                            <input type="text" name="telefono" id="telefono" autocomplete="off" require value="<?=  $persona->getTelefono()?>">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" autocomplete="off" require value="<?= $persona->getEmail()?>">
                            <label for="birth">Fecha de nacimiento</label>
                            <input type="date" name="birthDate" id="birthDate" autocomplete="off" require value="<?= $persona->getBirthDate()?>">
                            <input type="submit" value="Actualizar datos">
                        </div>
                    </form>

                    <form action="<?= URL ?>user/updateUsername" method="POST">
                        <div class="section">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" autocomplete="off" require value="<?= $user->getUsername()?>">
                            <input type="submit" value="Cambiar username">
                        </div>
                    </form>
                </section>

                <section id="password-user-container">
                    <form action="<?= URL ?>user/changePass" method="POST">
                        <div class="section">
                            <label for="current_password">Passsword Actual</label>
                            <input type="password" name="current_password" id="current_password" autocomplete="off" require>

                            <label for="new_password">Nuevo Password</label>
                            <input type="password" name="new_password" id="new_password" autocomplete="off" require>

                            <div>
                                <input type="submit" value="Cambiar Password">
                            </div>
                        </div>
                    </form>
                </section>

            </div>
        </div>
    </div>

    <script>
        
        const url = location.href;
        const indexAnchor = url.indexOf('#');

        closeSections();

        if(indexAnchor > 0){
            const anchor = url.substring(indexAnchor);
            document.querySelector(anchor).style.display = 'block';

            document.querySelectorAll('#side-menu a').forEach(item =>{
                if(item.getAttribute('href') === anchor){
                    item.classList.add('option-active');
                }
            });
        }else{
            document.querySelector('#info-user-container').style.display = 'block';
            document.querySelectorAll('#side-menu a')[0].classList.add('option-active');
        }

        document.querySelectorAll('#side-menu a').forEach(item =>{
            item.addEventListener('click', e =>{
                closeSections();
                const anchor = e.target.getAttribute('href');
                document.querySelector(anchor).style.display = 'block';
                //e.target.setAttribute('class', 'option-active');
                e.target.classList.add('option-active');
            });
        });

        function closeSections(){
            const sections = document.querySelectorAll('section');
            sections.forEach(item =>{
                item.style.display="none";
            });
            document.querySelectorAll('.option-active').forEach(item =>{
                item.classList.remove('option-active');
            });
        }
        
                            
        
    </script>
</body>
</html>