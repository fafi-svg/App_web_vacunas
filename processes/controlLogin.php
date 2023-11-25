
<?php 
    require_once(__DIR__."/../conexion.php");
    require_once(__DIR__."/../models/user.model.php");
    require_once(__DIR__."/messageLogin.php");
    require_once(__DIR__."/../login.php");
 class controlAccessLogin extends ConexionDataBase{
        public function checkInputLogin(){
            if(isset($_POST['btnLogin'])){
                    // session_start();
                    if($_POST['userNameAccount'] === ""  or $_POST['userPass'] === ""){
                        echo (new setMessageLogin) -> messageInputEmpty();
                    }else{
                        $mysqli = ConexionDataBase::conexion();
                        $userNameAccount = "%".$_POST['userNameAccount']."%";
                        $userNameAccount = $mysqli -> real_escape_string($userNameAccount);
                        $userPass= $mysqli -> real_escape_string($_POST['userPass']) ;
                        $sql=$mysqli->query("select * from User as u where username like binary '$userNameAccount'");
                            if( mysqli_num_rows($sql) > 0){
                                $resultQuery = mysqli_fetch_array($sql);
                                $hasd = $resultQuery["password"];        
                                if (password_verify($userPass,  $hasd)) {
                                    echo (new setMessageLogin) -> messageStartSession();                                                                     
                                    $_SESSION['usuario'] = $_POST['userNameAccount'];
                                    $_SESSION['rol'] = $resultQuery["Role_id"];
                                    $_SESSION['id'] = $resultQuery["id"];                              
                                    mysqli_free_result( $sql );   
                                    $mysqli -> close();                        
                                }else{
                                    session_destroy();
                                    mysqli_free_result( $sql );
                                    $mysqli -> close();
                                    echo (new setMessageLogin) -> messageNotValidatedPassword();
                                }
                            }else{
                                session_destroy();
                                echo (new setMessageLogin) -> messageUserInvalid();
                            }
                    }
            }
            if(isset($_POST['btnCheckIn'])){
                header("location: register.php");
            }        
            if(isset($_POST['btnEnterPage'])){
                    session_start();
                    header("location: homepage.php");
            }

        }

    }
    
?>