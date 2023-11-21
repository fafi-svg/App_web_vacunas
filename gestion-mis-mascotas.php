<?php
    require_once __DIR__."/processes/signOff.php";
    if(isset($_POST['exitSession'])){
        (new SignOff)->exitSession();
    } else{session_start();} 
    require_once(__DIR__."/controller/control.vacuna.controller.php");
    require_once(__DIR__."/processes/controlRegistroVacunas.php");
    require_once(__DIR__."/controller/vacuna.controller.php");
    require_once(__DIR__."/consultas/consultas-Vacunas.php");
    require_once(__DIR__."/consultas/consultas-Mascotas.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header-style.css">
    <link rel="stylesheet" href="css/table-style.css">
    <link rel="stylesheet" href="css/gestion-mis-mascotas.css">
    <title>Gestion Razas</title>
</head>
<body onload="box__icon__color()" class="body__gestion__mis__mascota">
    <main class="main__gestion__mis__mascota">
        <?php if(!empty($_SESSION['usuario'])){?>
                    <?php 
                        $PetsUser = (new GestionMascotaConsultas) -> petsUser($_SESSION['id']); 
                        // if(){

                        // }
                    ?>
                    <?php
                    foreach ($PetsUser as $Pet) {
                        $longPetsUser = sizeof($Pet)-1;
                        break;
                    }
            ?> 
            <div class="screen__gestion__mascota">
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
                <section class="section__content Scroll__container">
                    <div class="table__title">
                        <p class="table__title-text">Gestion De Mascotas</p>
                        <div class="box__icon-btn-add-container box__icon">
                            <div class="box__icon-btn-add">
                                <img style="width: 3em;" class="box__icon-created user_select_none" src="img/icon-agregar-white.png" alt="">
                            </div>
                        </div> 
                    </div>
                    <div class="box__container">
                        <?php $numBox = 1; foreach($PetsUser as $Pet){ ?>
                            <div class="box__pet">
                                <div tabindex="0" class="box__pet-container" id="box__pet-<?php echo $numBox; ?>">
                                    <form class="box__info" id="box__info-<?php echo $numBox; ?>">
                                        <div class="box__icon box__icon-pet user_select_none" id="box__icon_<?php echo $numBox; ?>">
                                            <img class="" src="<?php if($Pet['foto'] != null){echo $Pet['foto'];}else{ if($Pet['TipoMascota_id'] == 1){echo 'img/icon-pet-gato.png';}else if($Pet['TipoMascota_id'] == 2){echo 'img/icon-pet-perro-mediano.png';}}?>" alt="icon-pet">
                                        </div>
                                        <div class="box__text box__text-pet">
                                            <div class="box__text-name">
                                                <p class="box__text-title"><?php echo $Pet['nombre']?></p>
                                                <input class="box__text-input" id="input_<?php echo $numBox; ?>" type="text" name="nombre">
                                                <p class="box__text-date"><?php echo $Pet['FechaNacimiento']?></p>
                                                <input class="box__text-input" id="input_<?php echo $numBox; ?>" type="date" name="FechaNacimiento">
                                            </div>     
                                        </div>
                                        <div class="box__icon-btn-container">
                                            <div class="box__icon-btn user_select_none cursor_pointer" id="<?php echo $numBox; ?>">
                                                <img class="box__icon-btn-img" src="img/icon-lapiz-white.png" alt="icon-lapiz">
                                            </div>
                                            <div class="box__info-input" id="box__info-input_<?php echo $numBox; ?>">
                                                <img class="btnSubmit_img" src="img/icon-guardar.png" alt="">
                                                <input class="btnSubmitAgregar" id="btnAgregarSubmit" type="submit" name="addDataRow">
                                            </div>
                                        </div>
                                    </form>
                                    <div class="box__vacunas Scroll__container">
                                        <div class="box__vacunas-container">
                                            <?php $VacunasPet = (new GestionVacunasConsultas) -> petVacuna($Pet['id']); 
                                                if(mysqli_num_rows($VacunasPet) > 0){
                                                    foreach($VacunasPet as $Vacuna){ ?>
                                                    <div class="box__content">
                                                        <div class="box__item">
                                                            <div class="box__item-icon box__icon user_select_none">
                                                                <img src="img/icon-geringa-white_rellena.png" alt="icon-geringa">
                                                            </div>
                                                            <div class="box__text">
                                                                <p class="box__text-title"><?php $Vacuna['nombre']?></p>          
                                                                <p class="box__text-date"><?php $Vacuna['fecha']?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php } }?>
                                        </div>
                                        <div class="box__icon-default box__icon">
                                            <img class="box__icon-created user_select_none" src="img/icon-agregar-white.png" alt="">
                                            <p class="box__text-title"> Agregar Vacina</p>
                                        </div>
                                    </div>
                                    <div class="btn__expan" id="<?php echo $numBox; ?>"><img src="img/icon-flecha.png" alt=""></div>  
                                </div>
                            </div>
                        <?php $numBox++; }   ?>
                    </div>
                    
                    <div class="modal__container">
                        <div class="modal__created">
                            <header class="modal__header">
                                <h2 class="modal__title"> Agregar Datos De Mascota</h2>
                                <div class="modal__close">✕</div>
                            </header>
                            <section class="modal__content">
                                <form class="modal__form" method="post" >
                                    <div class="form__item">
                                        <label for="raza">Razas Mascotas</label>
                                        <select id="raza" name="raza">
                                            <option value=""></option>
                                            <option value="1">Gato</option>
                                            <option value="2">Perro</option>
                                        </select>  
                                    </div>
                                    <div class="form__item">
                                        <label for="tipoMascota">Tipo Mascota</label>
                                        <select id="tipoMascota" name="tipoMascota">
                                            <option value=""></option>
                                            <option value="1">Gato</option>
                                            <option value="2">Perro</option>
                                        </select>                                        
                                    </div>
                                    <div class="form__item">
                                        <label for="nombre">Nombre Mascota</label>
                                        <input id="nombre" type="text" name="nombre">
                                    </div>
                                    <div class="form__item">
                                        <label for="fechaNacimiento">Fecha Nacimiento</label>
                                        <input id="fechaNacimiento" type="date" name="fechaNacimiento">
                                    </div>
                                    <div class="form__item__btn">
                                        <input type="submit" name="btn_created" value="AGREGAR" disabled>                                       
                                    </div>
                                </form>
                            </section>
                            <footer class="modal__footer">

                            </footer>
                        </div>
                    </div>
                </section>
            </div>
        <?php
        } else{header("location: error-not-session.php");}
        ?>
    </main>
    <script src="js/main_mascotas.js"></script>
</body>
</html>