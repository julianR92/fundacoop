<?php

use Core\Session;
?>
<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">

   <title><?= $this->siteTitle(); ?></title>
   <!-- Favicons -->
   <link href="<?= PROOT ?>img/icono.jpg" rel="icon">
   <link href="<?= PROOT ?>img/icono.jpg" rel="apple-touch-icon">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="<?= PROOT ?>adminlte/plugins/fontawesome-free/css/all.min.css">
   <!-- Ionicons -->
   <!-- Theme style -->
   <link rel="stylesheet" href="<?= PROOT ?>adminlte/dist/css/adminlte.min.css">
   <!-- Google Font: Source Sans Pro -->
   <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


   <link href="<?= PROOT ?>css/plugins/animate-css/animate.min.css" rel="stylesheet">
   <link href="<?= PROOT ?>css/plugins/sweetalert/sweetalert2.min.css" rel="stylesheet">
   <link href="<?= PROOT ?>css/style.css" rel="stylesheet">

   <?= $this->content('head'); ?>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
   <?php date_default_timezone_set('America/Bogota'); ?>
   <div class="wrapper">
      <!-- Barra superior -->
      <nav class="main-header navbar navbar-expand navbar-dark navbar-lightblue">
         <!-- Barra para expandir y contraer panel lateral -->
         <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
         </ul>
         <!-- --- -->
         <ul class="navbar-nav ml-auto">
            <!-- Notifications Dropdown Menu -->
            <!-- <li class="nav-item dropdown">
               <a class="nav-link" data-toggle="dropdown" href="#">
                  <i class="far fa-bell"></i>
                  <span class="badge badge-warning navbar-badge">15</span>
               </a>
               <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <span class="dropdown-item dropdown-header">15 Notificaciones</span>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                     <i class="nav-icon fas fa-address-book"></i> 14 Cotizaciones pendientes
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                     <i class="nav-icon fas fa-truck"></i> 1 Entrega realizada
                  </a>
               </div>
            </li> -->
            <li class="nav-item">
               <a class="nav-link" href="<?= PROOT ?>usuarios/logout" role="button" title="Cerrar Sesión">
                  <i class="fas fa-sign-out-alt"></i>
               </a>
            </li>
         </ul>
      </nav>
      <!-- Fin barra superior -->
      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
         <!-- Sidebar -->
         <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
               <div class="image">
                  <img src="<?= PROOT ?>img/usuario_admin.png" class="img-circle elevation-2" alt="User Image">
               </div>
               <div class="info">
                  <a href="<?= PROOT ?>" class="d-block">Administrador</a>
               </div>
            </div>

          
            <!-- /.sidebar-menu -->
         </div>
         <!-- /.sidebar -->
      </aside>
      <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <div class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1 class="m-0 text-dark">Panel de Control</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= PROOT ?>home/admin">Admin</a></li>
                        <li class="breadcrumb-item active">Panel de Control</li>
                     </ol>
                  </div><!-- /.col -->
               </div><!-- /.row -->
            </div><!-- /.container-fluid -->
         </div>

         <!-- Main content -->
         <section class="content">
            <div class="container-fluid animated fadeInLeft">
               <?= Session::displayMsg() ?>
               <?= $this->content('body'); ?>
               <!-- Número de visitantes<div id="sfcuratjcucdg5hfrrkcxu6s2uxw6adhss3"></div>
               <script type="text/javascript" src="https://counter3.stat.ovh/private/counter.js?c=uratjcucdg5hfrrkcxu6s2uxw6adhss3&down=async" async></script>
               <noscript><a id="visitas" href="#" title="contador de visitas para tumblr"><img src="https://counter3.stat.ovh/private/contadorvisitasgratis.php?c=uratjcucdg5hfrrkcxu6s2uxw6adhss3" border="0" title="contador de visitas para tumblr" alt="contador de visitas"></a></noscript> -->

            </div><!-- /.container-fluid -->
         </section>
         <!-- /.content -->
      </div>

      <footer class="main-footer">
         <strong>Copyright &copy; <?= date('Y'); ?> <a id="2" href="<?= PROOT ?>home/index">El Zapatero</a></strong>
      </footer>
   </div>

   <div class="modal inmodal fade font-weight-bold" id="frmModal" tabindex="-1" role="dialog" aria-labelledby="frmModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h3 class="modal-title text-decoration"><u id="modalTitulo"></u></h3>
               <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            </div>
            <div class="modal-body" id="bodyModal">
               ...
            </div>
         </div>
      </div>
   </div>

   <!-- jQuery -->
   <script src="<?= PROOT ?>adminlte/plugins/jquery/jquery.min.js"></script>
   <!-- jQuery UI 1.11.4 -->
   <script src="<?= PROOT ?>adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
   <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
   <script>
      $.widget.bridge('uibutton', $.ui.button)
   </script>
   <!-- Bootstrap 4 -->
   <script src="<?= PROOT ?>adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   <!-- AdminLTE App -->
   <script src="<?= PROOT ?>adminlte/dist/js/adminlte.js"></script>

   <script src="<?= PROOT ?>js/plugins/sweetalert/sweetalert2.min.js"></script>
   <script src="<?= PROOT ?>js/plugins/validate/jquery.validate.min.js"></script>
   <script src="<?= PROOT ?>js/alertMsg.js"></script>
   <script>
      $(window).on("load", function() {
         setTimeout(function() {
            $("#sfcuratjcucdg5hfrrkcxu6s2uxw6adhss3 a").attr("href", "#");
            $("#sfcuratjcucdg5hfrrkcxu6s2uxw6adhss3 a").removeAttr("target");
         }, 800);

      });
   </script>
   <?= $this->content('footer'); ?>

</body>

</html>