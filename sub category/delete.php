<?php
include '../config.php';
if(isset($_GET['id'])){
        $ID=$_GET['id'];
        if($conection){
 $query="DELETE FROM `sub_category` WHERE sub_id='$ID'";
           $final= mysqli_query($conection,$query);
           if($final){
            header('location:subview.php');
}   
else { 
    echo "<script>alert('error".mysqli_error($conection)."');</script>";
}
}}
 ?>