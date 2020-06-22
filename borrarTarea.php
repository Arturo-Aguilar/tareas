<?php
    include('db.php');
    session_start();
    $id=$_GET['id'];
    $query="delete from tareas where id_tarea=$id";
    $result=mysqli_query($con,$query);
    if(!$result){
        die("Query fallado");
    }
    else{
        $_SESSION['USUARIO']='Tarea borrada';
        header('location:index.php');
    }
?>