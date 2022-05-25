<!DOCTYPE html>
<html lang="en">
<?php  if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    ?>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Panel</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../panel/vendors/feather/feather.css">
  <link rel="stylesheet" href="../panel/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../panel/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
  <link rel="stylesheet" href="../panel/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../panel/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="../panel/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../panel/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../panel/images/logonav.png" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.php"><img src="../panel/images/p2.svg" width="100%" height="600" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.php"><img src="../panel/images/p2.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="fad fa-bars menu-icon"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
          <form action="" class="example" method="GET">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                <button type="submit"><i class="far fa-search"></i></button>
                </span>
              </div>
              <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search">
            </div>
          </form>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">

          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="../panel/images/face.jpg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a href="../admin/edit.php?id=<?php echo $_SESSION["adm_id"] ?>" class="dropdown-item">
                <i class="ti-user text-primary"></i>
                <?php echo $_SESSION["adm_name"]; ?>
              </a>
              <a href="../admin/admlogout.php" class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
         
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="../panel/index.php">
              <i class="fad fa-dashboard menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/admview.php">
              <i class="fad fa-user-crown menu-icon"></i>
              <span class="menu-title">Admin</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../user/urview.php">
              <i class="fad fa-user menu-icon"></i>
              <span class="menu-title">Customers</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../category/catview.php">
              <i class="fad fa-inventory menu-icon"></i>
              <span class="menu-title">Category</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../sub category/subview.php">
              <i class="fad fa-outdent menu-icon"></i>
              <span class="menu-title">Sub Category</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../products/prdview.php">
              <i class="far fa-tags menu-icon"></i>
              <span class="menu-title">Products</span>
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="../orders/ordview.php">
              <i class="fad fa-cart-arrow-down menu-icon"></i>
              <span class="menu-title">Orders</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../invoice/invview.php">
              <i class="fad fa-file-invoice menu-icon"></i>
              <span class="menu-title">Invoice</span>
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="../detail/detview.php">
              <i class="fad fa-info-circle menu-icon"></i>
              <span class="menu-title">Details</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../contact/viewcont.php">
              <i class="fad fa-phone menu-icon"></i>
              <span class="menu-title">Contact</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/admlogout.php">
              <i class="ti-power-off menu-icon"></i>
              <span class="menu-title">Log Out</span>
            </a>
          </li>
        </ul>
      </nav>
      