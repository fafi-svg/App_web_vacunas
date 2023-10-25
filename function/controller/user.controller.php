<?php
    require_once("./././conexion.php");
    require_once("./././models/user.model.php");
    class userController extends ConexionDataBase{
        public static function crated(modelUser $user){
            $mysqli = (new ConexionDataBase)->conexion();
            $dataInsert = $mysqli -> real_escape_estring($user -> userName);
            $sql = "insert into User";
        }
    }
?>