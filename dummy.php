<?php

include 'db_connect.php';

$name = $_POST["name"];

$sql = "select username from data where username = '$name';";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) == 0)
    echo "true";
else{
    $row = mysqli_fetch_assoc($result);
    echo "$row[username]";
}
?>
