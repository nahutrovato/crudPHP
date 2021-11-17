<?php

include("db.php");

    if(isset($_GET["id"])){
        
        $id = $_GET["id"];

        $query = "SELECT * FROM task WHERE id = $id";
        $result = mysqli_query($db,$query);

        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $title = $row["title"];
            $description = $row ["description"];
     
        }
    }

    if(isset($_POST["update"])){
        
        $id = $_GET["id"];
        $title = $_POST["title"];
        $description = $_POST["description"];

        $updateQuery = "UPDATE task SET title = '$title', description = '$description' WHERE id = $id ";
        mysqli_query($db,$updateQuery);
        header("Location: index.php");
        
        $_SESSION["message"] = "Tarea actualizada correctamente";
        $_SESSION["message_type"] = "success";
    }    
?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET["id"] ?>" method="POST">
                    <div class="form-group m-2">
                        <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" placeholder="Actualizar titulo">
                    </div>
                    <div class="form-group m-2">
                        <textarea name="description" rows="2" class="form-control" value="<?php echo $description; ?>" placeholder="Actualizar descripcion"></textarea>
                    </div>
                    <div class="d-grid m-2 ">
                        <button class="btn btn-success" type="submit" name="update" value="update">Actualizar</button>
                    </div>
                </form>
            </div>
        </div> 
    </div>
</div>

<?php include("includes/footer.php") ?>