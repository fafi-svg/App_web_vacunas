<?php
    require_once("././conexion.php");
    require_once(__DIR__."/../models/controlvacuna.model.php");
    class controllerControlVacuna extends ConexionDataBase{
        public function create(modelControlVacuas $modelControlVacuas){
            $mysqli = $this->conexion();
            $Mascota_id = $modelControlVacuas->Mascota_id = $mysqli -> real_escape_string($_POST['mascota_id']);
            $Vacuna_id = $modelControlVacuas->Vacuna_id = $mysqli -> real_escape_string($_POST['vacuna_id']);
            $fecha = $modelControlVacuas->fecha = $mysqli -> real_escape_string($_POST['fecha']);
            $sql ="INSERT into controlvacunas (Mascota_id, Vacuna_id, fecha) values('$Mascota_id', '$Vacuna_id', '$fecha')";
            $result = $mysqli->query($sql);
            $mysqli->close();
        }
        public function read(){
            $mysqli = $this->conexion();
            $sql = "SELECT * FROM controlvacunas as c";
            $result = $mysqli->query($sql);
            $mysqli->close();
            return $result;
        }
        public function delete($id){
            $mysqli = $this->conexion();
            $sql = "DELETE FROM controlvacunas WHERE id = $id";
            $mysqli->query($sql);
            if ($mysqli) {
                echo "<div class='table__title__message'>Registro eliminado con éxito.</div>";
            } else {
                echo "Error al eliminar el registro: " . $mysqli->error;
            }

            $mysqli->close();
        }
        public function update($id){
            $mysqli = $this->conexion();
            $longPost = sizeof($_POST)-1;
            $con=0;
            $stringQuery="";
            for ($i= 0; $i<=$longPost; $i++) {
                $nameColumn =array_keys($_POST)[$i];
                if($nameColumn != 'btn_update_vacuna' and !(empty($_POST[$nameColumn]))){
                    if($con >0){
                        $stringQuery = $stringQuery.",";
                    }
                    $con++;
                    $stringQuery = $stringQuery." ".$nameColumn."="."'".$mysqli -> real_escape_string($_POST[$nameColumn])."'";
                }
            }
            $sql = "UPDATE controlvacunas SET $stringQuery WHERE id = $id";
            $resultado = $mysqli->query($sql);
            // if($resultado){
            //     echo "<div class='table__title__message'>DATOS ACTUALIZADOS</div>";
            // }
            $mysqli -> close();
        }
    }
?>