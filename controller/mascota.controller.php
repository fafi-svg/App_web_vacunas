<?php
    require_once("././conexion.php");
    require_once(__DIR__."/../models/mascota.model.php");
    // require_once(__DIR__."/../user.Controller.php");
    class controllerMascotas extends ConexionDataBase{
        public function create(modelMascotas $modelMascotas){
            $mysqli = $this->conexion();
            $userNameAccount = "%".$_SESSION['usuario']."%";
            $sql ="SELECT * FROM User where username like binary '$userNameAccount'";
            $sqlUser=$mysqli->query($sql);
            $resultQuery = mysqli_fetch_array($sqlUser);
            $idUser = $resultQuery["id"]; 
            $nombre = $modelMascotas->nombre = $mysqli -> real_escape_string($_POST['nombre']);
            $FechaNacimiento = $modelMascotas->FechaNacimiento = $mysqli -> real_escape_string($_POST['fechaNacimiento']);
            $TipoMascota_id = $modelMascotas->TipoMascota_id = $mysqli -> real_escape_string($_POST['tipoMascota']);
            $Raza_id = $modelMascotas->Raza_id = $mysqli -> real_escape_string($_POST['raza']);
            $sql ="INSERT into mascota (nombre, FechaNacimiento, User_id, TipoMascota_id, Raza_id) values('$nombre', '$FechaNacimiento', '$idUser', '$TipoMascota_id', '$Raza_id')";
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
        public function update($id){
            if(!empty($_POST['updateData']) or $_POST['updateData'] !="-1"){
                $mysqli = $this->conexion();
                $longPost = sizeof($_POST)-1;
                $con=0;
                $stringQuery="";
                for ($i= 0; $i<=$longPost; $i++) {
                    $nameColumn =array_keys($_POST)[$i];
                    if($nameColumn != 'updateData' and !(empty($_POST[$nameColumn]))){
                        $con++;
                        if($i < $longPost and $con >=2){
                            $stringQuery = $stringQuery.",";
                        }
                        $stringQuery = $stringQuery." ".$nameColumn."="."'".$_POST[$nameColumn]."'";
                    }
                }
                $sql ="UPDATE mascota set $stringQuery where id = $id";
                $resultado = $mysqli->query($sql);
                if($resultado){
                    echo "<div class='table__title-message'>DATOS ACTUALIZADOS</div>";
                }
                $_POST['updateData']='-1';
                $mysqli -> close();
            }
        }
    }
?>