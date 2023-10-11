<?php
    class ConexionDataBase{
        public $SERVER;
        public $PORT;
        public $USER;
        public $PASS;
        public $DATABASE;
        public $MYSQLI;
        public static function conexion(){
            try{
                $SERVER = $_ENV['SERVER'];
                $USER = $_ENV['USER'];
                $PASS = $_ENV['PASS'];
                $DATABASE = $_ENV['DATABASE'];
                $PORT = $_ENV['PORT'];
                $mysqli = new mysqli($_ENV['SERVER'],$_ENV['USER'],$_ENV['PASS'],$_ENV['DATABASE'],$_ENV['PORT']);
                return $mysqli;
            }
            catch(exeption $e){
                return $e;
            }
        }
    }


?>