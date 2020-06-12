<?php
    require_once("../model/banco.php");
    $path = explode('/', $_GET['path']);
    $method === $_SERVER['REQUEST_METHOD'];
    class listarController{

    private $lista;

    

    public function __construct(){
        $this->lista = new Banco();
        $this->listar();
    }

    private function listar(){
        if($method === 'GET'){
        $row = $this->lista->getCorretor();
        }
    }
}
