<?php

require_once("../init.php");
class Banco{

    protected $mysqli;

    public function __construct(){
        $this->conexao();
    }

    private function conexao(){
        $this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO , BD_SENHA, BD_BANCO);
    }

    public function setCorretor($nome, $tipo_seg, $estado, $empresa, $numero, $email){
        $stmt = $this->mysqli->prepare("INSERT INTO corretores (`nome`, `tipo_seg`, `estado`, `empresa`, `numero`, `email`) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("sssss",$nome, $tipo_seg, $estado, $empresa, $numero, $email);
         if( $stmt->execute() == TRUE){
            return true ;
        }else{
            return false;
        }

    }

    public function getCorretor(){
        $result = $this->mysqli->query("SELECT * FROM corretores");
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $array[] = $row;
        }
        return $array;

    }

    public function deleteCorretor($id){
        if($this->mysqli->query("DELETE FROM `corretores` WHERE `nome` = '".$id."';")== TRUE){
            return true;
        }else{
            return false;
        }

    }
    public function pesquisaCorretor($id){
        $result = $this->mysqli->query("SELECT * FROM corretores WHERE nome='$id'");
        return $result->fetch_array(MYSQLI_ASSOC);
    }

    /*public function updateLivro($nome,$autor,$quantidade,$preco,$flag,$data,$id){
        $stmt = $this->mysqli->prepare("UPDATE `livros` SET `nome` = ?, `autor`=?, `quantidade`=?, `preco`=?, `flag`=?,`data` = ? WHERE `nome` = ?");
        $stmt->bind_param("sssssss",$nome,$autor,$quantidade,$preco,$flag,$data,$id);
        if($stmt->execute()==TRUE){
            return true;
        }else{
            return false;
        }
    }*/

}
?>