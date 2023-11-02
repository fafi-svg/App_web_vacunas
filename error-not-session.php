<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/error-not-session.css">
    <title>Document</title>
</head>
<body>
    <div class="scrennNotStartSession">                        
        <?php if(isset($_POST['btnSendLogin'])){header("location: login.php");}?>
        <div class="notSession">
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
            <div class="notSession__content">
                <p class="notSession__content-text">
                    ¡SESIÓN NO INICIADA!
                </p>
            </div>
            <form action="" method="post">
                <div class="login__button">
                        <input  id="btnSendLogin" name="btnSendLogin" class="notSession__button" type="submit" value="IR LOGIN">
                </div> 
            </form>
            <footer class="notSession__footer">
                <div class="notSession__footer-img">
                    <img src="img/imagenes-Register_Login/img-footer-2.png" alt="">
                </div>
            </footer>
        </div>
    </div>
</body>
</html>