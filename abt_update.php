<?php

include 'db_connect.php';

$name = $_POST['name'];
$abt = $_POST['abt'];

$sql = "UPDATE data SET abt = '$abt' WHERE username = '$name';";
$result = mysqli_query($conn,$sql);
if($result)
    echo "right";
else
    echo "failed";
