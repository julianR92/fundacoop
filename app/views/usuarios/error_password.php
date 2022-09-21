<?php

use Core\FH;
?>
<?php $this->setSiteTitle('Token Caducado'); ?>
<?php $this->start('body'); ?>
<style>


 

</style>
<div class="container pt-5 pb-5">
   <div class="row justify-content-md-center"> 
      <div class="col-md-6"> 
      <div class="col rounded" style="padding: 80px 60px 100px;">
         <div class="card">
            <div class="card-body">
               <h4 class="text-center">Token caducado</h2>
               <form class="m-t" role="form" action="" method="post" onsubmit="event.preventDefault(); validar();" id="frm">
                  <div class="row form-group">
                     <div class="col-md-12">
                     <p class="text-justify font-weight-light">ESTIMADO USUARIO SU TOKEN YA NO TIENE VALIDEZ POR FAVOR VUELVA A SOLICITAR EL RESTABLECIMIENTO DE LA CONTRASEÑA</p>
                     </div>
                 
                     <div class="col-md-12 float-left">
                     <a class="btn btn-link float-left pl-0" href="<?= PROOT ?>Usuarios/login">Volver</a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      </div>
      
   </div>
</div>



    <div class="modal fade" id="loadMe" tabindex="-1" role="dialog" aria-labelledby="loadMeLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="loader"></div>
                    <div clas="loader-txt">
                        <p>Enviando solicitud <br><br><small>Por favor espere...
                                </small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>



<?php $this->end(); ?>
<?php $this->start('footer'); ?>

<script>
   $(document).ready(function() {
      $.validator.addMethod("regex", function(value, element, regexp) {
      var re = new RegExp(regexp);
      return this.optional(element) || re.test(value);
   }, "Caracteres no validos.");

      $("#frm").validate({
         lang: 'es',
         rules: {
            email: {
               required: true,
               regex: "^[a-zA-Z0-9\._-]+@[a-zA-Z0-9-]{4,}[.][a-zA-Z0-9\.]{2,12}$"
            },
           
         },
         messages: {
            email: {
               required: "Este campo es requerido.",
               
            },
            password: {
               required: "Este campo es requerido."
            }
         }
      });
   });

   function validar() {
      if ($("#frm").valid()) {
         var formData = jQuery('#frm').serialize();
         jQuery.ajax({
            url: '<?= PROOT ?>usuarios/recoverPassword',
            method: "POST",
            data: formData,
            // beforeSend: function () {
            //     $("#loadMe").modal({
            //         backdrop: "static", //remove ability to close modal with click
            //         keyboard: false, //remove option to close with keyboard
            //         show: true, //Display loader!
            //     });
            // },
            success: function(resp) {
               if (resp.success) {
                  alertMsg('Proceso exitoso!', 'Por favor revise su bandeja de entrada', 'success', function(confirmed) {
                     if (confirmed)
                        window.location.href = '<?= PROOT ?>Usuarios/login';
                  });
               } else {
                  alertMsg('Atencion!', resp.error, 'error', function(confirmed) {});
               }
            },
            // complete: function(){
            //    $("#loadMe").modal({                    
            //         show: false, //Display loader!
            //     });

            // }
        
            
         });
      }
   }
</script>
<?php $this->end(); ?>