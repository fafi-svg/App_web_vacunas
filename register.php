<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Document</title>
</head>
<body>
    <main class="main">
        <section class="section__Login">
            <div class="login__container login__container-register">
                <div class="login__logo img__filter-100">
                    <img src="img/logo-pets-black-aro.png" alt="">
                </div>
                <div class="login__content">
                    <h2 class="login__title">INGRESAR</h2>
                    <?php                       
                        include_once('function/controller/controller.php');
                        (new controllerAccess) -> checkInputRegister();
                    ?> 
                    <form id="login__form" class="login__form" method="post">
                        <div class="login__input">
                            <input type="text" name="userName" placeholder="Nombre">
                            <div class="login__input-img img__filter-0">
                                <img class="" src="img/icon-name.png" alt="icon-user.png">
                            </div>
                        </div>
                        <div class="login__input">
                            <input type="text" name="userNameAccount" placeholder="Nombre Usuario">
                            <div class="login__input-img img__filter-0">
                                <img class="" src="img/icon-user.png" alt="icon-user.png">
                            </div>
                        </div>
                        <div class="login__input">
                            <input type="text" name="userEmail" placeholder="Correo Electronico">
                            <div class="login__input-img img__filter-0">
                                <img class="" src="img/icon-correo.png" alt="icon-user.png">
                            </div>
                        </div>
                        <div class="login__input">
                            <input type="password" name="userPass" placeholder="Contraseña">
                            <div class="login__input-img img__filter-0">
                                <img src="img/icon-candado.png" alt="icon-candado.png">
                            </div>
                        </div>
                        <div class="login__button">
                            <input id="btnCheckIn"  name="btnCheckIn" class="login__button-primario" type="submit" value="Registrarse">
                            <input id="btnLogin" name="btnLogin" class="login__button-secundario" type="submit" value="Iniciar Sesion">
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
    </main>
    <script src="js/main.js">

    </script>
</body>
</html>