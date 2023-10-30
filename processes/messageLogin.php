<?php
    require_once(__DIR__."/../models/user.model.php");
    class setMessageLogin{
        public $messageLogin;
        public function messageValidatedPassword(){
            $this -> messageLogin = '<div class="alertForm"> Cantraseña valida </div>';
            return  $this ->messageLogin ;
        }
        public function messageNotValidatedPassword(){
            $this -> messageLogin = '<div class="alertForm"> ¡Cantraseña Incorrecta! </div>';
            return   $this ->messageLogin ;
        }
        public function messageInputEmpty(){
            $this -> messageLogin = '<div class="alertForm"> ¡Campos Vacios! </div>';
            return   $this ->messageLogin ;
        }
        public function messageUserInvalid(){
            $this -> messageLogin = '<div class="alertForm"> Usuario No Registrado </div>';
            return  $this ->messageLogin ;
        }
        public function messageStartSession(){
            $this -> messageLogin = "<div style='background-color: rgba(0, 255, 221, 0.5);' class='alertForm'> ¡Sesion Iniciada!</div>";
            return   $this ->messageLogin ;
        }
    }
?>