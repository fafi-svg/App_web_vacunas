<?php
    require_once __DIR__."/processes/signOff.php";
    if(isset($_POST['exitSession'])){
        (new SignOff)->exitSession();
    } else{session_start();} 
    require_once(__DIR__."/controller/user.Controller.php");
    $vacunas = (new controllerUser)->read();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/gestion-vacunas.css">
    <title>Gestion de Vacunas</title>
</head>
<body>
    <main class="main_gestion-vacuna">
            <?php if(!empty($_SESSION['usuario'])){
            ?>
           <div class="screen__gestion-vacuna">
                <header class="header__gestion-vacuna">
                    <div class="header__logo user_select_none">
                        <div class="header__logo-img">
                            <img src="img/logo-pets-black-aro.png" alt="logo-pets">
                        </div>
                        <p class="header__logo-name">
                            LEGION OF PETS
                        </p>
                    </div>
                    <div class="header__icon-img cursor_pointer user_select_none">
                        <img tabindex="0" class="button__exit" src="img/icon-menu-white.png" alt="">
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
                <section class="section__content">
                    <div class="table">
                        <div class="table__title">
                            <p class="table__title-text">Gestion De Vacunas</p>
                        </div>
                            <div class="table__container">
                                <div class="table__header">
                                        <?php
                                        foreach ($vacunas as $variable) {
                                            $long = sizeof($variable)-1;
                                            break;
                                        }
                                        ?>
                                        <div class="table__header-container">
                                            <?php 
                                            for ($i= 0; $i<=$long; $i++) {
                                                ?>
                                                    <div class="table__header-rows" style="text-align: center;">                           
                                                            <?php  
                                                                echo (array_keys($variable)[$i]); 
                                                            ?>
                                                        </div>
                                                <?php
                                                }
                                                ?> 
                                        </div>
                                    </div>
                                <?php 
                                    if($_SESSION['rol']=="2"){
                                ?>
                                    <div class="table__header-icon">
                                        <img src="img/icon-agregar-white.png" alt="">
                                    </div>
                                <?php 
                                    } else {    
                                ?>
                                    <div class="table__header-icon">
                                        <img src="img/icon-pet-perro-pequeño.png" alt="">
                                        <img src="img/icon-agregar-white.png" alt="">
                                    </div>
                                <?php 
                                    }    
                                ?>
                                <div class="table__content">
                                    <div class="table__rows">
                                        <?php
                                             foreach ($vacunas as $variable) {
                                        ?>
                                        <div class="table__rows-content">
                                            <div class="table__rows-column">
                                                <?php
                                                foreach ($variable as $content) {
                                                    ?>
                                                        <p class="table__rows-text"  style="text-align: center;">                           
                                                                <?php  
                                                                    echo $content; 
                                                                ?>
                                                        </p>
                                                    <?php
                                                }
                                                ?> 
                                            </div>
                                            <?php
                                                if($_SESSION['rol']=="2"){
                                                    ?>
                                                        <div class="table__rows-icon-row">
                                                            <div class="table__rows-img">
                                                                <img src="img/icon-lapiz-white.png" alt="icon-lapiz">
                                                            </div>
                                                            <div class="table__rows-img">
                                                                <img src="img/icon-basurero-white.png" alt="icon-lapiz">
                                                            </div>
                                                        </div>
                                                <?php 
                                                    } else {    
                                                ?>      
                                                    <div class="table__rows-icon-row">
                                                        <input class="table__rows-img" type="check" required name="row" >
                                                    </div>
                                                <?php 
                                                    }
                                                    ?>
                                            </div>
                                            <?php
                                             }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="table__footer">
                                    <div class="table__footer-icon">
                                        <img src="img/icon-geringa-white_rellena.png" alt="">
                                        <?php
                                            
                                        ?>
                                    </div>
                            </div>
                        </div>
                    </div>
                </section>
           </div>
        <?php
        } else{header("location: error-not-session.php");}
        ?>
    </main>
</body>
</html>