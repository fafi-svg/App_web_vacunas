<?php
    require_once __DIR__."/processes/signOff.php";
    if(isset($_POST['exitSession'])){
        (new SignOff)->exitSession();
    } else{session_start();} 
    require_once(__DIR__."/controller/user.controller.php");
    require_once(__DIR__."/controller/vacuna.controller.php");
    require_once(__DIR__."/consultas/consultas-Mascotas.php");
    require_once(__DIR__."/consultas/consultas-gestion-Razas.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header-style.css">
    <link rel="stylesheet" href="css/table-style.css">
    <link rel="stylesheet" href="css/gestion-mascotas.css">
    <title>Document</title>
</head>
<body class="body__gestion__mascota">
    <main class="main__gestion__mascota">
        <?php if(!empty($_SESSION['usuario'])){?>
            <?php if($_SESSION['rol'] == '2'){?>
                <?php 
                    $petsUserData = (new GestionMascotaConsultas) -> petsUserData();   
                ?>
                <?php
                foreach ($petsUserData as $petsUserData_Row) {
                    $long = sizeof($petsUserData_Row)-1;
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
                            <p class="table__title-text">Gestion De Mascotas</p>
                        </div>
                        <div class="table__container">
                            <div class="table__header">
                                <form method="post" class="table__header-head">
                                    <div class="table__header-container">
                                        <div class="table__header-content">
                                            <p class="table__header-text">Nombre Mascota</p>
                                            <?php if($_SESSION['rol'] == "2"){?>
                                                <input id="inputSearch" class="inputBuscar" type="text" name="m.nombre" require>
                                            <?php }?>
                                        </div>
                                        <div class="table__header-content">
                                            <p class="table__header-text">Nombre Dueño</p>
                                            <?php if($_SESSION['rol'] == "2"){?>
                                                <input id="inputSearch" class="inputBuscar" type="text" name="u.nombre" require>
                                            <?php }?>
                                        </div>
                                        <div class="table__header-content">
                                            <p class="table__header-text">Nº Vacunas </p>
                                            <?php if($_SESSION['rol'] == "2"){?>
                                                <input id="inputSearch" class="inputBuscar" type="text" name="c.Mascota_id" require>
                                            <?php }?>
                                        </div>
                                        <div class="table__header-content">
                                            <p class="table__header-text">Tipo</p>
                                            <?php if($_SESSION['rol'] == "2"){?>
                                                <select class="inputBuscar" name="m.TipoMascota_id" id="inputSearch" require>
                                                    <option value=""></option>
                                                    <option value="2">Perro</option>
                                                    <option value="1">Gato</option>
                                                </select>
                                            <?php }?>
                                        </div>
                                        <div class="table__header-content">
                                            <p class="table__header-text">Fecha Nacimiento</p>
                                            <?php if($_SESSION['rol'] == "2"){?>
                                                <div class="table__header-input">
                                                    <div class="table__header-input-container inicio">
                                                        <input id="inputSearch" class="inputBuscar Inicio" type="date" name="m.FechaNacimiento" placeholder="Inicio" require>
                                                    </div>
                                                    <div class="table__header-input-container final">
                                                        <input id="inputSearch" class="inputBuscar Final" type="date" name="m.FechaNacimiento" placeholder="Final" require>
                                                    </div>
                                                </div>
                                            <?php }?>
                                        </div>
                                    </div>
                                    <?php 
                                    if($_SESSION['rol']=="2"){
                                    ?>

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
                                </div>
                            </div>
                            <div class="table__footer">
                                <div class="table__header-icon">
                                        <img class="btnSubmit_img" src="img/icon-agregar-white.png" alt="">
                                        <!-- <div class="table__header-input" id="table__header-input">
                                            <img class="btnSubmit_img" src="img/icon-guardar.png" alt="">
                                            <input class="btnSubmitAgregar" id="btnAgregarSubmit" type="submit" name="addDataRow">
                                        </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <?php
                } else{header("location: error-not-session.php");}
            ?>
        <?php
        } else{header("location: error-not-session.php");}
        ?>
    </main>
    <script src="js/main.js">

    </script>
</body>
</html>