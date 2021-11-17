<?php include("db.php") ?>

<?php include("includes/header.php") ?>
    
<div class="container p-4">
    <div class="row">
        
        <div class="col-md-4">
            <div class="card card-body">
                
                <!--CARD QUE INDICA SI EL DATO FUE GUARDADO EXITOSAMENTE-->
                <?php if(isset($_SESSION["message"])){ ?>
                    <div class="alert alert-<?= $_SESSION["message_type"] ?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION["message"] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php session_unset(); } ?> 
                <!--CARD QUE INDICA SI EL DATO FUE GUARDADO EXITOSAMENTE-->

                <form action="save_task.php" method="POST">
                    <div class="form-group m-2">
                        <input type="text" name="title" class="form-control" placeholder="Your task" autofocus>
                    </div>
                    <div class="form-group m-2">
                        <textarea name="description" rows="2" class="form-control" placeholder="Task description"></textarea>
                    </div>
                    <div class="d-grid m-2 ">
                        <button class="btn btn-success" type="submit" name="save_task" value="Save task">Save task</button>
                    </div>
                </form>

            </div>
        </div>
        
        <div class="col-md-8">
            <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Creation date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php 
                        
                            $query = "SELECT * FROM task";
                            $result_tasks = mysqli_query($db,$query);
                            
                            while($row = mysqli_fetch_array($result_tasks)){ ?> 
                               
                                <tr>
                                    <td><?php echo $row["title"] ?></td>
                                    <td><?php echo $row["description"]?></td>
                                    <td><?php echo $row["created_at"] ?></td>
                                    <td>
                                        <a href="edit.php?id=<?php echo $row["id"]?>">Editar</a>
                                        <a href="delete_task.php?id=<?php echo $row["id"]?>">Borrar</a>
                                    </td>
                                </tr>

                        <?php } ?>

                        
                    </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php")  ?>





