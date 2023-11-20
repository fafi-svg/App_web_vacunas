<?php
    require_once __DIR__."/processes/signOff.php";
    if(isset($_POST['exitSession'])){
        (new SignOff)->exitSession();
    } else{session_start();} 
    require_once(__DIR__."/controller/user.controller.php");
    require_once(__DIR__."/controller/vacuna.controller.php");
    require_once(__DIR__."/consultas/gestionVacunas.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header-style.css">
    <link rel="stylesheet" href="css/table-style.css">
    <link rel="stylesheet" href="css/gestion-vacunas.css">
    <title>Gestion de Vacunas</title>
</head>
<body>
    <main class="main_gestion-vacuna">
        <?php if(!empty($_SESSION['usuario'])){?>
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
                                <?php if($_SESSION['rol']=='2'){?>
                                    <a href="gestion-razas.php" class="menu__option">
                                        <div class="menu__option-img">
                                            <img src="img/icon-animals.png" alt="">
                                        </div>
                                        <p class="menu__option-text"> Gestionar Razas</p>
                                    </a>
                                    <a href="gestion-mascotas.php" class="menu__option">
                                        <div class="menu__option-img">
                                            <img src="img/icon-pet-gato.png" alt="">
                                        </div>
                                        <p class="menu__option-text">Gestionar Mascota</p>
                                    </a>
                                    <a href="gestion-mis-mascotas.php" class="menu__option">
                                        <div class="menu__option-img">
                                        <img src="img/icon-animals.png" alt="">
                                        </div>
                                        <p class="menu__option-text">Mis Mascotas</p>
                                    </a>
                                <?php }?>
                                <?php if($_SESSION['rol']=='1'){?>
                                    <a href="gestion-mis-mascotas.php" class="menu__option">
                                        <div class="menu__option-img">
                                        <img src="img/icon-animals.png" alt="">
                                        </div>
                                        <p class="menu__option-text">Mis Mascotas</p>
                                    </a>
                                <?php }?>
                                <a href="homepage.php" class="button__home">
                                    <div class="menu__option-img">
                                        <img src="img/icon-home.png" alt="">
                                    </div>
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
                                    if(isset($_POST['updateData'])  or !empty($_POST['aplicacion']) or !empty($_POST['tipomascota_id']) or !empty($_POST['nombre'])){
                                        if(!(empty($_POST['updateData']))){
                                            require_once(__DIR__."/processes/controlUpdateVacunas.php");
                                            (new ControlUpdateVacunas) ->updateVacunas();
                                        }
                                    }
                                    if(isset($_POST['deleteData'])){
                                        require_once(__DIR__."/controller/vacuna.controller.php");
                                        (new controllerVacuna) ->delete($_POST['deleteData']);
                                    }
                                    if(isset($_POST['addDataRow']) or !empty($_POST['aplicacion']) or !empty($_POST['tipomascota_id']) or !empty($_POST['nombre'])){
                                        echo($_POST['addDataRow']);
                                        require_once(__DIR__."/controller/vacuna.controller.php");
                                        require_once(__DIR__."/models/vacuna.model.php");
                                        $modelVacuna = (new modelVacuna);
                                        (new controllerVacuna) ->create($modelVacuna);
                                    }
                                    $vacunas = (new GestionVacunasConsultas)->readVacunas();
                                    $numeroVacunas = (new GestionVacunasConsultas)->contarVacunas();
                                ?>
                        </div>
                        <div class="table__container">
                                <div class="table__header">
                                        <?php
                                            foreach ($vacunas as $variable) {
                                                $long = sizeof($variable)-1;
                                                break;
                                            }
                                        ?>
                                        <form method="post" class="table__header-head">
                                            <div class="table__header-container">
                                                <div class="table__header-content">
                                                     <p class="table__header-text">Fila</p>
                                                </div>
                                                <div class="table__header-content">
                                                     <p class="table__header-text">Nombre vacuna</p>
                                                     <?php if($_SESSION['rol'] == "2"){?>
                                                     <input id="inputCreate" class="inputAgregar" type="text" name="nombre" require>
                                                     <?php }?>
                                                </div>
                                                <div class="table__header-content">
                                                     <p class="table__header-text">Dias Aplicacion </p>
                                                     <?php if($_SESSION['rol'] == "2"){?>
                                                     <input id="inputCreate" class="inputAgregar" type="text" name="aplicacion" require>
                                                     <?php }?>
                                                </div>
                                                <div class="table__header-content">
                                                     <p class="table__header-text">Tipo Mascota</p>
                                                     <?php if($_SESSION['rol'] == "2"){?>
                                                     <select class="inputAgregar" name="tipomascota_id" id="inputCreate" require>
                                                        <option value=""></option>
                                                        <option value="2">Perro</option>
                                                        <option value="1">Gato</option>
                                                     </select>
                                                     <?php }?>
                                                </div>
                                                <div class="table__header-content">
                                                     <p class="table__header-text">Vacunas Usadas</p>
                                                 </div>
                                            </div>
                                            <?php 
                                            if($_SESSION['rol']=="2"){
                                            ?>
                                                <div class="table__header-icon">
                                                        <img class="btnSubmit_img" src="img/icon-agregar-white.png" alt="">
                                                        <div class="table__header-input" id="table__header-input">
                                                            <img class="btnSubmit_img" src="img/icon-guardar.png" alt="">
                                                            <input class="btnSubmitAgregar" id="btnAgregarSubmit" type="submit" name="addDataRow">
                                                        </div>

                                                </div>
                                            <?php 
                                            } else {    
                                            ?>
                                                <div class="table__header-icon">
                                                    <img src="img/icon-pet-gato.png" alt="">
                                                </div>
                                            <?php 
                                            }    
                                            ?>
                                        </form>
                                </div>
                                    
                                <div class="table__content">
                                    <div class="table__rows">
                                        <?php $con = 1; $row=1; foreach ($vacunas as $variable) {?>
                                            <form method="post" class="table__rows-container" id="row_<?php echo$row;?>">
                                                <?php
                                                    if($_SESSION['rol']=="2"){
                                                ?>
                                                    <div class="screenDelete screenDelete_row_<?php echo  $row;?>" id="screenDelete_row_<?php echo  $row;?>">
                                                        <div class="screenDelete_btn">
                                                            <img class="btnDelete_img" src="img/icon-basurero-white.png" alt="icon-update">
                                                            <img id="row_<?php echo  $row;?>" class="btnExit_img" src="img/icon-cruz-white.png" alt="icon-update">
                                                            <input class="btnDelete_input inputDelete_row_<?php echo  $row;?>" id="row_<?php echo $row;?>" value="<?php echo  $row;?>" type="submit" name="deleteData">
                                                        </div>
                                                        <p class="screenDelete_text">
                                                            Desea Eliminar El registro vacuna
                                                        </p>
                                                    </div>
                                                <?php
                                                   }
                                                ?>
                                                <div class="table__rows-content">
                                                    <div class="table__rows-item">
                                                        <div class="table__rows-item-column">
                                                            <p class="table__rows-text"><?php echo $row ?></p>
                                                        </div>
                                                        <div class="table__rows-item-column">
                                                            <p class="table__rows-text"><?php echo $variable['nombre'] ?></p>
                                                            <?php if($_SESSION['rol']=="2"){ ?>
                                                                <div class="inputUpdate__container">                                                        
                                                                    <input class="inputUpdate inputUpdate_row_<?php echo $row;?>" id="row_<?php echo $row;?>" type="text" name="nombre">
                                                                </div>    
                                                             <?php } ?>                                                    
                                                        </div>
                                                        <div class="table__rows-item-column">
                                                        <p class="table__rows-text"><?php echo $variable['aplicacion'] ?></p>
                                                        <?php if($_SESSION['rol']=="2"){ ?>
                                                            <div class="inputUpdate__container">
                                                                <input class="inputUpdate inputUpdate_row_<?php echo $row;?>" id="row_<?php echo  $row;?>" type="number" name="aplicacion"> 
                                                            </div>    
                                                        <?php } ?>                                                        
                                                        </div>
                                                        <div class="table__rows-item-column">
                                                        <p class="table__rows-text"><?php echo $variable['tipomascota_id'] ?></p>
                                                        <?php if($_SESSION['rol']=="2"){ ?>
                                                            <div class="inputUpdate__container">
                                                                <select class="inputUpdate inputUpdate_row_<?php echo $row;?>" name="tipomascota_id" id="row_<?php echo $row;?>">
                                                                    <option value=""></option>
                                                                    <option value="2">Perro</option>
                                                                    <option value="1">Gato</option>
                                                                </select>
                                                            </div>
                                                        <?php } ?>
                                                        </div>
                                                        <div class="table__rows-item-column">
                                                            <p class="table__rows-text"><?php echo $variable['countVacuna'] ?></p>
                                                        </div> 
                                                    </div>
                                                    <?php if($_SESSION['rol']=="2"){ ?>
                                                        <div class="table__rows-item-btn">
                                                            <div class="table__rows-btn table__rows-btn_row_<?php echo  $row;?>">
                                                                <div id="btnUpdate" class="table__rows-btn-img row_<?php echo  $row;?> table__rows-btn-edit_row_<?php echo  $row;?>">
                                                                    <img src="img/icon-lapiz-white.png" alt="icon-lapiz">
                                                                </div>
                                                                <div id="btnDelete" class="table__rows-btn-img row_<?php echo  $row;?>">
                                                                    <img id="row_<?php echo  $row;?>" class="btnDelete-img" src="img/icon-basurero-white.png" alt="icon-basurero">
                                                                </div>
                                                                <div class="labelSubmit labelSubmit_row_<?php echo  $row;?>">
                                                                    <img class="btnSubmit-img" src="img/icon-update.png" alt="icon-update">
                                                                    <input class="btnSubmit inputSubmit_row_<?php echo  $row;?>" id="row_<?php echo $row;?>" value="<?php echo  $variable['id'];?>" type="submit" name="updateData">
                                                                </div>
                                                                <div class="btnFlecha">
                                                                        <img class="btnFlecha-img" src="img/icon-flecha.png" alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } else { ?>      
                                                        <div class="table__rows-item table__rows-icon" id="row_<?php echo  $row;?>" class="">
                                                            <input class="table__rows-img" type="checkbox" required name='<?php echo$row;?>' >
                                                        </div>
                                                    <?php }?>
                                                </div>
                                            </form>
                                        <?php $con++; $row++;}?>
                                    </div>
                                </div>
                                <div class="table__footer">
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