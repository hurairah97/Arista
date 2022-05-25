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
  $query="SELECT * FROM `orders` join `user` on orders.user_id=user.id order by `o_id`";
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
    <th>Date </th>
    <th>User Name</th>
    <th>Total bill </th>
    <th>Actions </th>
</tr>
</thead>
<?php 
   if(isset($_GET['search'])){
    $filtervalues = $_GET['search'];
    $query23="SELECT * FROM `orders` join `user` on orders.user_id=user.id 
     WHERE CONCAT(`o_date`) LIKE '%$filtervalues%' OR (`o_id`) LIKE '%$filtervalues%' OR (`name`) LIKE '%$filtervalues%' OR (`o_total`) LIKE '%$filtervalues%' order by `o_id`"; 
    $query_run = mysqli_query($conection, $query23);
    if(mysqli_num_rows($query_run) > 0)
    {
        foreach($query_run as $row)
         {
 ?>
 <tr>
    <td><?php echo $row['o_id']; ?></td>
    <td><?php echo $row['o_date']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['o_total']; ?></td>

    <td> <a href="delete.php?id=<?php echo $row['o_id']; ?>">Delete</a></td>
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
    <td><?php echo $row['o_id']; ?></td>
    <td><?php echo $row['o_date']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['o_total']; ?></td>

    <td> <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
</tr>
<?php
}} 
?>
</table>
</div>

</div></div>
</body>
<?php
include '../panel/footer.php' ;?>

