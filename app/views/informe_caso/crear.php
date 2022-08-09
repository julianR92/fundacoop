<?php $this->start('body'); ?>
<?php $this->partial('informe_caso', 'form'); ?>
<?php $this->end(); ?>
<?php $this->start('footer'); ?>
<script>
   $(document).ready(function() {
      $('#categoria').select2({
         placeholder: 'Seleccione una o varias opciones'
      });
   });

   $("#frm").validate({
      lang: 'es',
      rules: {
         nombres: {
            required: true
         },
         apellidos: {
            required: true
         },
         tipo_doc: {
            required: true
         },
         documento: {
            required: true
         },
         edad: {
            required: true
         },
         correo: {
            required: true
         },
         telefono: {
            required: true
         },
         medio_contacto: {
            required: true
         },
         nombre_acudiente: {
            required: true
         },
         telefono_acu: {
            required: true
         },
         correo_acu: {
            required: true
         },
         colegio: {
            required: true
         },
         curso: {
            required: true
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
            required: "Este campo es requerido."
         },
         apellidos: {
            required: "Este campo es requerido."
         },
         tipo_doc: {
            required: "Este campo es requerido."
         },
         documento: {
            required: "Este campo es requerido."
         },
         edad: {
            required: "Este campo es requerido."
         },
         correo: {
            required: "Este campo es requerido."
         },
         telefono: {
            required: "Este campo es requerido."
         },
         medio_contacto: {
            required: "Este campo es requerido."
         },
         nombre_acudiente: {
            required: "Este campo es requerido."
         },
         telefono_acu: {
            required: "Este campo es requerido."
         },
         correo_acu: {
            required: "Este campo es requerido."
         },
         colegio: {
            required: "Este campo es requerido."
         },
         curso: {
            required: "Este campo es requerido."
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