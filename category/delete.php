<?php
include '../config.php';
if(isset($_GET['id'])){
        $ID=$_GET['id'];
        if($conection){
 $query="DELETE FROM `category` WHERE id='$ID'";
           $final= mysqli_query($conection,$query);
           if($final){
            header('location:catview.php');
}   
else { 
    echo "<script>alert('error".mysqli_error($conection)."');</script>";
}
}}
 ?>