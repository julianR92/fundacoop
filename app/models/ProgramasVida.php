<?php

namespace App\Models;

use Core\Model;
use App\Models\Categorias;
use Core\Validators\RequiredValidator;
use Core\Validators\UniqueValidator;
use Core\H;
use Core\DB;

class ProgramasVida extends Model
{

   public $id, $registro_id, $ruta_documento,$estado,$ace_ter,$created_at,$updated_at;


   protected static $_table = 'programa_vida';

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
   public static function validarMun($codigo){
      $sql = "SELECT codigo_muni,municipio,codigo_depto FROM municipio WHERE codigo_depto = '{$codigo}'";
      $db = DB::getInstance();
      if ($db->query($sql)->count() > 0)
         return $db->query($sql)->results();
      else
         return [];
   

   }

   public static function listarDep(){
      $sql = "SELECT * FROM departamento";
      $db = DB::getInstance(); 
      $array = [];        
      if ($db->query($sql)->count() > 0){
        $data =  $db->query($sql)->results();
      foreach ($data as $dep) {
         $array[$dep->codigo_depto] = $dep->departamento;
      }     
      return $array;
      }
      else{
         return [];
      }
   }

   public static function insertUpdateUser($user,$email,$password,$auth_key,$acl,$date){

    $sql = "INSERT INTO user(username,auth_key,password_hash,email,rol_id,estado,created_at,updated_at,acl) 
    VALUES ('{$user}','{$auth_key}','{$password}','{$email}',2,1,'{$date}','{$date}', '{$acl}') 
    ON DUPLICATE KEY UPDATE
    id = LAST_INSERT_ID(id),
    email = '{$email}',
    password_hash = '{$password}',
    updated_at='{$date}'";
   //  H::dnd($sql);
   $db = DB::getInstance();
   $db->query($sql);
   return $db->query($sql)->lastID();
     /*
   
   $db = DB::getInstance();
      if ($db->query($sql)->count() > 0){
          return $db->query($sql)->lastID();
         
      }else{
         return [];
      }
*/

   }

   public static function insertUpdateRegister($documento,$nombres,$apellidos,$edad,$email,$direccion,$oficina,$celular,$genero,$nivel_escolaridad,$tipo_doc,$user_id,$date){

      $sql = "INSERT INTO registro(nombres,apellidos,edad,direccion,email,celular, oficina,genero, nivel_escolaridad, fecha_registro, tipo_doc, documento, user_id,activo) VALUES ('{$nombres}','{$apellidos}','{$edad}','{$direccion}','{$email}','{$celular}','{$oficina}','{$genero}','{$nivel_escolaridad}','{$date}','{$tipo_doc}','{$documento}',$user_id,1)
      ON DUPLICATE KEY UPDATE
      id = LAST_INSERT_ID(id),
      nombres = '{$nombres}',
      apellidos = '{$apellidos}',
      edad = '{$edad}',
      direccion = '{$direccion}',
      email = '{$email}',
      celular = '{$celular}',
      oficina = '{$oficina}',
      genero = '{$genero}',
      nivel_escolaridad = '{$nivel_escolaridad}',
      tipo_doc = '{$tipo_doc}'";

      $db = DB::getInstance();
      $db->query($sql);
      return $db->query($sql)->lastID();
/*
      $db = DB::getInstance();
      if ($db->query($sql)->count() > 0){
         return $db->query($sql)->lastID();
         
      }else{
         return [];
}
*/
   }
 
         
}
