<?php

use Core\FH;
?>
<?php $this->setSiteTitle('Actualizar Contraseña'); ?>
<?php $this->start('body'); ?>
<style>

.loader {
            position: relative;
            text-align: center;
            margin: 15px auto 35px auto;
            z-index: 9999;
            display: block;
            width: 80px;
            height: 80px;
            border: 10px solid rgba(0, 0, 0, .3);
            border-radius: 50%;
            border-top-color: #004884;
            animation: spin 1s ease-in-out infinite;
            -webkit-animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to {
                -webkit-transform: rotate(360deg);
            }
        }

        @-webkit-keyframes spin {
            to {
                -webkit-transform: rotate(360deg);
            }
        }
 

</style>
<div class="container pt-5 pb-5">
   <div class="row justify-content-md-center"> 
      <div class="col-md-6"> 
      <div class="col rounded" style="padding: 80px 60px 100px;">
         <div class="card">
            <div class="card-body">
               <h4 class="text-center">Actualizar Contraseña</h2>
               <form class="m-t" role="form" action="" method="post" onsubmit="event.preventDefault(); validar();" id="frm">
                  <div class="row form-group">
                     <div class="col-md-12">
                     <p class="text-justify font-weight-light">Digita tu nueva contraseña como minimo debe tener 6 caracteres</p>
                     </div>
                       <!-- <?= FH::inputBlock('email', 'Email*', 'email', $this->usuario->email, ['class' => 'form-control', 'placeholder' => 'Digite su correo','readonly'=>'readonly'], ['class' => 'col-md-12 form-group'], []) ?> -->
                       <?= FH::inputBlock('text', 'Usuario*', 'username', $this->usuario->username, ['class' => 'form-control', 'placeholder' => 'Digite su correo','readonly'=>'readonly'], ['class' => 'col-md-12 form-group'], []) ?>
                       <?= FH::inputBlock('password', 'Contraseña *', 'password', '', ['class' => 'form-control'], ['class' => 'form-group col-md-12'], []) ?>
                        <?= FH::inputBlock('password', 'Digite nuevamente la contraseña*', 'password_confirmation', '', ['class' => 'form-control'], ['class' => 'form-group col-md-12'], []) ?>
                     <div class="col-md-12">
                        <?= FH::submitTag('Restablecer Contraseña', ['class' => 'btn btn-primary btn-block full-width m-b']) ?>
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
            password: {
            required: true,
            minlength: 6
         },
          password_confirmation: {
            required: true,
            equalTo: "#password",
            minlength: 6
         },
         username:{
            required: true,

         }

           
         },
         messages: {
            password: {
            required: "Este campo es requerido.",
            minlength: "Minimo 6 caracteres"
         },
         password_confirmation: {
            required: "Este campo es requerido.",
            equalTo: "las contraseñas no coinciden",
            minlength: "Minimo 6 caracteres"
         },

         }
      });
   });

   function validar() {
      if ($("#frm").valid()) {
         var formData = jQuery('#frm').serialize();
         jQuery.ajax({
            url: '<?= PROOT ?>usuarios/updatePassword',
            method: "POST",
            data: formData,
           
            success: function(resp) {
               if (resp.success) {
                  alertMsg('Proceso exitoso!', 'Su contraseña ha sido actualizada', 'success', function(confirmed) {
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