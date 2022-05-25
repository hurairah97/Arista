<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include '../config.php';
if(!$conection){
    echo "<script>alert('error in conection');</script>";
  } 
  $query2="select * from products join sub_category on products.sub_id=sub_category.sub_id join category on products.category_id=category.id";
  $final2= mysqli_query($conection,$query2);  
 
  $data = mysqli_fetch_all($final2);
  if (!isset($_SESSION['rating'])) {
    $_SESSION['rating'] = array();
    foreach ($data as $d) {
        echo "<script>console.log(".json_encode($d[0]).")</script>";
        $rating = rand(3,5);
        $_SESSION['rating'][$d[0]] = $rating;
      }        
  }
  if (isset($_POST['addToCart'])) {

    if(isset($_SESSION["u_id"])) {
    if (!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = array();
    } 
    $_SESSION['cart'][] = $_POST['p_id'];
  }  else{
    header('location:login.php?lastPage=pop');
}
} 

    include 'homehead.php' ;
 ?>
   	<!--Slider Here-->
       <?php if(!isset($_GET['search'])){
             if (!isset($_GET['pageno'])) {
           ?>
    <section class="dart-no-padding-tb">
    	<article class="content">

			<div id="rev_slider_28_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="parallax-zoom-slices" data-source="gallery" style="background:#000000;padding:0px;">
			<!-- START REVOLUTION SLIDER 5.4.1 fullscreen mode -->
				<div id="rev_slider_28_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.1">
					<ul>	<!-- SLIDE  -->
						<li data-index="rs-82" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="Power4.easeOut" data-easeout="Power4.easeOut" data-masterspeed="1000"  data-thumb="images/slide-1-100x50.jpg"  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="" data-slicey_shadow="0px 0px 50px 0px transparent">
							<!-- MAIN IMAGE -->
							<img src="images/new2.jpg"  alt=""  data-bgposition="center center" data-kenburns="on" data-duration="7000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="150" data-rotatestart="0" data-rotateend="0" data-blurstart="0" data-blurend="0" data-offsetstart="0 0" data-offsetend="0 0" class="rev-slidebg" data-no-retina>
							<!-- LAYERS -->
							<div class="tp-caption   tp-resizeme" 
								 id="slide-82-layer-2" 
								 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
								 data-y="['middle','middle','middle','middle']" data-voffset="['-48','-48','-48','-38']" 
								data-width="none"
								data-height="none"
								data-whitespace="nowrap"

								data-type="text" 
								data-responsive_offset="on" 

								data-frames='[{"delay":200,"speed":1000,"sfx_effect":"blockfromleft","sfxcolor":"#ffffff","frame":"0","from":"z:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
								data-textAlign="['inherit','inherit','inherit','inherit']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"

								style="z-index: 14; white-space: nowrap; font-size: 17px; line-height: 25px; font-weight: 600; color: #000; font-family:Poppins;text-transform:uppercase;">New</div>

							<!-- LAYER NR. 11 -->
							<div class="tp-caption   tp-resizeme" 
								 id="slide-82-layer-3" 
								 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
								 data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
								data-fontsize="['50','50','40','30']"
								data-lineheight="['60','60','50','40']"
								data-width="['none','none','480','360']"
								data-height="none"
								data-whitespace="['nowrap','nowrap','normal','normal']"

								data-type="text" 
								data-responsive_offset="on" 

								data-frames='[{"delay":400,"speed":1000,"sfx_effect":"blockfromleft","sfxcolor":"#ffffff","frame":"0","from":"z:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(0, 0, 0, 100);bc:rgb(0,0,0);bw:0 0 3px 0;"}]'
								data-textAlign="['inherit','inherit','center','center']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"

								style="z-index: 15; white-space: nowrap; font-size: 50px; line-height: 60px; font-weight: 600; color: #000; letter-spacing: px;font-family:Poppins;border-color:#000;border-style:solid;border-width:0px 0px 3px 0px;cursor:pointer;">Collection <?php echo date("Y");?> </div>

							<!-- LAYER NR. 12 -->
							<div class="tp-caption   tp-resizeme" 
								 id="slide-82-layer-4" 
								 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
								 data-y="['middle','middle','middle','middle']" data-voffset="['59','59','49','39']" 
								data-width="none"
								data-height="none"
								data-whitespace="nowrap"

								data-type="text" 
								data-responsive_offset="on" 

								data-frames='[{"delay":600,"speed":1000,"sfx_effect":"blockfromleft","sfxcolor":"#ffffff","frame":"0","from":"z:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
								data-textAlign="['inherit','inherit','inherit','inherit']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"

								style="z-index: 16; white-space: nowrap; font-size: 17px; line-height: 25px; font-weight: 400; color: #000; font-family:Poppins;">Passion of fashion </div>
						</li>
						<!-- SLIDE  -->
						<li data-index="rs-83" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="Power4.easeOut" data-easeout="Power4.easeOut" data-masterspeed="1000"  data-thumb="images/slide-2-100x50.jpg"  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="" data-slicey_shadow="0px 0px 50px 0px transparent">
							<!-- MAIN IMAGE -->
							<img src="images/slide-2.jpg"  alt=""  data-bgposition="center center" data-kenburns="on" data-duration="7000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="150" data-rotatestart="0" data-rotateend="0" data-blurstart="0" data-blurend="0" data-offsetstart="0 0" data-offsetend="0 0" class="rev-slidebg" data-no-retina>
							<!-- LAYERS -->


							<div class="tp-caption   tp-resizeme" 
								 id="slide-82-layer-2" 
								 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
								 data-y="['middle','middle','middle','middle']" data-voffset="['-48','-48','-48','-38']" 
								data-width="none"
								data-height="none"
								data-whitespace="nowrap"

								data-type="text" 
								data-responsive_offset="on" 

								data-frames='[{"delay":200,"speed":1000,"sfx_effect":"blockfromleft","sfxcolor":"#ffffff","frame":"0","from":"z:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
								data-textAlign="['inherit','inherit','inherit','inherit']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"

								style="z-index: 14; white-space: nowrap; font-size: 17px; line-height: 25px; font-weight: 600; color: rgba(0,0,0,100);font-family:Poppins;text-transform:uppercase;">Arista</div>

							<!-- LAYER NR. 11 -->
							<div class="tp-caption   tp-resizeme" 
								 id="slide-82-layer-3" 
								 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
								 data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
								data-fontsize="['50','50','40','30']"
								data-lineheight="['60','60','50','40']"
								data-width="['none','none','480','360']"
								data-height="none"
								data-whitespace="['nowrap','nowrap','normal','normal']"

								data-type="text" 
								data-responsive_offset="on" 

								data-frames='[{"delay":400,"speed":1000,"sfx_effect":"blockfromleft","sfxcolor":"#ffffff","frame":"0","from":"z:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(0, 0, 0, 100);bc:rgb(0,0,0);bw:0 0 3px 0;"}]'
								data-textAlign="['inherit','inherit','center','center']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"

								style="z-index: 15; white-space: nowrap; font-size: 50px; line-height: 60px; font-weight: 600; color: rgba(0,0,0,100); letter-spacing: px;font-family:Poppins;border-color:rgba(0, 0, 0, 100);border-style:solid;border-width:0px 0px 3px 0px;cursor:pointer;">Be Yourself Always </div>

							<!-- LAYER NR. 12 -->
							<div class="tp-caption   tp-resizeme" 
								 id="slide-82-layer-4" 
								 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
								 data-y="['middle','middle','middle','middle']" data-voffset="['59','59','49','39']" 
								data-width="none"
								data-height="none"
								data-whitespace="nowrap"

								data-type="text" 
								data-responsive_offset="on" 

								data-frames='[{"delay":600,"speed":1000,"sfx_effect":"blockfromleft","sfxcolor":"#ffffff","frame":"0","from":"z:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
								data-textAlign="['inherit','inherit','inherit','inherit']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"

								style="z-index: 16; white-space: nowrap; font-size: 17px; line-height: 25px; font-weight: 400; color: rgba(0,0,0,100); font-family:Poppins;">Check Out Our Last Minute Discounts</div>
						</li>
					</ul>
				</div>
			</div><!-- END REVOLUTION SLIDER -->
		</article>
    </section>
    <?php }} ?>
    <!-- Start featured product -->
    
    <section id="featured-product">
    	<div class="container" >
        <?php if(isset($_GET['search'])){ ?>
        	<div class="row" style="margin-top:30px;">
        <?php } else if (isset($_GET['pageno'])) { ?>
            <div class="row" style="margin-top:30px;">
        <?php } else{ ?>
            <div class="row" style="margin-top:-20px;">
                <?php } ?>
            	<div class="col-md-12">
                    <div class="dart-headingstyle-six text-center wow fadeInUp">  <!--Style 6-->
                        <h1 class="dart-heading dart-fw-300">Featured product</h1>
                        <p>Absolutely Stunning Design and Functionality</p>
                    </div>
                </div>
            </div>
        	<div class="row">
            	<div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="product-wrap dart-mb-30">
                    <div class="row">
         <?php 
            if(isset($_GET['search'])){
                $filtervalues = $_GET['search'];
                $query23="SELECT * FROM products join sub_category on products.sub_id=sub_category.sub_id join category on products.category_id=category.id  WHERE CONCAT(`p_name`) LIKE '%$filtervalues%' order by `p_id`"; 
                $query_run = mysqli_query($conection, $query23);
                if(mysqli_num_rows($query_run) > 0)
                {
                    foreach($query_run as $row)
                     {
                    //         while($row=mysqli_fetch_assoc($final2)){
         ?> 
        
                <div class="col-sm-3 col-md-3" style="text-align: center;">
                <div class="product-box wow fadeInUp" style="font-style: italic;" >
                    <div class="product-image" style="height: 270px;">
                        <a href="#"><img src="data:image/jpg;base64,<?php echo base64_encode($row['image']);?>" alt="Checked Short Dress" ></a>
                        <a href="#"><img src="data:image/jpg;base64,<?php echo base64_encode($row['image']);?>" alt="Checked Short Dress"></a>
                        <?php 
                        if (!($row['discount'])==0){?>
                        <div class="sale-flash offer">
                        <?php
                        echo $row['discount']; ?>% Off*
                        
                        </div>
                        <?php } ?>
                        <div class="product-overlay">

                        <form method="POST" id="addToCartForm">
                        <input type="hidden" name="p_id" value="<?php echo $row['p_id']?>">
                       
                        <button type="submit" name="addToCart"><i class="far fa-shopping-bag"></i><span> Add to Bag</span></button>
                     </form>
                        </div>
                    </div>
                    
                    <div class="product-descb" style="height: 190px;">
                        <div class="product-title" style="font-size: 18px;font-family: monospace;"><a href="#"><?php echo $row['p_name']; ?></a></div>
                        <div class="product-quantity" style="font-size: 16px;font-family: monospace;"><span><?php echo $row['names']; ?></span></div>
                        <div class="product-price">

                            <?php 
                        if (!($row['discount'])==0){?>
                            <ins style="font-size: 20px;">Rs:<?php echo (round((int)$row['price'] - (int)$row['price']*($row['discount']/ 100))) ?></ins>&nbsp;
                            <del style="font-size: 14px;">Rs:<?php echo $row['price']; ?></del>
                        <?php } else{ ?>
                        <ins style="font-size: 20px;">Rs:<?php echo $row['price'];?></ins>
                        
                        <?php } ?>
                    </div>
                    <div class="product-quantityfont-family: monospace;" > <b><?php echo $row['quantity']; ?></b>&nbsp;Left</div>
                    <div class="product-rating">
                        <?php for ($i=0; $i < $_SESSION['rating'][$row['p_id']]; $i++) echo "<i class='fa fa-star'></i>"; ?>
                            </div>
                    </div>
                </div>
                </div>
                <?php }}  else
                {
                    ?>
                        <tr>
                            <td colspan="4"><h2><center> No Record Found</center></h2></td>
                        </tr>
                    <?php
                }} 
            else{
                if (isset($_GET['pageno'])) {
                    $pageno = $_GET['pageno'];
                } else {
                    $pageno = 1;
                }
                $no_of_records_per_page = 8;
                $offset = ($pageno-1) * $no_of_records_per_page; 
                
                $total_pages_sql = "SELECT COUNT(*) FROM products";
                $result = mysqli_query($conection,$total_pages_sql);
                $total_rows = mysqli_fetch_array($result)[0];
                 $total_pages = ceil($total_rows / $no_of_records_per_page);

                 $sql = "SELECT * FROM  products join sub_category on products.sub_id=sub_category.sub_id join category on products.category_id=category.id LIMIT $offset, $no_of_records_per_page"; 
                // $query2="SELECT * FROM products join sub_category on products.sub_id=sub_category.sub_id join category on products.category_id=category.id";
               
                $final2= mysqli_query($conection,$sql); 
                while($row=mysqli_fetch_assoc($final2)){ ?>


                <div class="col-sm-3 col-md-3" style="text-align: center;">
            <div class="product-box wow fadeInUp" style="font-style: italic;" >
                <div class="product-image" style="height: 270px;">
                    <a href="#"><img src="data:image/jpg;base64,<?php echo base64_encode($row['image']);?>" alt="Checked Short Dress" ></a>
                    <a href="#"><img src="data:image/jpg;base64,<?php echo base64_encode($row['image']);?>" alt="Checked Short Dress"></a>
                    <?php 
                    if (!($row['discount'])==0){?>
                    <div class="sale-flash offer">
                    <?php
                    echo $row['discount']; ?>% Off*
                    
                    </div>
                    <?php } ?>
                <div class="product-overlay">
                    <form method="POST" id="addToCartForm">
                        <input type="hidden" name="p_id" value="<?php echo $row['p_id']?>">
                       
                        <button type="submit" name="addToCart"><i class="far fa-shopping-bag"></i><span> Add to Bag</span></button>
                     </form>
                    
                  <!-- <input class="btn btn-primary btn-sm bg-primary addToCart" type="button" name="addToCart" value="Add to cart"/> -->
                
                        <!-- <a href="#" class="add-to-cart"><i class="fa fa-shopping-bag"></i><span> Add to Bag</span></a>
                        <a href="test.php" class="item-quick-view">
                        <i class="fa fa-search-plus"></i><span> Quick View</span></a> -->
                </div>
                </div>
                
                <div class="product-descb" style="height: 190px;">
                    <div class="product-title" style="font-size: 18px;font-family: monospace;"><a href="#"><?php echo $row['p_name']; ?></a></div>
                    <div class="product-quantity" style="font-size: 16px;font-family: monospace;"><span><?php echo $row['names']; ?></span></div>
                    <div class="product-price">

                        <?php 
                    if (!($row['discount'])==0){?>
                        <ins style="font-size: 20px;">Rs:<?php echo (round((int)$row['price'] - (int)$row['price']*($row['discount']/ 100))) ?></ins>&nbsp;
                        <del style="font-size: 14px;">Rs:<?php echo $row['price']; ?></del>
                    <?php } else{ ?>
                    <ins style="font-size: 20px;">Rs:<?php echo $row['price'];?></ins>
                    
                    <?php } ?>
                </div>
                <div class="product-quantityfont-family: monospace;" > <b><?php echo $row['quantity']; ?></b>&nbsp;Left</div>
                <div class="product-rating">
                <?php for ($i=0; $i < $_SESSION['rating'][$row['p_id']]; $i++) echo "<i class='fa fa-star'></i>"; ?>
            </div>
                </div>
            </div>
            </div>
                <?php   } }  ?>                                   
</div>
                </div>
                <?php if(!isset($_GET['search'])){ ?>
                    <div class="pagination-wrap text-right" id="pagination">
                <ul>
                    <li><a  href="?pageno=1">First</a></li>
                    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
                    </li>
                    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
                    </li>
                    <li ><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
                </ul>
                </div>

                <?php } ?>
            </div><!-- Row end -->
            
                        <!-- Row End -->
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End featured product -->
    
    <!-- Start Winter Sale -->
    <section id="winter-sale" class="winter-sale wow zoomIn">
    	<div class="container" id="countdown">
        	<div class="row">
            	<div class="col-md-12">
                    <div class="dart-headingstyle-six text-center dart-mb-60">  <!--Style 6-->
                        <h1 class="dart-heading dart-fw-300">Eid Sale</h1>
                        <p>Absolutely Stunning Design and Functionality</p>
                    </div>
                </div>
            </div>
            <?php
 $now  = new DateTime();
 $ends = new DateTime('May 31, 2022, 11:59 pm'); 
 $left = $now->diff($ends);
?>
    	<div class="row">
            <div class="col-md-12 col-sm-12 col-sm-12">
                	<!-- Start Timer -->
                     <div class="dart-countdown">
                         
                        <div id="timer_2" data-animated="FadeIn">
                            <div id="days_2" class="timer_box timer_box_2 days"><h4><?php echo $left->format('%a'); ?></h4></div>
                            <div id="hours_2" class="timer_box timer_box_2 "><h4><?php echo $left->format('%h'); ?></h4></div>
                            <div id="minutes_2" class="timer_box timer_box_2"><h4><?php echo $left->format('%i'); ?></h4></div>
                            <div id="seconds_2" class="timer_box timer_box_2 seconds"><h4><?php echo $left->format('%s'); ?></h4></div>
                        </div>
                    </div>
                    <!-- End Timer -->
                </div>
            	<div class="col-md-12 col-sm-12 col-sm-12">
                	<!-- Start Timer -->
                     <div class="dart-countdown">
                         
                        <div id="timer_2" data-animated="FadeIn">
                            <div id="days_2" class="timer_box timer_box_2 days"><h3>Days</h3></div>
                            <div id="hours_2" class="timer_box timer_box_2 "><h3>Hours</h3></div>
                            <div id="minutes_2" class="timer_box timer_box_2"><h3>Mins</h3></div>
                            <div id="seconds_2" class="timer_box timer_box_2 seconds"><h3>Sec</h3></div>
                        </div>
                    </div>
                    <!-- End Timer -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Winter Sale -->
    
    <!-- start category -->
  
    <!-- End category -->
    
    <!-- Start Features -->
    <section class="features wow fadeInUp">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-4 col-sm-4 features-row">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-3">
                           <h2><i class="fa fa-truck"></i></h2>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                        	<h3>Free Delivery</h3>
                            <h5>On some products</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 features-row">
                	<div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <h2><i class="fa fa-repeat"></i></h2>
                    	</div>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                        	<h3>7 Days return</h3>
                            <h5>Your Trust is our achievement</h5>
                        </div>
                	</div>
                </div>
                <div class="col-md-4 col-sm-4 features-row">
               		<div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-3">
                           <h2><i class="fa fa-money"></i></h2>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                        	<h3>Money back</h3>
                            <h5>21 street west karachi</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Features -->
    
    <!-- Start Top Rated --->

     <!-- End Top Rated --->
   <?php include 'footer.php' ?>