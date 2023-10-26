
<?php 
    require_once(__DIR__."/../conexion.php");
    require_once(__DIR__."/../models/user.model.php");
    require_once(__DIR__."/messageLogin.php");

 class controlAccessLogin extends ConexionDataBase{
        public function checkInputLogin(){
            if(isset($_POST['btnLogin'])){
                    if($_POST['userNameAccount'] === ""  or $_POST['userPass'] === ""){
                        echo (new setMessageLogin) -> messageInputEmpty();
                    }else{
                        $mysqli = ConexionDataBase::conexion();
                        $userNameAccount =  $mysqli ->  real_escape_string($_POST['userNameAccount']) ;
                        $userPass= $mysqli -> real_escape_string($_POST['userPass']) ;
                        $sql=$mysqli->query("select * from User as u where username = '$userNameAccount'");
                            if( mysqli_num_rows($sql) > 0){
                                // $nr = mysqli_num_rows($sql);
                                $resultQuery = mysqli_fetch_array($sql);
                                $hasd = $resultQuery["password"];        
                                // mysqli_free_result( $sql );
                                if (password_verify($userPass,  $hasd)) {
                                    echo (new setMessageLogin) -> messageValidatedPassword();
                                    mysqli_free_result( $sql );
                                    $mysqli -> close();
                                    header('location: homepage');
                                }else{
                                    mysqli_free_result( $sql );
                                    $mysqli -> close();
                                    echo (new setMessageLogin) -> messageNotValidatedPassword();
                                }
                            }else{
                                echo (new setMessageLogin) -> messageUserInvalid();
                            }
                    }
            }
            if(isset($_POST['btnCheckIn'])){
                header("location: register");
            }
        }
    }
    
?>