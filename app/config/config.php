<?php
/*
Configuración general del framework
Constantes
*/

//DIRECTORIO RAIZ DEL FRAMEWORK

define('APPROOT',dirname(dirname(__FILE__)));
//echo APPROOT;

//URL DE LA APP
define('URLROOT','http://localhost/cursophp/mvc/');

//NOMBRE DE LA APP
define('SITENAME','MICROFRAMEWORK MVC');

//CREDENCIALES PARA LA BAsE DE DATOS
define('DB_HOST','localhost'); //Ojo: cambiar el valor en el deploy(la nube)
define('DB_USER','root');       //usuario de la DB
define('DB_PASSORD','');           //Password de la DB
define('DB_NAME','hospisoftt');           //Nombre de la BD en uso


