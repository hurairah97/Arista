
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
  $query="select * from user";
  $final= mysqli_query($conection,$query);  
  include '../panel/header.php' ;
?>
<body>
<div class="main-panel">
                <div class="content-wrapper">
<div class="container">
<div class="table-responsive">
<h2><center> View</center></h2>
<table class="table table-hover">
<thead class="thead-light">
<tr>
    <th>Id </th>
    <th>Name </th>
    <th>Email</th> 
    <th>Password </th>
    <th>Address</th>
    <th>Number </th>
    <th>D_O_B</th>
    <th>Actions </th>
</tr>
</thead>
<?php 
   if(isset($_GET['search'])){
    $filtervalues = $_GET['search'];
    $query23="SELECT * FROM user  
     WHERE CONCAT(`name`) LIKE '%$filtervalues%' OR (`id`) LIKE '%$filtervalues%' OR (`email`) LIKE '%$filtervalues%' OR (`address`) LIKE '%$filtervalues%'"; 
    $query_run = mysqli_query($conection, $query23);
    if(mysqli_num_rows($query_run) > 0)
    {
        foreach($query_run as $row)
         {
 ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['password']; ?></td>
    <td><?php echo $row['address']; ?></td>
    <td><?php echo $row['phone']; ?></td>
    <td><?php echo $row['d_o_b']; ?></td>

    <td><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
</tr>
<?php
} }else
{
    ?>
        <tr>
            <td colspan="4">No Record Found</td>
        </tr>
    <?php
}}  else{
  while($row=mysqli_fetch_assoc($final))
{
?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['password']; ?></td>
    <td><?php echo $row['address']; ?></td>
    <td><?php echo $row['phone']; ?></td>
    <td><?php echo $row['d_o_b']; ?></td>

    <td><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
</tr>
<?php } }?>
</table>
</div>
</div></div>
</body>
<?php
include '../panel/footer.php' ;?>

