<?php
class GestionVacunasConsultas extends ConexionDataBase{
    public function contarVacunas(){
        $mysqli = $this->conexion();
        $sql = "select count(id) from Vacunas" ;
        $sqlQuery = $mysqli->query($sql);
        return $sqlQuery ;
    }
    public function readVacunas(){
        $mysqli = $this->conexion();
        $sql = "SELECT v.id as ID, v.nombre as 'Nombre Vacuna', v.aplicacion as 'Dias Aplicacion', v.tipomascota_id as 'Tipo Mascota', count(c.vacuna_id) as 'Vacunas Usadas' FROM vacunas as v left join controlvacunas as c on c.vacuna_id = v.id group by  v.id , v.nombre,  v.aplicacion , v.tipomascota_id";
        $sqlQuery = $mysqli->query($sql);
        return $sqlQuery ;
    }
}
?>