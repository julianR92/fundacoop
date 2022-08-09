<?php

namespace App\Models;

use Core\Model;
use Core\Validators\RequiredValidator;
use Core\H;
use Core\DB;

class Categorias extends Model
{

   public $id, $categoria;

   protected static $_table = 'categorias';

   const blackList = ['id'];

   public static function listarCat()
   {
      $cat = self::find(['order' => 'categoria']);
      $array = [];
      foreach ($cat as $cat) {
         $array[$cat->categoria] = $cat->categoria;
      }
      return $array;
   }
}
