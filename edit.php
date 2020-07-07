<?php

include 'db_connect.php';

$name = $_GET['name'];
$sql = "SELECT * FROM data WHERE username = ?;";
/*$prep = mysqli_prepare($conn,$sql);
mysqli_stmt_bind_param($prep,'s',$name);
mysqli_stmt_execute($prep);
$result = mysqli_stmt_get_result($prep);
*/


$sql = "SELECT * FROM data WHERE username = '$name';";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
    <head>
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="script.js"> </script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="dummy2.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body class="bg" >
    <section class="container-fluid cnt ">
            <section class="row justify-content-around "  >
                    <section class="col-sm-5 col-md-4 col-lg-3 col-9 mar_btm">
                     <legend class="w-auto cntr">YOUR PROFILE</legend>
                       <div class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <image href=<?php echo $row["img"];?> class="img-fluid img brdr" alt="Please upload your pic"/>
                        </svg>
                    </div>

                        <button type="submit"  id ="change" class=" form-group btn btn-block login_btn brdr mar-top">CHANGE</button>

                        <div class="form-group " id="img_upld">
                            <div class="col-sm-10">
                                <input  type="file" id="file" name="name" class="form-control-plaintext fil">
                            </div>
                            <button type="submit" id ="upload" class=" form-group btn btn-block login_btn brdr mar-top">UPLOAD</button>
                        </div>

                </section>
         <section class="col-sm-5 col-md-4 col-lg-3 col-9 login mar_btm"  id="box_signup">
                    <fieldset class="form-container">
                        <legend class="w-auto cntr">PROFILE DETAILS</legend>
                       <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="name">Username&nbsp:</label>
                            <div class="col-sm-10">
                                <input  type="text" id="name" name="name"  value=<?php echo $row["username"]; ?> readonly class="form-control-plaintext" >
                         </div></div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="email">Email-&nbspID&nbsp:</label>
                            <div class="col-sm-10">
                                <input  type="text" name="email" id="email"  value=<?php echo $row["email"]; ?> class="form-control-plaintext brdr" autofocus >
                         </div></div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="contact">Contact Number&nbsp:</label>
                            <div class="col-sm-10">
                                <input  type="text" name="contact" id="contact"  value=<?php echo $row["contact"]; ?> class="form-control-plaintext brdr" >
                         </div></div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="dob">DOB&nbsp:</label>
                            <div class="col-sm-10">
                                <input  type="date" name="dob" id="dob"  value=<?php echo $row["dob"]; ?> class="form-control-plaintext brdr" >
                         </div></div>
                         <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="age">Your&nbspage&nbsp:</label>
                            <div class="col-sm-10">
                                <input  type="text" id="age" name="age"  value=<?php echo $row["age"]; ?> class="form-control-plaintext brdr" >
                         </div></div>
                      <button type="submit" id ="update" value="<?php echo $name ?>"  class="form-group btn btn-block login_btn brdr">UPDATE</button>
                    </fieldset>
                </section>
                <section class="col-sm-5 col-md-4 col-lg-3 col-9 login mar_btm"  id="box_signup">
                    <div class="form-group">
                       <legend class="w-auto cntr">ABOUT YOURSELF</legend>
                      <div class="col-sm-10">
                            <textarea class="form-control" id="abt"  rows="9" disabled="true"> <?php echo $row['abt']; ?></textarea>
                        </div>
                    </div>
                      <button type="submit"  id ="abt_edit" class=" form-group  btn btn-light btn-block login_btn brdr">EDIT</button>
                      <button type="submit"  id ="abt_update" class=" form-group  btn btn-light btn-block login_btn brdr">UPDATE</button>
<?php
}else{
    echo "Something went wrong";
}
?>                </section>
            </section>
        </section>
         </body>
</html>

