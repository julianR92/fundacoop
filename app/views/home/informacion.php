<?php $this->start('body'); ?>
<div class="form-group">
   <div class="row justify-content-center">
      <div class="col-md-6 mt-1 px-0">
         <img class="img img-fluid rounded" src="<?= PROOT ?>img/index/banner_info.jpg" alt="bannner">
      </div>
   </div>
   <div class="row justify-content-center">
      <div class="col-md-6 text-center mt-3 pt-3 border rounded">
         <h3 style="color:#015e01;">Tenga en cuenta las siguientes recomendaciones para informar el caso escolar:</h3>
         <p class="text-justify mt-5">
            Si tiene evidencias sobre el caso almacenadas en medios tecnológicos como celulares, memorias usb,
            equipos de cómputo, tablet, cd's, por favor conserve esta información sin modificarla o alterarla,
            evite que sea manipulada por otras personas hasta ponerlasen conocimiento de las autoridades.
         </p>
         <p class="text-justify">
            Si el caso se registra a través de las redes sociales como Facebook, Skype, Instagram, Twitter, Flickr,
            entre otras, por favor modifique la contraseña sin informarla a otras personas con el fin de preservar
            la información y pueda ser entregada a la autoridad competente. Evite que sus hijos ingresen a las
            redes sociales sin supervisión adecuada con el fin de no alertar al victimario y/o elimine el contenido
            de información.
         </p>
         <p class="text-justify">
            Si el caso está sucediendo en tiempo real (video llamada), tome las capturas de pantalla necesarias
            donde demuestre usuarios, conexión, página por la cual se está transmitiendo la video llamada y la
            imagen del niño, niña o adolescente, posteriormente guárdelas en un dispositivo de
            almacenamiento para ser entregadas a la autoridad competente.
         </p>
         <p class="text-justify">
            Si ha recibido documentos impresos, fotografías o textos con amenazas, insinuaciones sexuales,
            oferta de drogas, contenido erótico sexual infantil, por favor guárdelos para ser entregados a la
            autoridad competente.
         </p>
      </div>
   </div>
   <div class="row justify-content-center mt-3">
      <div class="col-md-2">
         <a href="<?= PROOT ?>informeCaso/nuevo" class="btn btn-success btn-sm-block btn-block">Continuar</a>
      </div>
      <div class="col-md-2 mt-md-0 mt-2">
         <a href="https://www.fundacoop.org/sitio/" class="btn btn-secondary btn-sm-block btn-block">Cancelar</a>
      </div>
   </div>
</div>
<?php $this->end(); ?>