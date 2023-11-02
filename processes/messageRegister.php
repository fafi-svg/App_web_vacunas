<?php
    require_once(__DIR__."/../models/user.model.php");
    class setMessageRegister{
        public $messageLogin;
        public function  messageNameInUse(){
            $this -> messageLogin = "<div class='alertForm'> ¡Nombre De Usuario En Uso! $_POST[userEmail] </div>";
            return   $this ->messageLogin;
        }
        public function messageEmailInUse(){
            $this -> messageLogin = "<div class='alertForm'> ¡Correo De Usuario En Uso! </br> $_POST[userEmail] </div>";
            return   $this ->messageLogin ;
        }
        public function messageInputEmpty(){
            $this -> messageLogin = "<div class='alertForm'> ¡Campos Vacios! </div>";
            return   $this ->messageLogin ;
        }
        public function messageUserCreate(){
            $this -> messageLogin = "<div style='background-color: rgba(0, 255, 221, 0.5);' class='alertForm'> ¡Cuenta creada!</div>";
            return   $this ->messageLogin ;
        }

    }
?>