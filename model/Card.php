<?php
require_once 'Banco.php'; 
require_once './Conexao.php';
class Card extends Banco{
    
    private $id;
    private $name;
    private $description;
    private $id_list = $_SESSION['list'];

    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getDesc(){
        return $this->description;
    }
    public function getIdList(){
        return $this->id_list;
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
    public function setIdList($id_list){
        $this->id_list = $id_list;
    }

    public function save(){
        $result = false;

        $conexao = new Conexao();

        if($conn = $conexao->getConnection()){
            if($this->id > 0){
                $query = "UPDATE card SET name = :name, description = :description where id = :id && id_list = :id_list";
                $stmt = $conn->prepare($query);
                if($stmt->execute(array(':name'=>$this->name, ':description'=>$this->description,':id'=>$this->id, ':id_list'=>$this->id_list))){
                    $result = $stmt->rowCount();
                }
            }else{
                $query = "INSERT INTO card (id, name, description, id_list) values (null, :name, :description, :id_list)";
                $stmt = $conn->prepare($query);
                if($stmt->execute(array(':name'=>$this->name, ':description'=>$this->description, ':id_list'=>$this->id_list))){
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
        $query = "SELECT * FROM card";
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