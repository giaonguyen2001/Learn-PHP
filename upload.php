<!DOCTYPE html>
<html lang="en">
<head>
    <title>Upload</title>
</head>
<body>
<?php
    $folderUpload = "uploads/";
    $fileName = basename(($_FILES["upload"]["name"]));
    $fileUpload = $folderUpload . $fileName;

    if(move_uploaded_file($_FILES["upload"]["tmp_name"], $fileUpload)) {
        echo "File is valid, and was successfully uploaded.\n";
    } else{
        echo "Possible file upload attack!\n";
    }
    // echo 'Here is some more debugging info:';
    // print_r($_FILES);

    // Read file content to screen
    echo "<hr>";
    echo "<h3>File content</h3>";

    $fileType = strtolower(pathinfo($fileUpload, PATHINFO_EXTENSION));
    // echo $fileType;
    if($fileType == "txt"){
        $myFile = fopen($fileUpload, "r");
        $fileContent = fread($myFile, filesize($fileUpload));
        echo $fileContent;
        fclose($myFile);
    }
    $typeImg = array("ipg" , "png" , "jpeg" , "gif");
    $check = false;
    if(in_array($fileType, $typeImg)){
        $check = true;
    }
?>
<?php
    if($check == true){
        ?>
        <img src= "<?php echo $fileUpload;?>">
    <?php
    }
?>
</body>
</html>
