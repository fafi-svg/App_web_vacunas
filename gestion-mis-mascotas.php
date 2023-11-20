<?php
    require_once __DIR__."/processes/signOff.php";
    if(isset($_POST['exitSession'])){
        (new SignOff)->exitSession();
    } else{session_start();} 
    require_once(__DIR__."/controller/user.controller.php");
    require_once(__DIR__."/controller/vacuna.controller.php");
    require_once(__DIR__."/consultas/consultas-gestion-Razas.php");
    require_once(__DIR__."/consultas/gestionMascotas.php");
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
                <?php if($_SESSION['rol'] == '2'){?>
                    <?php 
                        $petsRazaData = (new GestionRazasConsultas) -> petsRazaData(); 
                        $petsRazaName = (new GestionRazasConsultas)  ->petsRazaName()  
                    ?>
                    <?php
                    foreach ($petsRazaData as $petsRazaData_Row) {
                        $longPetsRazaData = sizeof($petsRazaData_Row)-1;
                        break;
                    }
                    foreach ($petsRazaName as $petsRazaName_Row) {
                        $longPetsRazaName = sizeof($petsRazaName_Row)-1;
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
                                        <a href="gestion-mis-mascotas.php" class="menu__option">
                                            <div class="menu__option-img">
                                            <img src="img/icon-animals.png" alt="">
                                            </div>
                                            <p class="menu__option-text">Mis Mascotas</p>
                                        </a>
                                        <a href="gestion-vacunas.php" class="menu__option">
                                            <div class="menu__option-img">
                                                <img src="img/icon-geringa-white_rellena.png" alt="">
                                            </div>
                                            <p class="menu__option-text">Gestionar Vacunas</p>
                                        </a>
                                <?php }?>

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
                        <div class="box__pet">
                            <div tabindex="0" class="box__pet-container" id="box__pet-1">
                                <form class="box__info" id="box__info-1">
                                    <div class="box__icon box__icon-pet user_select_none" id="box__icon_1">
                                        <img class="" src="img/icon-pet-gato.png" alt="icon-pet">
                                    </div>
                                    <div class="box__text box__text-pet">
                                        <div class="box__text-name">
                                            <p class="box__text-title">Nombre Mascota 1</p>
                                            <input class="box__text-input" id="input_1" type="text" name="nombre">
                                            <p class="box__text-date">02/nov/219</p>
                                            <input class="box__text-input" id="input_1" type="date" name="FechaNacimiento">
                                        </div>     
                                    </div>
                                    <div class="box__icon-btn-container">
                                        <div class="box__icon-btn user_select_none cursor_pointer" id="1">
                                            <img class="box__icon-btn-img" src="img/icon-lapiz-white.png" alt="icon-lapiz">
                                        </div>
                                        <div class="box__info-input" id="box__info-input_1">
                                            <img class="btnSubmit_img" src="img/icon-guardar.png" alt="">
                                            <input class="btnSubmitAgregar" id="btnAgregarSubmit" type="submit" name="addDataRow">
                                        </div>
                                    </div>
                                </form>
                                <div class="box__vacunas Scroll__container">
                                    <div class="box__vacunas-container">
                                        <div class="box__content">
                                            <div class="box__item">
                                                <div class="box__item-icon box__icon user_select_none">
                                                    <img src="img/icon-geringa-white_rellena.png" alt="icon-geringa">
                                                </div>
                                                <div class="box__text">
                                                    <p class="box__text-title">Nombre Vacuna</p>          
                                                    <p class="box__text-date">02/nov/219</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box__content">
                                            <div class="box__item">
                                                <div class="box__item-icon box__icon user_select_none">
                                                    <img src="img/icon-geringa-white_rellena.png" alt="icon-geringa">
                                                </div>
                                                <div class="box__text">
                                                    <p class="box__text-title">Nombre Vacuna</p>
                                                    <p class="box__text-date">02/nov/219</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box__content">
                                            <div class="box__item">
                                                <div class="box__item-icon box__icon user_select_none">
                                                    <img src="img/icon-geringa-white_rellena.png" alt="icon-geringa">
                                                </div>
                                                <div class="box__text">
                                                    <p class="box__text-title">Nombre Vacuna</p>
                                                    <p class="box__text-date">02/nov/219</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box__content">
                                            <div class="box__item">
                                                <div class="box__item-icon box__icon user_select_none">
                                                    <img src="img/icon-geringa-white_rellena.png" alt="icon-geringa">
                                                </div>
                                                <div class="box__text">
                                                    <p class="box__text-title">Nombre Vacuna</p>
                                                    <p class="box__text-date">02/nov/219</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="box__icon-default box__icon">
                                        <img class="box__icon-created user_select_none" src="img/icon-agregar-white.png" alt="">
                                        <p class="box__text-title"> Agregar Vacina</p>
                                    </div>
                                </div>
                                <div class="btn__expan" id="1"><img src="img/icon-flecha.png" alt=""></div>  
                            </div>
                        </div>
                        <div class="box__pet">
                            <div tabindex="0" class="box__pet-container" id="box__pet-2">
                                <form class="box__info" id="box__info-2">
                                    <div class="box__icon box__icon-pet user_select_none" id="box__icon_2">
                                        <img class="" src="img/icon-pet-gato.png" alt="icon-pet">
                                    </div>
                                    <div class="box__text box__text-pet">
                                        <div class="box__text-name">
                                            <p class="box__text-title">Nombre Mascota 1</p>
                                            <input class="box__text-input" id="input_2" type="text" name="nombre">
                                            <p class="box__text-date">02/nov/219</p>
                                            <input class="box__text-input" id="input_2" type="date" name="nombre">
                                        </div>     
                                    </div>
                                    <div class="box__icon-btn-container">
                                        <div class="box__icon-btn user_select_none cursor_pointer" id="2">
                                            <img class="box__icon-btn-img" src="img/icon-lapiz-white.png" alt="icon-lapiz">
                                        </div>
                                        <div class="box__info-input" id="box__info-input_2">
                                            <img class="btnSubmit_img" src="img/icon-guardar.png" alt="">
                                            <input class="btnSubmitAgregar" id="btnUpdateSubmit" type="submit" name="addDataRow">
                                        </div>
                                    </div>
                                </form>
                                <div class="box__vacunas Scroll__container">
                                    <div class="box__vacunas-container">
                                        <div class="box__content">
                                            <div class="box__item">
                                                <div class="box__item-icon box__icon user_select_none">
                                                    <img src="img/icon-geringa-white_rellena.png" alt="icon-geringa">
                                                </div>
                                                <div class="box__text">
                                                    <p class="box__text-title">Nombre Vacuna</p>          
                                                    <p class="box__text-date">02/nov/219</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box__content">
                                            <div class="box__item">
                                                <div class="box__item-icon box__icon user_select_none">
                                                    <img src="img/icon-geringa-white_rellena.png" alt="icon-geringa">
                                                </div>
                                                <div class="box__text">
                                                    <p class="box__text-title">Nombre Vacuna</p>
                                                    <p class="box__text-date">02/nov/219</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box__content">
                                            <div class="box__item">
                                                <div class="box__item-icon box__icon user_select_none">
                                                    <img src="img/icon-geringa-white_rellena.png" alt="icon-geringa">
                                                </div>
                                                <div class="box__text">
                                                    <p class="box__text-title">Nombre Vacuna</p>
                                                    <p class="box__text-date">02/nov/219</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box__content">
                                            <div class="box__item">
                                                <div class="box__item-icon box__icon user_select_none">
                                                    <img src="img/icon-geringa-white_rellena.png" alt="icon-geringa">
                                                </div>
                                                <div class="box__text">
                                                    <p class="box__text-title">Nombre Vacuna</p>
                                                    <p class="box__text-date">02/nov/219</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="box__icon-default box__icon">
                                        <img class="box__icon-created user_select_none" src="img/icon-agregar-white.png" alt="">
                                        <p class="box__text-title"> Agregar Vacina</p>
                                    </div>
                                </div>
                                <div class="btn__expan" id="2"><img src="img/icon-flecha.png" alt=""></div>  
                            </div>
                        </div>
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
            <!-- <?php
                } else{header("location: error-not-session.php");}
            ?>
        <?php
        } else{header("location: error-not-session.php");}
        ?> -->
    </main>
    <script src="js/main_mascotas.js">

    </script>
</body>
</html>