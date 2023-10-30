<?php
class SignOff{
    public function exitSession(){
        $_SESSION['usuario'] = "";
        $_SESSION['rol'] = "";
    }
}