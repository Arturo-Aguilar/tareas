<?php   
    $dbHost='localhost';
    $dbName='tareas';
    $dbUser='root';
    $dbPass='benito290496';
    $con=mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
    try{
        if(isset($con)){
            return $con;
        }
    }catch(Exception $ex){
        echo $ex=getMessage();
    }
?>
