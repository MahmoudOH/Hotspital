<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['password']) && isset($_SESSION['full_name']) && isset($_SESSION['dept'])) {

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['logout'])) {
   session_destroy();
   header('location: login.php');
  }
 }


 $dept = $_SESSION['dept'];

 ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Hospital</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
 </head>

 <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

  <div class="wrapper">
   <!-- Navbar -->
   <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
     <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
     </li>
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     <li class="nav-item d-none d-sm-inline-block">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
       <input type="submit" value="Logout" class="btn btn-primary" name="logout">
      </form>

     </li>
    </ul>
   </nav>
   <!-- /.navbar -->

   <!-- Main Sidebar Container -->
   <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
     <!-- Sidebar user panel (optional) -->
     <div class="user-panel pb-3 mb-3 d-flex">
      <div class="info">
       <a href="#" class="d-block">
        <?php echo $_SESSION['full_name']; ?>
       </a>
      </div>
     </div>

     <!-- Sidebar Menu -->
     <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

       <?php
       if ($dept == "Reception" || $dept == "Administration") {
        echo '<li class="nav-item">
              <a href="reception.php" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Reception
                </p>
              </a>
            </li>';
       }

       if ($dept == "Doctors" || $dept == "Administration") {
        echo '<li class="nav-item">
              <a href="doctors.php" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Doctors
                </p>
              </a>
            </li>';
       }

       if ($dept == "Finance" || $dept == "Administration") {
        echo '            <li class="nav-item">
              <a href="finance.php" class="nav-link">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p>
                  Finance
                </p>
              </a>
            </li>';
       }

       if ($dept == "Pharmacist" || $dept == "Administration") {
        echo '<li class="nav-item">
              <a href="pharmacist.php" class="nav-link">
                <i class="nav-icon fas fa-bell"></i>
                <p>
                  Pharmacist
                </p>
              </a>
            </li>';
       }

       if ($dept == "Administration") {
        echo '<li class="nav-item">
              <a href="admin.php" class="nav-link">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                  Administration
                </p>
              </a>
            </li>';
       }
       ?>
      </ul>
     </nav>
     <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
   </aside>

   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <?php include($childView) ?>
   </div>
   <!-- /.content-wrapper -->

   <!-- Control Sidebar -->
   <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
   </aside>
   <!-- /.control-sidebar -->

   <!-- Main Footer -->
   <footer class="main-footer">
    <strong>Copyright &copy; 2023</strong>
    All rights reserved.
   </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="dist/js/demo.js"></script>

  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="plugins/raphael/raphael.min.js"></script>
  <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="plugins/jquery-mapael/maps/world_countries.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>

  <!-- PAGE SCRIPTS -->
  <script src="dist/js/pages/dashboard2.js"></script>
 </body>

 </html>

 <?php
} else {
 header('location: login.php');
}
?>