<?php

/*
Clase base para manipular el gestor de base de datos
ORM Básico
*/

class Dbase
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $password = DB_PASSORD;
    private $bdatos = DB_NAME;

    //Variables para la consulta

    private $dbh; //Para almacenar la conexión
    private $stmt; //Para los resultados de los  querys
    private $error; //Para los errores

    //hacemos la conexión
    public function __construct()
    {
        //FIXME: Agregar opciones de mysql
        //$dns : Almacena la ruta
        $dsn = "mysql:host=".$this->host.";dbname=".$this->bdatos;
        try{
            $this->dbh = new PDO($dsn,$this->user,$this->password);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo "Se ha generado un error en la conexión: ".$this->error;
        }    
    }

    //Método para parametrizar la consulta

    //Procesar las consultas y aplicar el prepare
    //Le deben llegar tres parametros a la consulta:
    //El parámetro, el valor adjunto y el tipo de parámetro
    //@return parámetro
    public function bind($parameter,$value,$type=null){
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;

            }
        }
    }

    public function query($sql){
        $this->stmt = $this->dbh->prepare($sql);
    }

    //Ejecuta la consulta
    public function execute()
    {
        return $this->stmt->execute();
    }

    //Ejecuta la consulta y devuelve arreglo de objetos
    public function getAll(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //Ejecuta la consulta y devuelve una fila del arreglo
    public function getOne(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    //Para la paginación se necesita contar el número de registros de la consulta

    public function rowCount(){
        $this->execute();
        return $this->stmt->rowCount();
    }
}