<?php

namespace App\Models;

use Core\Model;
use Core\Validators\RequiredValidator;
use Core\Validators\UniqueValidator;
use Core\DB;
use Core\H;

class DatosPersonales extends Model

{
   public $id, $tipo_doc, $documento, $nombres,$apellidos,$edad,$telefono, $correo,$medio_contacto,$nombre_acudiente,$telefono_acu,$correo_acu,$colegio,$curso,$rector,$fecha_reg;

   protected static $_table = 'datos_personales';

   const blackList = ['id'];
}
