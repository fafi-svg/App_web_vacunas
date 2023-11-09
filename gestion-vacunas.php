<?php
    require_once __DIR__."/processes/signOff.php";
    if(isset($_POST['exitSession'])){
        (new SignOff)->exitSession();
    } else{session_start();} 
    require_once(__DIR__."/controller/user.controller.php");
    require_once(__DIR__."/controller/vacuna.controller.php");
    require_once(__DIR__."/consultas/gestionVacunas.php");
    require_once(__DIR__."/consultas/gestionMascotas.php");
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
                                <?php
                                    if(isset($_POST['updateData'])){
                                        if(!(empty($_POST['updateData']))){
                                            require_once(__DIR__."/processes/controlUpdateVacunas.php");
                                            (new ControlUpdateVacunas) ->updateVacunas();
                                        }
                                    }
                                    $vacunas = (new GestionVacunasConsultas)->readVacunas();
                                    $numeroVacunas = (new GestionVacunasConsultas)->contarVacunas();
                                    $nombreColumnas = (new GestionVacunasConsultas)->nombreVacunas();
                                    $tiposMascotas = (new GestionMascotasConsultas)->tiposMascotas();
                                ?>
                        </div>
                            <div class="table__container">
                                <div class="table__header">
                                        <?php
                                            foreach ($vacunas as $variable) {
                                                $long = sizeof($variable)-1;
                                                break;
                                            }
                                            foreach ($nombreColumnas as $nameColumn) {
                                                $longnameColumn = sizeof($nameColumn)-1;
                                                break;
                                            }
                                            foreach ($tiposMascotas as $typePets) {
                                                $longTypePets = sizeof($typePets)-1;
                                                break;
                                            }
                                        ?>
                                        <div tabindex="0"  class="table__header-x">
                                            <div class="table__header-container">
                                                <div class="table__header-content">
                                                     <p class="table__header-rows">ID</p>
                                                </div>
                                                <div class="table__header-content">
                                                     <p class="table__header-rows">Nombre vacuna</p>
                                                     <input id="inputCreate" class="inputAgregar" type="text" name="nombre" require>
                                                </div>
                                                <div class="table__header-content">
                                                     <p class="table__header-rows">Dias Aplicacion </p>
                                                     <input id="inputCreate" class="inputAgregar" type="text" name="aplicacion" require>
                                                </div>
                                                <div class="table__header-content">
                                                     <p class="table__header-rows">Tipo Mascota</p>
                                                     <select class="inputAgregar" name="tipomascota_id" id="inputCreate" require>
                                                        <option value=""></option>
                                                        <option value="2">Perro</option>
                                                        <option value="1">Gato</option>
                                                     </select>
                                                </div>
                                                <div class="table__header-content">
                                                     <p class="table__header-rows">Vacunas Usadas</p>
                                                 </div>
                                        </div>
                                            <?php 
                                            if($_SESSION['rol']=="2"){
                                            ?>
                                                <div class="table__header-icon">
                                                    <img class="btnSubmit-img" src="img/icon-agregar-white.png" alt="">
                                                    <div class="table__header-input" id="table__header-input">
                                                        <img class="btnSubmit-img" src="img/icon-guardar.png" alt="">
                                                        <input class="btnSubmitAgregar" id="btnAgregarSubmit" type="submit">
                                                    </div>
                                                    
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
                                    </div>
                                    
                                <div class="table__content">
                                    <div class="table__rows">
                                        <?php
                                            $con = 1;
                                             foreach ($vacunas as $variable) {
                                        ?>
                                        <form method="post" class="table__rows-content" id="row_<?php echo $con;?>">
                                                <?php
                                                    if($_SESSION['rol']=="2"){
                                                ?>
                                                    <div class="screenDelete screenDelete_row_<?php echo$con;?>">
                                                        <div class="screenDelete_btn">
                                                            <img class="btnDelete_img" src="img/icon-update.png" alt="icon-update">
                                                            <input class="btnDelete_input inputDelete_row_<?php echo $con;?>" id="row_<?php echo $con;?>" value="<?php echo $con;?>" type="submit" name="deleteData">
                                                        </div>
                                                        <p class="screenDelete_text">
                                                            Desea Eliminar El registro vacuna
                                                        </p>
                                                    </div>
                                                <?php
                                                   }
                                                ?>
                                            <div class="table__rows-column">
                                                <?php
                                                $contador=0;
                                                $contPetImg = 0;
                                                foreach ($variable as $content) {
                                                ?>
                                                        <div class="table__rows-column-container">
                                                                    <?php
                                                                    if($contador == 3){
                                                                        if(array_keys($nameColumn)[$contador] == 'tipomascota_id' ){
                                                                    ?>
                                                                            <?php if($content == 1){?>
                                                                                <div class="table__rows-text-img">
                                                                                    <img src="img/icon-pet-gato.png" alt="">
                                                                                </div>
                                                                            <?php }else if($content == 2){?>
                                                                                <div class="table__rows-text-img">
                                                                                    <img src="img/icon-pet-perro-pequeño.png" alt="">
                                                                                </div>
                                                                            <?php }else{?>
                                                                                <div class="table__rows-text-img">
                                                                                    <img src="img/icon-pet-perro-grande.png" alt="">
                                                                                </div>
                                                                            <?php } }?>
                                                                        <?php 
                                                                    }else{ 
                                                                    ?>
                                                                        <p class="table__rows-text">  <?php  echo $content; ?> </p>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                
                                                            <?php
                                                              if($_SESSION['rol']=="2" and $contador <= ($longnameColumn) and $contador > 0){
                                                            ?>
                                                                <div class="inputUpdate__container">
                                                                    <?php
                                                                    if(array_keys($nameColumn)[$contador] == 'tipomascota_id'){
                                                                    ?>
                                                                        <select class="inputUpdate inputUpdate_row_<?php echo$con;?>" name="<?php echo (array_keys($nameColumn)[$contador]);?>" id="row_<?php echo$con;?>">
                                                                                <option value=""></option>
                                                                                <option value="2">Perro</option>
                                                                                <option value="1">Gato</option>
                                                                        </select>
                                                                    <?php
                                                                    }else{
                                                                    ?>
                                                                        <input class="inputUpdate inputUpdate_row_<?php echo $con;?>" id="row_<?php echo $con;?>"  type="<?php if(array_keys($nameColumn)[$contador] == 'nombre'){echo'text';}else{echo'number';}?>" name="<?php echo (array_keys($nameColumn)[$contador]);?>">
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            <?php
                                                              }  
                                                            ?>
                                                        </div>
                                                    <?php
                                                    $contador++; 
                                                    if($contPetImg < 3){
                                                        $contPetImg ++;
                                                    }
                                                    
                                                }
                                                $contador=0;
                                                ?> 
                                            </div>
                                            <?php
                                                if($_SESSION['rol']=="2"){
                                                    ?>
                                                        <div class="table__rows-btn table__rows-btn_row_<?php echo $con;?>">
                                                            <div id="btnUpdate" class="table__rows-btn-img row_<?php echo $con;?>">
                                                                <img src="img/icon-lapiz-white.png" alt="icon-lapiz">
                                                            </div>
                                                            <div id="btnDelete" class="table__rows-btn-img row_<?php echo $con;?>">
                                                                <img class="btnDelete-img" src="img/icon-basurero-white.png" alt="icon-basurero">
                                                            </div>
                                                            <div class="labelSubmit labelSubmit_row_<?php echo $con;?>">
                                                                <img class="btnSubmit-img" src="img/icon-update.png" alt="icon-update">
                                                                <input class="btnSubmit inputSubmit_row_<?php echo $con;?>" id="row_<?php echo $con;?>" value="<?php echo $con;?>" type="submit" name="updateData">
                                                            </div>
                                                            <div class="btnFlecha">
                                                                    <img class="btnFlecha-img" src="img/icon-flecha.png" alt="">
                                                            </div>
                                                        </div>
                                                <?php 
                                                    } else {    
                                                ?>      
                                                    <div id="row_<?php echo $con;?>" class="table__rows-icon-row">
                                                        <input class="table__rows-img" type="checkbox" required name='<?php echo $variable["ID"]?>' >
                                                    </div>
                                                <?php 
                                                    }
                                                    ?>
                                    </form>
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