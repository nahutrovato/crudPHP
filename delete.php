<?php

include("db.php");

    if(isset($_GET["id"])){
       
        $id = $_GET["id"];

        $deleteQuery = "DELETE FROM task WHERE id = $id";
        $result = mysqli_query($db,$deleteQuery);

        if(isset($result)){
            header("Location: index.php");
        }else{
            echo 'Fallo el delete';
        }
    }

    $_SESSION["message"] = "Tarea borrada satisfactoriamente";
    $_SESSION["message_type"] = "danger";
?>