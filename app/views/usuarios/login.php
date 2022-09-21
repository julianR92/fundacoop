<?php

use Core\FH;
?>
<?php $this->setSiteTitle('Inicio de Sesion'); ?>
<?php $this->start('body'); ?>
<style>
   @keyframes float {
	 0% {
		 box-shadow: 0 5px 15px 0px rgba(0, 0, 0, 0.6);
		 transform: translatey(0px);
	}
	 50% {
		 box-shadow: 0 25px 15px 0px rgba(0, 0, 0, 0.2);
		 transform: translatey(-20px);
	}
	 100% {
		 box-shadow: 0 5px 15px 0px rgba(0, 0, 0, 0.6);
		 transform: translatey(0px);
	}
}
   
   .avatar {
	
	 box-shadow: 0 5px 15px 0px rgba(0, 0, 0, 0.6);
	 transform: translatey(0px);
	 animation: float 6s ease-in-out infinite;
}

</style>
<div class="container pt-5 pb-5">
   <div class="row">
      <div class="col-md-7 col-sm-12">
        <div class="col rounded " style="padding: 80px 60px 100px;">
         <div class="card avatar">
         <div class="card-body" style="background-color:#004c4c!important;">
         <div class="card-title text-white"> <H5>Ya estás inscrito en el programa, ahora debes activarte para disfrutar de los servicios<span><svg width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M18 6.41L16.59 5L12 9.58L7.41 5L6 6.41l6 6z"/><path fill="currentColor" d="m18 13l-1.41-1.41L12 16.17l-4.59-4.58L6 13l6 6z"/></svg></span></H5></div>

         <p class="text-white"><b>Valor de cada uno de los programas premium:</b></p>
         <p class="text-white"><b>1 mes=</b> $10.000<br>
                              <b> meses = </b>$48.000 (20% de descuento)<br>
                              <b> año=</b> $72.000 (40% de descuento)<br>
         </p>
         <p class="text-white">Pasos para activarte en los programas</p>
            <ol>
               <li class="text-white">Para pagar, puedes hacerlo por los siguientes medios:
                  <ul>
                     <li class="text-white">
                       <b>EFECTY</b>:CONVENIO 934 o 9539 CTA No.10-074498-9
                     </li>
                     <li class="text-white">
                       <b>TRANSFERENCIA </b>:DAVIVIENDA AHORROS 046100723082
                     </li>
                  </ul>
               </li>
               <li class="text-white">Luego de cancelar el valor correspondiente, reporta el pago a:
                  <ul>
                     <li class="text-white">
                       <b>Correo</b>:  <a href="mailto:info@fundacoop.org" target="_blank" class="btn-link">info@fundacoop.org</a></a>
                     </li>
                     <li class="text-white">
                       <b>Whatsapp </b>: <a href="https://wa.me/573182710233" target="_blank" class="btn-link">318 271 0233</a></a>
                     </li>
                  </ul>
               </li>
               <li class="text-white">Nuestro equipo te activará para que puedas disfrutar de los servicios de cada programa.</li>
               <li class="text-white">Inicia sesión y programa tus asesorías.</li>
            
            </ol>
         

         </div>
         </div>
        </div>
      </div>
      <div class="col-md-5 col-sm-12">
      <div class="col rounded" style="padding: 80px 60px 100px;">
         <div class="card">
            <div class="card-body">
               <h4 class="text-center">Inicio de sesion Programas Premium</h2>
               <form class="m-t" role="form" action="" method="post" onsubmit="event.preventDefault(); validar();" id="frm">
                  <div class="row form-group">
                     <?= FH::inputBlock('text', 'Número de Cedula', 'usuario', $this->datos->usuario, ['class' => 'form-control', 'placeholder' => 'Digite su número de cédula'], ['class' => 'col-md-12 form-group'], []) ?>
                     <?= FH::inputBlock('password', 'Contraseña', 'password', $this->datos->password, ['class' => 'form-control', 'placeholder' => 'Digite su contraseña'], ['class' => 'col-md-12 form-group'], []) ?>
                     <div class="col-md-12">
                        <?= FH::submitTag('Iniciar sesión', ['class' => 'btn btn-primary btn-block full-width m-b']) ?>
                     </div>
                     <div class="col-md-12 float-left">
                        <a class="btn btn-link float-left pl-0" href="<?= PROOT ?>Usuarios/recoverPassword">¿Olvidaste tu contraseña?</a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      </div>
   </div>
</div>

<?php $this->end(); ?>
<?php $this->start('footer'); ?>

<script>
   $(document).ready(function() {
      $("#frm").validate({
         lang: 'es',
         rules: {
            usuario: {
               required: true,
            },
            password: {
               required: true
            }
         },
         messages: {
            usuario: {
               required: "Este campo es requerido."
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
            url: '<?= PROOT ?>usuarios/login',
            method: "POST",
            data: formData,
            success: function(resp) {
               if (resp.success) {
                  alertMsg('Proceso exitoso!', 'Bienvenido al sistema.', 'success', function(confirmed) {
                     if (confirmed)
                        window.location.href = '<?= PROOT ?>informeCaso/index';
                  });
               } else {
                  alertMsg('Inicio de sesión fallido!', resp.error, 'error', function(confirmed) {});
               }
            }
         });
      }
   }
</script>
<?php $this->end(); ?>