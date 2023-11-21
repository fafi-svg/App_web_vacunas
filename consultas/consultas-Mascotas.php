<?php
class GestionMascotaConsultas extends ConexionDataBase{
    public function petsUserData(){
        $mysqli = $this->conexion();
        $sql = "SELECT  m.nombre, u.nombre, count(c.Mascota_id), m.TipoMascota_id,m.FechaNacimiento 
                FROM mascota as m  
                left join user as u  
                on u.id = m.User_id 
                left join controlvacunas as c 
                on c.Mascota_id = m.id  
                group by m.nombre, u.nombre, m.TipoMascota_id, m.FechaNacimiento;";
        $sqlQuery = $mysqli->query($sql);
        return $sqlQuery ;
    }
    public function petsUser($userId){
        $mysqli = $this->conexion();
        $sql = "SELECT  m.id as id, m.nombre as nombre, m.TipoMascota_id as TipoMascota_id ,m.FechaNacimiento as FechaNacimiento, m.foto as foto 
                FROM mascota as m  
                left join user as u  
                on u.id = m.User_id 
                where u.id = '$userId'";
        $sqlQuery = $mysqli->query($sql);
        return $sqlQuery ;
    }
}
