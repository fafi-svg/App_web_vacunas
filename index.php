<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once __DIR__."/vendor/autoload.php";
        use Dotenv\Dotenv;
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load();
        require_once __DIR__ . "/conexion.php";
        $mysqli = ($Conexion = (new conexion)->conexiondb());
        #$Conexion = new conexion();
        #$mysqli = $Conexion.conexiondb();
        if($mysqli->connect_errno){
           echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        else{
            echo "Conexion Correcta";
        }
        #require_once __DIR__ . "/conexion.php";
    ?>
</body>
</html>