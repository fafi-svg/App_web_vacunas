<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once __DIR__ . "/conexion.php";
        $Conexion = ((new ConexionDataBase)->conexion());
        if(!($Conexion->connect_errno)){
            // echo "Conexion Correcta";
            // echo $_ENV['SERVER']; 
            header("location: login.php");
            die();
         }
         else{
             echo "Fallo al conectar a MySQL: (" . $Conexion->connect_errno . ") " . $Conexion->connect_error;
         }
    ?>
    <?php

    ?>
</body>
</html>