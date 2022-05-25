<?php include 'header.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "../config.php";

// CART ITEMS FETCH
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
$idss = join(",", $_SESSION['cart']);

$query = "SELECT * FROM `products` JOIN sub_category on products.sub_id=sub_category.sub_id join category on products.category_id=category.id WHERE `p_id` IN (".$idss.")";
if (count($_SESSION['cart']) > 0) {
    $products_result = mysqli_query($conection, $query);
    if (!$products_result) {
        echo "<script>alert('Error: ".mysqli_error($conection)."')</script>";
    } 
}
$cartWorth = 0; $delivery = 0; $gst = 0; $total = 0;   

//detail form submission
if (isset($_SESSION['u_id'])) {
    $ID = $_SESSION['u_id'];
    if ($conection) {
        $query = "SELECT `name`, `email`, `address`, `phone`, `d_o_b` FROM `user` WHERE id='$ID'";
        $final = mysqli_query($conection, $query);
        if ($final) {
            $rows = mysqli_fetch_row($final);
        }
    }}

// PURCHASE REQUEST

if (isset($_POST['confirm'])) {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $address=$_POST['address'];
    $contact=$_POST['contact'];
    $phone=$_POST['phone'];
    $dob=$_POST['dob'];
    $remark=$_POST['remark'];
    
    $_SESSION['user_name']=$name;
    $_SESSION['user_email']=$email;
    $final2 = mysqli_query($conection,
        "INSERT INTO `customer_detail`(`name`, `address`, `email`, `work_phone_no`, `cell_no`, `date_of_birth`, `remark`) 
        VALUES('$name','$address','$email','$phone','$contact','$dob','$remark')"
    );
        if ($final2) {
            $u_id =  $_SESSION['u_id'];
            $total = $_POST['total'] ;
            $_SESSION['bill']=$total;
            $orderResult = mysqli_query($conection, 
                "INSERT INTO `orders`(`o_date`, `user_id`, `o_total`) 
                 VALUES (NOW(),'$u_id','$total')"
            );
            if ($orderResult) {
                $o_id = mysqli_insert_id($conection);
                foreach (array_unique($_SESSION['cart']) as $p_id) {
                    $i_qty = count(array_keys($_SESSION['cart'], $p_id));
                    $invoiceResult = mysqli_query($conection, 
                        "INSERT INTO `invoice`(`order_id`, `product_id`, `product_quantity`) 
                         VALUES ('$o_id','$p_id','$i_qty')"
                    );

        } 
			if (!$invoiceResult) {
				echo "<script>alert('Error: ".mysqli_error($conection)."')</script>";
			} else {
                echo "<script>window.location.href='email/mailorder.php';</script>";
			}
		}else{
            echo "<script>alert('Error: ".mysqli_error($conection)."')</script>";
        }
		$_SESSION['cart'] = [];
	} else {
		echo "<script>alert('Error: ".mysqli_error($conection)."')</script>";
	}
}

?> 
    <!-- End Navigation -->
    
        
    <!--Page Title-->
    <div class="page_title_ct"> 
		<div class="container">  
    	</div>
    </div>
	<div class="page_title_ctn"> 
		<div class="container">
          <h2>Cart</h2>
          
          	<ol class="breadcrumb">
              <li><a href="index.php">Home</a></li>
              <li class="active"><span>Cart</span></li>
            </ol>
           
    	</div>
    </div>
    
    <!--Shoping Cart-->
    <section>
  
    	<div class="container">
        	<div class="row">

            <div class="col-md-12" id="emptymargin">
                <h4><a id="btnEmpty" href="email/cartqty.php?change=empty">Empty Cart</a></h4>
            </div>
            <div class="col-md-12">
   				<div class="table-responsive">
                   <table class="table cart">
                   <?php if (count($_SESSION['cart']) > 0) {
                               
                               ?>
                        <thead>
                            <tr>
                                <th class="cart-product-thumbnail">Image</th>
                                <th class="cart-product-name">Name</th>
                                <th class="cart-product-price">Price</th>
                                <th class="cart-product-quantity">Quantity</th>
                                <th class="cart-product-subtotal">Total</th>
                                <th class="cart-product-remove">Remove</th>
                            </tr>
                        </thead>
             <?php 
                   }
                 if (isset($products_result) && $_SESSION['cart']) {
                foreach (mysqli_fetch_all($products_result) as $row) {
                $cartWorth += count(array_keys($_SESSION['cart'], $row[0]))*$row[4]; // Multiply item price and item qty
                $delivery = $cartWorth/20;
                $gst = $cartWorth/12;
                $total = $cartWorth + $delivery + $gst;
           ?>
                 
                        <tbody>
                         
                            <tr class="cart_item">
    
                                <td class="cart-product-thumbnail">
                                    <a href="#"><img src="data:image/jpg;base64,<?php echo base64_encode($row[6]);?>"width="90" height="100" alt="Pink Printed Dress"></a>
                                </td>
    
                                <td class="cart-product-name">
                                <span class="amount"><?php echo $row[1] ?></span>
                                </td>
    
                                <td class="cart-product-price">
                                    <span class="amount">Rs: <?php echo $row[4] ?></span>
                                </td>
    
                                <td class="quantity" >
                                    <div class="quantity buttons-add-minus">
                                <a href="email/cartqty.php?change=dec&itemId=<?php echo $row[0]?>" class="qty-minus"><b><i class="far fa-minus"></i> </b></a>
                                <a  class="border"><?php echo count(array_keys($_SESSION['cart'], $row[0])) ?></a>
                                <a href="email/cartqty.php?change=inc&itemId=<?php echo $row[0]?>" class="qty-plus"><b><i class="far fa-plus"></i></b></a>
                                    </div>
                                </td>
    
                                <td class="cart-product-subtotal">
                                    <span class="amount">Rs: <?php echo count(array_keys($_SESSION['cart'], $row[0])) * $row[4]  ?></span>
                                </td>
                                
                                <td class="cart-product-remove" style="text-align: center;">
                                <!-- <a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a> -->
                                <a class="remove" title="Remove this item" href="email/cartqty.php?change=del&itemId=<?php echo $row[0]?>"><i class="fa fa-remove"></i></a>
                                </td>
                                
                            </tr>
                        </tbody>
                        <?php
                }
            } else {
               ?>
               <div style="text-align: center; padding-bottom:15px"><i><h3>Your cart is empty!</h3></i></div>
        <?php } ?>
                    </table>

                </div>    
    		</div>
         </div>
    <div class="row clearfix">
    <?php if (count($_SESSION['cart']) > 0) {
                        
            ?>
        <div class="col-md-12 clearfix">
            <div class="table-responsive totle-cart">
                
                <form method="POST">
                <table class="table cart">
                    <tbody>
                        <tr class="cart_item cart_totle">
                            <td class="cart-product-name">
                                <strong>Net Total</strong>
                            </td>

                            <td class="cart-product-name">
                                <span class="amount">Rs: <?php echo $cartWorth ?></span>
                            </td>
                        </tr>
                        <tr class="cart_item cart_totle">
                            <td class="cart-product-name">
                                <strong>Shipping</strong>
                            </td>

                            <td class="cart-product-name">
                                <span class="amount" >Rs: <?php echo (round($delivery)) ?></span>
                            </td>
                        </tr>
                        <tr class="cart_item cart_totle">
                            <td class="cart-product-name">
                                <strong>Sales Tax</strong>
                            </td>

                            <td class="cart-product-name">
                                <span class="amount" >Rs: <?php echo (round($gst, 2)) ?></span>
                            </td>
                        </tr>
                        <tr class="cart_item cart_totle">
                            <td class="cart-product-name">
                                <strong>Grand Total</strong>
                            </td>

                            <td class="cart-product-name">
                                
                                <span class="blue"><strong ></strong>Rs: <?php echo (round($total)) ?></span>
                            </td>
                        </tr>
                    </tbody>

                </table>
                </form>
<!-- working for detail form insertion -->
        <!-- Modal -->

<div class="cart_item coupon-check">
<form id="edd_purchase_form" class="edd_form" action="#" method="POST">
<div class="row clearfix">
        <div class="col-md-12 col-sm-12 col-xs-12 text-right">
        
        <div class="col-md-12 col-sm-12 col-xs-12">
            <input type="hidden" name="total" value="<?php echo (round($total)) ?>">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Checkout</button>
    
    <div id="myModal" class="modal fade text-left" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <span class="title-text-gradient" id="msgforcheckout" style="color: #ee2b63;"> We're glad you're shopping on our website. Your total bill is:<b> <?php echo (round($total)) ?> Pkr </b>which will be charged at the time of delivery. Please complete this detailed form to continue the procedure.  </span>
        </div>
        <div class="modal-body">
        <div class="contact-box-main" style="margin-top:-30px;margin-bottom:-20px;">

            
                <div class="col-lg-12 col-sm-12">
        <div class="contact-form" id="checkout">
                
                <div class="row" id="padd">

                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" id="signtxt" name="name" value="<?php echo $rows[0]; ?>" placeholder="Name" required data-error="Please enter your name">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="email" placeholder="Email" id="signtxt" class="form-control" name="email" value="<?php echo $rows[1]; ?>" required data-error="Please enter your email">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" id="signtxt" name="address" value="<?php echo $rows[2]; ?>" placeholder="Address" required data-error="Please enter your Address">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" id="signtxt" name="contact" value="<?php echo $rows[3]; ?>" placeholder="Cell No" required data-error="Please enter your Cell-number">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div> 
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" id="signtxt" name="phone" placeholder="Phone No" required data-error="Please enter your Phone-number">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="date" class="form-control" id="signtxt" name="dob" value="<?php echo $rows[4]; ?>" required data-error="Please enter your D_O_B">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                         <div class="form-group">
                            <textarea class="form-control" name="remark" id="signtxt" rows="4" placeholder="Remarks(optional)" ></textarea>
                         </div>
                    </div>

                </div>
                    
                
            </div>
            </div>
        </div>
        </div>
        <div class="modal-footer">
        
        <input type="submit" name='confirm' class="btn btn-primary" value="Pay"/>
    <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Later"/>
        </div>
        </div>

    </div>
    </div>
</div>
</div>
    </div>
</form>

</div>

    </div>
    
</div>
<?php } ?>
    </div>
</div>    	
    </section>
    <script>
      $(document).ready(function() {
        //  <==== Calculates Net Total ====>
        let delivery = cartWorth/20; // Default delivery is set "Standard"
        let gst = cartWorth/12.24;
        let cartWorth = parseInt(<?php echo $cartWorth?>);
        let netTotal =  cartWorth + delivery + gst;
        $('#delivery').text("Rs. ".concat(delivery));
        $('#gst').text("Rs. ".concat(gst));
        $('#net-total').text("Rs. ".concat(netTotal));
        $('#net-total-modal').text(netTotal);

        // Update Net Total on changing delivery type
  })
  </script>
    
    <!-- Footer Style 1 --->
    <?php include 'footer.php' ?> 