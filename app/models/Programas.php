<?php

namespace App\Models;

use Core\Model;
use App\Models\Categorias;
use Core\Validators\RequiredValidator;
use Core\Validators\UniqueValidator;
use Core\H;
use Core\DB;

class Programas extends Model
{

   public $id, $datos_id, $categoria,$prueba,$relato,$acepta_ter,$fecha_reg,$usuario_gestiona,$fecha_gestion,$observacion,$estado;

   protected static $_table = 'informe_caso';

   const blackList = ['id'];
   
   public static function listar()
   {
      $sql = "SELECT t1.id,tipo_doc,documento,CONCAT(nombres,' ',apellidos) as nombre,edad,correo,telefono,medio_contacto,nombre_acudiente,telefono_acu,correo_acu,colegio,curso,rector,categoria,relato,estado,fecha_gestion ,ruta,observacion

FROM `datos_personales` as t1 INNER JOIN informe_caso as t2 on t1.id=t2.datos_id inner join archivos as t3 on t3.caso_id=t2.id order by t2.id desc
";

      $db = DB::getInstance();
      if ($db->query($sql)->count() > 0)
         return $db->query($sql)->results();
      else
         return [];
   }

   public static function validarDoc($documento){
      $sql = "SELECT r.nombres,r.apellidos, r.edad, r.direccion,r.email, r.celular, r.oficina, r.genero, r.nivel_escolaridad FROM registro as r INNER JOIN user as u ON r.user_id=u.id WHERE r.documento = '{$documento}'";

      $db = DB::getInstance();
      if ($db->query($sql)->count() > 0)
         return $db->query($sql)->results();
      else
         return [];
   

   }
}
