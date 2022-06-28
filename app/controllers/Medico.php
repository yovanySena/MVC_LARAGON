<?php

class Medico extends Controller
{
    private $MedicoModel;
    public function __construct()
    {
        $this->MedicoModel = $this->getModel('MedicoModel');
    }
    
    public function index()
    {
        $data = $this->MedicoModel->listarMedicos(); //Temporal porque no hay data
        $this->getView('MedicoView',$data);
    }

    public function generarFormula(){
        echo 'Este es el método Generar Fórmula del médico';
    }

    public function otroMetodo(){
        echo 'Este es otro médico del médico';
    }
}