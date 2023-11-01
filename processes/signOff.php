<?php
class SignOff{
    public function exitSession(){
        session_start();
        $_SESSION['usuario'] = "";
        $_SESSION['rol'] = "";
    }
}