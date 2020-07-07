<?php

include 'db_connect.php';
$name = $_POST['name'];
$file = $_FILES['file']['name'];

$fileName = $_FILES['file']['name'];
$fileTemp = $_FILES['file']['tmp_name'];
$fileSize = $_FILES['file']['size'];
$fileError = $_FILES['file']['error'];
$fileType = $_FILES['file']['type'];

$fileExt = explode('.',$fileName);
$fileActExt = strtolower(end($fileExt));

$allowed = array('jpg','png');

if(in_array($fileActExt, $allowed)){
    if ($fileError === 0) {
        if($fileSize < 50000000){
            $fileDestination = uniqid('img/').".".$fileActExt;
            move_uploaded_file($fileTemp,$fileDestination);
            $sql = "UPDATE data SET img = '$fileDestination' WHERE username = '$name';";
            $result = mysqli_query($conn,$sql);
         if($result)
         echo "right";
     else
        echo "failed";
           }else{
            echo "too large";
        }
    }else{
        echo "error ";
    }
}else{
    echo "Not allowed type";
}
