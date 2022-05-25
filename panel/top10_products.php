<?php
include '../config.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
  } 
  if (!isset($_SESSION['adm_name'])) {
    header('location:../admin/admlogin.php');
  }
if(!$conection){
    echo "<script>alert('error in conection');</script>";
  } 
  $query="SELECT products.p_id, products.p_name, products.price, products.image, COUNT(invoice.product_quantity) FROM products JOIN invoice on products.p_id=invoice.product_id GROUP by product_id order by COUNT(product_quantity) DESC LIMIT 10";
  $final= mysqli_query($conection,$query);  
  include '../panel/header.php' ;
?>
<body>
<div class="main-panel">
                <div class="content-wrapper">
<div class="container">
<div class="table-responsive">
<h2 style="padding-bottom: 20px;"><center> Top 10 Best Selling Products</center></h2>
<table class="table table-hover">
<thead class="thead-light">
<tr>
    <th>No </th>
    <th>Id </th>
    <th>Name </th>
    <th>Price</th> 
    <th>Image </th>
    <th>Selling by Numbers</th> 


</tr>
</thead>
<?php 
$i=0;
while($row=mysqli_fetch_array($final))
{
 ?>
<tr>
    <td><?php  echo ++$i ?></td>
    <td><?php echo $row['p_id']; ?></td>
    <td><?php echo $row['p_name']; ?></td>
    <td><?php echo $row['price']; ?></td>
    <td><img src="data:image/jpg;base64,<?php echo base64_encode($row['image']);?>"width="50" height="60" > </td>
    <td><?php echo $row['COUNT(invoice.product_quantity)']; ?></td>
  </tr>
<?php } ?>
</table>
</div>
</div></div>
</body>
<?php
include '../panel/footer.php' ;?>

