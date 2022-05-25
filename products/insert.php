
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
    $category=$_POST['txtcate'];
    $subcategory=$_POST['txtsub'];
    $price=$_POST['price'];
    $qty=$_POST['qty'];
    $pro_img=addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $disc=$_POST['disc'];
    if($conection){
        $query="INSERT INTO `products` (`p_name`, `category_id`, `sub_id`, `price`, `quantity`, `image`, `discount`) VALUES
        ('$name','$category',' $subcategory','$price','$qty','$pro_img','$disc')";
       $final= mysqli_query($conection,$query);
       if($final){
        header('location:prdview.php');
       }
       else{
        echo "<script>alert('error');</script>";
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
<a href="prdview.php"><h3>View </h3><a>

<form method="post" enctype="multipart/form-data">
    <p><h1><center> Insert</center></h1></p>
   
<div class="form-group">
<label> Name </label>
<input type="text" class="form-control" name="name" required></div><br>
<div class="form-group">
        <label for="CATEGORY-DROPDOWN">Category</label>
        <select class="form-control" id="category-dropdown" name="txtcate" required>
            <option value="" required>Select Category</option>
            <?php
                require_once "../config.php";
                $result = mysqli_query($conection,"SELECT * FROM category");
                while($row = mysqli_fetch_array($result)) {
                ?>
            <option value="<?php echo $row['id'];?>"><?php echo $row["name"];?></option>
            <?php
                }
                ?>
        </select>
    </div><br>
<div class="form-group">
<label>Sub Category </label>
<select class="form-control" id="sub-category-dropdown" name="txtsub" required>
                           </select> </div><br>
<div class="form-group">
<label> Price </label>
<input  type="number" class="form-control" name="price" required></div><br>
<div class="form-group">
<label> Discount </label>
<input  type="number" class="form-control" name="disc" required></div><br>
<div class="form-group">
<label> Quantity </label>
<input  type="number" class="form-control" name="qty" required></div><br>
<div class="form-group">
<label> Images </label></br>
<input type="file" name="image" required></div> </br>


  <input class="btn btn-light" type="submit" value="Insert" name="btn2">
  </form>
</div></div>
<script>
         $(document).ready(function() {
    $('#category-dropdown').on('change', function() {
        var category_id = this.value;
        $.ajax({
            url: "fetch.php",
            type: "POST",
            data: {
                category_id: category_id
            },
            cache: false,
            success: function(result) {
                $("#sub-category-dropdown").html(result);
            }
        });
    });
});
      </script>
</body>
<?php
include '../panel/footer.php' ;?>
