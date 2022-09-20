<?php $this->start('body'); ?>
<?php $this->partial('programas', 'form'); ?>
<?php $this->end(); ?>
<?php $this->start('footer'); ?>
<script>
   $(document).ready(function() {
      $('#producto_destaca').select2({
         placeholder: 'Seleccione una o varias opciones'
      });
      $('#departamento').select2({
         placeholder: 'Seleccione..'
      });
      $('#municipio').select2({
         placeholder: 'Seleccione..'
      });
   });

   $.validator.addMethod("regex", function(value, element, regexp) {
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
         anios_empresa: {
            required: true,
            maxlength: 3,
            regex: "^[0-9]{1,3}$"

         },
         personas_empresa: {
            required: true,
            maxlength: 10,
            regex: "^[0-9]{1,10}$"

         },
         ventas_empresa: {
            required: true,
            maxlength: 15,

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
            equalTo: "#password",
            minlength: 6
         },
         nombre_empresa: {
            required: true,
            maxlength: 50,
         },
         empresa_formal: {
            required: true
         },
         vision: {
            required: true
         },
         producto_servicio: {
            required: true,
            maxlength: 20,
         },
         estado_desarrollo: {
            required: true
         },
         fuentes_financiacion: {
            required: true
         },
         sector: {
            required: true
         },
         departamento: {
            required: true
         },
         municipio: {
            required: true
         },
         'producto_destaca[]': {
            required: true
         },
         ace_ter: {
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
         nombre_empresa: {
            required: "Este campo es requerido.",
            maxlength: "Maximo 20 caracteres",
         },
         empresa_formal: {
            required: "Este campo es requerido."
         },
         vision: {
            required: "Este campo es requerido."
         },
         producto_servicio: {
            required: "Este campo es requerido."
         },
         estado_desarrollo: {
            required: "Este campo es requerido."
         },
         anios_empresa: {
            required: "Este campo es requerido.",

         },
         personas_empresa: {
            required: "Este campo es requerido.",

         },
         ventas_empresa: {
            required: "Este campo es requerido.",

         },
         fuentes_financiacion: {
            required: "Este campo es requerido.",

         },
         sector: {
            required: "Este campo es requerido.",

         },
         departamento: {
            required: "Este campo es requerido.",

         },
         municipio: {
            required: "Este campo es requerido.",

         },
         'producto_destaca[]': {
            required: "Este campo es requerido."
         },
         ace_ter: {
            required: "Este campo es requerido."
         }
      }
   });

   function validarDoc() {
      let documento = document.getElementById('documento').value;
      var form = new FormData();
      form.append('documento', documento);
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
             
               document.getElementById('nombres').value = resp.datos[0].nombres;
               document.getElementById('tipo_doc').value = resp.datos[0].tipo_doc;
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
               document.getElementById('tipo_doc').value = "";
               document.getElementById('edad').value = "";
               document.getElementById('email').value = "";
               document.getElementById('direccion').value = "";
               document.getElementById('oficina').value = "";
               document.getElementById('celular').value = "";
               document.getElementById('genero').value = "";
               document.getElementById('nivel_escolaridad').value = "";
               // alertMsg('Proceso fallido!', 'Ha ocurrido un error: ' + resp.error, 'error', function(confirmed) {});
            }
         }
      });

   }

   function moneyFormat() {
      let ventas = document.getElementById('ventas_empresa').value;
      let formatVen = ventas.replace(/[,.$/s]/g, '');
      document.getElementById('ventas_empresa').value = new Intl.NumberFormat('es-CO', {
         style: 'currency',
         currency: 'COP'
      }).format(formatVen);

   }

   function fillMun() {

      let codigo = document.getElementById('departamento').value;
      let form = new FormData();
      form.append('codigo', codigo);
      jQuery.ajax({
         url: '<?= PROOT ?>Programas/validarMun',
         method: "POST",
         data: form,
         contentType: false,
         cache: false,
         processData: false,
         success: function(resp) {
            if (resp.success) {
               let municipio = $('#municipio');
               $("#muncipio").find("option").remove();
               $('#municipio').empty();
               municipio.append(`<option value="">Seleccione..</option>`);
               for (let data of resp.datos) {
                  municipio.append(`<option value="${data.codigo_muni}">${data.municipio}</option>`);
               }
            } else {

            }
         }
      });

   }

   function Numeros(e) {

      key = e.keyCode || e.which;
      tecla = String.fromCharCode(key).toLowerCase();
      letras = "0123456789";
      especiales = [8, 37];
      tecla_especial = false
      for (var i in especiales) {
         if (key == especiales[i]) {
            tecla_especial = true;
            break;
         }
      }

      if (letras.indexOf(tecla) == -1 && !tecla_especial)
         return false;
   }

   function guardar() {
      if ($("#frm").valid()) {
         var form = new FormData(jQuery('#frm')[0]);
         jQuery.ajax({
            url: '<?= PROOT ?>Programas/nuevo',
            method: "POST",
            data: form,
            contentType: false,
            cache: false,
            processData: false,
            success: function(resp) {
               console.log(resp.success);
               if (resp.success) {
                  alertMsg('¡Registro Exitoso!', 'Por tanto solo $10.000 al mes puedes disfrutar de los beneficios de Proyecto Mayor.', 'success', function(confirmed) {
                     if (confirmed)
                        window.location.href = '<?= PROOT ?>Usuarios/login';
                  });
               } else {
                  alertMsg('Proceso fallido!', 'Ha ocurrido un error: ' + resp.error, 'error', function(confirmed) {
                     if (confirmed)
                      if(resp.url) window.location.href = '/';

                  });
               }
            }
         });
      }
   }
</script>
<?php $this->end(); ?>