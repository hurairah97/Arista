<?php
    include '../config.php';
        if(!$conection){
            echo "<script>alert('error in conection');</script>";
        } 
        $query2="select * from products join sub_category on products.sub_id=sub_category.sub_id join category on products.category_id=category.id";
        $final2= mysqli_query($conection,$query2);  

        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 9;
        $offset = ($pageno-1) * $no_of_records_per_page; 
        
        $total_pages_sql = "SELECT COUNT(*) FROM products";
        $result = mysqli_query($conection,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
         $total_pages = ceil($total_rows / $no_of_records_per_page);

                    // Cart work

    include 'header.php'
?>  <!--Page Title-->
    

    <!--Shoping with Sidebar Section-->
    <div class="page_title_ct"> 
		<div class="container">  
    	</div>
    </div>
	<div class="page_title_ctn"> 
		<div class="container">
          <h2>Make up</h2>
          
          	<ol class="breadcrumb">
              <li><a href="index.php">Home</a></li>
              <li class="active"><span>Make up</span></li>
            </ol>
           
    	</div>
    </div>
    <section id="featured-product">
    	<div class="container">
        	<div class="row">
            	<div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="product-wrap dart-mb-30">
                    <div class="row">  
                    <div class="col-sm-6 col-xs-6">
                            <form action="" method="GET">
                              <div class="input-group" >
                              
                                    
                                    <input type="number" id="input" name="start_price" placeholder="Min Price" class="form-control" value="<?php if(isset($_GET['start_price'])){echo $_GET['start_price']; } ?>" class="form-control">
                                    <input type="number" id="input" name="end_price" placeholder="Max Price" class="form-control" value="<?php if(isset($_GET['end_price'])){echo $_GET['end_price']; } ?>" class="form-control">
                                    <button type="submit" id="button" class="btn btn-primary">Filter</button>
                              
                                </div>
                            </form>
                        
                            </div>   
                            <?php 
                 if(!isset($_GET['search'])){
                if(!isset($_GET['start_price']) && !isset($_GET['end_price'])){

                ?>                 
                            <div class="col-sm-6 col-xs-6 text-right">
                        <?php
                           $databaseHost = 'localhost';   //your db host 
                           $databaseName = 'weby';  //your db name 
                           $databaseUsername = 'root';    //your db username 
                           $databasePassword = '';//   db password 
                            $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
                            $sql = "SELECT * FROM products join sub_category on products.sub_id=sub_category.sub_id join category on products.category_id=category.id WHERE name='Make up'";
                            $mysqliStatus = $mysqli->query($sql);
                            $rows_count_value = mysqli_num_rows($mysqliStatus);
                            $mysqli->close();

                        ?>
                                 <span class="showing-result">Showing 1–9 of <?php echo $rows_count_value ?> products</span>
                            </div>
                           <?php }} ?>
                            
                        </div>
                    </div>
    <div class="row"> 
        
            <div class="product-wrap">
                <div class="row" id="imgwidth">
                            
                            <?php 
            if(isset($_GET['search'])){
                $filtervalues = $_GET['search'];
                $query23="SELECT * FROM products join sub_category on products.sub_id=sub_category.sub_id join category on products.category_id=category.id WHERE name='Make up' AND CONCAT(`p_name`) LIKE '%$filtervalues%'"; 
              
                $query_run = mysqli_query($conection, $query23);
                if(mysqli_num_rows($query_run) > 0)
                {
                    foreach($query_run as $row)
                     {
                    //         while($row=mysqli_fetch_assoc($final2)){
                             ?> 
        
                <div class="col-sm-4 col-md-4" style="text-align: center;">
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
                            <td colspan="4"><center><h3>No Record Found</h3></center></td>
                        </tr>
                    <?php
                }} 
            else{

                 if(isset($_GET['start_price']) && isset($_GET['end_price']))
                 {
                     $startprice = $_GET['start_price'];
                     $endprice = $_GET['end_price'];

                     $query = "SELECT * FROM products join sub_category on products.sub_id=sub_category.sub_id join category on products.category_id=category.id  WHERE name='Make up' AND price BETWEEN $startprice AND $endprice";
                 }
                 else
                 {
                     $query = "SELECT * FROM  products join sub_category on products.sub_id=sub_category.sub_id join category on products.category_id=category.id WHERE name='Make up' LIMIT $offset, $no_of_records_per_page"; 
                 }
                 
                 $query_run = mysqli_query($conection, $query);

                 if(mysqli_num_rows($query_run) > 0)
                 {
                     foreach($query_run as $row)
                     {
                //  $sql = "SELECT * FROM  products join sub_category on products.sub_id=sub_category.sub_id join category on products.category_id=category.id WHERE name='jewellery' LIMIT $offset, $no_of_records_per_page"; 
                // // $query2="SELECT * FROM products join sub_category on products.sub_id=sub_category.sub_id join category on products.category_id=category.id";
               
                // $final2= mysqli_query($conection,$sql); 
                // while($row=mysqli_fetch_assoc($final2)){ ?>


                <div class="col-sm-4 col-md-4" style="text-align: center;">
            <div class="product-box wow fadeInUp" style="font-style: italic;" >
                <div class="product-image" style="height: 330px;">
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
                <?php   } } else
                {
                    ?>
                        <tr>
                            <td colspan="4"><center><h3>No Record Found</h3></center></td>
                        </tr>
                    <?php
                }
            } ?>                                   
</div>
                            </div>
         <?php if(!isset($_GET['search']) && !isset($_GET['end_price'])){ ?>
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
                        
                    </div>

                </div></div>
            </div>
        </section>
    
    
    <!-- Footer Style 1 --->
    <?php include 'footer.php' ?> 