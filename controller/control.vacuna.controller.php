<?php
    // require_once("././conexion.php");
    // require_once(__DIR__."/models/controlvacuna.model.model.php");
    // class controllerControlVacuna extends ConexionDataBase{
    //     public function create(modelControlVacuas $modelControlVacuas){
    //         $mysqli = $this->conexion();
    //         $Mascota_id = $modelControlVacuas->Mascota_id = $mysqli -> real_escape_string($_POST['mascota_id']);
    //         $Vacuna_id = $modelControlVacuas->Vacuna_id = $mysqli -> real_escape_string($_POST['vacuna_id']);
    //         $fecha = $modelControlVacuas->fecha = $mysqli -> real_escape_string($_POST['fecha']);
    //         $sql ="INSERT into controlvacunas (Mascota_id, Vacuna_id, fecha) values('$Mascota_id', '$Vacuna_id', '$fecha')";
    //         $result = $mysqli->query($sql);
    //         $mysqli->close();
    //     }
    //     public function read(){
    //         $mysqli = $this->conexion();
    //         $sql = "SELECT * FROM controlvacunas as c";
    //         $result = $mysqli->query($sql);
    //         $users = [];
    //         if ($result->num_rows > 0) {
    //             while ($row = mysqli_fetch_array($result)) {
    //                 $users[] = $row;
    //             }
    //         }
    //         $mysqli->close();
    //         return $result;
    //     }
    //     public function delete($id){
    //         $mysqli = $this->conexion();
    //         $sql = "DELETE FROM controlvacunas WHERE id = $id";
    //         $mysqli->query($sql);
    //         if ($mysqli) {
    //             echo "<div class='table__title-message'>Registro eliminado con éxito.</div>";
    //         } else {
    //             echo "Error al eliminar el registro: " . $mysqli->error;
    //         }

    //         $mysqli->close();
    //     }
    //     public function update($id){
    //         if(!empty($_POST['updateData']) or $_POST['updateData'] !="-1"){
    //             $mysqli = $this->conexion();
    //             $longPost = sizeof($_POST)-1;
    //             $con=0;
    //             $stringQuery="";
    //             for ($i= 0; $i<=$longPost; $i++) {
    //                 $nameColumn =array_keys($_POST)[$i];
    //                 if($nameColumn != 'updateData' and !(empty($_POST[$nameColumn]))){
    //                     $con++;
    //                     if($i < $longPost and $con >=2){
    //                         $stringQuery = $stringQuery.",";
    //                     }
    //                     $stringQuery = $stringQuery." ".$nameColumn."="."'".$mysqli -> real_escape_string($_POST[$nameColumn])."'";
    //                 }
    //             }
    //             $_POST['updateData']='-1';
    //             echo($_POST['updateData']);
    //             $sql = "update controlvacunas set $stringQuery where id = $id";
    //             $resultado = $mysqli->query($sql);
    //             if($resultado){
    //                 echo "<div class='table__title-message'>DATOS ACTUALIZADOS</div>";
    //             }
    //             $mysqli -> close();
    //         }
    //     }
    // }
?>