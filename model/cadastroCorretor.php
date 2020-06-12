<?php
require_once("banco.php");

class Cadastro extends Banco {

    private $nome;
    private $tipo_seg;
    private $estado;
    private $empresa;
    private $numero;
    private $email;

    //Metodos Set
    public function setNome($string){
        $this->nome = $string;
    }
    public function setTipo_seg($string){
        $this->tipo_seg = $string;
    }
    public function setEstado($string){
        $this->estado = $string;
    }
    public function setEmpresa($string){
        $this->empresa = $string;
    }
    public function setNumero($string){
        $this->numero = $string;
    }
    public function setEmail($string){
        $this->email = $string;
    }
    //Metodos Get
    public function getNome(){
        return $this->nome;
    }
    public function getTipo_seg(){
        return $this->tipo_seg;
    }
    public function getEstado(){
        return $this->estado;
    }
    public function getEmpresa(){
        return $this->empresa;
    }
    public function getNumero(){
        return $this->numero;
    }
    public function getEmail(){
        return $this->email;
    }


    public function incluir(){
        return $this->setLivro($this->getNome(),$this->getTipo_seg(),$this->getEstado(),$this->getEmpresa(),$this->getEmail());
    }
}
?>