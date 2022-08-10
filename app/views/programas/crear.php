<?php $this->start('body'); ?>
<?php $this->partial('programas', 'form'); ?>
<?php $this->end(); ?>
<?php $this->start('footer'); ?>
<script>
   $(document).ready(function() {
      $('#categoria').select2({
         placeholder: 'Seleccione una o varias opciones'
      });
   });

   $.validator.addMethod("regex",function(value, element, regexp) {
    var re = new RegExp(regexp);
    return this.optional(element) || re.test(value);
  }, "Caracteres no validos.");

   $("#frm").validate({

      
      lang: 'es',
      rules: {
         nombres: {
            required: true,
            maxlength: 15,
            regex: "^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ ]{3,15}$"
         },
         apellidos: {
            required: true,
            maxlength: 15,
            regex: "^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ ]{3,15}$"
         },
         tipo_doc: {
            required: true
         },
         documento: {
            required: true,
            maxlength: 15,
            regex: "^[a-zA-Z0-9\-]{5,15}$"
         },
         edad: {
            required: true
         },
         email: {
            required: true,
            regex: "^[a-zA-Z0-9\._-]+@[a-zA-Z0-9-]{4,}[.][a-zA-Z0-9\.]{2,12}$"
         },
         direccion: {
            required: true,
            regex: '^[a-zA-Z0-9\-#\s ]{5,100}$',
         },
         oficina: {
            required: true
         },
         celular: {
            required: true,
            maxlength: 10,
            regex: "^[0-9]{7,10}$"

         },
         genero: {
            required: true
         },
         nivel_escolaridad: {
            required: true
         },
         password: {
            required: true,
            minlength: 6
         },
         password_confirmation: {
            required: true,
            equalTo : "#password",
            minlength: 6
         },
         rector: {
            required: true
         },
         categorias: {
            required: true
         },
         prueba: {
            required: true
         },
         relato: {
            required: true
         },
         acepta_ter: {
            required: true
         }
      },
      messages: {
         nombres: {
            required: "Este campo es requerido.",
            maxlength: "No se permiten mas de 15 caracteres"
         },
         apellidos: {
            required: "Este campo es requerido.",
            maxlength: "No se permiten mas de 15 caracteres"
         },
         tipo_doc: {
            required: "Este campo es requerido."
         },
         documento: {
            required: "Este campo es requerido.",
            maxlength: "No se permiten mas de 15 caracteres"
         },
         edad: {
            required: "Este campo es requerido."
         },
         email: {
            required: "Este campo es requerido.",
            regex: "email no valido",
         },
         direccion: {
            required: "Este campo es requerido."
         },
         oficina: {
            required: "Este campo es requerido."
         },
         celular: {
            required: "Este campo es requerido.",
            
         },
         genero: {
            required: "Este campo es requerido."
         },
         nivel_escolaridad: {
            required: "Este campo es requerido."
         },
         password: {
            required: "Este campo es requerido.",
            minlength: "Minimo 6 caracteres"
         },
         password_confirmation: {
            required: "Este campo es requerido.",
            equalTo: "las contraseñas no coinciden",
            minlength: "Minimo 6 caracteres"
         },
         rector: {
            required: "Este campo es requerido."
         },
         categorias: {
            required: "Este campo es requerido."
         },
         prueba: {
            required: "Este campo es requerido."
         },
         relato: {
            required: "Este campo es requerido."
         },
         acepta_ter: {
            required: "Este campo es requerido."
         }
      }
   });

   function validarDoc(){
      let documento = document.getElementById('documento').value;
      var form = new FormData();
      form.append('documento',documento);
      jQuery.ajax({
            url: '<?= PROOT ?>Programas/validar',
            method: "POST",
            data: form,
            contentType: false,
            cache: false,
            processData: false,
            success: function(resp) {
               // console.log(resp.success);
               if (resp.success) {
                  console.log(resp.datos[0].nombres)
                   document.getElementById('nombres').value = resp.datos[0].nombres;
                   document.getElementById('apellidos').value = resp.datos[0].apellidos;
                   document.getElementById('edad').value = resp.datos[0].edad;
                   document.getElementById('email').value = resp.datos[0].email;
                   document.getElementById('direccion').value = resp.datos[0].direccion;
                   document.getElementById('oficina').value = resp.datos[0].oficina;
                   document.getElementById('celular').value = resp.datos[0].celular;
                   document.getElementById('genero').value = resp.datos[0].genero;
                   document.getElementById('nivel_escolaridad').value = resp.datos[0].nivel_escolaridad;

                  // alertMsg('¡ Informe exitoso !', 'El informe ha sido enviado correctamente, en un máximo de 2 días hábiles será reportado a la entidad competente.', 'success', function(confirmed) {
                  //    if (confirmed)
                  //       window.location.href = '<?= PROOT ?>informeCaso/nuevo';
                  // });
               } else {
                  document.getElementById('nombres').value = "";
                   document.getElementById('apellidos').value = "";
                   document.getElementById('edad').value = "";
                   document.getElementById('email').value = "";
                   document.getElementById('direccion').value = "";
                   document.getElementById('oficina').value ="";
                   document.getElementById('celular').value ="";
                   document.getElementById('genero').value ="";
                   document.getElementById('nivel_escolaridad').value = "";
                  // alertMsg('Proceso fallido!', 'Ha ocurrido un error: ' + resp.error, 'error', function(confirmed) {});
               }
            }
         });
      
   }

   function guardar() {
      if ($("#frm").valid()) {
         var form = new FormData(jQuery('#frm')[0]);
         jQuery.ajax({
            url: '<?= PROOT ?>informeCaso/nuevo',
            method: "POST",
            data: form,
            contentType: false,
            cache: false,
            processData: false,
            success: function(resp) {
               console.log(resp.success);
               if (resp.success) {
                  alertMsg('¡ Informe exitoso !', 'El informe ha sido enviado correctamente, en un máximo de 2 días hábiles será reportado a la entidad competente.', 'success', function(confirmed) {
                     if (confirmed)
                        window.location.href = '<?= PROOT ?>informeCaso/nuevo';
                  });
               } else {
                  alertMsg('Proceso fallido!', 'Ha ocurrido un error: ' + resp.error, 'error', function(confirmed) {});
               }
            }
         });
      }
   }
</script>
<?php $this->end(); ?>