<?php
/*
Clase base que arma las rutas abreviadas del MVC
controlador/metodo/parametro 
Ejemplo) medico/crearFormulaMedica/$id
*/

class Core{
    //Setear los controladores, métodos y parámetros iniciales del mvc
    protected $defautController = 'Inicio';
    protected $defaultMethod = 'index';
    protected $parameters = [];
   public function __construct()
   {
        $url = $this->getUrl();  //Construye la clase y setea la URL del MVC
        //1.0 Verificamos si existe el controlador y lo invacamos 
        if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
            $this->defautController = ucwords($url[0]); //Seteamos como controlador el invocado en la url
            unset($url[0]);
        }
    //invocamos el controlador
    require_once '../app/controllers/' . $this->defautController . '.php';
    $this->defautController = new $this->defautController;

        //2.0 invocamos el método correspondiente

        if (isset($url[1])){
            if(method_exists($this->defautController,$url[1])){
                $this->defaultMethod = $url[1];
                unset($url[1]);
            }
        }

        //3.0 obtenemos los parametros que pasamos por la url
        $this->parameters = $url ? array_values($url) : []; //Si existen parámetros los extrae del arreglo
        call_user_func_array([$this->defautController,$this->defaultMethod], $this->parameters); //Asigna los parámetros usando función callback


    
   } 

   /*
   * Toma la ruta de la URL la vuelve un arreglo
   * y posteriormente en una ruta abreviada
   * @return
   */
   public function getUrl()
   {
        $url = ""; //Para almacenar la rutaabreviada
        if (isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/'); //separa la variable por BackSlash
            $url = filter_var($url, FILTER_SANITIZE_URL); //Sanitiza la ruta para asegurarse de que sea una URL
            $url = explode('/', $url); //Crea un arreglo con el value
            return $url;
        }
        return ['Inicio'];

   }
}