<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
  } 
include '../config.php';
if(isset($_GET['id'])){
        $ID=$_GET['id'];
        if($conection){
 $query="DELETE FROM `user` WHERE id='$ID'";
           $final= mysqli_query($conection,$query);
           if($final){
            if(isset($_SESSION["adm_id"])) {
            header('location:urview.php');
        }
        else if(isset($_SESSION["u_id"])) {
            header('Location:../cosmatics/index.php');
            }
}   
else { 
    echo "<script>alert('error".mysqli_error($conection)."');</script>";
}
}}
 ?>