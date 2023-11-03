<?php
    require_once("././conexion.php");
    require_once(__DIR__."/../models/vacuna.model.php");
    class controllerVacuna extends ConexionDataBase{
        public function create(modelVacuna $modelVacuna){
            $mysqli = $this->conexion();
            $nombre = $modelVacuna->nombre = $mysqli -> real_escape_string($_POST['nombreVacuna']);
            $aplicacion = $modelVacuna->aplicacion = $mysqli -> real_escape_string($_POST['aplicacionVacuna']);
            $tipoMascotaId = $modelVacuna->tipoMascotaId = $mysqli -> real_escape_string($_POST['tipoMascota']);
            $sql ="insert into vacuna (nombre, aplicacion, tipoMascotaId) values('$nombre', '$aplicacion', '$tipoMascotaId')";
            $mysqli->close();
        }
        public function read(){
            $mysqli = $this->conexion();
            $sql = "SELECT v.id as ID, v.nombre as 'Nombre Vacuna', v.aplicacion as 'Dias Aplicacion', v.tipomascota_id as 'Tipo Mascota' FROM vacunas as v";
            $result = $mysqli->query($sql);
            $users = [];
            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $users[] = $row;
                }
            }
            $mysqli->close();
            return $result;
        }
        public function delete($id){
            $mysqli = $this->conexion();
            $sql = "DELETE FROM user WHERE id = $id";
            if ($mysqli->query($sql)) {
                echo "Registro eliminado con éxito.";
            } else {
                echo "Error al eliminar el registro: " . $mysqli->error;
            }

            $mysqli->close();
        }
        public function update(){

        }
    }
?>