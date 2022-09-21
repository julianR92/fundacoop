<?php

namespace App\Models;

use App\Models\UserSessions;
use Core\Validators\RequiredValidator;
use Core\Validators\MatchesValidator;
use Core\Validators\UniqueValidator;
use Core\Model;
use Core\Session;
use Core\Cookie;
use Core\DB;
use Core\H;



class Usuarios extends Model

{
   protected static $_table = 'user';

   public static $currentLoggedInUser = null;
   public $id, $username, $auth_key, $password_hash, $email, $rol_id, $estado, $acl;

   const blackList = ['id', 'username', 'documento', 'password'];

   public function beforeSave()
   {
      if ($this->isNew()) {
         $this->password = password_hash($this->password, PASSWORD_DEFAULT);
         $this->cambiar_pass = 1;
         $this->estado = 1;
         $this->fecha_reg = $this->timeStamps();
      } else {
         if($this->password!='')
            $this->password = password_hash($this->password, PASSWORD_DEFAULT);
         
         $this->fecha_act = $this->timeStamps();
      }
   }

   public static function findByUsername($UserName)
   {
      return self::findFirst(['conditions' => "username = ? ", 'bind' => [$UserName]]);
   }

   public static function currentUser()
   {
      if (!isset(self::$currentLoggedInUser) && Session::exists(CURRENT_USER_SESSION_NAME)) {
         self::$currentLoggedInUser = self::findFirst(
            [
               'conditions' => ['username = ?'],
               'bind' => [Session::get(CURRENT_USER_SESSION_NAME)]
            ]
         );
      }
      return self::$currentLoggedInUser;
   }


   public function login()
   {
      Session::set(CURRENT_USER_SESSION_NAME, $this->username);
   }

   public function logout()
   {
      Session::delete(CURRENT_USER_SESSION_NAME);
      if (Cookie::exists(REMEMBER_ME_COOKIE_NAME)) {
         Cookie::delete(REMEMBER_ME_COOKIE_NAME);
      }
      self::$currentLoggedInUser = null;
      return true;
   }

   public function acls()
   {
      if (empty($this->acl)) return [];
      return json_decode($this->acl, true);
   }

   public static function updateToken($id, $token){
    
      $sql = "UPDATE user SET password_reset_token = '{$token}' WHERE id = {$id}";
      $db = DB::getInstance();
      if ($db->query($sql)->count() > 0) {
         return true;
      } else {
         return false;
      }

   }
   public static function updatePassword($username, $password,$auth_key){
       
      $date = date('Y-m-d H:i:s');
      $sql = "UPDATE user SET password_reset_token = '' , 
                              password_hash = '{$password}',
                              auth_key = '{$auth_key}',
                              updated_at = '{$date}'
                               WHERE username = '{$username}'";
    
      $db = DB::getInstance();
      if ($db->query($sql)->count() > 0) {
         return true;
      } else {
         return false;
      }

   }


   // public static function validarUsuario($usuario)
   // {
   //    $sql = "SELECT id,documento,nombre,programa,usuario 
   //    FROM usuarios AS usu
   //    WHERE usuario='{$usuario}'";
   //    $db = DB::getInstance();

   //    if ($db->query($sql)->count() > 0) {

   //       return $db->query($sql, [], 'App\Models\Users')->results()[0];
   //    } else

   //       return false;
   // }
}
