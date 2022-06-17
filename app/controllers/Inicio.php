<?php

class Inicio extends Controller
{
    public function __construct()
    {
        
    }

    public function index()
    {
        $data = []; //Temporal porque no hay data
        $this->getView('Inicio',$data);
    }
}