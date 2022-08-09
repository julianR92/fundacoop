<?php

use Core\Session;
use Core\FH;
use App\Models\Usuarios;
?>
<!DOCTYPE html>
<html>

<head>

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title><?= $this->siteTitle(); ?></title>

   <!-- Favicons -->
   <link href="<?= PROOT ?>img/icono.jpg" rel="icon">
   <link href="<?= PROOT ?>img/icono.jpg" rel="apple-touch-icon">
   <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

   <link href="<?= PROOT ?>css/bootstrap/css/bootstrap.min.css" rel="stylesheet">

   <link href="<?= PROOT ?>css/plugins/icofont/icofont.min.css" rel="stylesheet">
   <link href="<?= PROOT ?>css/plugins/animate-css/animate.min.css" rel="stylesheet">
   <link href="<?= PROOT ?>css/plugins/venobox/venobox.css" rel="stylesheet">

   <link href="<?= PROOT ?>css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
   <link href="<?= PROOT ?>css/style.css" rel="stylesheet">
   <link href="<?= PROOT ?>css/alertMsg.css" rel="stylesheet">

   <?= $this->content('head'); ?>

</head>

<body class="animated fadeInLeft">

   <!-- ======= Menu ======= -->
   <header id="header" style="background-color: #004c4c;">
      <div class="container d-flex" style="max-width: 1220px;">
         <div class="logo mr-auto d-flex justify-content-between container-fluid">
            <div class="col">
               <h1 class="text-light">
                  <a href="<?= PROOT ?>" class="text-light">
                     <img class="img-fluid" src="<?= PROOT ?>img/index/fundacoop-blanco.png" alt="">
                  </a>
               </h1>
            </div>
            <?php if (Usuarios::currentUser()) : ?>
               <div class="col py-3 text-right">
                  <h6 class="text-light">Sistema de Información de Caso Escolar "CREO" </h6>
                  <a class="text-light" href="<?= PROOT ?>usuarios/logout" role="button" title="Cerrar Sesión">
                     Cerrar sesión
                  </a>
               </div>
            <?php endif; ?>
            
            <div class="col pt-3 text-right">
               <h6 class="text-light">Inscripciones de Programas Premium</h6>
            </div>
         </div>
      </div>
   </header><!-- Menu -->
   <?= Session::displayMsg() ?>
   <div class="container-fluid">
      <?= $this->content('body'); ?>
   </div>
   <footer id="footer" style="background-color: #004c4c;">
      <div class="footer-top" style="background-color: #004c4c;">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-lg-6 col-md-6 footer-info text-center">
                  <p>Cra 31 No. 35 – 12 Edificio Concasa - Tel: (+57) 6328858 ext 122</p>
                  <p>Correo: info@fundacoop.org - Whatsapp: 318 271 0233</p>
               </div>
            </div>
         </div>
      </div>
   </footer>
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
   <script src="<?= PROOT ?>js/plugins/jquery/jquery.min.js"></script>
   <script src="<?= PROOT ?>js/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="<?= PROOT ?>js/plugins/jquery.easing/jquery.easing.min.js"></script>
   <script src="<?= PROOT ?>js/plugins/jquery-sticky/jquery.sticky.js"></script>
   <script src="<?= PROOT ?>js/plugins/waypoints/jquery.waypoints.min.js"></script>
   <script src="<?= PROOT ?>js/plugins/isotope-layout/isotope.pkgd.min.js"></script>
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script src="<?= PROOT ?>js/plugins/validate/jquery.validate.min.js"></script>
   <script src="<?= PROOT ?>js/plugins/venobox/venobox.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

   <script src="<?= PROOT ?>js/alertMsg.js"></script>
   <script src="<?= PROOT ?>js/main.js"></script>

   <?= $this->content('footer'); ?>
</body>

</html>