<?php

session_start();

// Jika user belum login, arahkan ke halaman login 
if (!isset($_SESSION["login"])) {
    header("location:jasa.login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pemesanan GOSAM</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
</nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../dist/img/logo-gosam.png" class="brand-logo">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="jasa.index.php?page=dashboard" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard    
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="jasa.index.php?page=layanan" class="nav-link">
              <i class="nav-icon fa fa-list-alt"></i>
              <p>
                Daftar Team
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="jasa.index.php?page=pesan" class="nav-link">
              <i class="nav-icon fa fa-truck"></i>
              <p>
                Pesan Jasa
                <i class="right fas f"></i>
              </p>
            </a>
           <!--button log out -->
          <form action="jasa.logout.php" method="POST">
              <button type="submit" class="btn btn-outline-info btn-block btn-flat rounded"><i class="fa fa-arrow-circle-right"></i><b>Log Out</b></button>
          </form>
        </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <!-- isi conten untuk memanggil data yg lain -->
          <?php
              @$page = $_GET["page"];
              if(!empty($page)){
                switch($page){
                  case 'dashboard':
                    include "dashboard.jasa.php";
                    break;
                  case 'layanan':
                    include "layanan.jasa.php";
                    break;
                  case 'pesan':
                    include "pesan.jasa.php";
                    break;
                } 
              } else {
                include "dashboard.jasa.php";
              }
          ?>
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <!--  isi conten 2 -->
              
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    
  </div>
  <!-- /.content-wrapper -->


  <footer class="main-footer ml-15">
    <strong>@webistemitraGOSAM</strong>
    
    <div class="float-right d-none d-sm-inline-block">
      <b>Mitra Pedesaan</b>
    </div>
  </footer>
</div>
  <!-- Main Footer -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- navbar responsive -->
<script src="../plugins/jquery/jquery.min.js"></script>
<script>
$(document).ready(function() {
  $("[data-widget='pushmenu']").click(function(e) {
    e.preventDefault();
    $("body").toggleClass("sidebar-collapse");
  });
});
</script>
</body>
</html>