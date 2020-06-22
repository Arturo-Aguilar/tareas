<?php
    include('db.php');
    session_start();
    if($_POST['title']!=null and $_POST['descripcion']!=null){
        $titulo=$_POST['title'];
        $description=$_POST['descripcion'];
        
        $query="insert into tareas values(default,'$titulo','$description',now())";
        
        $result=mysqli_query($con,$query);
        if(!$result){
            die('Query fallido');
        }
        else{
            $_SESSION['USUARIO']='Guardado';
            header('location:index.php');
        }
    }
    else{
        $_SESSION['USUARIO']='Todos los campos deben de estar llenos antes de guardar la tareas';
        header('location:index.php');
    }
?>