<?php
require_once 'Banco.php'; 
require_once './Conexao.php';
class Board extends Banco{
    
    private $id;
    private $name;
    private $description;
    private $id_usuario; //talvez

    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getDesc(){
        return $this->description;
    }
    public function getIdUsuario(){
        return $this->id_usuario;
    }

    public function setId($id){
        $this->id = $id;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function setDesc($desc){
        $this->description = $desc;
    }
    public function setIdUsuario($id_usuario){
        $this->id_usuario = $id_usuario;
    }

    public function save(){
        $result = false;

        $conexao = new Conexao();

        if($conn = $conexao->getConnection()){
            if($this->id > 0){
                $query = "UPDATE board SET name = :name, description = :description where id = :id && id_usuario = :id_usuario";
                $stmt = $conn->prepare($query);
                if($stmt->execute(array(':name'=>$this->name, ':description'=>$this->description,':id'=>$this->id, ':id_usuario'=>$this->id_usuario))){
                    $result = $stmt->rowCount();
                }
            }else{
                $query = "INSERT INTO board (id, name, description, id_usuario) values (null, :name, :description, :id_usuario)";
                $stmt = $conn->prepare($query);
                if($stmt->execute(array(':name'=>$this->name, ':description'=>$this->description, ':id_usuario'=>$this->id_usuario))){
                    $result = $stmt->rowCount();
                }
            }
        }
        return $result;
    }

    public function remove($id){
        $result = false;
        $conexao = new Conexao();
        $conn = $conexao->getConnection();
        $query = "DELETE FROM board WHERE id = :id";
        $stmt = $conn->prepare($query);
        if($stmt->execute(array(':id'=>$id))){
            $result = true;
        }
        return $result;
    }

    public function find($id){
        $conexao = new Conexao();
        $conn = $conexao->getConnection();
        $query = "SELECT * FROM board where id = :id";
        $stmt = $conn->prepare($query);
        if($stmt->execute(array(':id'=>$id))){
            if($stmt->rowCount() > 0){
                $result = $stmt->fetchObject(Board::class);
            }else{
                $result = false;
            }
        }
        return $result;
    }

    public function count(){

    }
    
    public function listAll($id_usuario){
        $conexao = new Conexao();
        $conn = $conexao->getConnection();
        $query = "SELECT * FROM board where id_usuario = :id_usuario";
        $stmt = $conn->prepare($query);
        $result = array();

        if($stmt->execute(array(':id_usuario'=>$id_usuario))){
            while($rs = $stmt->fetchObject(Board::class)){
                $result[] = $rs;
            }
        }else{
            $result = false;
        }
        return $result;
    }
}