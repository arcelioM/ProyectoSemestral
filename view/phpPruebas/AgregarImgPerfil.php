<?php 
    
    if($_SERVER["REQUEST_METHOD"]==="POST"){

        if (($_FILES["file"]["type"] == "image/pjpeg")
            || ($_FILES["file"]["type"] == "image/jpeg")
            || ($_FILES["file"]["type"] == "image/png")
            || ($_FILES["file"]["type"] == "image/gif")
            || ($_FILES["file"]["type"] == "image/webp")) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], "../imagenes/".$_FILES['file']['name'])) {
                echo $_FILES['file']['name'];
            } else {
                echo 0;
            }
        } else {
            echo 0;
        }
    }else{
        echo 0;
    } 
?>