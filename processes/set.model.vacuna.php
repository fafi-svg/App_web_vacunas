<?php
    include_once(__DIR__."/../models/vacuna.model.php");
    include_once(__DIR__."/../conexion.php");
    include_once(__DIR__."/../controller/vacuna.controller.php");
    // include_once(__DIR__."/../controller/conexion.php");
    class SetModelVacuna extends ConexionDataBase{
        public function create(modelVacuna $modelVacuna){
            $mysqli = $this -> conexion();
            $modelVacuna -> nombre = $mysqli -> real_escape_string($_POST['nombre']);
            $modelVacuna -> aplicacion = $mysqli -> real_escape_string($_POST['aplicacion']);
            $modelVacuna -> tipoMascotaId = $mysqli -> real_escape_string($_POST['tipoMascota']);
            (new controllerVacuna) -> create($modelVacuna);
        }
        public function update($id){
            $mysqli = $this -> conexion();
            $modelVacuna = (new modelVacuna);
            $longPost = sizeof($_POST)-1;
            $con=0;
            $element = 0;
            $stringQuery="";
            for ($i= 0; $i<=$longPost; $i++) {
                if(array_keys($_POST)[$i] != 'updateData' and !(empty($_POST[array_keys($_POST)[$i]]))){
                    $nameColumn =array_keys($_POST)[$i];
                    if($i < $longPost and $con > 0){
                        $stringQuery = $stringQuery.",";
                    }
                    $element++;
                    $con++;
                    $stringQuery = $stringQuery." ".$nameColumn." = "."'".$mysqli -> real_escape_string($_POST[$nameColumn])."'";
                }
                if($i == $longPost ){
                    $stringQuery = $stringQuery." WHERE id = ".$id;
                }
            }
            if($element > 0){
                (new controllerVacuna) -> update($stringQuery);
            }

        }
        public function delete($id){
            $mysqli = $this -> conexion();
            $modelVacuna = (new modelVacuna);
            $modelVacuna ->id = $id;
            (new controllerVacuna) -> delete($modelVacuna);
        }
    }
?>