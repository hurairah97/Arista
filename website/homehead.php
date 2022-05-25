<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="#"> 
        
        <title>Arista</title>
        
        <!-- Bootstrap core CSS -->
        
        <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
           
        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="js/ie-emulation-modes-warning.js"></script>
        
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <!-- Custom Fonts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link href="vendor/themify-icons/themify-icons.css" rel="stylesheet" type="text/css">           
        <!-- PrettyPhoto CSS -->
    	<link href="vendor/prettyPhoto/css/prettyPhoto.css" rel="stylesheet">         

		<!-- Revolution Slider -->
		<link rel="stylesheet" href="vendor/revolution-slider/revolution/css/settings.css">
		
        <!-- template CSS -->
        <link href="css/style.css" rel="stylesheet">
        
        
        <!-- Custom CSS -->
        <link href="css/custom.css" rel="stylesheet">
	  
	    <!-- Animation -->
		<link rel="stylesheet" href="css/animate.css">
        <link rel="shortcut icon" href="images/logonav.png" />
	 	<script src="js/wow.js"></script>
	  	<script>
			new WOW().init();
	  	</script>
    </head>

<body >
<?php  if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    include '../config.php';
    
if(!$conection){
    echo "<script>alert('error in conection');</script>";
  } 
  $query="select * from user";
  $final= mysqli_query($conection,$query);  

// Cart work
  if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
  }
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

$cartWorth = 0;       
 ?>

<div class="se-pre-con"></div>
 
 <!-- Start Navigation --> 
    <nav class="navbar navbar-default navbar-fixed navbar-transparent dark divinnav">
       <!-- <button type="submit" name="search"> -->
        <!-- Start Top Search -->
        <div class="top-search">
            <div class="container">
            <form action="" class="example" method="GET">
                    <div class="input-group" >
                        <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search">
                        <span class="input-group-addon"><button type="submit"><i class="fa fa-search"></i></button></span>
                     </div>
                </form>
            </div>
            <!-- <button type="submit"></button> -->
        </div>
        <!-- End Top Search -->

        <div class="container">            
            <!-- Start Atribute Navigation -->
            <div class="attr-nav">
            <ul>
                    <li class="dropdown">
                        <a href="cart.php" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="far fa-shopping-bag"></i>
                            <?php  if (isset($_SESSION['u_id'])) { ?>
                            <span class="badge"><?php echo count(array_unique($_SESSION['cart'])) ?></span>
                            <!-- <span class="badge">3</span> --><?php } ?>
                        </a>
                        
                        <ul class="dropdown-menu cart-list">
                <?php 
                 if (isset($products_result) && $_SESSION['cart']) {
                foreach (mysqli_fetch_all($products_result) as $row) {
                $cartWorth += count(array_keys($_SESSION['cart'], $row[0]))*$row[4]; // Multiply item price and item qty
                ?>
                            <li>
                                <a class="photo"><img src="data:image/jpg;base64,<?php echo base64_encode($row[6]);?>"width="20" height="25" alt="Pink Printed Dress"></a>
                                <h6><a href="#"><?php echo $row[1] ?> </a></h6>
                                <p><?php echo count(array_keys($_SESSION['cart'], $row[0])) ?>x - <span class="price">Rs: <?php echo $row[4] ?></span></p>
                            </li>
                <?php  }} 
                else {
                ?>
                <div style="text-align: center; padding:15px"><i><h4>Your cart is empty!</h4></i></div>
                <?php }
                    ?>
                 
                            <li class="total">
                                <span class="pull-right"><strong>Total: <?php echo $cartWorth ?></strong> rs</span>
                                <a href="cart.php" class="btn btn-default btn-cart">Cart</a>
                            </li>
                        </ul>
                    </li>
                    <li class="search"><a href="#"><i class="far fa-search"></i></a></li>
                    <li class="side-menu"><a href="#"><i class="far fa-bars"></i></a></li>
                </ul>
            </div>
            <!-- End Atribute Navigation -->

            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.php">
                <img src="images/Aristalogo1.png" srcset="images/Aristalogo1.png" class="logo logo-display" alt="">
                <img src="images/Aristalogo.png" srcset="images/Aristalogo.png" class="logo logo-scrolled" alt="">

                </a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
    
                   
                <li class="active"><a href="index.php">Home</a></li>

                <li class="dropdown" id='nav-link-0'>
                        <a data-toggle="dropdown">Products <i class="fa fa-caret-down"></i></a>
                            <ul class="dropdown-menu">
                                
                            <li><a href="jewellery.php">Jewellery</a></li>
                            <li><a href="cosmetics.php">Cosmetics</a></li>                            
                            <li><a href="makeup.php">Make Up</a></li>
                            </ul>
                        </li>
    			

                        <li class="dropdown" id='nav-link-1'>
                        <a data-toggle="dropdown">Shop <i class="fa fa-caret-down"></i></a>
                            <ul class="dropdown-menu">
                            
                                <li><a href="cart.php">Shopping Cart</a></li>
    							<li><a href="checkout.php">Orders Details</a></li>
                            </ul>
                        </li>
                        <?php
                 if(isset($_SESSION["u_id"])) {
				?>
                    <li class="new" id='nav-link-2'><a href="contact.php?id=<?php echo $_SESSION["u_id"] ?>">Contact</a></li>;
                <?php } else { ?>
                    <li class="new" id='nav-link-2'><a href="contact.php">Contact</a></li>
                <?php
                 }
                 if(isset($_SESSION["u_id"])) {
				?>
                <li class="dropdown" id='nav-link-3'>
                <a data-toggle="dropdown" ><?php echo $_SESSION["u_name"];?> <i class="fa fa-caret-down"></i></a>
                     <ul class="dropdown-menu">

                        <li><a href="update.php">Profile</a></li>
                        <li><a href="logout.php">Log Out</a></li>

                    </ul>
                </li>
               	<?php
				}else{
				?>
                    <li><?php echo "<a href='login.php?lastPage=".$_SERVER['REQUEST_URI']."'>Log in</a>"; ?></li>
                    <?php } ?>
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>   

        <!-- Start Side Menu -->
        <div class="side">
            <a href="#" class="close-side"><i class="ti-close"></i></a>
            <div class="widget">
				<div class="clearfix">
					<a class="side-logo title" href="#"><img src="images/logo-2.png" alt="logo"></a>
				</div>
                <?php if(!isset($_SESSION['u_id'])) {?>
				<div class="side-in-content">
					<ul class="link">
						<li><a href="signup.php">Create An Account</a></li>
						<li><a href="login.php?lastPage=pop">LogIn to Account</a></li>
						<li><a href="jewellery.php">View Products</a></li>
					</ul>
					<p class="white">Made With Love By Arista</p>
				</div>
                <?php } else { ?>
                    <div class="side-in-content">
					<ul class="link">
						<li><a href="update.php">My Account</a></li>
						<li><a href="checkout.php">My orders</a></li>
						<li><a href="cart.php">My basket</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="logout.php">Log Out</a></li>
					</ul>
					<p class="white">Made With Love By Arista</p>
				</div>
                <?php }  ?>
            </div>
        </div>
        <!-- End Side Menu -->
    </nav>
    <!-- End Nav bar -->
  	