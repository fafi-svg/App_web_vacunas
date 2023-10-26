<?php
    require_once("././conexion.php");
    require_once(__DIR__."/../models/user.model.php");
    class controllerUser extends ConexionDataBase{
        public function create(){
            $getModelUser = (new modelUser);
            $mysqli = (new ConexionDataBase)->conexion();
            $nombre = $getModelUser -> nombre  = ($mysqli -> real_escape_string($_POST['userName']));
            $userName = $getModelUser -> userName = $mysqli -> real_escape_string($_POST['userNameAccount']); 
            $email = $getModelUser -> email = $mysqli -> real_escape_string($_POST['userEmail']); 
            $password = $getModelUser -> password = $mysqli -> real_escape_string(password_hash($_POST['userPass'], PASSWORD_DEFAULT));
            $role_id = $getModelUser -> role_id =  "1";
            $foto = $getModelUser -> foto = 'null';
            $sqlCreatedUser= $mysqli -> query("insert into user (nombre, username, email, password, Role_id, foto) values('$nombre', '$userName', '$email', '$password', '$role_id' , '$    foto')");
            $mysqli -> close();
        }
        public function read(){
            $mysqli = $this->conexion();
            $sql = "SELECT id, nombre, Role_id FROM User";
            $result = $mysqli->query($sql);
            $users = [];
            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $users[] = $row;
                    echo "id: " . $row[0]. " - nombre: " . $row["Role_id"]. "<br>";
                }
            }
            $mysqli->close();
            return $users;
        }
        public function deleted($id){
            $mysqli = $this->conexion();
            $sql = "DELETE FROM gender WHERE id = $id";
            if ($mysqli->query($sql)) {
                echo "Registro eliminado con éxito.";
            } else {
                echo "Error al eliminar el registro: " . $mysqli->error;
            }

            $mysqli->close();
        }
        public function update($id, $columnModify){

        }
    }
?>