<?php 
    require_once(__DIR__."/../conexion.php");
    require_once(__DIR__."/../models/user.model.php");
    require_once(__DIR__."/../controller/user.controller.php");
    require_once(__DIR__."/messageRegister.php");
 class controlAccessRegister extends ConexionDataBase{
        public function checkInputRegister(){
            if(isset($_POST['btnCheckIn'])){
                    if($_POST['userName'] === ""  or $_POST['userPass'] === "" or $_POST['userNameAccount'] === ""  or $_POST['userEmail'] === ""){
                        echo (new setMessageRegister) -> messageInputEmpty();
                    }else{
                        $mysqli = (new ConexionDataBase)->conexion();
                        $userNameAccount = $mysqli -> real_escape_string($_POST['userNameAccount']);
                        $userEmail= $mysqli -> real_escape_string($_POST['userEmail']);
                        $sqlNameUser=$mysqli->query("select * from User where username = '$userNameAccount'");
                        $sqlEmailUser=$mysqli->query("select * from User where email = '$userEmail'");
                        if (mysqli_num_rows($sqlNameUser) > 0 || mysqli_num_rows($sqlEmailUser) > 0) { 
                            if(mysqli_num_rows($sqlNameUser) > 0){
                                echo (new setMessageRegister) -> messageNameInUse();
                            }
                            if (mysqli_num_rows($sqlEmailUser) > 0) {
                                echo  (new setMessageRegister) -> messageEmailInUse(); 
                            }
                            $mysqli -> close();
                        }else{
                            echo (new setMessageRegister) -> messageUserCreate();
                            $mysqli -> close();
                            (new controllerUser) -> create();
                            header("location: login.php");
                            die();
                        }
                    }
            }
            if(isset($_POST['btnLogin'])){
                header("location: login.php");
                die();
            }
        }
    }
    
?>