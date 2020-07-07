<?php
include 'db_connect.php';
$email = $_POST['email'];
$name = $_POST['name'];
$password = $_POST['password'];
$dob = $_POST['dob'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$img = "img\default.png";

$today = date("Y-m-d");
$diff = date_diff(date_create($dob), date_create($today));
$age  = $diff->format('%y');

$sql = "INSERT INTO data(username,password,age,dob,contact,email,img) values(?,?,?,?,?,?,?);";
$prep = mysqli_prepare($conn,$sql);
mysqli_stmt_bind_param($prep,'sssssss',$name,$password,$age,$dob,$contact,$email,$img);
mysqli_stmt_execute($prep);

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
else
    echo "right";
?>
