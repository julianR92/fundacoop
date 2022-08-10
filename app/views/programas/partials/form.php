<?php

use Core\FH; ?>
<form method="post" action="<?=PROOT?>informeCaso/nuevo" id="frm" role="form" class="container" enctype="multipart/form-data">
   
   <h2 class="mt-3">Inscripción Programa Gestor</h2>
   <hr>
   <h3 class="mt-3">Datos personales</h3>
   <hr>
   <div class="row mt-3">
      <?= FH::inputBlock('hidden', 'Id', 'id', $this->informe_caso->id, ['class' => 'form-control'], ['class' => 'form-group col-md-12 d-none'], []) ?>

      <?= FH::selectBlock('<b>Tipo de  documento *</b>', 'tipo_doc', $this->datos_personales->tipo_doc, $this->tipo_documento, ['class' => 'form-control', 'placeHolder' => 'seleccione'], ['class' => 'form-group col-md-3'], []) ?>
      <?= FH::inputBlock('number', '<b>Documento *</b>', 'documento', $this->datos_personales->documento, ['class' => 'form-control', 'onchange'=>'validarDoc()'], ['class' => 'form-group col-md-3'], []) ?>
      <?= FH::inputBlock('text', '<b>Nombres</b> *', 'nombres', $this->datos_personales->nombres, ['class' => 'form-control'], ['class' => 'form-group col-md-3'], []) ?>
      <?= FH::inputBlock('text', '<b>Apellidos *</b>', 'apellidos', $this->datos_personales->apellidos, ['class' => 'form-control'], ['class' => 'form-group col-md-3'], []) ?>
       <?= FH::inputBlock('date', '<b> Fecha de Nacimiento *</b>', 'edad', $this->datos_personales->edad, ['class' => 'form-control'], ['class' => 'form-group col-md-3'], []) ?>
       <?= FH::inputBlock('email', '<b>Correo Electrónico*</b>', 'email', $this->datos_personales->correo, ['class' => 'form-control'], ['class' => 'form-group col-md-3'], []) ?>
       <?= FH::inputBlock('text', '<b>Direccion*</b>', 'direccion', $this->datos_personales->telefono, ['class' => 'form-control'], ['class' => 'form-group col-md-6'], []) ?>
       <?= FH::selectBlock('<b>Si es asociado a Cooprofesores, Escoja</b>', 'oficina', $this->informe_caso->prueba, ['AGUACHICA' => 'AGUACHICA', 'BARBOSA' => 'BARBOSA', 'BARRANCABERMEJA' => 'BARRANCABERMEJA', 'BUCARAMANGA CHICAMOCHA' => 'BUCARAMANGA CHICAMOCHA', 'MÁLAGA'=>'MÁLAGA','PIEDECUESTA'=>'PIEDECUESTA', 'SAN GIL'=>'SAN GIL', 'SOATÁ'=>'SOATÁ', 'VALLEDUPAR'=>'VALLEDUPAR', 'NO SOY ASOCIADO'=>'NO SOY ASOCIADO'], ['class' => 'form-control', 'placeHolder' => 'seleccione'], ['class' => 'form-group col-md-6'], []) ?>
       <?= FH::inputBlock('number', '<b>Celular*</b>', 'celular', $this->datos_personales->medio_contacto, ['class' => 'form-control','placeholder' =>''], ['class' => 'form-group col-md-3'], []) ?>
       <?= FH::selectBlock('<b>Genero*</b>', 'genero', $this->informe_caso->prueba, ['Masculino' => 'Masculino', 'Femenino' => 'Femenino', 'Otro' => 'Otro'], ['class' => 'form-control', 'placeHolder' => 'seleccione'], ['class' => 'form-group col-md-3'], []) ?>
       <?= FH::selectBlock('<b>Nivel de escolaridad*</b>', 'nivel_escolaridad', $this->informe_caso->prueba, ['Educacion Inicial' => 'Educacion Inicial', 'Educacion Preescolar' => 'Educacion Preescolar', 'Educacion Basica' => 'Educacion Basica', 'Educacion Media'=>'Educacion Media', 'Educacion Superior' =>'Educacion Superior'], ['class' => 'form-control', 'placeHolder' => 'seleccione'], ['class' => 'form-group col-md-3'], []) ?>

      <?= FH::inputBlock('password', '<b>Contraseña *</b>', 'password', $this->datos_personales->nombre_acudiente, ['class' => 'form-control'], ['class' => 'form-group col-md-4'], []) ?>
      <?= FH::inputBlock('password', '<b>Digite nuevamente la contraseña*</b>', 'password_confirmation', $this->datos_personales->telefono_acu, ['class' => 'form-control'], ['class' => 'form-group col-md-4'], []) ?>
      
      <!-- <?= FH::inputBlock('text', 'Institución Educativa donde te encuentras matriculado(a) *', 'colegio', $this->datos_personales->colegio, ['class' => 'form-control'], ['class' => 'form-group col-md-6'], []) ?>
      <?= FH::inputBlock('number', 'Curso *', 'curso', $this->datos_personales->curso, ['class' => 'form-control'], ['class' => 'form-group col-md-2'], []) ?> -->
      <!-- <?= FH::inputBlock('text', 'Nombre del Rector o Persona de Contacto *', 'rector', $this->datos_personales->rector, ['class' => 'form-control'], ['class' => 'form-group col-md-4'], []) ?> -->
   </div>
   
   <h3 class="mt-3">Datos Específicos del Programa</h3>
   <hr>
   <div class="row mt-3">
      <?= FH::inputBlock('text', '<b>Nombre de la Empresa *</b>', 'nombre_empresa', $this->datos_personales->correo_acu, ['class' => 'form-control'], ['class' => 'form-group col-md-4'], []) ?>
      <?= FH::selectBlock('<b>¿ Su empresa esta creada formalmente? *</b>', 'empresa_formal', $this->informe_caso->prueba, ['SI' => 'SI', 'NO' => 'NO'], ['class' => 'form-control', 'placeholder' => 'seleccione'], ['class' => 'form-group col-md-4'], []) ?>
      <?= FH::selectBlock('<b>Vision de la empresa o negocio *</b>', 'vision', $this->informe_caso->prueba, ['Que en corto tiempo cubra un mercado local' => 'Que en corto tiempo cubra un mercado local', 'Que en corto tiempo cubra un mercado nacional' => 'Que en corto tiempo cubra un mercado nacional'], ['class' => 'form-control', 'placeholder' => 'seleccione'], ['class' => 'form-group col-md-4'], []) ?>
      <?= FH::inputBlock('text', '<b>Nombre del producto o servicio *</b>', 'producto_servicio', $this->datos_personales->correo_acu, ['class' => 'form-control'], ['class' => 'form-group col-md-4'], []) ?>

      <?= FH::selectBlock('<b> Estados del producto o servicio*</b>', 'estado_desarrollo', $this->informe_caso->prueba, ['Es una idea' => 'Es una idea', 'Se encuentra en desarrollo' => 'Se encuentra en desarrollo','Está listo para comercializar'=>'Está listo para comercializar'], ['class' => 'form-control', 'placeholder' => 'seleccione'], ['class' => 'form-group col-md-4'], []) ?>   
      
      <?= FH::selectBlock('<b>El producto o servicio se destaca por:*</b>', 'producto_destaca[]', $this->informe_caso->categoria, ['Novedad'=>'Novedad', 'Calidad'=> 'Calidad', 'Precio'=>'Precio', 'Marca'=>'Marca', 'Diseño'=>'Diseño'], ['class' => 'form-control', 'placeHolder' => 'seleccione','multiple'=>'multiple'], ['class' => 'form-group col-md-4'], []) ?>
      
      <?= FH::inputBlock('number', '<b>Años de operacion de la empresa</b>', 'anios_empresa', $this->datos_personales->medio_contacto, ['class' => 'form-control','placeholder' =>'Ejemplo : 15'], ['class' => 'form-group col-md-4'], []) ?>
      
      <?= FH::inputBlock('number', '<b>¿Cuántas personas trabajan en la empresa?</b>', 'personas_empresa', $this->datos_personales->medio_contacto, ['class' => 'form-control','placeholder' =>'Ejemplo : 30'], ['class' => 'form-group col-md-4'], []) ?>
      
      <?= FH::inputBlock('text', '<b>Ventas en el ultimo año</b>', 'ventas_empresa', $this->datos_personales->medio_contacto, ['class' => 'form-control','placeholder' =>'Ejemplo : 100.000.000', 'onchange'=>'moneyFormat()','onkeypress'=>'return Numeros(event)'], ['class' => 'form-group col-md-4'], []) ?>

      <?= FH::selectBlock('<b>Sus fuentes de Financiacion son:*</b>', 'fuentes_financiacion', $this->informe_caso->categoria, ['Recursos propios'=>'Recursos propios', 'Familia y/o amigos'=> 'Familia y/o amigos', 'Recursos públicos'=>'Recursos públicos', 'Crédito bancario'=>'Crédito bancario'], ['class' => 'form-control', 'placeHolder' => 'seleccione'], ['class' => 'form-group col-md-4'], []) ?>

      <?= FH::selectBlock('<b>Sector:*</b>', 'sector', $this->informe_caso->categoria, ['Arte'=>'Arte', 'Transporte  '=> 'Transporte', 'Alimentación'=>'Alimentación', 'Campo'=>'Campo', 'Comercio'=>'Comercio','Construcción'=>'Construcción', 'Educación'=>'Educación', 'Hotelería'=>'Hotelería', 'Ingeniería'=>'Ingeniería ', 'Salud'=>'Salud', 'Tecnología'=>'Tecnología'], ['class' => 'form-control', 'placeHolder' => 'seleccione'], ['class' => 'form-group col-md-4'], []) ?>
        
      

      <?= FH::selectBlock('<b>Departamento *</b>', 'departamento', $this->datos_personales->tipo_doc, $this->departamentos, ['class' => 'form-control', 'placeHolder' => 'seleccione', 'onchange' => 'fillMun()'], ['class' => 'form-group col-md-4'], []) ?>

      <?= FH::selectBlock('<b>Municipio *</b>', 'municipio', $this->datos_personales->tipo_doc,[], ['class' => 'form-control', 'placeHolder' => 'seleccione'], ['class' => 'form-group col-md-4'], []) ?>    
      
    
      <div class="col-md-6 pt-4">
         <?= FH::checkboxBlock('Acepto y he leído los términos y condiciones de uso y políticas de privacidad. Al registrarme autorizo el uso de mis datos personales para fines relacionados con el objeto social de Fundacoop *', 'acepta_ter', $this->informe_caso->acepta_ter, ['class' => 'form-check-input'], ['class' => 'form-check ml-3 text-info'], []) ?>
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