
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
  $pro_img=addslashes(file_get_contents($_FILES['image']['tmp_name']));
    if($conection){
        $query="INSERT INTO `category` (`name`,`cat_image`) VALUES
        ('$name','$pro_img')";
       $final= mysqli_query($conection,$query);
       if($final){
        header('location:catview.php');
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
        <a href="catview.php"><h3>View</h3><a>

        <form method="post" enctype="multipart/form-data">      
          <p><h1><center> Insert</center></h1></p>
   
           <div class="form-group">
          <label>Name </label><br>
          <input type="text" class="form-control" name="name" required></div><br>
          <div class="form-group">
          <label>Image </label><br>
          <input type="file" name="image"></div> </br>
          <input class="btn btn-light" type="submit" value="Insert" name="btn2">
        </form>
      </div>
    </div>
</body>
<?php
include '../panel/footer.php' ;?>