<?php
    require_once(__DIR__."/../conexion.php");
    require_once(__DIR__."/../models/controlvacuna.model.php");
    // require_once(__DIR__."/../user.Controller.php");
    class controllerControlMascotas extends ConexionDataBase{
        public function create(modelControlVacuas $modelControlVacuas){
            $mysqli = $this->conexion();
            $sql ="INSERT into controlvacunas (mascota_id, Vacuna_id, fecha) values('$modelControlVacuas->Mascota_id', '$modelControlVacuas->Vacuna_id', '$modelControlVacuas->fecha')";
            $mysqli->query($sql);
            $mysqli->close();
        }
        public function read(){
            $mysqli = $this->conexion();
            $sql = "SELECT * FROM controlvacunas as c";
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
            $sql = "DELETE FROM controlvacunas WHERE id = $id";
            $mysqli->query($sql);
            if ($mysqli) {
                echo "<div class='table__title__message'>Registro controlvacunas eliminado con éxito.</div>";
            } else {
                echo "Error al eliminar el registro: " . $mysqli->error;
            }

            $mysqli->close();
        }
        public function update($stringQuery){
            $mysqli = $this->conexion();
            $sql = "UPDATE controlvacunas SET $stringQuery;";
            $mysqli->query($sql);
        }

    }
?>