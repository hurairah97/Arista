
<?php
include '../config.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
  } 
  if (!isset($_SESSION['adm_name'])) {
    header('location:../admin/admlogin.php');
  }
if(isset($_POST['btn2'])){
    $name=$_POST['name'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $cell=$_POST['cell'];
    $dob=$_POST['dob'];
    $remark=$_POST['remark'];

    if($conection){
        $query="INSERT INTO `customer_detail`(`name`, `address`, `email`, `work_phone_no`, `cell_no`, `date_of_birth`, `remark`) VALUES
        ('$name','$address','$email','$phone','$cell','$dob','$remark')";
       $final= mysqli_query($conection,$query);
       if($final){
        header('location:detview.php');
       }
       else{
        echo "<script>alert('error".mysqli_error($conection)."');</script>";
       }
    }else{
        echo "<script>alert('error in conection');</script>";
       }} 
 include '../panel/header.php' ;    
?>
   
                
<body>
<div class="main-panel">
                <div class="content-wrapper">
<div class="container">
</form><a href="detview.php"><h3>View</h3><a>

<form method="post" enctype="multipart/form-data">
<p><h1><center> Insert</center></h1></p>
   
    <div class="form-group">
<label>Name </label>
<input type="text" class="form-control" name="name"></div><br>
<div class="form-group">
<label>Address </label>
<input type="text" class="form-control" name="address"></div><br>
<div class="form-group">
<label>Email </label>
<input type="text" class="form-control" name="email"></div><br>
<div class="form-group">
<label>Phone No </label>
<input type="number" class="form-control" name="phone"></div><br>
<div class="form-group">
<label>Cell No </label>
<input type="number" class="form-control" name="cell"></div><br>
<div class="form-group">
<label>Date OF Birth </label>
<input type="date" class="form-control" name="dob"></div><br>
<div class="form-group">
<label>Remarks <i>(optional)</i> </label>
<textarea name="remark" class="form-control" cols="50" rows="7"  aria-required="true" ></textarea><br>
</div>

  <input class="btn btn-light" type="submit" value="Submit" name="btn2">
</div>
</body>
<?php
include '../panel/footer.php' ;?>