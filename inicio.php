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
    require_once(__DIR__."/controller/user.Controller.php");
    $users = (new controllerUser) -> read();
    $contador = 0;
    $result =[];
    ?>
    <div>
        <?php 
            foreach ($users as $variable) {
                $long = sizeof($variable);
                for ($i=0; $i <$long; $i++) {
                    echo (array_keys($variable)[$i])."<=="."</br>"; 
                    $column = (array_keys($variable)[$i]);
                    foreach ($users as $variable) {
                        echo $variable[$column]."</br>";
                        $contador++;
                    }
                    $contador = 0;
                }
            }
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
    </div>      

</body>
</html>
