<?php
include '../config.php';
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
if (isset($_SESSION['u_id'])) {
    $ID = $_SESSION['u_id'];
    if ($conection) {
        $query = "SELECT * FROM `user` WHERE id='$ID'";
        $final = mysqli_query($conection, $query);
        if ($final) {
            $rows = mysqli_fetch_row($final);
        }
    }
    if (isset($_POST['btn2'])) {
        $id = $_POST['H-id'];
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $address=$_POST['address'];
        $contact=$_POST['contact'];
        $dob=$_POST['dob'];
        if ($conection) {

            $query2 = "UPDATE `user` SET 
            `name`='$name',`email`='$email',`password`='$password',`address`='$address',`phone`='$contact',`d_o_b`='$dob' WHERE id='$id'";
            $final2 = mysqli_query($conection, $query2);
            if ($final2) {
                $_SESSION['u_name']=$name;
                header('location:index.php');
            } else {
                echo "<script>alert('ggh');</script>";
            }
        } else {
            echo "<script>alert('error in conection');</script>";
        }
    }
}

include 'header.php' 
?>

<body>
    
<div class="page_title_ct"> 
		<div class="container">  
    	</div>
    </div>
    <div class="contact-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="contact-form-right" id="login">
                    <h2><center>Update</center></h2>
                            <form method="POST" id="contactForm">
                            <div class="row" id="padd">

                        <input type="hidden" name="H-id" value="<?php echo $rows[0]; ?>">
                                
                            <div class="col-md-12">
                                    <div class="form-group">
                                    <label> Name </label>
                                        <input type="text" class="form-control" value="<?php echo $rows[1]; ?>" id="signtxt" name="name" placeholder="Name" required data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label> Email </label>
                                        <input type="text" placeholder="Email" value="<?php echo $rows[2]; ?>" id="signtxt" class="form-control" name="email" required data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label> Password </label>
                                        <input type="text" class="form-control" value="<?php echo $rows[3]; ?>" id="signtxt" name="password" placeholder="Password" required data-error="Please enter your Password">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div> <div class="col-md-12">
                                    <div class="form-group">
                                    <label> Address </label>
                                        <input type="text" class="form-control" value="<?php echo $rows[4]; ?>" id="signtxt" name="address" placeholder="Address" required data-error="Please enter your Address">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label> Contact </label>
                                        <input type="text" class="form-control" value="<?php echo $rows[5]; ?>" id="signtxt" name="contact" placeholder="Contact No" required data-error="Please enter your Phone">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div> <div class="col-md-12">
                                    <div class="form-group">
                                    <label> Date Of Birth </label>
                                        <input type="date" class="form-control" value="<?php echo $rows[6]; ?>" id="signtxt" name="dob" required data-error="Please enter your D_O_B">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="submit-button text-center">
                                        <button class="btn hvr-hover" id="btn" name="btn2" type="submit">Update</button>
                                        <div id="msgSubmit" class="h3 te xt-center hidden"></div>
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
    
</body>
<?php
include 'footer.php' ;?>