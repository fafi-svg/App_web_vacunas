<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/inicio.css">
    <title>Document</title>
</head>
<body>
    <?php
    require_once(__DIR__."/controller/user.controller.php");
    $users = (new controllerUser) -> read();
    var_dump($users);
    $contador = 0;
    $result =[];
    ?>
    <div>
        <?php 
            foreach ($users as $variable) {
                $long = sizeof($variable)-1;
                ?>
                <div style="background-color:gray; padding:.4vh;border:0.1vh solid; display: flex;text-align: center;     justify-content: space-around;">
                <?php
                for ($i= 0; $i<=$long; $i++) {
                ?>
                    <div style="background-color:gray; padding:.4vh;border:0.1vh solid; display: flex;text-align: center;">                           
                            <?php  
                                echo (array_keys($variable)[$i]).""; 
                            ?>
                        </div>
                <?php
                }
                ?> 
                </div>
                <?php
                echo "</br>";
                foreach ($users as $array) {
                    ?>
                    <div style="background-color:green; padding:.4vh;border:0.4vh solid blue; display: flex;justify-content: space-around;">
                    <?php
                        foreach ($array as $key) {
                        ?>
                        <p style="background-color:green; padding:.4vh; text-align: center; ">                           
                            <?php 
                        
                            ?> 
                            <?php 
                                echo $key;
                            ?>
                                
                            <?php 
                            ?>
                        </p>
   
                        <?php
                    }
                    ?>
                    </div> 
                    <?php
                    echo "</br>";
                }
                break;
            }
            echo "---------------------------------------------------"."</br>";
            ?>
            <?php
            echo "---------------------------------------------------"."</br>";
            foreach ($users as $variable) {
                ?>
                <div class="Tabla" style="background-color:white; padding:.4vh;border:0.4vh solid blue; display: flex;  width: max-content; margin: auto;">
                    <?php
                    for ($i=0; $i<=$long; $i++) {
                        ?>
                        <div class="columna" style="background-color:red;">
                            <div class="columna__header" style="background-color:red; padding:.4vh;border:0.4vh solid blue; text-align: center; ">    
                                <?php
                                    echo (array_keys($variable)[$i]);
                                ?>
                            </div>
                            <?php
                            $column = (array_keys($variable)[$i]); 
                            ?>
                            <div class="columna__content" style="background-color:red;border:0.4vh solid ; ">
                                <?php
                                foreach ($users as $array) {
                                    ?>
                                    <p class="columna__text" style=" width:100%; text-align:center; height: 100%; border: 0.4vh solid white;">
                                        <?php
                                        echo $array[$column]."</br>";
                                        ?>
                                    </p>
                                    <?php
                                    $contador++;
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                        $contador = 0;
                    }
                    ?>
                    </div>
    </div>
                    <?php
                }
            ?>
            <?php
            // echo "---------------------------------------------------"."</br>";
            foreach ($users as $variable) {
                for ($i=0; $i<=$long; $i++) {
                    ?>
                    <div>
                        <?php
                        echo (array_keys($variable)[$i])."<=="."</br>";
                        $column = (array_keys($variable)[$i]); 
                        foreach ($users as $array) {
                            ?>
                            <p>
                                <?php
                                echo $array[$column]."</br>";
                                ?>
                            </p>
                            <?php
                            $contador++;
                        }
                        ?>
                    </div>
                        <?php
                    $contador = 0;
                }
            }
                // var_dump($variable);
                // if($contador<=$long){
                //     $contador ++;
                // }else{
                //     $contador=0;

                // }
                // for ($i=0; $i<=$long; $i++) {
                //     echo (array_keys($variable)[$i])."<=="."</br>";
                //     $column = (array_keys($variable)[$i]); 
                //     foreach ($users as $variable) {
                //         echo $variable[$column]."</br>";
                //         $contador++;
                //     }
                //     $contador = 0;
                // }
           
            ?>
            <?php
            // echo 'id'."</br>";
            // foreach ($users as $variable) {
            //     echo $variable['id']."</br>";
            // }
            // echo 'nombre'."</br>";
            // foreach ($users as $variable) {
            //     echo $variable['nombre']."</br>";
            // }
            // echo 'email'."</br>";
            // foreach ($users as $variable) {
            //     echo $variable['email'] ."</br>";
            // }
            // echo 'username'."</br>";
            // foreach ($users as $variable) {
            //     echo $variable['username'] ."</br>";
            // }
            // foreach($users as $item){
            //     $long = sizeof($item)-1;
            //     for ($i=0; $i <=  $long; $i++) { 
            //        echo (array_keys($item)[$i])." <----> "."</br>";
            //        foreach ($item as $element) {
            //             echo $element."</br>";
            //             if($contador<=$long){
            //                 $contador++;
            //             }else{
            //                 $contador=0;
            //                 break;
            //             } 
            //             break;
            //        }
            //        break;   
            //     }
                

            // }
            // $contador=0;
            // // for ($i = 0; $i <= $long; $i++) {
            // //     echo $users[$i]['id'];
            // // }

            // while ($row = mysqli_fetch_array($result)) {
            //     $users[] = $row;
                
            // }
            ?>
            <table class="default">
   

</body>
</html>
