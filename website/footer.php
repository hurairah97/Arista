 
    <!-- Start Footer ---> 
    <footer class="footerOneWhite wow fadeInDown">
	    	<div class="footer-widget-section">
	            <div class="container">
	                <div class="row">
	                    <div class="col-md-6 col-sm-6 col-xs-12">
	                        <div class="footer-widget widget_text">
	                             <h4>About Arista</h4>
	                            <p><b>Arista's</b> mission is to elevate, enable, approve, and eventually assemble confidence in ladies around the country through astounding items that empower both inward and external beauty and otherworldly edification while additionally giving chances to self-improvement and budgetary reward.<br><br>
									<strong><i> Adore It. Offer It. Live It.</i></strong>
								</p>
								</div> 
	                    </div>
						<div class="col-md-3 col-sm-3 col-xs-6">
	                        <div class="footer-widget useful-links">
	                            <h4>Main Menu</h4>
	                            <ul class="list-unstyled">
	                                <li><a href="index.php"><i class="fa fa-angle-double-right"></i>Home</a></li>
	                                <li><a href="product.php"><i class="fa fa-angle-double-right"></i>Products</a></li>
	                                <li><a href="shop-single.php"><i class="fa fa-angle-double-right"></i>Shop</a></li>
	                                <li><a href="contact.php"><i class="fa fa-angle-double-right"></i>Contact</a></li>
									<li><a href="#"><i class="fa fa-angle-double-right"></i>FAQs</a></li>
								</ul>
	                        </div>
	                    </div> 
	                    <div class="col-md-3 col-sm-3  col-xs-6">
	                        <div class="footer-widget useful-links">
	                            <h4>My Account</h4>
	                            <ul class="list-unstyled">
	                                <li><a href="signup.php"><i class="fa fa-angle-double-right"></i>Create an Account</a></li>
	                                <li><a href="login.php?lastPage=pop"><i class="fa fa-angle-double-right"></i>LogIn to Account</a></li>
	                                <li><a href="#"><i class="fa fa-angle-double-right"></i>Forget Password</a></li>
								<?php if(isset($_SESSION["u_id"])) { ?>
									<li><a href="../user/delete.php?id=<?php echo $_SESSION["u_id"]; ?>"><i class="fa fa-angle-double-right"></i>Delete Account</a></li>
								<?php } else { ?>
									<li><a href="login.php?lastPage=pop"><i class="fa fa-angle-double-right"></i>Delete Account</a></li>
								<?php } ?>	
									<li><a href="contact.php"><i class="fa fa-angle-double-right"></i>Report Abuse</a></li>
	                            </ul>
	                        </div>
	                    </div>

	                </div>
	            </div>
	    	</div>
			

	        <div class="footer-bottom-section">
	        	<div class="container">
	            	<div class="row">
	                	<hr class="tail">
	                	<div class="col-md-12">
	                    	<div class="copyright">
	                        	<center><p>Copyright  <strong>&copy; <?php echo date("Y");?> Arista.com </strong>| <strong>Project of Webiz Media (Pvt) Ltd.</strong> All rights reserved.</p></center>
	                        </div>
	                        <div class="social">
	                        	<ul class="list-inline">
	                            	<li><a href="#"><i class="fa fa-facebook"></i></a></li>
	                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
	                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
	                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
	                            </ul>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </footer> 
    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    
    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    	
    <!-- Nav JavaScript -->
    <script src="js/divineartnav.js"></script>   
    
    <!-- prettyPhoto -->
    <script src="vendor/prettyPhoto/js/jquery.prettyPhoto.js"></script>
    

    <!-- REVOLUTION JS FILES -->
	<script type="text/javascript" src="vendor/revolution-slider/revolution/js/jquery.themepunch.tools.min.js"></script>
	<script type="text/javascript" src="vendor/revolution-slider/revolution/js/jquery.themepunch.revolution.min.js"></script>

	<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->	
	<script type="text/javascript" src="vendor/revolution-slider/revolution/js/extensions/revolution.extension.actions.min.js"></script>
	<script type="text/javascript" src="vendor/revolution-slider/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
	<script type="text/javascript" src="vendor/revolution-slider/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
	<script type="text/javascript" src="vendor/revolution-slider/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
	<script type="text/javascript" src="vendor/revolution-slider/revolution/js/extensions/revolution.extension.migration.min.js"></script>
	<script type="text/javascript" src="vendor/revolution-slider/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
	<script type="text/javascript" src="vendor/revolution-slider/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
	<script type="text/javascript" src="vendor/revolution-slider/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
	<script type="text/javascript" src="vendor/revolution-slider/revolution/js/extensions/revolution.extension.video.min.js"></script>
		
	<!-- SLICEY ADD-ON FILES -->
	<script type="text/javascript" src="vendor/revolution-slider/revolution-addons/slicey/js/revolution.addon.slicey.min.js?ver=1.0.0"></script>
    
    <!-- custom JavaScript -->
    <script src="js/custom.js"></script>
    
    <!-- template JavaScript -->
    <script src="js/template-demo.js"></script>
    
    <!-- Countdown JavaScript -->
    <!-- <script src="js/countdown.js"></script> -->

  </body>
</html>