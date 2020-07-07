<?php
include 'db_connect.php';

$name = $_POST['name'];
$age = '10';
$dob = $_POST['dob'];
$contact = $_POST['contact'];
$email = $_POST['email'];
/*
$sql = "UPDATE data SET age = ?, dob = ?, contact = ?, email = ? where username = ?;";
$prep = mysqli_prepare($conn,$sql);
mysqli_stmt_bind_param($prep,'sssss',$age,$dob,$contact,$email,$name);
mysqli_stmt_execute($prep);
*/
$sql = "UPDATE data SET age = '$age', dob = '$dob', contact = '$contact', email = '$email' where username = '$name';";
mysqli_query($conn,$sql);

echo "right";
/*


$curr = file_get_contents('data.json');
$arr = json_decode($curr, true);
$xtra = array(
    'name' => $name,
    'password' => $password,
    'age' => $age,
    'dob' => $dob,
    'contact' => $contact,
    'email' => $email
     );
$arr[] = $xtra;
$final = json_encode($arr);
if(!file_put_contents('data.json', $final))
    echo "Json error";
*/
?>
