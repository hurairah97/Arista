<?php
include '../config.php';
if(isset($_GET['id'])){
        $ID=$_GET['id'];
        if($conection){
 $query="DELETE FROM `products` WHERE p_id='$ID'";
           $final= mysqli_query($conection,$query);
           if($final){
            header('location:prdview.php');
}   
else { 
    echo "<script>alert('error".mysqli_error($conection)."');</script>";
}
}}
 ?>