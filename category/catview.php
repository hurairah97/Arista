
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
  $query="select * from category ";
  $final= mysqli_query($conection,$query);  
  include '../panel/header.php' ;
?>
<body>
<div class="main-panel">
                <div class="content-wrapper">
<div class="container">
<a href="insert.php"><h3>Insertion</h3></a>
<h2><center> View</center> </h2>
<table class="table table-hover">
<thead class="thead-light">
<tr>
    <th>Id </th>
    <th>Name </th>
    <th>Image </th>
    <th>Actions </th>
</tr>
</thead>
<?php 
while($row=mysqli_fetch_assoc($final))
{
 ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><img src="data:image/jpg;base64,<?php echo base64_encode($row['cat_image']);?>"width="50" height="60" > </td>

    <td><a href="edit.php?id=<?php echo $row['id']; ?>"> Edits</a> | <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
</tr>
<?php
} 
?>
</table>
<a href="insert.php"><h3>Insertion</h3></a>
</div></div>
</body>
<?php
include '../panel/footer.php' ;?>
