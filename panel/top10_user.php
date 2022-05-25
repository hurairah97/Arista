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
  $query="SELECT user.id,user.name,user.email, COUNT(orders.user_id) FROM user JOIN orders on user.id=orders.user_id GROUP by user_id order by COUNT(user_id) DESC LIMIT 10";
  $final= mysqli_query($conection,$query);  
  include '../panel/header.php' ;
?>
<body>
<div class="main-panel">
                <div class="content-wrapper">
<div class="container">
<div class="table-responsive">
<h2 style="padding-bottom: 20px;"><center> Top 10 Customers Doing Maximum Shopping </center></h2>
<table class="table table-hover">
<thead class="thead-light">
<tr>
    <th>No </th>
    <th>Id </th>
    <th>Name </th>
    <th>Email</th> 
    <th>Shopping by Numbers</th>

</tr>
</thead>
<?php 
$i=0;
while($row=mysqli_fetch_array($final))
{
 ?>
<tr>
    <td><?php  echo ++$i ?></td>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['COUNT(orders.user_id)']; ?></td>
   
</tr>
<?php } ?>
</table>
</div>
</div></div>
</body>
<?php
include '../panel/footer.php' ;?>

