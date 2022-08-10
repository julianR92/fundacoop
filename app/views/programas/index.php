<?php $this->setSiteTitle('Casos') ?>

<?php $this->start('head'); ?>
<link href="<?= PROOT ?>css/plugins/footable/footable.bootstrap.css" rel="stylesheet">
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<div class="card card-secondary my-3">
   <div class="card-header text-center">
      <h3 class="my-0">Listado de casos</h3>
   </div>
   <div class="card-body pt-2">
      <div class="table-responsive">
         <table class="table table-striped table-condensed table-bordered table-hover" data-filtering="false" data-show-toggle="false" data-expand-first="true">
            <thead class="text-center">
               <th class="col-auto bg-info">Tipo Documento</th>
               <th class="col-auto bg-info">Documento</th>
               <th class="col-auto bg-info">Nombre</th>
               <th class="col-auto bg-info">Edad</th>
               <th class="col-auto bg-info">Correo</th>
               <th class="col-auto bg-info">Tel®¶fono</th>
               <th class="col-auto bg-info">Medio de contacto</th>
               <th class="col-auto bg-info">Nombre acudiente</th>
               <th class="col-auto bg-info"data-breakpoints="all">Tel®¶fono acudiente</th>
               <th class="col-auto bg-info"data-breakpoints="all">Correo acudiente</th>
               <th class="col-auto bg-info"data-breakpoints="all">Colegio</th>
               <th class="col-auto bg-info"data-breakpoints="all">Rector</th>
               <th class="col-auto bg-info"data-breakpoints="all">Categoria</th>
               <th class="col-auto bg-info"data-breakpoints="all">Relato</th>
               <th class="col-auto bg-info">Estado solicitud</th>
               <th class="col-auto bg-info">Fecha gesti√≥n</th>
               <th class="col-auto bg-info" data-breakpoints="all">Archivo</th>
               <th class="col-auto bg-info" data-breakpoints="all">Observaci®Æn</th>
               <th class="col-auto bg-info">Acciones</th>
            </thead>
            <tbody class="small">
               <?php foreach ($this->datos as $datos) : ?>
                  <tr>
                     <td><?= $datos->tipo_doc; ?></td>
                     <td><?= $datos->documento; ?></td>
                     <td><?= $datos->nombre; ?></td>
                     <td><?= $datos->edad; ?></td>
                     <td><?= $datos->correo; ?></td>
                     <td><?= $datos->telefono; ?></td>
                     <td><?= $datos->medio_contacto; ?></td>
                     <td><?= $datos->nombre_acudiente; ?></td>
                     <td><?= $datos->telefono_acu; ?></td>
                     <td><?= $datos->correo_acu; ?></td>
                     <td><?= $datos->colegio; ?></td>
                     <td><?= $datos->rector; ?></td>
                     <td><?= $datos->categoria; ?></td>
                     <td><?= $datos->relato; ?></td>
                     <td><?= $datos->estado; ?></td>
                     <td><?= $datos->fecha_gestion; ?></td>
                     <td><a href="<?= PROOT.$datos->ruta; ?>" target="_blank" >
                              Adjunto
                           </a> 
                   </td>
                     <td><?= $datos->observacion; ?></td>
                     <td>
                        <div class="row px-2">
                           <a href="#" onClick="editar(<?= $datos->id ?>);" class="btn btn-info btn-xs btn-sm col">
                              Asignar estado
                           </a>
                        </div>
                     </td>
                  </tr>
               <?php endforeach; ?>
            </tbody>
         </table>
      </div>
   </div>
</div>
<?php $this->end(); ?>
<?php $this->start('footer'); ?>
<script src="<?= PROOT ?>js/plugins/footable/footable.js"></script>
<script src="<?= PROOT ?>js/plugins/footable/footableConfig.js"></script>
<script>
   function editar(id) {
      jQuery.ajax({
         url: '<?= PROOT ?>informeCaso/editar',
         data: {
            id: id
         },
         method: "GET",
         success: function(resp) {
            jQuery('#modalTitulo').html('Asiganr Estado');
            jQuery('#bodyModal').html(resp);
            jQuery('#frmModal').modal({
               backdrop: 'static',
               keyboard: false
            });
            jQuery('#frmModal').modal('show');
         }
      });
   }

   function guardar() {
      if ($("#frm").valid()) {
         var form = jQuery('#frm').serialize();
         jQuery.ajax({
            url: '<?= PROOT ?>bodegas/nuevo',
            method: "POST",
            data: form,
            success: function(resp) {
               if (resp.success) {
                  alertMsg('Proceso exitoso!', 'El registro ha sido creado con exito.', 'success', function(confirmed) {
                     if (confirmed)
                        window.location.href = '<?= PROOT ?>bodegas';
                  });
               } else {
                  alertMsg('Proceso fallido!', 'Ha ocurrido un error: ' + resp.error, 'error', function(confirmed) {});
               }
            }
         });
      }
   }

   function actualizar() {
      if ($("#frm").valid()) {
         var form = jQuery('#frm').serialize();
         jQuery.ajax({
            url: '<?= PROOT ?>informeCaso/editar',
            method: "POST",
            data: form,
            success: function(resp) {
               if (resp.success) {
                  alertMsg('Proceso exitoso!', 'El registro ha sido actualizado con exito.', 'success', function(confirmed) {
                     if (confirmed)
                        window.location.href = '<?= PROOT ?>informeCaso';
                  });
               } else {
                  alertMsg('Proceso fallido!', 'Ha ocurrido un error: ' + resp.error, 'error', function(confirmed) {});
               }
            }
         });
      }
   }

   function eliminar(id) {
      Swal.fire({
         title: "Eliminar regisrtro",
         text: "¬øEsta usted seguro de eliminar este registro?",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonText: 'Aceptar',
         cancelButtonText: 'Cancelar',
         confirmButtonColor: '#d33',
      }).then((result) => {
         if (result) {
            jQuery.ajax({
               url: '<?= PROOT ?>bodegas/eliminar',
               method: "POST",
               data: {
                  id: id
               },
               success: function(resp) {
                  if (resp.success) {
                     alertMsg('Proceso exitoso!', 'El registro ha sido eliminado con exito.', 'success', function(confirmed) {
                        if (confirmed)
                           window.location.href = '<?= PROOT ?>bodegas';
                     });
                  } else {
                     alertMsg('Proceso fallido!', 'Ha ocurrido un error: ' + resp.error, 'error', function(confirmed) {});
                  }
               }
            });
         }
      });
   }

   jQuery('#frmModal').on('show.bs.modal', function() {
      $("#frm").validate({
         lang: 'es',
         rules: {
            bodega: {
               required: true
            },
            departamento_id: {
               required: true
            },
            municipio_id: {
               required: true
            },
            direccion: {
               required: true
            },
            telefono: {
               required: true
            },
            persona_contacto: {
               required: true
            }
         },
         messages: {
            tipo_doc: {
               required: "Este campo es requerido."
            },
            departamento_id: {
               required: "Este campo es requerido."
            },
            municipio_id: {
               required: "Este campo es requerido."
            },
            direccion: {
               required: "Este campo es requerido."
            },
            telefono: {
               required: "Este campo es requerido."
            },
            persona_contacto: {
               required: "Este campo es requerido."
            }
         }
      });
   });
</script>
<?php $this->end(); ?>