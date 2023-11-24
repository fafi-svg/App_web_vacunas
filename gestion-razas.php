<?php
    require_once __DIR__."/processes/signOff.php";
    if(isset($_POST['exitSession'])){
        (new SignOff)->exitSession();
    } else{session_start();} 
    require_once(__DIR__."/controller/user.controller.php");
    require_once(__DIR__."/controller/vacuna.controller.php");
    require_once(__DIR__."/consultas/consultas-gestion-Razas.php");
    require_once(__DIR__."/consultas/consultas-gestion-Razas.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header-style.css">
    <link rel="stylesheet" href="css/table-style.css">
    <link rel="stylesheet" href="css/gestion-razas.css">
    <title>Gestion Razas</title>
</head>
<body class="body__gestion__mascota">
    <main class="main__gestion__mascota">
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
                                            <p class="table__header-text">Nº Mascotas</p>
                                            <?php if($_SESSION['rol'] == "2"){?>
                                                <input id="inputSearch" class="inputBuscar" type="text" name="m.nombre" require>
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
                                            <p class="table__header-text">Raza</p>
                                            <?php if($_SESSION['rol'] == "2"){?>
                                                <select class="inputBuscar" name="m.TipoMascota_id" id="inputSearch" require>
                                                    <option value=""></option>
                                                    <?php foreach ($petsRazaName as $nameRaza) {
                                                    ?>  
                                                        <option value="<?php $nameRaza['nombre']?>"> <?php echo $nameRaza['nombre']; ?></option>
                                                    <?php }?>
                                                </select>
                                            <?php }?>
                                        </div>
                                        <div class="table__header-content">
                                            <p class="table__header-text">Tamaño</p>
                                            <?php if($_SESSION['rol'] == "2"){?>
                                                <select class="inputBuscar" name="m.TipoMascota_id" id="inputSearch" require>
                                                    <option value=""></option>
                                                    <option value="mini">mini</option>
                                                    <option value="pequeno">pequeño</option>
                                                    <option value="mediana">mediano</option>
                                                    <option value="grande">grande</option>
                                                    <option value="gigante">gigante</option>
                                                </select>
                                            <?php }?>
                                        </div>
                                    </div>
                                    <?php if($_SESSION['rol']=="2"){ ?>

                                    <?php } else { ?>
                                        <div class="table__header-icon">
                                            <img class="btnSubmit_img" src="img/icon-agregar-white.png" alt="">
                                        </div>
                                    <?php }?>
                                </form>
                            </div>
                            <div class="table__content">
                                <div class="table__rows">
                                    <?php
                                        $row=1;
                                        foreach ($petsRazaData as $petsRazaData_Row) {
                                    ?>
                                        <form method="post" class="table__rows-container" id="row_<?php echo$row;?>">
                                            <div class="table__rows-content">
                                                <div class="table__rows-item">
                                                    <div class="table__rows-item-column">
                                                        <p class="table__rows-text"><?php echo $petsRazaData_Row['countRaza'] ?></p>
                                                    </div>
                                                    <div class="table__rows-item-column">
                                                        <img class="table__rows-img" 
                                                            src=" <?php 
                                                                    if($petsRazaData_Row['tm.nombre']=='gato'){
                                                                        if($petsRazaData_Row['t.tamano']=='grande'){
                                                                            echo 'img/icon-pet-gato.png';
                                                                        }else{
                                                                            echo 'img/icon-pet-gato.png';
                                                                        }
                                                                    }                                                                  
                                                                    if($petsRazaData_Row['tm.nombre']=='perro') {
                                                                        if($petsRazaData_Row['t.tamano']=='mini'){
                                                                            echo 'img/icon-pet-perro-mini.png';
                                                                        }
                                                                        if($petsRazaData_Row['t.tamano']=='pequeno'){
                                                                            echo 'img/icon-pet-perro-pequeño.png';
                                                                        }
                                                                        if($petsRazaData_Row['t.tamano']=='mediano'){
                                                                            echo 'img/icon-pet-perro-mediano.png';
                                                                        }
                                                                        if($petsRazaData_Row['t.tamano']=='grande'){
                                                                            echo 'img/icon-pet-perro-grande-2.png';
                                                                        }
                                                                        if($petsRazaData_Row['t.tamano']=='didante'){
                                                                            echo 'img/icon-pet-perro-gigante.png';
                                                                        }
                                                                    } ?>" alt="">
                                                    </div>
                                                    <div class="table__rows-item-column">
                                                        <p class="table__rows-text"><?php echo $petsRazaData_Row['r.nombre'] ?></p>
                                                    </div>
                                                    <div class="table__rows-item-column">
                                                        <p class="table__rows-text"><?php echo strtoupper($petsRazaData_Row['t.tamano']) ?></p>
                                                    </div>
                                                </div>
                                           </div>
                                        </form>
                                    <?php
                                        $row++; 
                                         }
                                         $con=0;
                                    ?>
                                </div>
                            </div>
                            <div class="table__footer">
                                <div class="table__footer-content">
                                    <div class="table__footer-icon">
                                        <img src="img/icon-geringa-white_rellena.png" alt="">
                                    </div>
                                    <div id="btnFilter_row" class="table__footer-filter table__footer-icon">
                                        <img src="img/icon-filtro.png" alt="">
                                    </div>
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