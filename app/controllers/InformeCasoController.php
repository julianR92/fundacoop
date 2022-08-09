<?php

namespace App\Controllers;

use Core\Controller;
use Core\Router;
use Core\H;
use App\Models\InformeCaso;
use App\Models\DatosPersonales;
use App\Models\Categorias;
use App\Models\Archivos;
use App\Lib\Utilities\Uploads;
use App\Models\Usuarios;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class InformeCasoController extends Controller
{
   public function onConstruct()
   {
      $this->view->setLayout('index');

   }

   public function nuevoAction()
   {
      $informe_caso = new InformeCaso();
      $datos_personales = new DatosPersonales();
      // $archivos = new Archivos();

      if ($this->request->isPost()) {
         $datos_personales->assign($this->request->get(), DatosPersonales::blackList);
         $informe_caso->assign($this->request->get(), InformeCaso::blackList);

         $datos_personales->fecha_reg = date('Y-m-d H:i:s');
         if ($datos_personales->save()) {
            $informe_caso->datos_id = $datos_personales->id;
            $informe_caso->fecha_reg = date('Y-m-d H:i:s');
            $informe_caso->estado = 'PENDIENTE';
            $categoria = '';
            
            foreach ($_POST["categoria"] as $cat) {
               $categoria .= $cat . ', ';
            }
            
            $categoria = substr_replace($categoria, "", -2);
            $informe_caso->categoria = $categoria;
            $informe_caso->save();

            $files = $_FILES['archivo'];
            $adjuntos = false;
            
            if ($files['tmp_name'][0] == '') {
               $adjuntos = false;
            } else {
            
               $uploads = new Uploads($files);
               $uploads->runValidation();
               $imagesErrors = $uploads->validates();
            
               if (is_array($imagesErrors)) {
                  $msg = "";
                  foreach ($imagesErrors as $name => $message) {
                     $msg .= $message . " ";
                  }
                  $informe_caso->addErrorMessage('archivo', trim($msg));
               }
               $adjuntos = true;
            }
            
            if ($adjuntos) {
               Archivos::uploadDocumentos($informe_caso->id, $uploads);
            }
            
            $mail = new PHPMailer(true);
            $mail->SMTPDebug = 0;  
            $mail->isSMTP();                        
            $mail->Host       = SMTP_HOST;        
            $mail->SMTPAuth   = true;             
            $mail->Username   = SMTP_USERNAME; 
            $mail->Password   = SMTP_PASSWORD;        
            $mail->SMTPSecure = SMTP_SECURE;     
            $mail->Port       = SMTP_PORT;

            $mail->setFrom(SMTP_FROM, SMTP_FROM_NAME  );
            $mail->addAddress(SMTP_FROM);

            $mail->Subject = 'Nueva solicitud radicada';
            $mail->isHTML(true);
            $mail->Body    = 'Se ha recibido un nuevo caso No: ' . $informe_caso->id . ', por favor revisar en la plataforma CREO para realizar revisión y gestión del caso.';
            $mail->send();
            
            
            $resp = ['success' => true];
            $this->jsonResponse($resp);
         }else{
            $resp = ['success' => false, 'error' => $datos_personales->getErrorMessages()];
            $this->jsonResponse($resp);
         }
      }

      $categorias = Categorias::listarCat();
      $tipo_documento = TIPOS_DOCUMENTO;

      $this->view->tipo_documento = $tipo_documento;
      $this->view->categorias = $categorias;
      $this->view->informe_caso = $informe_caso;
      // $this->view->archivos = $archivos;
      $this->view->datos_personales = $datos_personales;
      $this->view->render('informe_caso/crear');
   }
   
   public function indexAction()
   {
      $datos = InformeCaso::listar();
      $this->view->datos = $datos;
      $this->view->render('informe_caso/index');
   }

   public function editarAction()
   {
      $id = $this->request->get('id');
      $datos = InformeCaso::findById('id', (int) $id);
      if (!$datos) Router::redirect('informeCaso');

      if ($this->request->isPost()) {
        $this->currentUser = Usuarios::currentUser();
        
         $datos->assign($this->request->get());
         $datos->fecha_gestion=date('Y-m-d');
         $datos->usuario_gestiona=$this->currentUser->id;
         $datos->save();
         if ($datos->save())
            $resp = ['success' => true, 'error' => $datos->getErrorMessages()];
         else
            $resp = ['success' => false, 'error' => $datos->getErrorMessages()];

         $this->jsonResponse($resp);
      }

      $this->view->datos = $datos;
      $this->view->renderModal('informe_caso/editar');
   }
}
