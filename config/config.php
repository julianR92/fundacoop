<?php

define('DEBUG', true);

// define('DB_NAME', 'fundacoo_ecard'); // base de datos
// define('DB_USER', 'fundacoo_ecard');    // usuario
// define('DB_PASSWORD', 'G3rman30*-');    // password
// define('DB_HOST', '127.0.0.1'); // hosting

define('DB_NAME', 'fundacoop'); // base de datos
define('DB_USER', 'root');    // usuario
define('DB_PASSWORD', '');    // password
define('DB_HOST', '127.0.0.1'); // hosting

define('DEFAULT_CONTROLLER', 'Home');
define('DEFAULT_LAYOUT', 'index');

define('PROOT', '/');
define('VERSION', '0.1');
define('LOGO', 'http://localhost/escolar_creo/');


define('SITE_TITLE', 'Caso escolar Creo');
define('MENU_BRAND', 'Caso escolar Creo');

define('CURRENT_USER_SESSION_NAME', 'escolarkwXeusqldkiIKjehsLQZJFKJ');
define('REMEMBER_ME_COOKIE_NAME', 'escolarAJEI6382LSJVlkdjfh3801jvD');
define('REMEMBER_ME_COOKIE_EXPIRY', 2592000);

define('ACCESS_RESTRICTED', 'Restricted');

define(
   'TIPOS_DOCUMENTO',
   [
      'Registro Civil' => 'Registro Civil',
      'Tarjeta de Identidad' => 'Tarjeta de Identidad',
      'Cédula de Ciudadanía' => 'Cédula de Ciudadanía',
      'Nit' => 'Nit',
      'Cédula Extranjera' => 'Cédula Extranjera',
      'Pasaporte' => 'Pasaporte'
   ]
);

define("SMTP_HOST", "mail.fundacoop.org");
define('SMTP_PORT', 587);
define('SMTP_SECURE', 'tls');
define("SMTP_USERNAME", "creo@fundacoop.org");
define("SMTP_PASSWORD", "Informacion30*");
define("SMTP_FROM", "creo@fundacoop.org");
define("SMTP_FROM_NAME", utf8_decode("Sistema de Información Escolar"));