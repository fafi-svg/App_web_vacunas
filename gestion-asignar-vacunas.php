<?php
    require_once __DIR__."/processes/signOff.php";
    if(isset($_POST['exitSession'])){
        (new SignOff)->exitSession();
    } else{session_start();} 
    require_once(__DIR__."/controller/user.controller.php");
    require_once(__DIR__."/controller/vacuna.controller.php");
    require_once(__DIR__."/consultas/consultas-Vacunas.php");
    // require_once(__DIR__."/controller/tipomascota.controller.php");
    require_once(__DIR__."/consultas/consultas-Mascotas.php");
    require_once(__DIR__."/models/controlvacuna.model.php");
    require_once(__DIR__."/processes/set.model.controlVacuna.php");
    
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
    <link rel="stylesheet" href="css/gestion-asignar-vacunas.css">
    <title>Asignas Vacunas</title>
</head>
<body onload="box__icon__color()">
    <main class="main_gestion-vacuna">
        <?php if(!empty($_SESSION['usuario'])){?>
            <?php if(!empty($_SESSION['petId'])){?>
                <?php 
                    // $vacunas = (new GestionVacunasConsultas)->readVacunas();
                    // $numeroVacunas = (new GestionVacunasConsultas)->contarVacunas();
                    $vacunasPet = (new GestionVacunasConsultas)->petVacunaNotUse($_SESSION['typePet']);
                    $countVacunasPet = (new GestionVacunasConsultas)->vacunaTypePet($_SESSION['typePet']);
                    $Pets = (new GestionMascotaConsultas) -> pet($_SESSION['petId']);
                    foreach ($vacunasPet as $vacunas) { $longVacunas = sizeof($vacunas); break;}
                    foreach ($countVacunasPet as $countVacuna) { $longVacunasPet = sizeof($countVacuna);break;}
                    foreach ($Pets as $Pet) {$longPetsUser = sizeof($Pet)-1; break; };
                   
                ?>
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
                                        <a href="gestion-mis-mascotas.php" class="menu__option">
                                            <div class="menu__option-img">
                                            <img src="img/icon-animals.png" alt="">
                                            </div>
                                            <p class="menu__option-text">Mis Mascotas</p>
                                        </a>
                                        <a href="gestion-mascotas.php" class="menu__option">
                                            <div class="menu__option-img">
                                                <img src="img/icon-pet-gato.png" alt="">
                                            </div>
                                            <p class="menu__option-text">Gestionar Mascota</p>
                                        </a>
                                        <a href="gestion-razas.php" class="menu__option">
                                            <div class="menu__option-img">
                                                <img src="img/icon-animals.png" alt="">
                                            </div>
                                            <p class="menu__option-text"> Gestionar Razas</p>
                                        </a>
                                        <a href="gestion-vacunas.php" class="menu__option">
                                            <div class="menu__option-img">
                                                <img src="img/icon-geringa-white_rellena.png" alt="">
                                            </div>
                                            <p class="menu__option-text">Gestionar Vacunas</p>
                                        </a>
                                <?php }?>
                                <?php if($_SESSION['rol']=='1'){?>
                                        <a href="gestion-vacunas.php" class="menu__option">
                                            <div class="menu__option-img">
                                                <img src="img/icon-geringa-white_rellena.png" alt="">
                                            </div>
                                            <p class="menu__option-text">Gestionar Vacunas</p>
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
                                if(isset($_POST['btn_add_vacuna'])){
                                    $modelControlVacuas = (new modelControlVacuas);
                                    (new SetModelControlVacuna) -> create($modelControlVacuas);
                            }?>
                        </div>
                        <article class="tables__container">
                            <div class="table__container">
                                    <div class="table__header">
                                        <div  class="table__header-head">
                                            <div class="table__header-container">
                                                <div class="table__header-content">
                                                    <p class="table__header-text">Nombre <span class="textExtra">vacuna</span></p>
                                                    <input class="inputSearch"  type="text" id="nombre"> 
                                                </div>
                                                <div class="table__header-content">
                                                    <p class="table__header-text">Dias <span class="textExtra">Aplicacion</span> </p>
                                                    <input class="inputSearch" type="number" id="aplicacion">          
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="table__content table__content__vacuna">
                                        <div class="table__rows">
                                        <?php $row = 1; foreach ($vacunasPet as $vacunas) {?>
                                            <div class="table__rows-container" id="form_row_<?php echo $row;?>">
                                                <div class="table__calendar" id="btn__calendar">
                                                    <div tabindex="0" class="table__calendar__container">
                                                        <div class="table__calendar__img">
                                                            <img src="img/icon-calender.png" alt="">
                                                        </div>
                                                        <div class="table__calendar__input">
                                                            <input class="fecha__input fechaInput fechaInput_row_<?php echo $row;?>" id="row_<?php echo $row;?>" type="date" name="fecha">
                                                            <input class="fecha__input fechaDefault fechaDefault_row_<?php echo $row;?>" id="row_<?php echo $row;?>" type="hidden" name="fecha" value="<?php echo date('Y'),date('-m-'), date('d')-1?>">                
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="table__rows-content">
                                                    <div class="table__rows-item">
                                                        <div class="table__rows-item-column" id="nombre">
                                                            <p class="table__rows-text"><?php echo $vacunas['nombre']?></p>                                                
                                                        </div>
                                                        <div class="table__rows-item-column" id="aplicacion">
                                                            <p class="table__rows-text"><?php echo $vacunas['aplicacion']?></p>                                                     
                                                        </div>
                                                    </div> 
                                                    <div class="table__rows-icon" id="row_<?php echo $row;?>">
                                                        <input class="asignarVacuna" id="row_<?php echo $row;?>" type="checkbox">
                                                        <input type="hidden" name="id" value="<?php echo $vacunas['id']?>">                                                            
                                                    </div>
                                                </div>
                                            </div>
                                        <?php $row++; }?>
                                        </div>
                                    </div>
                                    <div class="table__footer">
                                        <div class="table__footer-content">
                                            <div class="table__footer-icon">
                                                <img src="img/icon-geringa-white_rellena.png" alt="">
                                                <p class="count__vacunas"><?php echo $countVacuna['cound'];?></p>
                                            </div>
                                            <div class="btn__footer">
                                                <div class="filter__container">
                                                    <div id="btnFilter_row" class="table__footer-filter table__footer-icon">
                                                        <img src="img/icon-filtro.png" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <form method="post" class="table__mascota">
                                <div class="table__header">
                                    <div class="box__info" id="box__info_1">
                                        <div class="box__info__pet">
                                            <div class=" box__icon box__icon-pet user_select_none " id="ramdonColor">
                                            <img class="" src="<?php if($Pet['foto'] != null){echo $Pet['foto'];}else{ if($Pet['TipoMascota_id'] == 1){echo 'img/icon-pet-gato.png';}else if($Pet['TipoMascota_id'] == 2){echo 'img/icon-pet-perro-mediano.png';}}?>" alt="icon-pet">
                                            </div>
                                            <div class="box__text box__text-pet">
                                                <div class="box__text-name">
                                                    <p class="box__text-title"><?php echo $Pet['nombre'];?></p>                                     
                                                    <p class="box__text-date"><?php echo $Pet['FechaNacimiento'];?></p>
                                                </div>     
                                            </div>
                                        </div>
                                        <div class="box__icon-btn-container">
                                            <div class="box__icon__count box__icon user_select_none cursor_pointer" id="1">
                                                <p class="">+<span class="countVacunas">0</span></p>
                                                <img class="box__icon-btn-img" src="img/icon-geringa-white_rellena.png" alt="icon-lapiz">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table__content table__content__mascota">

                                </div>
                                <div class="table__footer table__footer__mascota">
                                    <input id="btn_add_vacuna" class="login__button-primario" name="btn_add_vacuna" type="submit" value="Asignar">
                                    <input id="" class="" name="btn_add_vacuna_value" type="hidden" value="<?php $Pet['id']?>">
                                </div>
                            </form>
                        </article>
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
            <?php } else{header("location: gestion-mis-mascotas");}?>
        <?php } else{header("location: error-not-session.php");}?>
    </main>
    <script src="js/main.js">

    </script>
</body>
</html>