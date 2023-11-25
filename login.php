<?php
    // if(isset($_SESSION['usuario'])){
    //     session_start();
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/welcomePage.css">
    <link rel="stylesheet" href="css/import.css">
    <title>Document</title>
</head>
<body>
    <main class="main_login-register">
        <?php session_start(); if(!isset($_SESSION['usuario'])){?>
            <section class="section__Login">
                <div class="login__container">
                    <div class="login__logo img__filter-100">
                        <img src="img/logo-pets-black-aro.png" alt="">
                    </div>
                    <div class="login__content">
                        <h2 class="login__title">INGRESAR</h2>
                        <?php                       
                            include_once(__DIR__.'/processes/controlLogin.php');
                            (new controlAccessLogin) -> checkInputLogin();
                        ?>
                        <form id="login__form" class="login__form" method="post">
                            <div class="login__input">
                                <input class="input" id="userNameAccount" type="text" name="userNameAccount" placeholder="Nombre Usuario" require value="<?php echo $_POST['userName'] ?? "" ?>" >
                                <div class="login__input-img img__filter-0">
                                    <img src="img/icon-user.png" alt="icon-candado.png">
                                </div>
                            </div>
                            <div class="login__input">
                                <input class="input" id="userPass" type="password" name="userPass" require placeholder="Contraseña">
                                <div class="login__input-img img__filter-0">
                                    <img src="img/icon-candado.png" alt="icon-candado.png">
                                </div>
                            </div>
                            <div class="login__button">
                                <input  id="btnLogin" name="btnLogin" class="login__button-primario" type="submit" value="Iniciar Sesion">
                                <input  id="btnCheckIn" name="btnCheckIn" class="login__button-secundario" type="submit" value="Registrarse">
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <section class="section__info">
                <div class="info__header">
                    <div class="info__icon img__filter-100">
                        <img src="img/icon-ramo-l.png" alt="icon-ramo.png">
                    </div>
                    <p class="info__title">
                        LEGION OF PETS
                    </p>
                    <div class="info__icon img__filter-100">
                        <img src="img/icon-ramo-r.png" alt="icon-ramo.png">
                    </div>
                </div>
                <div class="info__slider">
                    <div class="slider__button">
                        <img src="img/icon-flecha.png" alt="">
                    </div>
                    <div class="slider__content">
                        <div class="slider__header">
                            <div class="slider__header-img">
                                <img src="img/icon-pata_white.png" alt="">
                            </div>
                            <div class="slider__header-title">
                                <h4 class="slider__header-title-text">
                                    RECUERDA QUE LEGION OF PETS:
                                </h4>

                            </div>
                        </div>
                        <div class="slider__info">
                            <p class="slider__text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                Eveniet culpa quam possimus commodi. Debitis et harum delectus 
                                esse sit cumque ex? Hic facere, incidunt aut magnam sunt necessitatibus nisi ullam.
                            </p>    
                        </div>
                    </div>
                    <div class="slider__button slider__button-rotate-180">
                        <img src="img/icon-flecha.png" alt="">
                    </div>
                </div>
                <div class="slider__img">
                    <img src="img/imagenes-Register_Login/perros.png" alt="">
                </div>
            </section>
            <?php
                if(isset($_POST['btnLogin'])){
                    if(isset($_SESSION['usuario'])){
            ?>              
                        <style>body, main{overflow-y: hidden;}</style>
                        <div class="screen__welcome elemtAnimation">
                                <div class="welcome__header">
                                        <h2 class="welcome__header-text elemtAnimation-1">WELCOME TO</h2>
                                        <div class="welcome__header-title">
                                            <span class="welcome__header-linea linea_l elemtAnimation-3"></span>
                                            <h1 class="welcome__header-text elemtAnimation-1">LEGIONS OF PETS</h1>
                                            <span class="welcome__header-linea linea_r elemtAnimation-3"></span>
                                        </div>
                                </div>
                                <div class="welcome__logo elemtAnimation-4">
                                    <div class="welcome__logo-ramo elemtAnimation-7">
                                        <img src="img/icon-ramo_doble_circular.png" alt="">
                                    </div>
                                    <div class="welcome__logo-logo">
                                        <img src="img/logo-pets-black-aro.png" alt="">
                                    </div>
                                </div> 
                                <div class="welcome__content">
                                    <p class="welcome__content-text elemtAnimation-5">
                                        ¡Bienvenido a bordo! En LEGION OF PETS, nos dedicamos a proteger
                                        a nuestras mascotas a través de la vacunación. ¡Únete a nosotros en esta noble causa!
                                    </p>
                                </div> 
                                <form action="" method="post">
                                    <div class="login__button elemtAnimation-6">
                                            <input  id="btnEnterPage" name="btnEnterPage" class="login__button-primario" type="submit" value="INGRESAR">
                                    </div> 
                                </form>
                        </div>
            <?php         
                    }
                }
            ?>
        <?php
            } else{header("location: homepage");}
        ?>
    </main>
    <script src="js/main.js">

    </script>

</body>
</html>