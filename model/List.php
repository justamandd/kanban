<?php
require_once 'Banco.php'; 
require_once './Conexao.php';
class List extends Banco{
    
    private $id;
    private $name;
    private $id_boardList;

    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getIdBoardList(){
        return $this->id_boardList;
    }

    public function setId($id){
        $this->id = $id;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function setDesc($id_boardList){
        $this->id_boardList = $id_boardList;
    }

    public function save(){
        $result = false;

        $conexao = new Conexao();

        if($conn = $conexao->getConnection()){
            if($this->id > 0){
                $query = "UPDATE list SET name = :name, where id = :id";
                $stmt = $conn->prepare($query);
                if($stmt->execute(array(':name'=>$this->name))){
                    $result = $stmt->rowCount();
                }
            }else{
                $query = "INSERT INTO board (id, name, id_boardList) values (null, :name, (select board.id from board as b inner join boardList as bL on b.id = id_board inner join list as l on l.id = id_list where))"; 
                $stmt = $conn->prepare($query);
                if($stmt->execute(array(':name'=>$this->name, ':id_boardList'=>$this->id_boardList))){
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
                $result = $stmt->fetchObject(Usuario::class);
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
        $query = "SELECT * FROM board";
        $stmt = $conn->prepare($query);
        $result = array();

        if($stmt->execute()){
            while($rs = $stmt->fetchObject(Usuario::class)){
                $result[] = $rs;
            }
        }else{
            $result = false;
        }
        return $result;
    }
}