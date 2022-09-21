<?php

namespace App\Controllers;

use Core\Controller;
use Core\Router;
use App\Models\Usuarios;
use App\Models\Login;
use Core\H;
use Core\Session;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class UsuariosController extends Controller
{

   public function onConstruct()
   {

      $this->view->setLayout('index_admin');
   }

   public function loginAction()
   {

      $loginModel = new Login();
      if ($this->request->isPost()) {
         $loginModel->assign($this->request->get());

         $usuarios = Usuarios::findByUsername($this->request->get('usuario'));
         if ($usuarios && password_verify($this->request->get('password'), $usuarios->password_hash)) {
            $usuarios->login();
            $resp = ['success' => true];
            $this->jsonResponse($resp);
         } else {
            $resp = ['success' => false, 'error' => 'Usuario o contraseña incorrectos o usuario inactivo.'];
            $this->jsonResponse($resp);
         }
      } else {
         if (Usuarios::currentUser())
            Router::redirect('informeCaso/index');
         else {

            $this->view->datos = $loginModel;
            $this->view->setLayout('index');
            $this->view->render('usuarios/login');
         }
      }
   }

   public function logoutAction()
   {
      if (Usuarios::currentUser()) {
         Usuarios::currentUser()->logout();
      }
      Router::redirect('usuarios/login');
   }


   public function indexAction()
   {
      $datos = Usuarios::find(['order' => 'fecha_reg desc']);
      $this->view->datos = $datos;
      $this->view->render('usuarios/index');
   }

   public function nuevoAction()
   {
      $usuario = new Usuarios();

      if ($this->request->isPost()) {
         $usuario = new Usuarios();
         $usuario->assign($this->request->get(), Usuarios::blackList);
         $usuario->back_pass = $this->request->get('password');
         $usuario->acl = '["' . $this->request->get('rol') . '"]';
         if ($usuario->save()) {
            $resp = ['success' => true];
         } else {
            $error = $usuario->getErrorMessages();
            $resp = ['success' => false, 'error' => $error];
         }

         $this->jsonResponse($resp);
      } else {
         $this->view->datos = $usuario;
         $this->view->postAction = PROOT . 'usuarios' . DS . 'nuevo';
         $this->view->displayErrors = $usuario->getErrorMessages();
         $this->view->render('usuarios/crear');
      }
   }

   public function cambiarClaveAction($id)
   {
      $usuario = Usuarios::findById((int)$id);
      if ($this->request->isPost()) {
         $usuario->back_pass = $this->request->get('password');
         $usuario->acl = '["' . $this->request->get('rol') . '"]';
         $respuesta = $usuario->save();
         if ($respuesta)
            $resp = ['success' => true, 'errors' => $usuario->getErrorMessages()];
         else
            $resp = ['success' => false, 'errors' => $usuario->getErrorMessages()];

         $this->jsonResponse($resp);
      } else {
         $this->view->usuario = $usuario;
         $this->view->renderModal('Usuarios/actualizar_clave');
      }
   }

   public function editarAction()
   {
      $id = $this->request->get('id');
      $datos = Usuarios::findById((int) $id);
      if (!$datos) Router::redirect('usuarios');

      if ($this->request->isPost()) {

         $datos->assign($this->request->get());
         //$datos->password = '';
         if ($datos->save())
            $resp = ['success' => true];
         else
            $resp = ['success' => false, 'error' => $datos->getErrorMessages()];

         $this->jsonResponse($resp);
      }
      $this->view->datos = $datos;
      $this->view->renderModal('usuarios/editar');
   }

   public function eliminarAction()
   {
      $id = $this->request->get('id');
      $datos = Usuarios::findById((int) $id);
      if ($datos->estado == 0)
         $datos->update(['estado' => 1]);
      else
         $datos->update(['estado' => 0]);

      $resp = ['success' => true];
      return $this->jsonResponse($resp);
   }

   public function recoverPasswordAction()
   {

      if ($this->request->isPost()) {
         $validateUser = Usuarios::findFirst(['conditions' => "email = ? ", 'bind' => [$this->request->get('email')]]);
         if ($validateUser) {
            $token = md5(uniqid(rand(), true));
            $update = Usuarios::updateToken($validateUser->id, $token);
            if ($update) {

               $correo = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
               <html xmlns="http://www.w3.org/1999/xhtml">
               <head>
               <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
               <title>Notificacion Fundacoop</title>
               <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
               </head>
               <body>
               <h3>Cordial saludo</h3>
               <p style="text-align: justify">Usted ha solicitado un restablecimiento de contraseña del usuario : <b>'.$validateUser->username.'</b></p>
               <p style="text-align: justify">por favor ingrese al siguiente link para cambiar su contraseña: <a href="http://programas.fundacoop.org/Usuarios/changePassword/'.$validateUser->id.'/'.$token.'/">clic aqui</a></p><br>
               <p>Cordialemente,</p><br><br><br>
               <p style="font-size:12px;line-height: normal;"><small>&copy; Fundacoop - 2022</small></p>
               <p style="font-size:12px;line-height: normal;"><small>Cra 31 No. 35 – 12 Edificio Concasa - Tel: (+57) 6328858 ext 122</small></p>
               <p style="font-size:12px;line-height: normal;"><small>Correo: info@fundacoop.org - Whatsapp: 318 271 0233</small></p>
               </body>
               </html>';

               $mail = new PHPMailer(true);
               $mail->SMTPDebug = 0;
               $mail->isSMTP();
               $mail->Host       = SMTP_HOST;
               $mail->SMTPAuth   = true;
               $mail->Username   = SMTP_USERNAME;
               $mail->Password   = SMTP_PASSWORD;
               $mail->SMTPSecure = SMTP_SECURE;
               $mail->Port       = SMTP_PORT;

               $mail->setFrom(SMTP_FROM, SMTP_FROM_NAME);
               $mail->addAddress($this->request->get('email'),'Usuario Fundacoop');

               $mail->Subject = 'Restablecimiento de contraseña Fundacoop';
               $mail->isHTML(true);
               $mail->Body    = $correo;
               $mail->CharSet = 'UTF-8';
               if($mail->send()){
                  $resp = ['success' => true, 'error' => false];
                  return $this->jsonResponse($resp);
               }
            } else {
               $resp = ['success' => false, 'error' => "Ocurrio un error al general el Token, consulte el administrador"];
               return $this->jsonResponse($resp);
            }
         } else {
            $resp = ['success' => false, 'error' => "El correo " . $this->request->get('email') . " no se encuentra registrado en en nuestras base de datos por favor revise"];
            return $this->jsonResponse($resp);
         }
      }



      $this->view->setLayout('index');
      $this->view->render('usuarios/recover');
   }
   public function changePasswordAction($id,$token){         
    
     
      $datos = Usuarios::findById($campo ='id',(int) $id);
      if($datos->password_reset_token == $token){
         $this->view->usuario = $datos;
         $this->view->setLayout('index');
         $this->view->render('usuarios/change_password');
      }else{
         $this->view->usuario = $datos;
         $this->view->setLayout('index');
         $this->view->render('usuarios/error_password');
      }

   }
   public function updatePasswordAction(){

      if ($this->request->isPost()) {
         $password = password_hash($this->request->get('password'), PASSWORD_DEFAULT);
         $auth_key = base64_encode($this->request->get('username'));
         $updatePassword = Usuarios::updatePassword($this->request->get('username'),$password,$auth_key);
         if($updatePassword){
            $resp = ['success' => true, 'error' => false];
            return $this->jsonResponse($resp);
         }else{
            $resp = ['success' => false, 'error' => "Error al actualizar la contraseña"];
            return $this->jsonResponse($resp);
         }
      }

   }         
    
     
         
}
