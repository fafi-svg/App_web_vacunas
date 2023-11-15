<?php
class GestionMascotaConsultas extends ConexionDataBase{
    public function petsUserData(){
        $mysqli = $this->conexion();
        $sql = "SELECT  m.nombre, u.nombre, count(c.Mascota_id), m.TipoMascota_id,m.FechaNacimiento FROM mascota as m  left join user as u  on u.id = m.User_id left join controlvacunas as c on c.Mascota_id = m.id  group by   m.nombre, u.nombre, m.TipoMascota_id, m.FechaNacimiento;";
        $sqlQuery = $mysqli->query($sql);
        return $sqlQuery ;
    }
}
