
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
  $query="SELECT * FROM products join sub_category on products.sub_id=sub_category.sub_id join category on products.category_id=category.id order by `p_id`";
  $final= mysqli_query($conection,$query);  
  include '../panel/header.php' ;
?>
<body>
<div class="main-panel">
                <div class="content-wrapper">

<a href="insert.php"><h3>Insertion</h3></a>
<h2><center> View</center></h2>
<div class="table-responsive">
<table class="table table-hover">
<thead class="thead-light">
<tr>
    <th>Id </th>
    <th>Name </th>
    <th>category</th>
    <th>Sub category</th> 
    <th>Price </th>
    <th>Discount</th>
    <th>Quantity </th>
    <th>Image </th>
    <th>Actions </th>
</tr>
</thead>
<?php 
   if(isset($_GET['search'])){
    $filtervalues = $_GET['search'];
    $query23="SELECT * FROM products join sub_category on products.sub_id=sub_category.sub_id join category on products.category_id=category.id 
     WHERE CONCAT(`p_name`) LIKE '%$filtervalues%' OR (`p_id`) LIKE '%$filtervalues%' OR (`name`) LIKE '%$filtervalues%' OR (`names`) LIKE '%$filtervalues%' order by `p_id`"; 
    $query_run = mysqli_query($conection, $query23);
    if(mysqli_num_rows($query_run) > 0)
    {
        foreach($query_run as $row)
         {
 ?>
<tr>
    <td><?php echo $row['p_id']; ?></td>
    <td><?php echo $row['p_name']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['names']; ?></td>
    <td><?php echo $row['price']; ?></td>
    <td><?php echo $row['discount']; ?></td>
    <td><?php echo $row['quantity']; ?></td>
    <td><img src="data:image/jpg;base64,<?php echo base64_encode($row['image']);?>"width="50" height="60" > </td>

    <td><a href="edit.php?id=<?php echo $row['p_id']; ?>"> Edits</a> | <a href="delete.php?id=<?php echo $row['p_id']; ?>">Delete</a></td>
</tr>
<?php
} }else
{
    ?>
        <tr>
            <td colspan="4">No Record Found</td>
        </tr>
    <?php
}} 
 else{
  while($row=mysqli_fetch_assoc($final))
{
?>
<tr>
    <td><?php echo $row['p_id']; ?></td>
    <td><?php echo $row['p_name']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['names']; ?></td>
    <td><?php echo $row['price']; ?></td>
    <td><?php echo $row['discount']; ?></td>
    <td><?php echo $row['quantity']; ?></td>
    <td><img src="data:image/jpg;base64,<?php echo base64_encode($row['image']);?>"width="50" height="60" > </td>

    <td><a href="edit.php?id=<?php echo $row['p_id']; ?>"> Edits</a> | <a href="delete.php?id=<?php echo $row['p_id']; ?>">Delete</a></td>
</tr>
<?php } }?>

</table>
</div>
</div>
</body>
<?php
include '../panel/footer.php' ;?>

