
<?php
    $folder_path = "uploads/";
    $file_path = $folder_path.$_FILES["upload"]["name"];
    $upload_ok = true;

    $file_type = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
    
    if(isset($_POST["submit"])){
        $check = getimagesize($_FILES["upload"]["tmp_name"]);
        if($check !== false){
            echo "File is an image - " . $check["mime"] . ".";
            $upload_ok = true;
        } else {
            echo "File is not an image.";
            $upload_ok = false;
        }
    }

    if(file_exists($file_path)){
        echo "Sorry, file already exists.";
        $upload_ok = false;
    }

    if ($_FILES["upload"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $upload_ok = false;
    }

    $checkImage = array ("ipg" , "png" , "jpeg" , "gif");
    if(!in_array($file_type , $checkImage)){
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $upload_ok = false;
    }
    
    if($upload_ok == false){
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["upload"]["tmp_name"], $file_path)){
            echo "The file ". htmlspecialchars( basename( $_FILES["upload"]["name"])). " has been uploaded.";
        }
        else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

?>
