
<?php 
    require_once("././conexion.php");
    require_once("./././models/user.model.php");

 class controllerAccess extends ConexionDataBase{
        public function checkInputLogin(){
            if(isset($_POST['btnLogin'])){
                    if($_POST['userNameAccount'] === ""  or $_POST['userPass'] === ""){
                        echo '<div class="alertForm"> ¡Campos Vacios! </div>';
                    }else{
                        // $mysqli = $this->conexion();
                        // $mysqli = (new ConexionDataBase)->conexion();
                        $mysqli = ConexionDataBase::conexion();
                        $userNameAccount =  $mysqli ->  real_escape_string($_POST['userNameAccount']) ;
                        $userPass= $mysqli -> real_escape_string($_POST['userPass']) ;
                        $sql=$mysqli->query("select * from User as u where username = '$userNameAccount'");
                            if( mysqli_num_rows($sql) > 0){
                                $nr = mysqli_num_rows($sql);
                                $resultQuery = mysqli_fetch_array($sql);
                                $hasd = $resultQuery["password"];        
                                // mysqli_free_result( $sql );
                                if (password_verify($userPass,  $hasd)) {
                                    echo '<div class="alertForm"> Cantraseña valida </div>';
                                    mysqli_free_result( $sql );
                                    $mysqli -> close();
                                    header('location: inicio');
                                }else{
                                    mysqli_free_result( $sql );
                                    $mysqli -> close();
                                    echo '<div class="alertForm"> ¡Datos Incorrectos! </div>';
                                }
                            }
                    }
            }
            if(isset($_POST['btnCheckIn'])){
                header("location: register");
            }
        }
        public function checkInputRegister(){
            if(isset($_POST['btnCheckIn'])){
                    if($_POST['userName'] === ""  or $_POST['userPass'] === "" or $_POST['userNameAccount'] === ""  or $_POST['userEmail'] === ""){
                        echo '<div class="alertForm"> ¡Campos Vacios! </div>';
                    }else{
                        $mysqli = (new ConexionDataBase)->conexion();
                        $userNameAccount = $mysqli -> real_escape_string($_POST['userNameAccount']);
                        $userEmail= $mysqli -> real_escape_string($_POST['userEmail']);
                        $sqlNameUser=$mysqli->query("select * from User where username = '$userNameAccount'");
                        $sqlEmailUser=$mysqli->query("select * from User where email = '$userEmail'");
                        if ($dato=$sqlNameUser->fetch_object() && $dato=$sqlEmailUser->fetch_object()) { 
                            echo "<div class='alertForm'> ¡Nombre De Usuario En Uso! </br> $_POST[userNameAccount]</div> </div> <div class='alertForm'> ¡Correo De Usuario En Uso! </br> $_POST[userEmail] </div>"  ;                          
                        }else if($dato=$sqlNameUser->fetch_object()){
                            echo "<div class='alertForm'> ¡Nombre De Usuario En Uso! </br> $_POST[userNameAccount] </div>";
                        }elseif ($dato=$sqlEmailUser->fetch_object()) {
                            echo "<div class='alertForm'> ¡Correo De Usuario En Uso! </br> $_POST[userEmail] </div>";
                        }else{
                            echo "<div style='background-color: rgba(0, 255, 221, 0.5);' class='alertForm'> ¡Cuenta creada!</div>";
                            $getModelUser = (new modelUser) -> setAttributesUser();
                            echo  ($getModelUser -> nombre);
                            echo  $getModelUser -> userName;
                            echo  $getModelUser -> email;
                        }
                    }
            }
            if(isset($_POST['btnLogin'])){
                header("location: login");
                die();
            }
        }
    }
    
?>