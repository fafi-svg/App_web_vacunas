<?php
    require_once("././conexion.php");
    require_once(__DIR__."/../models/vacuna.model.php");
    class controllerVacuna extends ConexionDataBase{
        public function create(modelVacuna $modelVacuna){
            $mysqli = $this->conexion();
            $sql ="INSERT INTO vacunas (nombre, aplicacion, tipoMascota_Id) VALUES('$modelVacuna->nombre', '$modelVacuna->aplicacion', '$modelVacuna->tipoMascotaId');";
            $mysqli->query($sql);
            $mysqli->close();
        }
        public function read(){
            $mysqli = $this->conexion();
            $sql = "SELECT * FROM vacunas as v";
            $result = $mysqli->query($sql);
            $mysqli->close();
            return $result;
        }
        public function delete(modelVacuna $modelVacuna){
            $mysqli = $this->conexion();
            $sql = "DELETE FROM vacunas WHERE id = $modelVacuna->id";
            $mysqli->query($sql);
            if ($mysqli) {
                echo "<div class='table__title-message'>Registro eliminado con éxito.</div>";
            } else {
                echo "Error al eliminar el registro: " . $mysqli->error;
            }
            $mysqli->close();
        }
        public function update($stringQuery){
            $mysqli = $this->conexion();
            $sql = "UPDATE vacunas SET $stringQuery;";
            $mysqli->query($sql);
        }
    }
?>