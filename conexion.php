<?php
    require_once __DIR__."./vendor/autoload.php";
    use Dotenv\Dotenv;
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    class ConexionDataBase{
        public function conexion(){
            try{
                $Conexion = new mysqli($_ENV["SERVER"],$_ENV["USER"],$_ENV["PASS"],$_ENV["DATABASE"],$_ENV["PORT"]);
                return $Conexion;
            }
            catch(exeption $e){
                return $e;
            }
        }
    }
    ## execute(), prepare(), bindParam()

?>