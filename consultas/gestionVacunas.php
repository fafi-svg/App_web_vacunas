<?php
class GestionVacunasConsultas extends ConexionDataBase{
    public function contarVacunas(){
        $mysqli = $this->conexion();
        $sql = "SELECT count(id) as cound FROM Vacunas" ;
        $sqlQuery = $mysqli->query($sql);
        return $sqlQuery ;
    }
    public function readVacunas(){
        $mysqli = $this->conexion();
        $sql = "SELECT v.id, v.nombre, v.aplicacion, v.tipomascota_id, count(c.vacuna_id) as countVacuna FROM vacunas as v left join controlvacunas as c on c.vacuna_id = v.id group by  v.id , v.nombre,  v.aplicacion , v.tipomascota_id";
        $sqlQuery = $mysqli->query($sql);
        return $sqlQuery ;
    }

    public function nombreVacunas(){
        $mysqli = $this->conexion();
        $sql = "SELECT * FROM vacunas as v";
        $sqlQuery = $mysqli->query($sql);
        return $sqlQuery ;
    }
}
?>