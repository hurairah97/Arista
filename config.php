<?php
        $conection=mysqli_connect('localhost','root','','weby');
        if(!$conection){
        
            echo "<script>alert('not insert in DB');</script>";
           }
           ?>