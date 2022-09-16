<?php

namespace App\Controllers;

use Core\Controller;
use Core\Router;
use Core\H;
use App\Models\InformeCaso;
use App\Models\Programas;
use App\Models\ProgramasClass;
use App\Models\DatosPersonales;
use App\Models\Categorias;
use App\Models\Archivos;
use App\Lib\Utilities\Uploads;
use App\Models\Usuarios;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class ProgramasController extends Controller
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
         $password = password_hash($this->request->get('password'), PASSWORD_DEFAULT);
         $auth_key = base64_encode($this->request->get('documento'));
         $acl = '[&quot;Invitado&quot;]';
         $date = date('Y-m-d H:i:s');        
         $usuarios = Programas::insertUpdateUser($this->request->get('documento'), $this->request->get('email'),$password, $auth_key, $acl,$date);
         if($usuarios){
            $registros =  Programas::insertUpdateRegister($this->request->get('documento'),$this->request->get('nombres'),$this->request->get('apellidos'), $this->request->get('edad'),$this->request->get('email'),$this->request->get('direccion'),$this->request->get('oficina'),$this->request->get('celular'),$this->request->get('genero'),$this->request->get('nivel_escolaridad'),$this->request->get('tipo_doc'),$usuarios,$date);
            if($registros){
               
            $arrayProducts = (implode(",", $_POST["producto_destaca"]));               
            $gestar = new Programas();
            $gestar->registro_id = $registros;
            $gestar->nombre_empresa = $this->request->get('nombre_empresa');
            $gestar->empresa_formal = $this->request->get('empresa_formal');
            $gestar->vision = $this->request->get('vision');
            $gestar->producto_servicio = $this->request->get('producto_servicio');
            $gestar->estado_desarrollo = $this->request->get('estado_desarrollo');
            $gestar->producto_destaca = $arrayProducts;
            $gestar->anios_empresa = $this->request->get('anios_empresa');
            $gestar->personas_empresa = $this->request->get('personas_empresa');
            $gestar->ventas_empresa = $this->request->get('ventas_empresa');
            $gestar->fuentes_financiacion = $this->request->get('fuentes_financiacion');
            $gestar->sector = $this->request->get('sector');
            $gestar->departamento = $this->request->get('departamento');
            $gestar->municipio = $this->request->get('municipio');
            $gestar->estado = 'ENVIADO';
            $gestar->ace_ter= 'SI';
            $gestar->created_at = $date;
            $gestar->updated_at = $date;
            if($gestar->save()){
               $resp = ['success' => true];
               $this->jsonResponse($resp);
            }else{
               $resp = ['success' => false, 'error' => 'Error al Ingresar el Registro'];
             $this->jsonResponse($resp);               
            }
          }else{
            $resp = ['success' => false, 'error' => 'Error al Ingresar el Registro'];
             $this->jsonResponse($resp);
          }

         }else{
            $resp = ['success' => false, 'error' => 'Error al Ingresar el Usuario'];
             $this->jsonResponse($resp);

         }
        
      }
      
      $departamentos= Programas::listarDep();     
      $categorias = Categorias::listarCat();
      $tipo_documento = TIPOS_DOCUMENTO;

      $this->view->departamentos = $departamentos;

      $this->view->tipo_documento = $tipo_documento;
      $this->view->categorias = $categorias;
      $this->view->informe_caso = $informe_caso;
      // $this->view->archivos = $archivos;
      $this->view->datos_personales = $datos_personales;      
      $this->view->render('programas/crear');
   }
   public function nuevoClassAction()
   {
      $informe_caso = new InformeCaso();
      $datos_personales = new DatosPersonales();
      // $archivos = new Archivos();

      if ($this->request->isPost()) {
         $password = password_hash($this->request->get('password'), PASSWORD_DEFAULT);
         $auth_key = base64_encode($this->request->get('documento'));
         $acl = '[&quot;Invitado&quot;]';
         $date = date('Y-m-d H:i:s');        
         $usuarios = ProgramasClass::insertUpdateUser($this->request->get('documento'), $this->request->get('email'),$password, $auth_key, $acl,$date);
         if($usuarios){
            $registros =  ProgramasClass::insertUpdateRegister($this->request->get('documento'),$this->request->get('nombres'),$this->request->get('apellidos'), $this->request->get('edad'),$this->request->get('email'),$this->request->get('direccion'),$this->request->get('oficina'),$this->request->get('celular'),$this->request->get('genero'),$this->request->get('nivel_escolaridad'),$this->request->get('tipo_doc'),$usuarios,$date);
            if($registros){              
                        
            $class = new ProgramasClass();
            $class->registro_id = $registros;
            $class->nombre_entidad = $this->request->get('nombre_entidad');
            $class->cargo = $this->request->get('cargo');           
            $class->titulo_pregrado = $this->request->get('titulo_pregrado');
            $class->titulo_posgrado = $this->request->get('titulo_posgrado');            
            $class->area_conocimiento = $this->request->get('area_conocimiento');            
            $class->departamento = $this->request->get('departamento');
            $class->municipio = $this->request->get('municipio');
            $class->estado = 'ENVIADO';
            $class->ace_ter= 'SI';
            $class->created_at = $date;
            $class->updated_at = $date;
            if($class->save()){
               $resp = ['success' => true];
               $this->jsonResponse($resp);
            }else{
               $resp = ['success' => false, 'error' => 'Error al Ingresar el Registro'];
             $this->jsonResponse($resp);               
            }
          }else{
            $resp = ['success' => false, 'error' => 'Error al Ingresar el Registro'];
             $this->jsonResponse($resp);
          }

         }else{
            $resp = ['success' => false, 'error' => 'Error al Ingresar el Usuario'];
             $this->jsonResponse($resp);

         }
        
      }
      
      $departamentos= Programas::listarDep();     
      $categorias = Categorias::listarCat();
      $tipo_documento = TIPOS_DOCUMENTO;

      $this->view->departamentos = $departamentos;

      $this->view->tipo_documento = $tipo_documento;
      $this->view->categorias = $categorias;
      $this->view->informe_caso = $informe_caso;
      // $this->view->archivos = $archivos;
      $this->view->datos_personales = $datos_personales;      
      $this->view->render('programas/crear_class');
   }
   
   public function nuevoVidaAction()
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
      
      $departamentos= Programas::listarDep();     
      $categorias = Categorias::listarCat();
      $tipo_documento = TIPOS_DOCUMENTO;

      $this->view->departamentos = $departamentos;

      $this->view->tipo_documento = $tipo_documento;
      $this->view->categorias = $categorias;
      $this->view->informe_caso = $informe_caso;
      // $this->view->archivos = $archivos;
      $this->view->datos_personales = $datos_personales;      
      $this->view->render('programas/crear_vida');
   }
   
   public function indexAction()
   {
      $datos = InformeCaso::listar();
      $this->view->datos = $datos;
      $this->view->render('informe_caso/index');
   }

   public function validarAction(){
      if ($this->request->isPost()) {
          $validar = Programas::validarDoc($this->request->get('documento'));
          if($validar){
            $resp = ['success' => true, 'datos'=>$validar];
            $this->jsonResponse($resp);

          }else{
            $resp = ['success' => false];
          }
         // $resp = ['success' => $this->request->get('documento') ];
         //    $this->jsonResponse($resp);

      }

   }

   public function validarMunAction(){
      if ($this->request->isPost()) {
          $validar = Programas::validarMun($this->request->get('codigo'));
          if($validar){
            $resp = ['success' => true, 'datos'=>$validar];
            $this->jsonResponse($resp);

          }else{
            $resp = ['success' => false];
          }
         // $resp = ['success' => $this->request->get('documento') ];
         //    $this->jsonResponse($resp);

      }

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
