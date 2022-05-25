<?php
 session_start(); 
include '../config.php';

if(isset($_POST['signin'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $address=$_POST['address'];
    $contact=$_POST['contact'];
    $dob=$_POST['dob'];
    
   
        $query="INSERT INTO `user`(`name`, `email`, `password`,`address`, `phone`, `d_o_b`) VALUES ('$name','$email','$password','$address','$contact','$dob')";
       $final= mysqli_query($conection,$query);
       if($final){
        $_SESSION['user_name']=$name;
        $_SESSION['user_email']=$email;
        header('location:email/mail.php');
       } 
       else{
        echo "<script>alert('Invalid Credential');</script>";
       }}
       include 'header.php';
?>  
<div class="page_title_ct"> 
		<div class="container">  
    	</div>
    </div>
    <div class="contact-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="contact-form-right" id="login">
                    <h2><center>Create Account</center></h2>
                            <form method="POST" id="contactForm">
                            <div class="row" id="padd">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="signtxt" name="name" placeholder="Name" required data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" placeholder="Email" id="signtxt" class="form-control" name="email" required data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="signtxt" name="password" placeholder="Password" required data-error="Please enter your Password">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div> <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="signtxt" name="address" placeholder="Address" required data-error="Please enter your Address">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="signtxt" name="contact" placeholder="Contact No" required data-error="Please enter your Phone">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div> <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="date" class="form-control" id="signtxt" name="dob" required data-error="Please enter your D_O_B">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="submit-button text-center">
                                        <button class="btn hvr-hover" id="btn" name="signin" type="submit" data-toggle="modal" data-target="#myModal">Sign In</button>


                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php
include 'footer.php';
?>