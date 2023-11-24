<?php
    include_once(__DIR__."/../models/mascota.model.php");
    include_once(__DIR__."/../conexion.php");
    include_once(__DIR__."/../controller/mascota.controller.php");
    // include_once(__DIR__."/../controller/conexion.php");
    class SetModelMascota extends ConexionDataBase{
        public function create(modelMascotas $modelMascotas){
            $mysqli = $this -> conexion();
            $modelMascotas -> nombre = $mysqli -> real_escape_string($_POST['nombre']);
            $modelMascotas -> FechaNacimiento = $mysqli -> real_escape_string($_POST['fechaNacimiento']);
            $modelMascotas -> User_id = $mysqli -> $_SESSION['id'];
            $modelMascotas -> TipoMascota_id = $mysqli -> real_escape_string($_POST['tipoMascota']);
            $modelMascotas -> Raza_id = $mysqli -> real_escape_string($_POST['raza']);
            (new controllerMascotas) -> create($modelMascotas);
        }
        public function update($id){
            $mysqli = $this -> conexion();
            $modelMascota = (new modelMascotas);
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
                (new controllerMascotas) -> update($stringQuery);
            }

        }
        public function delete($id){
            $mysqli = $this -> conexion();
            $modelMascota = (new modelMascotas);
            $modelMascota ->id = $id;
            (new controllerMascotas) -> delete($modelMascota);
        }
    }
?>