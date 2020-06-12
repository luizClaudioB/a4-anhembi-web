<?php
class Users{

    // Connection instance
    private $connection;

    // table name
    private $users = "Users";

    // table columns
    public $id;
    public $name;
    public $email;
    public $password;
   
    public function __construct($connection){
        $this->connection = $connection;
    }

    //C
    public function create($name, $email, $password){
        $query = "INSERT INTO users (name, email, password)
            VALUES ('$name', '$email', '$password')";

        $stmt = $this->connection->prepare($query);

        $stmt->execute();

        return $stmt;
    }
    //R
    public function read(){
        $query = "SELECT * FROM users";

        $stmt = $this->connection->prepare($query);

        $stmt->execute();

        return $stmt;
    }
    //U
    public function update(){}
    //D
    public function delete(){}
}