<?php
    require_once(__DIR__."/../conexion.php");
    require_once(__DIR__."/../models/vacuna.model.php");
    require_once(__DIR__."/../controller/vacuna.controller.php");

    class ControlUpdateVacunas extends ConexionDataBase{

        public function updateVacunas(){
            if(isset($_POST['updateData']) and $_POST['updateData'] != '-1'){
                (new controllerVacuna) ->update($_POST['updateData']);
            }
            
        }
    }
?>