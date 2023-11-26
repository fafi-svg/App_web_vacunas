<?php
    include_once(__DIR__."/../models/controlvacuna.model.php");
    include_once(__DIR__."/../conexion.php");
    include_once(__DIR__."/../controller/controlMascota.controller.php");
    // include_once(__DIR__."/../controller/conexion.php");


    class SetModelControlVacuna extends ConexionDataBase{
        public function create(modelControlVacuas $modelControlVacuas){
            $mysqli = $this -> conexion();
            $result = $mysqli->query("SELECT * from controlvacunas where vacuna_id =".$_POST['id']." and mascota_id = ".$_SESSION['petId']);
            if(mysqli_num_rows($result) > 0){
                echo "<div class='table__title__message__error'> <span>!ERROR! </span> ESTA VACUNA YA ES REGISTRADA. </div>";
            }else{
                $modelControlVacuas -> Mascota_id = $mysqli -> real_escape_string($_SESSION['petId']);
                $modelControlVacuas -> Vacuna_id = $mysqli -> real_escape_string($_POST['id']);
                $modelControlVacuas -> fecha = $mysqli -> real_escape_string($_POST['fecha']);
                (new controllerControlMascotas) -> create($modelControlVacuas);
            }

        }
        public function update($id){
            $mysqli = $this -> conexion();
            $modelControlVacuas = (new modelControlVacuas);
            $longPost = sizeof($_POST)-1;
            $con=0;
            $element = 0;
            $stringQuery="";
            for ($i= 0; $i<=$longPost; $i++) {
                if(array_keys($_POST)[$i] != 'btn_update_mascota' and !(empty($_POST[array_keys($_POST)[$i]]))){
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
                (new controllerControlMascotas) -> update($stringQuery);
            }

        }
        public function delete($id){
            $mysqli = $this -> conexion();
            $modelControlVacuas = (new modelControlVacuas);
            $modelControlVacuas ->id = $id;
            (new controllerControlMascotas) -> delete($modelControlVacuas);
        }
    }
?>