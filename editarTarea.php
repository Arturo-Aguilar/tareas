<?php
    include('db.php');
    session_start();
    if(isset($_GET)){
        $id=$_GET['id'];
        $titulo;
        $descrip;
        $query="select*from tareas where id_tarea=$id";
        $result=mysqli_query($con,$query);
        while($row=mysqli_fetch_array($result)){
            $titulo=$row['titulo'];
            $descrip=$row['decripcion'];
        }
    }
    if(isset($_POST['up'])){
        $id=$_GET['id'];
        $titulo=$_POST['title'];
        $desc=$_POST['descripcion'];
        $query="update tareas set titulo='$titulo',decripcion='$desc' where id_tarea=$id";
        $result=mysqli_query($con,$query);
        if(!$result){
            die("Query fallo");
        }
        else{
            $_SESSION['USUARIO']='Tarea Actualizada';
            header('location:index.php');
        }
    }
?>
<?php include('header.php');?>
<div class="container p-4">
    <div class="row">
        <div class="col md-4">

            <div class="card card-body">
                <form action="editarTarea.php?id=<?php echo $_GET['id'];?>" method="post">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="titulo de la tarea" autofocus value="<?php echo $titulo?>">
                    </div>
                    <div class="form-group">
                        <textarea name="descripcion" rows="2" class="form-control" placeholder="Descripcion tarea">
                            <?php echo $descrip?>
                        </textarea>
                    </div>
                    <input type="submit" class="btn btn-primary btn-block" name="up" value="Actualizar">
                </form>
            </div>
            
        </div>
    </div>
</div>