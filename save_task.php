<?php
include("db.php");

    if(isset($_POST['save_task'])){
        
        $title = $_POST["title"];
        $description = $_POST["description"];

        $create = "INSERT INTO task(title, description) VALUES ('$title', '$description')";
        $result = mysqli_query($db,$create);

        if($result){
            header("Location: index.php");
        }else{
            echo 'Query fail';
        }
    }

    $_SESSION["message"] = "Tarea guardada satisfactoriamente";
    $_SESSION["message_type"] = "success";   
?>