<?php
    require_once __DIR__."/processes/signOff.php";
    if(isset($_POST['exitSession'])){
        (new SignOff)->exitSession();
    } else{session_start();} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/homepage.css">
   
    <title>Hame Page</title>
</head>
<body>
    <main class="main_homepage">
        <?php if(!empty($_SESSION['usuario'])){?>
            <header class="header__homepage">
                <div class="header__logo user_select_none">
                    <div class="header__logo-img">
                        <img src="img/logo-pets-black-aro.png" alt="logo-pets">
                    </div>
                    <p class="header__logo-name">
                        LEGION OF PETS
                    </p>
                </div>
                <div class="header__icon-img cursor_pointer user_select_none">
                    <img tabindex="0" class="button__exit" src="img/icono-salida_mini.png" alt="">
                    <div class="menu__exit">
                        <div class="menu__exit-content">
                            <p>¿Cerrar Session?</p>
                            <form class="menu__exit-form" method="post">
                                <input class="login__button-primario" name="exitSession" type="submit" value="Salir">
                            </form>
                        </div>
                    </div>
                </div>
            </header>
            <div class="content">
                <div <?php if($_SESSION['rol']=="1"){echo "style='display:flex;'";} ?> class="box">
                    <?php
                        if($_SESSION['rol']=="1"){
                    ?>
                        <div style='height:30vh; background: linear-gradient(to bottom right, rgb(51, 33, 51), #5c415d);' class="box__container box__container-user">
                            <div class="box__icon">
                                <img src="img/icon-user.png" alt="">
                            </div>
                            <div class="box__text">
                                <p class="box__text-name"><?php echo $_SESSION['usuario'];?></p>
                                <p class="box__text-rol">Usuario</p>
                            </div>
                        </div>
                        <a href="gestion-mis-mascotas.php" style='height:30vh;' class="box__container"> 
                            <div class="box__img">
                                <img src="img/icon-animals.png" alt="">
                            </div>
                            <div class="box__text">
                                <p class="box__text-name">Mis Mascotas</p>
                            </div>
                        </a>
                        <a href="gestion-vacunas.php" class="box__container"> 
                            <div class="box__img">
                                <img src="img/icon-geringa-white_rellena.png" alt="">
                            </div>
                            <div class="box__text">
                                <p class="box__text-name">Registro De Vacunas</p>
                            </div>
                        </a>
                    <?php
                        }
                    ?>
                    <?php
                        if($_SESSION['rol']=="2"){
                    ?>
                        <div class="box__container box__container-user">
                            <div class="box__icon">
                                <img src="img/icon-user.png" alt="">
                            </div>
                            <div class="box__text">
                                <p class="box__text-name"><?php echo $_SESSION['usuario'];?></p>
                                <p class="box__text-rol">Usuario</p>
                            </div>
                        </div>
                        <a href="gestion-mascotas.php" class="box__container"> 
                            <div class="box__img">
                                <img src="img/icon-pet-gato.png" alt="">
                            </div>
                            <div class="box__text">
                                <p class="box__text-name">Gestionar Mascota</p>
                            </div>
                        </a>
                        <a href="gestion-vacunas.php" class="box__container"> 
                            <div class="box__img">
                                <img src="img/icon-geringa-white_rellena.png" alt="">
                            </div>
                            <div class="box__text">
                                <p class="box__text-name">Registro De Vacunas</p>
                            </div>
                        </a>
                        <a href="gestion-razas.php" class="box__container"> 
                            <div class="box__img">
                                <img src="img/icon-animals.png" alt="">
                            </div>
                            <div class="box__text">
                                <p class="box__text-name">Gestionar Razas</p>
                            </div>
                        </a>
                    <?php
                        }
                    ?>

                </div>
            </div>
        <?php
            } else{header("location: error-not-session");}
        ?>
    </main>
</body>
</html>