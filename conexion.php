<?php
    class conexion{
        public $SERVER;
        public $PORT;
        public $USER;
        public $PASS;
        public $DATABASE;
        public $MYSQLI;
        public static function conexiondb(){
            try{
                $mysqli = new mysqli(
                    $_ENV['SERVER'],
                    $_ENV['USER'],
                    $_ENV['PASS'],
                    $_ENV['DATABASE'],
                    $_ENV['PORT']
                );
                return $mysqli;
            }
            catch(exeption $e){
                echo $e;
            }
            
        }
    }


?>