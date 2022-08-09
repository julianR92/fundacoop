<?php

use Core\Session;
?>
<!DOCTYPE html>
<html>

<head>

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title><?= $this->siteTitle(); ?></title>

   <link rel="shortcut icon" type="image/x-icon" href="<?= PROOT ?>img/icono.jpg">

   <link href="<?= PROOT ?>css/bootstrap/css/bootstrap.min.css" rel="stylesheet">

   <link href="<?= PROOT ?>css/plugins/animate-css/animate.css" rel="stylesheet">
   <link href="<?= PROOT ?>css/plugins/sweetalert/sweetalert2.min.css" rel="stylesheet">
   <link href="<?= PROOT ?>css/style.css" rel="stylesheet">

</head>

<body class="section-bg">
   <div class="container animated fadeInLeft">
      <?= $this->content('body'); ?>
      <hr style="border-top:1px solid rgba(0, 0, 0, 0.42);" />
      <div class="row justify-content-center">
         <div class="col-lg-6 col-md-6 footer-info text-center">
            <p>Cra 31 No. 35 – 12 Edificio Concasa - Tel: (+57) 6328858 ext 122</p>
            <p>Correo: info@fundacoop.org - Whatsapp: 318 271 0233</p>
         </div>
      </div>
   </div>

   <script src="<?= PROOT ?>js/plugins/jquery/jquery.min.js"></script>
   <script src="<?= PROOT ?>js/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="<?= PROOT ?>js/plugins/sweetalert/sweetalert2.min.js"></script>
   <script src="<?= PROOT ?>js/plugins/validate/jquery.validate.min.js"></script>
   <script src="<?= PROOT ?>js/alertMsg.js"></script>

   <?= $this->content('footer'); ?>

</body>

</html>