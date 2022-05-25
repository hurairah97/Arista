<?php 
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
include '../config.php';

if (isset($_POST["submit"])) 
{
    $email = $_POST["txtemail"];
    $password = $_POST["txtpassword"];

    $query = "SELECT * FROM `admin` WHERE `email` = '$email' && `password` = '$password'";
    $final= mysqli_query($conection,$query);
    $row  = mysqli_fetch_array($final);
       if(is_array($row)) {
       $_SESSION["adm_id"] = $row['id'];
       $_SESSION["adm_name"] = $row['name'];
       } else {
        echo "<script>alert('Invalid Credential');</script>";
       }
}
if(isset($_SESSION["adm_id"])) {
    header('location:../panel/index.php');
}
?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="shortcut icon" href="../panel/images/favicon.png" />

  <title>LogIn</title>


</head>

<body class="sub_page">

  <div class="hero_area">
  </div>

  <section class="contact_section layout_padding">
    <div class="container" style="text-align:center;margin-top:150px">
      <div class="heading_container justify-content-center">
        <h2 class="">
          Admin Log In
        </h2>
      </div>

    </div>
    <div class="container" style="text-align:center;">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <form action="" method="POST">
            <div style="padding-top:10px; padding-bottom:10px">
              <input type="email" placeholder="Email" name="txtemail"/>
            </div>
            <div style="padding-bottom:10px">
              <input type="password" placeholder="Password" name="txtpassword" />
              
            </div>
            <div>
            
            <div class="d-flex  mt-4 ">
            <button type="submit" name="submit">
                Log In
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>

</body>

</html>