<?php
include 'db_connect.php';
$name = $_POST['name'];
$password = $_POST['password'];

$sql = "SELECT password FROM data WHERE username = '$name';";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){

$row = mysqli_fetch_assoc($result);
if($row["password"] == $password)
    echo "right";
else
    echo "Invalid";
}
else
    echo "Not available";

?>
