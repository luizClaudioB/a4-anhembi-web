<?php
class Clientes{

    // Connection instance
    private $connection;

    // table name
    private $clientes = "Clientes";

    // table columns
    public $id;
    public $name;
    public $cpf;
    public $email;
   
    public function __construct($connection){
        $this->connection = $connection;
    }

    //C
    public function create($name, $cpf, $email){
        $query = "INSERT INTO corretores (name, cpf, email) 
            VALUES ('$name', '$cpf', '$email')";

        $stmt = $this->connection->prepare($query);

        $stmt->execute();

        return $stmt;
    }
    //R
    public function read(){
        $query = "SELECT * FROM clientes";

        $stmt = $this->connection->prepare($query);

        $stmt->execute();

        return $stmt;
    }
    //U
    public function update(){}
    //D
    public function delete(){}
}