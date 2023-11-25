<?php
    require_once(__DIR__."/../models/tipomascota.model.php");
    include_once(__DIR__."/../conexion.php");
    include_once(__DIR__."/../controller/tipomascota.controller.php");
    // include_once(__DIR__."/../controller/conexion.php");
    class SetModelTipoMascota extends ConexionDataBase{
        public function create(modelTipoMascota $modelTipoMascota){
            $mysqli = $this -> conexion();
            $modelTipoMascota -> nombre = $mysqli -> real_escape_string($_POST['nombre']);
            $modelTipoMascota -> EdadEquivalenteInfante = $mysqli -> real_escape_string($_POST['fechaNacimiento']);
            $modelTipoMascota -> EdadEquivalenteJoven = $mysqli -> real_escape_string($_SESSION['id']);
            $modelTipoMascota -> EdadEquivalenteAdolecente = $mysqli -> real_escape_string($_POST['tipoMascota']);
            $modelTipoMascota -> EdadAdulto = $mysqli -> real_escape_string($_POST['raza']);
            (new controllerTipoMascota) -> create($modelTipoMascota);
        }

        public function update($id){
            $mysqli = $this -> conexion();
            $modelTipoMascota = (new modelTipoMascota);
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
                (new controllerTipoMascota) -> update($stringQuery);
            }

        }
        public function delete($id){
            $mysqli = $this -> conexion();
            $modelMascota = (new modelTipoMascota);
            $modelMascota ->id = $id;
            (new controllerTipoMascota) -> delete($modelMascota);
        }
    }
?>