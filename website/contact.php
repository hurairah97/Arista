<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include '../config.php';
if (isset($_SESSION['u_id'])) {
    $ID = $_SESSION['u_id'];
    if ($conection) {
        $query = "SELECT `name`,`email`,`phone` FROM `user` WHERE id='$ID'";
        $final = mysqli_query($conection, $query);
        if ($final) {
            $rows = mysqli_fetch_row($final);
        }
    }
    if (isset($_POST['btn2'])) {
      $user_id= $_SESSION['u_id'];
      $name=$_POST['name'];
      $email=$_POST['email'];
      $number=$_POST['number'];
      $meesage=$_POST['msg'];
      if ($conection) {
         $query2 = "INSERT INTO `contact`(`u_id`, `u_name`, `u_email`, `u_number`, `message`)
         VALUES ('$user_id','$name','$email','$number','$meesage')";
        $final2 = mysqli_query($conection, $query2);
        
        echo "<script>alert('Your Message was received successfully ');</script>";
    } else {
        echo "<script>alert('error in conection');</script>";
    }
  }
} 


  
include 'header.php'
 ?> 
    <!-- End Navigation -->
    
        
    <!--Page Title-->
    <div class="page_title_ct"> 
		<div class="container">  
    	</div>
    </div>
	<div class="page_title_ctn"> 
		<div class="container">
          <h2>Contact</h2>
          
          	<ol class="breadcrumb">
              <li><a href="index.php">Home</a></li>
              <li class="active"><span>Contact</span></li>
            </ol>
           
    	</div>
    </div>
    
    
    <!-- Contact Section -->
    
    <section class="contactus-one" id="contactus"><!-- Section id-->
        <div class="container">
            <div class="row">
            	<div class="col-md-6 col-sm-6">
                	<div class="map">
                    
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3618.1393054807604!2d67.03085831432143!3d24.927323848714966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33f90157042d3%3A0x93d609e8bec9a880!2sAptech%20Computer%20Education%20North%20Nazimabad%20Center!5e0!3m2!1sen!2s!4v1650704965014!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            	<div class=" col-md-5 col-sm-6">
                	<div class="contact-block">
                        <div class="dart-headingstyle-one dart-mb-20">  <!--Style 1-->
                        <h2 class="dart-heading">Contact Us</h2>
                      </div> 
                        
                        <div class="contact-form"><!-- contact form -->
                            <form action="" method="POST" >
                      <div class="row">
                      <?php  if(isset($_SESSION["u_id"])) { ?>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="name" id="InputName" placeholder="Your Name" required value="<?php echo $rows[0]; ?>" >
                              </div>
                              <div class="form-group col-md-6">
                              <input type="text" class="form-control" name="number" id="InputWeb" placeholder="Phone Number" required value="<?php echo $rows[2]; ?>" >
                              </div>
                              <div class="form-group col-md-12">
                              <input type="email" class="form-control" name="email" id="InputEmail" placeholder="Your Email" required value="<?php echo $rows[1]; ?>" >
                              </div>
                              <div class="form-group col-md-12">
                                <textarea class="form-control" name="msg" id="InputMessage" rows="4" placeholder="Message" required  ></textarea>
                              </div>
                              <div class="col-md-12">
                              <button name="btn2" class="btn normal-btn dart-btn-xs" type="submit" >Send MESSAGE</button>

                              </div>
                      
                      <?php } else { ?>
                              <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="name" id="InputName" placeholder="Name"  required >
                              </div>
                              <div class="form-group col-md-6">
                              <input type="number" class="form-control" name="number" id="InputWeb" placeholder="Phone Number" >
                              </div>
                              <div class="form-group col-md-12">
                              <input type="email" class="form-control" name="email" id="InputEmail" placeholder="Email" required  >
                              </div>
                              <div class="form-group col-md-12">
                                <textarea class="form-control" name="msg" id="InputMessage" rows="4" placeholder="Message" required  ></textarea>
                              </div>
                              <div class="col-md-12">
                             <h4><li><?php echo "<a href='login.php?lastPage=".$_SERVER['REQUEST_URI']."'>Log In first before sending a message.</a>"; ?></li></h4>

                              <!-- <button onclick="window.location.href='login.php'" type="submit" class="btn normal-btn dart-btn-xs">Before Sending a msg Login First</button> -->
                            </div>
                      <?php } ?></div>
                            </form>
                        </div>
                        </div>
                        
                        <hr>
                        
                        <div class=" row contact-info">
                        	<div class="col-md-12 col-sm-12">
                        		<p class="addre"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;&nbsp;SD-1, Block A North Nazimabad Town, Karachi</p>
                            </div>
                            <div class="col-md-12 col-sm-12">
                        		<p class="phone-call"><i class="fa fa-phone"></i>&nbsp;&nbsp;<a href="tel:+10484579845">+92 3178568846</a></p>
                            </div>
                            <div class="col-md-12 col-sm-12">
                        		<p class="mail-id"><i class="fa fa-envelope"></i>&nbsp;&nbsp;info.arista.co@gmail.com</p>
                            </div>
                        </div>
                        
					</div>
                </div>                
            </div>            
        </div>
    </section>

    <!-- Footer Style 1 --->
    <?php include 'footer.php' ?> 