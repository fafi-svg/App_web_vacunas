<?php
    require_once __DIR__."/processes/signOff.php";
    if(isset($_POST['exitSession'])){
        (new SignOff)->exitSession();
    } else{session_start();} 
    require_once(__DIR__."/controller/user.controller.php");
    require_once(__DIR__."/controller/vacuna.controller.php");
    require_once(__DIR__."/consultas/gestionVacunas.php");
    $vacunas = (new GestionVacunasConsultas)->readVacunas();
    $numeroVacunas = (new GestionVacunasConsultas)->contarVacunas();
    $nombreVocunas = (new GestionVacunasConsultas)->nombreVacunas();
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
                        <img tabindex="0" class="button__menu" src="img/icon-menu-white.png" alt="">
                        <div class="menu__exit">
                            <div class="menu__exit-content">
                                <a class="menu__option">
                                    <div class="menu__option-img">
                                        <img src="img/icon-animals.png" alt="">
                                    </div>
                                    <p class="menu__option-text">Gestionar Razas</p>
                                </a>
                                <a class="menu__option">
                                    <div class="menu__option-img">
                                        <img src="img/icon-pet-gato.png" alt="">
                                    </div>
                                    <p class="menu__option-text">Gestionar Mascota</p>
                                </a>
                                <a class="menu__option">
                                    <div class="menu__option-img">
                                        <img src="img/icon-geringa-white_rellena.png" alt="">
                                    </div>
                                    <p class="menu__option-text">Gestionar Vacunas</p>
                                </a>
                                <form class="menu__exit-form" method="post">
                                    <input id="button__exit" class="login__button-primario" name="exitSession" type="submit" value="Salir">
                                    <label for="button__exit">
                                        <img tabindex="0" class="" src="img/icono-salida_mini.png" alt="button__exit">
                                    </label>
                                    
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
                                            foreach ($nombreVocunas as $nameVocunas) {
                                                $longNameVocunas = sizeof($variable)-1;
                                                break;
                                            }
                                        ?>
                                        <div class="table__header-container">
                                            <?php 
                                                for ($i= 0; $i<=$long; $i++) {
                                                    ?>
                                                        <p class="table__header-rows">                    
                                                            <?php  
                                                                echo (array_keys($variable)[$i]); 
                                                            ?>
                                                        </p>
                                                    <?php
                                                        if($_SESSION['rol']=="2" and $i <= ($long-1)){
                                                    ?>
                                                           
                                                    <?php
                                                        }
                                                    ?>
                                                <?php
                                                }
                                                
                                                ?> 
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
                                                    <img src="img/icon-agregar-white.png" alt="">
                                                </div>
                                        <?php 
                                            }    
                                        ?>
                                    </div>
                                    
                                <div class="table__content">
                                    <div class="table__rows">
                                        <?php
                                            $con = 1;
                                             foreach ($vacunas as $variable) {
                                        ?>
                                        <div class="table__rows-content" id="row_<?php echo $con;?>">
                                            <div class="table__rows-column">
                                                <?php
                                                $contador=0;
                                                foreach ($variable as $content) {
                                                    ?>
                                                        <div class="table__rows-column-container">
                                                            <p class="table__rows-text"  style="text-align: center;">                           
                                                                    <?php  
                                                                        echo $content; 
                                                                    ?>
                                                            </p>
                                                            <?php
                                                              if($_SESSION['rol']=="2" and $contador <= ($longNameVocunas-1) and $contador > 0){
                                                            ?>
                                                                <div class="inputUpdate__container">
                                                                    <input class="inputUpdate" id="row_<?php echo $con;?>" style="width: 100%;" type="text" name="<?php echo (array_keys($nameVocunas)[$contador]);  ?>">
                                                                </div>
                                                            <?php
                                                              }  
                                                            ?>
                                                        </div>
                                                    <?php
                                                 $contador++;
                                                }
                                                $contador=0;
                                                ?> 
                                            </div>
                                            <?php
                                                if($_SESSION['rol']=="2"){
                                                    ?>
                                                            <!-- <div id="btnSubmit" class="table__rows-submit row_"> -->
                                                                    <input class="inputSubmit inputSubmit_row_<?php echo $con;?>" id="row_<?php echo $con;?>" type="submit" name="updateData" value="Actualizar">
                                                            <!-- </div> -->
                                                        <!-- <div class="table__rows-icon-row"> -->
                                                            <div id="btnUpdate" class="table__rows-img row_<?php echo $con;?>">
                                                                <img src="img/icon-lapiz-white.png" alt="icon-lapiz">
                                                            </div>
                                                            <div id="btnDelete" class="table__rows-img row_<?php echo $con;?>">
                                                                <img src="img/icon-basurero-white.png" alt="icon-lapiz">
                                                            </div>
                                                        <!-- </div> -->
                                                <?php 
                                                    } else {    
                                                ?>      
                                                    <div id="row_<?php echo $con;?>" class="table__rows-icon-row">
                                                        <input class="table__rows-img" type="checkbox" required name='<?php echo $variable["ID"]?>' >
                                                    </div>
                                                <?php 
                                                    }
                                                    ?>
                                            </div>
                                            <?php
                                                $con++;
                                             }
                                             $con=0;
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="table__footer" style="align-items: center;">
                                    <div class="table__footer-icon">
                                        <img src="img/icon-geringa-white_rellena.png" alt=""><?php $countVacunas = mysqli_fetch_array($numeroVacunas); echo $countVacunas['cound'];?>
                                    </div>
                                    <?php
                                          if($_SESSION['rol']=="2"){
                                    ?>
                                        <div id="btnFilter_row" class="table__footer-filter table__footer-icon">
                                            <img src="img/icon-filtro.png" alt="">
                                        </div>
                                    <?php
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>
                </section>
           </div>
        <?php
        } else{header("location: error-not-session.php");}
        ?>
    </main>
    <script src="js/main.js">

    </script>
</body>
</html>