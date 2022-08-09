<?php

namespace App\Models;

use Core\Model;
use Core\Validators\RequiredValidator;
use Core\Validators\UniqueValidator;
use Core\H;
use Core\DB;

class Archivos extends Model
{

   public $id, $caso_id, $nombre_archivo,$ruta;

   protected static $_table = 'archivos';

   const blackList = ['id'];

   public static function uploadDocumentos($caso_id, $uploads)
   {
      $path = 'documentos' . DS . $caso_id . DS;
      foreach ($uploads->getFiles() as $file) {
         $parts = explode('.', $file['name']);
         $ext = end($parts);
         $uploadName = $caso_id.'-'.sha1(time()). '.' . $ext;
         $image = new self();
         $image->caso_id = $caso_id;
         $image->nombre_archivo = $caso_id.'-'.sha1(time());
         $image->ruta = $path.$uploadName;
         if ($image->save()) {
            $uploads->upload($path, $uploadName, $file['tmp_name']);
         }
      }
   }
}
