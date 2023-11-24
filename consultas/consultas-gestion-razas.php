<?php
class GestionRazasConsultas extends ConexionDataBase{
    public function petsRazaData(){
        $mysqli = $this->conexion();
        $sql = "SELECT count(m.Raza_id) as 'countRaza', tm.nombre as 'tm.nombre', r.nombre as 'r.nombre', t.tamano as 't.tamano'  from mascota as m left join raza as r on m.Raza_id = r.id left join TamanosMascota as t on t.id = r.TamanoMascota_id left join TipoMascota as tm on m.TipoMascota_id = tm.id group by  m.TipoMascota_id, r.nombre, t.tamano;";
        $sqlQuery = $mysqli->query($sql);
        return $sqlQuery ;
    }
    public function petsRazaName(){
        $mysqli = $this->conexion();
        $sql = "select nombre, TipoMascota_id, id from raza;";
        $sqlQuery = $mysqli->query($sql);
        return $sqlQuery ;
    }
}
