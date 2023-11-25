<?php
    require_once __DIR__."/processes/signOff.php";
    if(isset($_POST['exitSession'])){
        (new SignOff)->exitSession();
    } else{session_start();} 
    require_once(__DIR__."/controller/user.controller.php");
    require_once(__DIR__."/controller/vacuna.controller.php");
    require_once(__DIR__."/consultas/consultas-Vacunas.php");
    include_once(__DIR__."/models/vacuna.model.php");
    require_once(__DIR__."/controller/tipomascota.controller.php");
    require_once(__DIR__."/processes/set.model.vacuna.php");
?>
<?php
    if(isset($_POST['updateData'])){                                        
        (new SetModelVacuna) ->update($_POST['updateData']);
        header('location:gestion-vacunas');
    }
    if(isset($_POST['deleteData'])){
        (new SetModelVacuna) ->delete($_POST['deleteData']);
        header('location:gestion-vacunas');
    }
    if(isset($_POST['btn_created_vacuna'])){                                                                                                           
        $modelVacuna = (new modelVacuna);
        (new SetModelVacuna) ->create($modelVacuna);    
        header('location:gestion-vacunas');
    }
    $vacunas = (new GestionVacunasConsultas)->readVacunas();
    $numeroVacunas = (new GestionVacunasConsultas)->contarVacunas();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header-style.css">
    <link rel="stylesheet" href="css/table-style.css">
    <link rel="stylesheet" href="css/modal-style.css">
    <link rel="stylesheet" href="css/btn-created.css">
    <link rel="stylesheet" href="css/gestion-vacunas.css">
    <title>Gestion de Vacunas</title>
</head>
<body>
    <main class="main_gestion-vacuna">
        <?php if(!empty($_SESSION['usuario'])){?>
           <div class="screen__gestion-vacuna screen__gestion">
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
                            <div class="box__icon-btn-add-container box__icon">
                                <div class="box__icon-btn-add">
                                    <img style="width: 3em;" class="box__icon-created user_select_none" src="img/icon-agregar-white.png" alt="">
                                </div>
                            </div> 
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
                                                    <p class="table__header-text">Nombre <span class="textExtra">vacuna</span></p>
                                                    <input class="inputSearch"  type="text" id="nombre"> 
                                                </div>
                                                <div class="table__header-content">
                                                    <p class="table__header-text">Dias <span class="textExtra">Aplicacion</span> </p>
                                                    <input class="inputSearch" type="number" id="aplicacion">          
                                                </div>
                                                <div class="table__header-content">
                                                    <p class="table__header-text">Tipo <span class="textExtra">Mascota</span> </p>
                                                    <input list="datalist" class="inputSearch" type="text" id="tipomascota"> 
                                                    <datalist id="datalist">
                                                        <option value="perro"></option>
                                                        <option value="gato"></option>
                                                    </datalist>
                                                </div>
                                                <div class="table__header-content">
                                                     <p class="table__header-text">Vacunas <span class="textExtra"> Usadas</span></p>
                                                 </div>
                                            </div>
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
                                                            <input class="btnDelete_input inputDelete_row_<?php echo  $row;?>" id="row_<?php echo $row;?>" value="<?php echo$variable['id'];?>" type="submit" name="deleteData">
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
                                                        <div class="table__rows-item-column" id="nombre">
                                                            <p class="table__rows-text"><?php echo $variable['nombre'] ?></p>
                                                            <?php if($_SESSION['rol']=="2"){ ?>
                                                                <div class="inputUpdate__container">                                                        
                                                                    <input class="inputUpdate inputUpdate_row_<?php echo $row;?>" id="row_<?php echo $row;?>" type="text" name="nombre">
                                                                </div>    
                                                             <?php } ?>                                                    
                                                        </div>
                                                        <div class="table__rows-item-column" id="aplicacion">
                                                        <p class="table__rows-text"><?php echo $variable['aplicacion'] ?></p>
                                                        <?php if($_SESSION['rol']=="2"){ ?>
                                                            <div class="inputUpdate__container">
                                                                <input class="inputUpdate inputUpdate_row_<?php echo $row;?>" id="row_<?php echo  $row;?>" type="number" name="aplicacion"> 
                                                            </div>    
                                                        <?php } ?>                                                        
                                                        </div>
                                                        <div class="table__rows-item-column" id="tipomascota">
                                                        <p class="table__rows-text"><?php echo (new controllerTipoMascota) -> readName($variable['tipomascota_id']) ?></p>
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
                                                                    <input class="btnSubmit inputSubmit_row_<?php echo  $row;?>" id="row_<?php echo $row;?>" value="<?php echo $variable['id'];?>" type="submit" name="updateData">
                                                                </div>
                                                                <div class="btnFlecha">
                                                                        <img class="btnFlecha-img" src="img/icon-flecha.png" alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } else { ?>      
                                                        <div class="table__rows-icon" id="row_<?php echo  $row;?>">
                                                            <input class="" type="checkbox" value="<?php echo$variable['id'];?>" name='<?php echo$row;?>' >
                                                        </div>
                                                    <?php }?>
                                                </div>
                                            </form>
                                        <?php $con++; $row++;}?>
                                    </div>
                                </div>
                                <div class="table__footer">
                                    <div class="table__footer-content">
                                        <div class="table__footer-icon">
                                            <img src="img/icon-geringa-white_rellena.png" alt=""><?php $countVacunas = mysqli_fetch_array($numeroVacunas); echo $countVacunas['cound'];?>
                                        </div>
                                        <div class="btn__footer">
                                            <div class="filter__container">
                                                <div class="filter__content" id="filterContent">
                                                    <div class="inputUpdate__container">                                                        
                                                       
                                                    </div>  
                                                    <div class="inputUpdate__container">
                                                       
                                                    </div>   
                                                    <div class="inputUpdate__container">

                                                    </div>
                                                </div>
                                                <div id="btnFilter_row" class="table__footer-filter table__footer-icon">
                                                    <img src="img/icon-filtro.png" alt="">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                        </div>
                    </div>
                </section>
           </div>
           <div class="modal__container">
                    <div class="modal__created">
                        <header class="modal__header">
                            <h2 class="modal__title"> Agregar Vacuna</h2>
                            <div class="modal__close">✕</div>
                        </header>
                        <section class="modal__content">
                            <form method="post" class="modal__form">
                                <div class="form__item">
                                    <label for="tipoMascota">Nombre Vacuna</label>
                                    <input class="modalInput Scroll__container" type="text" id="tipoMascota" name="nombre" >           
                                </div>
                                <div class="form__item">
                                    <label for="tipoMascota">Tipo Mascota</label>
                                    <select class="modalInput Scroll__container" id="tipoMascota" name="tipoMascota" >
                                        <option value=""></option>
                                        <option value="1">Gato</option>
                                        <option value="2">Perro</option>
                                    </select>                                        
                                </div>
                                <div class="form__item">
                                    <label for="nombre">Tiempo Aplicacion (Dias)</label>
                                    <input class="modalInput" id="nombre" type="number" name="aplicacion" >
                                </div>
                                <div class="form__item__btn">
                                    <input class="modalSubmit" type="submit" name="btn_created_vacuna" value="ENVIAR" disabled>                                    
                                </div>
                            </form>
                        </section>
                        <footer class="modal__footer">
                        </footer>
                    </div>
            </div>
        <?php
        } else{header("location: error-not-session.php");}
        ?>
    </main>
    <script src="js/main.js">

    </script>
</body>
</html>