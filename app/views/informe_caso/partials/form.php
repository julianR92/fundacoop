<?php

use Core\FH; ?>
<form method="post" action="<?=PROOT?>informeCaso/nuevo" id="frm" role="form" class="container" enctype="multipart/form-data">
   <h3 class="mt-3">Datos personales</h3>
   <hr>
   <div class="row mt-3">
      <?= FH::inputBlock('hidden', 'Id', 'id', $this->informe_caso->id, ['class' => 'form-control'], ['class' => 'form-group col-md-12 d-none'], []) ?>

      <?= FH::inputBlock('text', 'Nombres *', 'nombres', $this->datos_personales->nombres, ['class' => 'form-control'], ['class' => 'form-group col-md-3'], []) ?>
      <?= FH::inputBlock('text', 'Apellidos *', 'apellidos', $this->datos_personales->apellidos, ['class' => 'form-control'], ['class' => 'form-group col-md-3'], []) ?>
      <?= FH::selectBlock('Tipo de documento *', 'tipo_doc', $this->datos_personales->tipo_doc, $this->tipo_documento, ['class' => 'form-control', 'placeHolder' => 'seleccione'], ['class' => 'form-group col-md-3'], []) ?>
      <?= FH::inputBlock('number', 'Documento *', 'documento', $this->datos_personales->documento, ['class' => 'form-control'], ['class' => 'form-group col-md-2'], []) ?>
      <?= FH::inputBlock('number', 'Edad *', 'edad', $this->datos_personales->edad, ['class' => 'form-control'], ['class' => 'form-group col-md-1'], []) ?>

      <?= FH::inputBlock('text', 'Correo Electrónico de contacto *', 'correo', $this->datos_personales->correo, ['class' => 'form-control'], ['class' => 'form-group col-md-4'], []) ?>
      <?= FH::inputBlock('text', 'Teléfono de Contacto *', 'telefono', $this->datos_personales->telefono, ['class' => 'form-control'], ['class' => 'form-group col-md-3'], []) ?>
      <?= FH::inputBlock('text', '¿Por cuál medio deseas ser contactado? *', 'medio_contacto', $this->datos_personales->medio_contacto, ['class' => 'form-control','placeholder' =>'Ejemplo: por correo electrónico, telefónicamente, por medio del colegio'], ['class' => 'form-group col-md-5'], []) ?>

      <?= FH::inputBlock('text', 'Nombre del Padre, Madre o Acudiente *', 'nombre_acudiente', $this->datos_personales->nombre_acudiente, ['class' => 'form-control'], ['class' => 'form-group col-md-4'], []) ?>
      <?= FH::inputBlock('text', 'Teléfono de contacto *', 'telefono_acu', $this->datos_personales->telefono_acu, ['class' => 'form-control'], ['class' => 'form-group col-md-3'], []) ?>
      <?= FH::inputBlock('text', 'Correo electrónico *', 'correo_acu', $this->datos_personales->correo_acu, ['class' => 'form-control'], ['class' => 'form-group col-md-5'], []) ?>

      <?= FH::inputBlock('text', 'Institución Educativa donde te encuentras matriculado(a) *', 'colegio', $this->datos_personales->colegio, ['class' => 'form-control'], ['class' => 'form-group col-md-6'], []) ?>
      <?= FH::inputBlock('number', 'Curso *', 'curso', $this->datos_personales->curso, ['class' => 'form-control'], ['class' => 'form-group col-md-2'], []) ?>
      <?= FH::inputBlock('text', 'Nombre del Rector o Persona de Contacto *', 'rector', $this->datos_personales->rector, ['class' => 'form-control'], ['class' => 'form-group col-md-4'], []) ?>
   </div>

   <h3 class="mt-3">Informe del caso</h3>
   <hr>
   <div class="row mt-3">
      <?= FH::selectBlock('Categoría del Caso a Informar *', 'categoria[]', $this->informe_caso->categoria, $this->categorias, ['class' => 'form-control', 'placeHolder' => 'seleccione','multiple'=>'multiple'], ['class' => 'form-group col-md-4'], []) ?>
      <?= FH::selectBlock('Evidencia', 'prueba', $this->informe_caso->prueba, ['Video' => 'Video', 'Audio' => 'Audio', 'Imágenes' => 'Imágenes', 'Textos' => 'Textos'], ['class' => 'form-control', 'placeHolder' => 'seleccione'], ['class' => 'form-group col-md-3'], []) ?>
      <?= FH::inputBlock('file', 'Seleccione archivo', 'archivo[]', '', ['class' => 'form-control','multiple'=>'multiple'], ['class' => 'form-group col-md-5'], []) ?>

      <?= FH::textareaBlock('Relato de los hechos *', 'relato', $this->informe_caso->relato, ['class' => 'form-control'], ['class' => 'form-group col-md-12'], []) ?>
      <div class="col-md-6">
         <?= FH::checkboxBlock('Acepto y he leído los términos de uso y políticas de privacidad *', 'acepta_ter', $this->informe_caso->acepta_ter, ['class' => 'form-check-input'], ['class' => 'form-check ml-3 text-info'], []) ?>
      </div>
   </div>
   <div class="row mt-3 form-group">
      <div class="col-md-2">
         <button type="button" class="btn btn-success btn-block" id="btnGuardar" onClick="guardar();return;">Enviar</button>
      </div>
      <div class="col-md-2 mt-md-0 mt-2">
         <a href="https://www.fundacoop.org/sitio/" class="btn btn-secondary btn-block">Cancelar</a>
      </div>
   </div>
</form>