<?php $this->start('body'); ?>
<link href="<?= PROOT ?>css/cards.css" rel="stylesheet">
<div class="form-group">
   <div class="row justify-content-center">
      <div class="col-md-6 mt-1 px-0">
         <h1 class="pt-5 text-center">PROGRAMAS PREMIUM FUNDACOOP</h1>
         <!-- <img class="img img-fluid rounded" src="<?= PROOT ?>img/index/banner.jpg" alt="bannner"> -->
      </div>
   </div>
   <!-- <div class="row justify-content-center">
      <div class="col-md-6 text-center mt-3 pt-3 border rounded">
         <h3 style="color:#015e01;">Le Damos la Bienvenida al Sistema de Información de Caso Escolar <b>"CREO"</b>.</h3>
         <p class="text-justify mt-5">
            Antes de continuar, le invitamos a leer atentamente el siguiente aviso de privacidad:
         </p>
         <p class="text-justify">
            De conformidad con lo previsto en la <b>Ley 1581 de 2012</b> y sus decretos reglamentarios, usted
            autoriza que los datos personales suministrados a través de este formulario sean tratados por la
            Fundación Cooprofesores con el fin de tramitar su caso ante las autoridades competentes, y de
            acuerdo con la política de seguridad de la información y protección de datos personales de la
            Fundación Cooprofesores, disponible la página web <a style="color:#015e01;" href="https://www.fundacoop.org/sitio/" target="_blank"><b>www.fundacoop.org</b></a>
            La información aquí presentada no corresponde a una denuncia formal establecida ante una entidad
            competente, por tanto usted no se encuentra obligado(a) a suministrar ni a autorizar el tratamiento
            de sus datos personales sensibles ni aquellos relacionados con niñas, niños y adolescentes.
         </p>
         <p class="text-justify">
            En caso tal de registrar los datos y el caso escolar, la Fundación Cooprofesores lo pondrá en conocimiento de
            las autoridades respectivas haciendo traslado de toda la información registrada y realizando el seguimiento respectivo.
         </p>
      </div>
   </div> -->

   <section class="hero-section">
  <div class="card-grid">
    <a class="card" href="<?= PROOT ?>Programas/nuevo">
      <div class="card__background" style="background-image: url(https://www.fundacoop.org/sitio/wp-content/uploads/2022/09/proyecto-mayor-1.jpg)"></div>
      <div class="card__content">
        <p class="card__category">Programa</p>
        <h3 class="card__heading">PROYECTO MAYOR</h3>
      </div>
    </a>
    <a class="card" href="<?= PROOT ?>Programas/nuevoClass">
      <div class="card__background" style="background-image: url(https://www.fundacoop.org/sitio/wp-content/uploads/2022/08/club-class.jpg)"></div>
      <div class="card__content">
        <p class="card__category">Programa</p>
        <h3 class="card__heading">CLUB CLASS</h3>
      </div>
    </a>
    <a class="card" href="<?= PROOT ?>Programas/nuevoVida">
      <div class="card__background" style="background-image: url(https://www.fundacoop.org/sitio/wp-content/uploads/2022/08/vida-club.jpg)"></div>
      <div class="card__content">
        <p class="card__category">Programa</p>
        <h3 class="card__heading">VIDA CLUB</h3>
      </div>
    </a>
    <!-- <a class="card" href="#">
      <div class="card__background" style="background-image: url(https://images.unsplash.com/photo-1557004396-66e4174d7bf6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60)"></div>
      <div class="card__content">
        <p class="card__category">Category</p>
        <h3 class="card__heading">Example Card Heading</h3>
      </div> -->
    </a>
  <div>
</section>
   <div class="row justify-content-center mt-2">
      <!-- <div class="col-md-2">
         <a href="<?= PROOT ?>home/informacion" class="btn btn-success btn-sm-block btn-block">Continuar</a>
      </div> -->
      <div class="col-md-2 mt-md-0 mt-2">
         <a href="https://www.fundacoop.org/sitio/" class="btn btn-secondary btn-sm-block btn-block">Volver</a>
      </div>
   </div>
</div>
<?php $this->end(); ?>