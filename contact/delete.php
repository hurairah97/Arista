<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
  } 
include '../config.php';
if(isset($_GET['id'])){
        $ID=$_GET['id'];
        if($conection){
 $query="DELETE FROM `contact` WHERE id='$ID'";
           $final= mysqli_query($conection,$query);
           if($final){
            header('Location:viewcont.php');
           }
}   
else { 
    echo "<script>alert('error');</script>";
}
}
 ?>