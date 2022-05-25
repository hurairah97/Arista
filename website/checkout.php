<?php 
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  include "../config.php";
  if (isset($_SESSION['u_id'])) {
    $u_id = $_SESSION['u_id'];
    $order_result = mysqli_query($conection, 
    "SELECT * FROM orders
    join `user` on orders.user_id=user.id 
    where user.id = '$u_id'"
  );
  if (!$order_result) echo "<scrip>alert('".mysqli_error($conection)."')</script>";
  } 
  

  // Calculate Time Elasped
  function humanTiming ($time)
    {
        $time = time() - $time; // to get the time since that moment 
        $time = ($time<1)? 1 : $time;
        $tokens = array (
            31536000 => 'year',
            2592000 => 'month',
            604800 => 'week',
            86400 => 'day',
            3600 => 'hour',
            60 => 'minute',
            1 => 'second'
        );

        foreach ($tokens as $unit => $text) {
            if ($time < $unit) continue;
            $numberOfUnits = floor($time / $unit);
            return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
        }
    }
    include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="css/orders.css" >
</head>
<body>
<div class="page_title_ct"> 
		<div class="container">  
    	</div>
    </div>
	<div class="page_title_ctn"> 
		<div class="container">
          <h2>Orders Details</h2>
          
          	<ol class="breadcrumb">
              <li><a href="index.php">Home</a></li>
              <li class="active"><span>Orders Details</span></li>
            </ol>
           
    	</div>
    </div>

    <?php if(isset($_SESSION['u_id'])) {
     if(mysqli_num_rows($order_result) == 0) {?>
    <div class="page"><h2>You haven't placed an order yet.</h2></div>
    <?php } }else{?>
    <div class="page"><h2><?php echo "<a href='login.php?lastPage=".$_SERVER['REQUEST_URI']."'>Please logIn to view this page.</a>"; ?></h2></div>
    <?php } ?>


    <div class="row d-flex justify-content-center mt-100 mb-100">
        <div class="text-center col-lg-6">
            <h1 class="card-title m-b-0 title-text-gradient"></h1>
            <ul class="list-style-none">
                <?php
                if (isset($order_result)) {
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($order_result)) {
                ?>
                    <div class="col-sm-4 col-md-4" style="margin-top:50px;margin-bottom:70px;"> 
                        <div class="ml-10">
                            <div class="mr-auto d-inline">
                                <span class="order-serial-no text-muted"></span> 
                            </div>
                            <h3 class="mb-0 text-muted">Order: <?php echo ++$i ?></h3>
                            <?php $invoice_result = mysqli_query($conection, "SELECT * FROM invoice where id = '".$row['o_id']."'");
                            if (!$invoice_result) echo "<scrip>alert('".mysqli_error($conection)."')</script>"; ?>
                        </div>
                        <div class="">
                            <h6 class="text-center d-inline"><?php echo humanTiming(strtotime($row['o_date'])) ?> ago</h6>
                            <div class="ml-auto">
                                <button class="btn btn-primary" type="button"  data-toggle="modal" data-target="<?php echo "#modal".$i?>">
                                    Details
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="<?php echo "modal".$i?>" tabindex="-1" aria-labelledby="<?php echo "#modal".$i?>" aria-hidden="true">
                    <div class="modal-dialog my-modal" id="modalwidth">
                        <div class="modal-content border-0 rounded-0">
                        <div class="modal-header">
                            <h3 class="modal-title text-main" id="<?php echo "modal".$i?>" style="color: #ee2b63;">Detail</h3>
                           
                        </div>
                        <div class="modal-body">
                            <div class="info">
                                <div class="row">

                                <div class="pull-left"> <span id="heading" style="color: #ee2b63;">Order No</span><br> <span id="details"><?php echo $row['o_id']?> </span> </div>
                                            
                                <div class="pull-right"> <span id="heading" style="color: #ee2b63;">Date</span><br> <span id="details"><?php echo $row['o_date'] ?></span> </div>
                               
                                 
                                </div>
                            </div>
                            
                            <div class="pricing">
                            ---------------------------------------------------------------------------------------------
                                <?php 
                                   $invoice_result = mysqli_query($conection, 
                                   "SELECT `invoice`.`id`, `products`.`p_name`, `products`.`price`, `invoice`.`product_quantity`
                                   FROM `products` 
                                   JOIN `invoice` on `products`.`p_id` = `invoice`.`product_id`
                                   WHERE `invoice`.order_id = ".$row['o_id']
                                   );
                                    if (!$invoice_result) echo "<scrip>alert('".mysqli_error($conection)."')</script>"; 
                                    else {
                                        while ($row1 = mysqli_fetch_assoc($invoice_result)) {
                                        echo "<script>console.log('".json_encode($row1)."')</script>" 
                                ?>
                                    <div class="row">
                                        <div class="col-6 text-start"> 
                                            <span id="product-name">Name:&nbsp;<?php echo $row1['p_name'] ?></span> 
                                        </div>
                                        <div class="col-3"> 
                                            <span id="qty">Qunatity:&nbsp;<?php echo $row1['product_quantity'] ?></span> 
                                        </div>
                                        <div class="col-3"> 
                                            <span id="price" >Price:&nbsp;<?php echo $row1['price'] ?> Pkr</span>
                                        </div>
                                    </div>---------------------------------------------------------------------------------------------
                                <?php  
                                        }
                                    }
                                ?>
                                
                                
                            </div>
                        <div class="total">
                            <div class="row">
                                <div class="col-3" style="color: #ee2b63;"><big>Total Bill: &nbsp;<?php echo $row['o_total'] ?> Pkr</big><span><h6> ( Incl Shipping and GST )</h6></span></div>
                            </div>
                        </div>
               
                 
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           
                        </div>
                        </div>
                    </div>
                    </div>
                <?php 
                    }
                } 
                ?>
            </ul>
        </div>
    </div>
<script>
// to get current year
function getYear() {
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    document.querySelector("#displayYear").innerHTML = currentYear;
}

getYear();

/** google_map js **/
function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(40.712775, -74.005973),
        zoom: 18,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
}


</script>
    <!-- Button trigger modal -->
    <?php
include 'footer.php';
?>
