<?php
require_once 'Banco.php'; 
require_once './Conexao.php';
class Card extends Banco{
    
    private $id;
    private $name;
    private $description;
    private $id_board;

    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getDesc(){
        return $this->description;
    }
    public function getIdBoard(){
        return $this->id_board;
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
    public function setIdBoard($id_board){
        $this->id_board = $id_board;
    }

    public function save(){
        $result = false;

        $conexao = new Conexao();

        if($conn = $conexao->getConnection()){
            if($this->id > 0){
                $query = "UPDATE card SET name = :name, description = :description where id = :id";
                $stmt = $conn->prepare($query);
                if($stmt->execute(array(':name'=>$this->name, ':description'=>$this->description,':id'=>$this->id))){
                    $result = $stmt->rowCount();
                }
            }else{
                $query = "INSERT INTO card (id, name, description, id_board) values (null, :name, :description, :id_board)";
                $stmt = $conn->prepare($query);
                if($stmt->execute(array(':name'=>$this->name, ':description'=>$this->description, ':id_board'=>$this->id_board))){
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
        $query = "DELETE FROM card WHERE id = :id";
        $stmt = $conn->prepare($query);
        if($stmt->execute(array(':id'=>$id))){
            $result = true;
        }
        return $result;
    }

    public function find($id){
        $conexao = new Conexao();
        $conn = $conexao->getConnection();
        $query = "SELECT * FROM card where id = :id";
        $stmt = $conn->prepare($query);
        if($stmt->execute(array(':id'=>$id))){
            if($stmt->rowCount() > 0){
                $result = $stmt->fetchObject(Card::class);
            }else{
                $result = false;
            }
        }
        return $result;
    }

    public function count(){

    }
    
    public function listAll(){
        $conexao = new Conexao();
        $conn = $conexao->getConnection();
        $query = "SELECT * FROM card INNER JOIN board ON board.id = id_board";
        $stmt = $conn->prepare($query);
        $result = array();

        if($stmt->execute()){
            while($rs = $stmt->fetchObject(Card::class)){
                $result[] = $rs;
            }
        }else{
            $result = false;
        }
        return $result;
    }
}