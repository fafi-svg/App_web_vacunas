<?php
    require_once(__DIR__."/../conexion.php");
    require_once(__DIR__."/../models/tipomascota.model.php");
    // require_once(__DIR__."/../user.Controller.php");
    class controllerTipoMascota extends ConexionDataBase{
        public function create(modelTipoMascota $modelTipoMascota){
            $mysqli = $this->conexion();
            $sql ="INSERT into tipomascota (nombre, FechaNacimiento, User_id, TipoMascota_id, Raza_id) values('$modelTipoMascota->nombre', '$modelTipoMascota->EdadEquivalenteInfante', '$modelTipoMascota->EdadEquivalenteJoven', '$modelTipoMascota->EdadEquivalenteAdolecente', '$modelTipoMascota->EdadAdulto')";
            $mysqli->query($sql);
            $mysqli->close();
        }
        public function read(){
            $mysqli = $this->conexion();
            $sql = "SELECT * FROM tipomascota as m";
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
            $sql = "DELETE FROM tipomascota WHERE id = $id";
            $mysqli->query($sql);
            if ($mysqli) {
                echo "<div class='table__title-message'>Registro tipomascota eliminado con éxito.</div>";
            } else {
                echo "Error al eliminar el registro: " . $mysqli->error;
            }

            $mysqli->close();
        }
        public function update($stringQuery){
            $mysqli = $this->conexion();
            $sql = "UPDATE tipomascota SET $stringQuery;";
            $mysqli->query($sql);
        }
        public function readName($id){
            $mysqli = $this->conexion();
            $sql = "SELECT nombre FROM tipomascota as m WHERE id = '$id'";
            $result = $mysqli->query($sql);
            foreach ($result as $key) { $resul = $key['nombre']; break; }
            $mysqli->close();
            return $resul;
        }
    }
?>