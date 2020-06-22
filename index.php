<?php
    include('header.php');
    
session_start();
?>
<div class="container p-4">
    <div class="row">
        <div class="col md-4">

            <div class="card card-body">
                <form action="guardartareas.php" method="post">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="titulo de la tarea" autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="descripcion" rows="2" class="form-control" placeholder="Descripcion tarea">
                            
                        </textarea>
                    </div>
                    <input type="submit" class="btn btn-primary btn-block" name="save-task" value="Guardar">
                </form>
            </div>
            <?php if(isset($_SESSION['USUARIO'])) {?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <h1><?=$_SESSION['USUARIO']?></h1>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php session_unset();}?>
        </div>
        <div class="col md 8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Creada en</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include('db.php');
                        $query="select*from tareas";
                        $result=mysqli_query($con,$query);
                        if($result){
                        while($row=mysqli_fetch_array($result)) { ?>
                            <tr>
                                <td><?php echo $row['titulo']?></td>
                                <td><?php echo $row['decripcion']?></td>
                                <td><?php echo $row['creada_en']?></td>
                                <td>
                                    <a href="editarTarea.php?id=<?php echo $row['id_tarea']?>"><img src="imagenesPracticaCRUD/edit.png" width="40px" alt="editar"></a>
                                    <a href="borrarTarea.php?id=<?php echo $row['id_tarea']?>"><img src="imagenesPracticaCRUD/botebasura.png" width="40px" alt="borrar imagen"></a>
                                </td>
                            </tr>
                        <?php }} ?>
                </tbody>
            </table>
        </div>
    </div>
</div>