<?php
class GestionMascotasConsultas extends ConexionDataBase{
    public function tiposMascotas(){
        $mysqli = $this->conexion();
        $sql = "select t.nombre from tipomascota as t";
        $sqlQuery = $mysqli->query($sql);
        return $sqlQuery ;
    }
}
?>