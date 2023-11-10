<?php
class GestionRazasConsultas extends ConexionDataBase{
    public function RazasMascotas(){
        $mysqli = $this->conexion();
        $sql = "select t.nombre from tipomascota as t";
        $sqlQuery = $mysqli->query($sql);
        return $sqlQuery ;
    }
}
