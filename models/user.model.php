<?php
    class modelUser{
        public $id;
        public $nombre;
        public $userName;
        public $email;
        public $password;
        public $role_id;
        public $foto;
        public function setAttributesUser(){
            $nombre  = $_POST['userName'];
            $userName  = $_POST['userNameAccount'];
            $email  = $_POST['userEmail'];
            $password  = $_POST['userPass'];
            $foto  = 'null';
            return $dataUserRegister;
        }
    }
?>