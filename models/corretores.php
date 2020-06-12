<?php
class Corretores{

    // Connection instance
    private $connection;

    // table name
    private $corretores = "Corretores";

    // table columns
    public $id;
    public $nome;
    public $tipo_seg;
    public $estado;
    public $empresa;
    public $numero;
    public $email;
   
    public function __construct($connection){
        $this->connection = $connection;
    }

    //C
    public function create($nome, $tipo_seg, $estado, $empresa, $numero, $email){
        $query = "INSERT INTO corretores (nome, tipo_seg, estado, empresa, numero, email) 
            VALUES ('$nome', '$tipo_seg', '$estado', '$empresa', '$numero', '$email')";

        $stmt = $this->connection->prepare($query);

        $stmt->execute();

        return $stmt;
    }
    //R
    public function read(){
        $query = "SELECT * FROM corretores";

        $stmt = $this->connection->prepare($query);

        $stmt->execute();

        return $stmt;
    }
    //U
    public function update(){}
    //D
    public function delete(){}
}