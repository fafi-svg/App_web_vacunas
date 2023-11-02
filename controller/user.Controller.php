<?php
    require_once("././conexion.php");
    require_once(__DIR__."/../models/user.model.php");
    class controllerUser extends ConexionDataBase{
        public function create(){
            $setModelUser = (new modelUser);
            $mysqli = (new ConexionDataBase)->conexion();
            $nombre = $setModelUser -> nombre  = ($mysqli -> real_escape_string($_POST['userName']));
            $userName = $setModelUser -> userName = $mysqli -> real_escape_string($_POST['userNameAccount']); 
            $email = $setModelUser -> email = $mysqli -> real_escape_string($_POST['userEmail']); 
            $password = $setModelUser -> password = $mysqli -> real_escape_string(password_hash($_POST['userPass'], PASSWORD_DEFAULT));
            $role_id = $setModelUser -> role_id =  "1";
            $foto = $setModelUser -> foto = 'null';
            $sql ="insert into user (nombre, username, email, password, Role_id) values('$nombre', '$userName', '$email', '$password', '$role_id')";
            $sqlCreatedUser= $mysqli -> query($sql);
            $mysqli -> close();
        }
        public function read(){
            $mysqli = $this->conexion();
            //u.id as ID, u.nombre as 'Nombre', u.username as 'Nombre Usuario' , u.email as 'Correo Electronico', u.Role_id as Rol, u.foto as Foto 
            $sql = "SELECT u.id as ID, u.nombre as Nombre, u.username as 'Nombre Usuario', u.email as Correo, u.foto as Foto FROM User as u";
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
        public function deleted($id){
            $mysqli = $this->conexion();
            $sql = "DELETE FROM user WHERE id = $id";
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