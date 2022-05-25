
<?php

include '../config.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
  } 
  if (!isset($_SESSION['adm_name'])) {
    header('location:../admin/admlogin.php');
  }
if(isset($_POST['btn2'])){
   
    $category=$_POST['txtcate'];
    $name=$_POST['name'];

    $pro_img=addslashes(file_get_contents($_FILES['image']['tmp_name']));
    if($conection){
        $query="INSERT INTO `sub_category`(`category_name`, `names`, `images`) VALUES
        ('$category','$name','$pro_img')";
       $final= mysqli_query($conection,$query);
       if($final){
        header('location:subview.php');
       }
       else{
        echo "<script>alert('not insert DB');</script>";
       }
    }else{
        echo "<script>alert('error in conection');</script>";
       
         
 }}   
 $cat_query="Select * from category";
 $cat_result=mysqli_query($conection,$cat_query);  
 include '../panel/header.php' ;   
?>
   
                
<body>
<div class="main-panel">
<div class="content-wrapper">
<div class="container">
</form><a href="subview.php"><h3>View</h3><a>

<form method="post" enctype="multipart/form-data">
    <p><h1><center>Insert</center></h1></p>
   
    <div class="form-group">

<div class="form-group">
<label>Categories </label>
<select class="form-control" name="txtcate" required>
<option value="" required>Select Category</option>
    <?php 
    while($cat_row = mysqli_fetch_assoc($cat_result))
    {?>
    <option value="<?php echo $cat_row['id']; ?>"><?php echo $cat_row['name'];?> </option>
<?php }?>
</select> </div><br>
<div class="form-group">
<label>Names</label></br>
<input  type="text" class="form-control" name="name" required></div><br>
<div class="form-group">
<label>Images </label></br>
<input type="file" name="image" required> </div></br>


  <input class="btn btn-light" type="submit" value="Insert" name="btn2">

</div></div></div>
</body>
<?php
include '../panel/footer.php' ;?>
