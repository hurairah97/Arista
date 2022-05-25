<?php 
if (session_status() === PHP_SESSION_NONE) {
  session_start();
} 
if (!isset($_SESSION['adm_name'])) {
  header('location:../admin/admlogin.php');
}
include '../config.php';
  include 'header.php' ;
?>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">

                <div class="text-left">
                  <h3 class="font-weight-bold" style="font-style:italic;" >Welcome <i style=" font-family: Cursive;" ><?php echo $_SESSION["adm_name"] ?></i></h3>
                  <h6 class="font-weight-normal mb-0">All systems are running smoothly! </h6>
                </div>

                <div class="dropdown flex-md-grow-1 flex-xl-grow-0 text-right" style="font-style:italic; margin-top:34px">
                  <span class="showing-result" > <?php echo date("l, jS \of F Y"); ?></span>
                </div>
               
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="card">
                <div class="card-body" style="text-align:center">
                  <p class="card-title"><h2 style="font-variant: small-caps; font-family: serif;"><center>Order Details</center></h2> </p>
                  <p class="font-weight-500">.</p>
                  <div class="d-flex flex-wrap mb-5">
<?php  $order_result = mysqli_query($conection,"SELECT SUM(orders.o_total), COUNT(orders.o_id) FROM orders");
       while ($row = mysqli_fetch_assoc($order_result)) {
?>                   
                    <div class="col-sm-3 col-md-3">
                      <p class="text-muted">Total Orders</p>
                      <h3 class="text-primary fs-30 font-weight-medium"><small><?php echo $row['COUNT(orders.o_id)']; ?></small></h3>
                    </div>
<?php } $order_result1 = mysqli_query($conection,"SELECT COUNT(invoice.product_quantity) FROM invoice");
        while ($rows = mysqli_fetch_assoc($order_result1)) {
?> 
                    <div class="col-sm-3 col-md-3">
                       <p class="text-muted">Total Product Sold </p>
                      <h3 class="text-primary fs-30 font-weight-medium"><small><?php echo $rows['COUNT(invoice.product_quantity)']; ?></small></h3>
                    </div>
<?php } $order_result = mysqli_query($conection,"SELECT SUM(orders.o_total), COUNT(orders.o_id) FROM orders");
        while ($row = mysqli_fetch_assoc($order_result)) { 
      $profit=0; $profit = $row['SUM(orders.o_total)'] / 4?>
                    <div class="col-sm-3 col-md-3">
                       <p class="text-muted">Total Orders Amount</p>
                      <h3 class="text-primary fs-30 font-weight-medium"><small><?php echo $row['SUM(orders.o_total)']; ?><small> Pkr</small></h3><h6> ( Incl GST )</h6></small>
                    </div>
                    <div class="col-sm-3 col-md-3">
                       <p class="text-muted">Total Profit Amount</p>
                      <h3 class="text-primary fs-30 font-weight-medium"><small><?php echo round($profit) ?> <small> Pkr</small></h3></small>
                    </div>
<?php } ?>
                


                  </div>
                 
                </div>
              </div>
            </div>

          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card position-relative">
                <div class="card-body">
                  <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-ride="carousel">
                    <div class="carousel-inner">
                      <!-- //start carousel -->
                      <div class="carousel-item active">
                        <div class="row">
                        
                          <div class="col-md-12 col-xl-9">
                            <div class="row">
                              
                            <div class="table-responsive" style="margin-top:50px;">
                              <h3 style="padding-bottom: 20px; font-family: serif;"><center> Top 10 Best Selling Products</center></h3>
                              <table class="table table-hover">
                              <thead class="thead-light">
                              <tr>
                                  <th>No </th>
                                  <th>Id </th>
                                  <th>Name </th>
                                  <th>Price</th> 
                                  <th>Image </th>
                                  <th>Selling by Numbers</th> 


                              </tr>
                              </thead>
                              <?php 
                              $query="SELECT products.p_id, products.p_name, products.price, products.image, COUNT(invoice.product_quantity) FROM products JOIN invoice on products.p_id=invoice.product_id GROUP by product_id order by COUNT(product_quantity) DESC LIMIT 10";
                              $final= mysqli_query($conection,$query);  
                              $i=0;
                              while($row=mysqli_fetch_array($final))
                              {
                              ?>
                              <tr>
                                  <td><?php  echo ++$i ?></td>
                                  <td><?php echo $row['p_id']; ?></td>
                                  <td><?php echo $row['p_name']; ?></td>
                                  <td><?php echo $row['price']; ?></td>
                                  <td><img src="data:image/jpg;base64,<?php echo base64_encode($row['image']);?>"width="50" height="60" > </td>
                                  <td><?php echo $row['COUNT(invoice.product_quantity)']; ?></td>
                                </tr>
                              <?php } ?>
                              </table>
                            </div>

                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- carosuel 2 start -->
                      <div class="carousel-item">
                        <div class="row">
                        
                          <div class="col-md-12 col-xl-9">
                            <div class="row">
                              
                            <div class="table-responsive" style="margin-top:50px;">
                              <h3 style="padding-bottom: 20px; font-family: serif;"><center> Top 10 Customers Doing Maximum Shopping</center></h3>
                              <table class="table table-hover">
                              <thead class="thead-light">
                              <tr>
                                <th>No </th>
                                <th>Id </th>
                                <th>Name </th>
                                <th>Email</th> 
                                <th>Shopping by Numbers</th>
                               </tr>
                              </thead>
                              <?php 
                              $query="SELECT user.id,user.name,user.email, COUNT(orders.user_id) FROM user JOIN orders on user.id=orders.user_id GROUP by user_id order by COUNT(user_id) DESC LIMIT 10";
                              $final= mysqli_query($conection,$query);  
                              $i=0;
                              while($row=mysqli_fetch_array($final))
                              {
                              ?>
                              <tr>
                                <td><?php  echo ++$i ?></td>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['COUNT(orders.user_id)']; ?></td>
                                </tr>
                              <?php } ?>
                              </table>
                            </div>

                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- end carosuel -->
                    </div>
                    <a class="carousel-control-prev" href="#detailedReports" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#detailedReports" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include 'footer.php' ?>