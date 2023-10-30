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
                    <div <?php if($_SESSION['rol']=="1"){echo "style='height:30vh; background: linear-gradient(to bottom right, rgb(51, 33, 51), #5c415d);'";} ?> class="box__container box__container-user">
                        <div class="box__icon">
                            <img src="img/icon-user.png" alt="">
                        </div>
                        <div class="box__text">
                            <p class="box__text-name"><?php echo $_SESSION['usuario'];?></p>
                            <p class="box__text-rol"><?php if($_SESSION['rol']=="1"){echo 'Usuario';}else{echo 'administrador';}?></p>
                        </div>
                    </div>
                    <div <?php if($_SESSION['rol']=="1"){echo "style='height:30vh;'";} ?> class="box__container"> 
                        <div class="box__img">
                            <img src="img/icon-geringa-white_rellena.png" alt="">
                        </div>
                        <div class="box__text">
                            <p class="box__text-name"><?php if($_SESSION['rol']=="1"){echo 'Gestionar Vacunas';}else{echo 'Registro De Vacunas';}?></p>
                        </div>
                    </div>
                    <div <?php if($_SESSION['rol']=="1"){echo "style='height:30vh;'";} ?> class="box__container"> 
                        <div class="box__img">
                            <img src="img/icon-animals.png" alt="">
                        </div>
                        <div class="box__text">
                            <p class="box__text-name"><?php if($_SESSION['rol']=="1"){echo 'Mis Mascotas';}else{echo 'Gestionar Razas';}?></p>
                        </div>
                    </div>
                    <?php
                        if($_SESSION['rol']=="2"){
                    ?>
                    <div <?php if($_SESSION['rol']=="1"){echo "style='display:flex;'";} ?> class="box__container"> 
                        <div class="box__img">
                            <img src="img/icon-pet-gato.png" alt="">
                        </div>
                        <div class="box__text">
                            <p class="box__text-name">Gestionar Mascota</p>
                        </div>
                    </div>
                    <?php
                        }
                    ?>

                </div>
            </div>
        <?php
        } else{header("location: error-not-session");}
        ?>
        <a href="inicio.php">inicio</a>
    </main>
</body>
</html>