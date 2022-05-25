        
        <?php
include '../config.php';
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    
   
        $query="SELECT * FROM `user` where `email`='$email' && `password`='$password'";
       $final= mysqli_query($conection,$query);

       $row  = mysqli_fetch_array($final);
       if(is_array($row)) {
       $_SESSION["u_id"] = $row['id'];
       $_SESSION["u_name"] = $row['name'];
       } else {
        echo "<script>alert('Invalid Credential');</script>";
       }
   } 
   if(isset($_SESSION["u_id"])) {
    header('Location:'.$_GET['lastPage']);
    if($_GET['lastPage']=='pop'){
        header('Location:index.php');
       }
       if($_GET['lastPage']=='/master/cosmatics/signup.php'){
        header('Location:index.php');
       }
   }
    
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
                        <h2><center>LOGIN</center></h2>
                        <form method="POST" id="contactForm">
                            <div class="row" id="padd">
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Your Email" id="signtxt" class="form-control" name="email" required data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="signtxt" name="password" placeholder="Password" required data-error="Please enter your Subject">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="submit-button text-center">
                                        
                                        <button class="btn hvr-hover" id="btn" name="login" type="submit">Login</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <h4><li><a href="signup.php">Create Account</a></li>
                                </h4>
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