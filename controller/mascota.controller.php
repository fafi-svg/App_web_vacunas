<?php
    require_once("././conexion.php");
    require_once(__DIR__."/../models/mascota.model.php");
    // require_once(__DIR__."/../user.Controller.php");
    class controllerMascotas extends ConexionDataBase{
        public function create(modelMascotas $modelMascotas){
            $mysqli = $this->conexion();
            $sql ="INSERT into mascota (nombre, FechaNacimiento, User_id, TipoMascota_id, Raza_id) values('$modelMascotas->nombre', '$modelMascotas->FechaNacimiento', '$modelMascotas->User_id', '$modelMascotas->TipoMascota_id', '$modelMascotas->Raza_id')";
            $mysqli->query($sql);
            $mysqli->close();
        }
        public function read(){
            $mysqli = $this->conexion();
            $sql = "SELECT * FROM mascota as m";
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
            $sql = "DELETE FROM mascota WHERE id = $id";
            $mysqli->query($sql);
            if ($mysqli) {
                echo "<div class='table__title-message'>Registro Mascota eliminado con éxito.</div>";
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