<?php

class Medico extends Controller
{
    public function __construct()
    {
        
    }
    
    public function index()
    {
        $data = []; //Temporal porque no hay data
        $this->getView('MedicoView',$data);
    }

    public function generarFormula(){
        echo 'Este es el método Generar Fórmula del médico';
    }

    public function otroMetodo(){
        echo 'Este es otro médico del médico';
    }
}