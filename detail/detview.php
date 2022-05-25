
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
  $query="select * from `customer_detail`";
  $final= mysqli_query($conection,$query);  
  include '../panel/header.php' ;
?>

<body>
<div class="main-panel">
                <div class="content-wrapper">
<div class="container">

<h2><center> View</center></h2>
<div class="table-responsive">
<table class="table table-hover">
<thead class="thead-light">
<tr>
    <th>Id </th>
    <th>Name </th>
    <th>Address</th>
    <th>Email </th>
    <th>Phone No </th>
    <th>Cell No</th>
    <th>Date Of Birth</th>
    <th>Remarks</th>
    <th>Actions </th>
</tr>
</thead>
<?php 
while($row=mysqli_fetch_array($final))
{
 ?>
<tr>
    <td><?php echo $row[0]; ?></td>
    <td><?php echo $row[1]; ?></td>
    <td><?php echo $row[2]; ?></td>
    <td><?php echo $row[3]; ?></td>
    <td><?php echo $row[4]; ?></td>
    <td><?php echo $row[5]; ?></td>
    <td><?php echo $row[6]; ?></td>
    <td><?php echo $row[7]; ?></td>

    <td> <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
</tr>
<?php
} 
?>
</table>
</div>

</div></div>
</body>
<?php
include '../panel/footer.php' ;?>
