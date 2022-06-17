<?php
/*
Clase base controlador del MVC
*/

class Controller{
    //Cargar el modelo correspondiente

    public function getModel($model){
        require_once '../app/models/' . $model . '.php';
        //instanciamos la clase modelo
        return new $model();
    }

    //Cargamos la vista correspondiente

    public function getView($view,$data=[]){
        if(file_exists('../app/views/' . $view . '.php')){
            require_once '../app/views/' . $view . '.php';
        }
        else{
            die('No existe la vista invocada!!');
        }
    }
}