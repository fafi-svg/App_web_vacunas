<?php
    require_once __DIR__."/processes/signOff.php";
    if(isset($_POST['exitSession'])){
        (new SignOff)->exitSession();
    } else{session_start();} 
    require_once(__DIR__."/controller/user.controller.php");
    require_once(__DIR__."/controller/vacuna.controller.php");
    require_once(__DIR__."/consultas/consultas-gestion-Razas.php");
    require_once(__DIR__."/consultas/consultas-gestion-Razas.php");
    require_once(__DIR__."/controller/tipomascota.controller.php");
    echo date('Y'),date('-m-'), date('d')-1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header-style.css">
    <link rel="stylesheet" href="css/table-style.css">
    <link rel="stylesheet" href="css/btn-created.css">
    <link rel="stylesheet" href="css/modal-style.css">
    <link rel="stylesheet" href="css/gestion-razas.css">
    <title>Gestion Razas</title>
</head>
<body class="body__gestion__mascota">
    <main class="main__gestion__mascota">
        <?php if(!empty($_SESSION['usuario'])){?>
            <?php if($_SESSION['rol'] == '2'){?>
                <?php 
                    $petsRazaData = (new GestionRazasConsultas) -> petsRazaData(); 
                    $PetsRaza = (new GestionRazasConsultas)  ->petsRazaName()  
                ?>
                <?php
                foreach ($petsRazaData as $petsRazaData_Row) {
                    $longPetsRazaData = sizeof($petsRazaData_Row)-1;
                    break;
                }
                foreach ($PetsRaza as $Raza) {$longPetsRaza = sizeof($Raza)-1; break; }?> 
            <div class="screen__gestion__razas screen__gestion">
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
                            <div class="box__icon-btn-add-container box__icon">
                                <div class="box__icon-btn-add">
                                    <img style="width: 3em;" class="box__icon-created user_select_none" src="img/icon-agregar-white.png" alt="">
                                </div>
                            </div> 
                        </div>
                        <div class="table__container">
                            <div class="table__header">
                                <form method="post" class="table__header-head">
                                    <div class="table__header-container">
                                        <div class="table__header-content">
                                            <p class="table__header-text">Nº Mascotas</p>
                                            <?php if($_SESSION['rol'] == "2"){?>
                                                <input class="inputSearch"  type="number" name="m.nombre" min="0" id="countRaza">
                                            <?php }?>
                                        </div>
                                        <div class="table__header-content">
                                            <p class="table__header-text">Tipo</p>
                                            <?php if($_SESSION['rol'] == "2"){?>
                                                <input list="TipoMascota" type="text" name="TipoMascota_id" class="inputSearch" id="tipomascota">
                                                <datalist id="TipoMascota">
                                                    <option ></option>
                                                    <option >Perro</option>
                                                    <option >Gato</option>
                                                </datalist>

                                            <?php }?>
                                        </div>
                                        <div class="table__header-content">
                                            <p class="table__header-text">Raza</p>
                                            <?php if($_SESSION['rol'] == "2"){?>
                                                <input list="raza" type="text" name="raza" class="inputSearch" id="nombreRaza">
                                                <datalist id="raza" class="datalist__Raza">
                                                    <?php foreach ($PetsRaza as $Raza) {?>  
                                                        <option > <span style="background-color:red;"><?php echo ((new controllerTipoMascota) -> readName($Raza['TipoMascota_id']))[0].' '?></span><?php echo  $Raza['nombre']?> </option>
                                                    <?php }?>
                                                </datalist>
                                            <?php }?>
                                        </div>
                                        <div class="table__header-content">
                                            <p class="table__header-text">Tamaño</p>
                                            <?php if($_SESSION['rol'] == "2"){?>
                                                <input list="tamaño" type="text" name="tamano" class="inputSearch" id="tamaño">
                                                <datalist id="tamaño" class="datalist__Raza">
                                                    <option >mini</option>
                                                    <option >pequeño</option>
                                                    <option >mediano</option>
                                                    <option >grande</option>
                                                    <option >gigante</option>
                                                </datalist>
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
                                                    <div class="table__rows-item-column" id="countRaza">
                                                        <p class="table__rows-text"><?php echo $petsRazaData_Row['countRaza'] ?></p>
                                                    </div>
                                                    <div class="table__rows-item-column" id="tipomascota">
                                                        <p style="height:0; position:absolute; z-index:-2; opacity:0;" class="table__rows-text"><?php echo $petsRazaData_Row['tm.nombre'] ?></p>
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
                                                    <div class="table__rows-item-column" id="nombreRaza">
                                                        <p class="table__rows-text"><?php echo $petsRazaData_Row['r.nombre'] ?></p>
                                                    </div>
                                                    <div class="table__rows-item-column" id="tamaño">
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
        <?php
        } else{header("location: error-not-session.php");}
        ?>
    </main>
    <script src="js/main.js">

    </script>
</body>
</html>