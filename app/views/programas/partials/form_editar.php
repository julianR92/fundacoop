<?php

use Core\FH; ?>
<form method="post" action="<?= PROOT ?>informeCaso/nuevo" id="frm" role="form" class="container" enctype="multipart/form-data">
   <div class="row mt-3">
      <?= FH::inputBlock('hidden', 'Id', 'id', $this->datos->id, ['class' => 'form-control'], ['class' => 'form-group col-md-12 d-none'], []) ?>

      <?= FH::selectBlock('Estado de la solicitud *', 'estado', $this->datos->estado, ['GESTIONADO'=>'GESTIONADO','PENDIENTE'=>'PENDIENTE','RECHAZADO'=>'RECHAZADO'], ['class' => 'form-control', 'placeHolder' => 'seleccione'], ['class' => 'form-group col-md-4'], []) ?>
      
      <?= FH::inputBlock('text', 'Observación', 'observacion', $this->datos->observacion, ['class' => 'form-control'], ['class' => 'form-group col-md-12'], []) ?>
   </div>
   <div class="row mt-3 form-group">
      <div class="col-md-2">
         <button type="button" class="btn btn-success btn-block" id="btnGuardar" onClick="actualizar();return;">Guardar</button>
      </div>
      <div class="col-md-2 mt-md-0 mt-2">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
   </div>
</form>