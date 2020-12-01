<?php
require_once 'Banco.php'; 
require_once './Conexao.php';
class Card extends Banco{   
    private $id;
    private $alias;
    private $email;
    private $username;
    private $password;
    private $userPerm;

    public function getId(){
        return $this->id;
    }
    public function getAlias(){
        return $this->alias;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getUsername(){
        return $this->username;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getUserPerm(){
        return $this->userPerm;
    }


    public function setId($id){
        $this->id = $id;
    }
    public function setAlias($alias){
        $this->alias = $alias;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setUsername($username){
        $this->username = $username;
    }
    public function setPassword($password){
        $this->password = md5($password);
    }
    public function setUserPerm($userPerm){
        $this->userPerm = $userPerm;
    }

    public function save(){
        $result = false;

        $conexao = new Conexao();

        if($conn = $conexao->getConnection()){
            if($this->id > 0){
                $query = "UPDATE user SET username = :username, alias = :alias, email = :email, password =  :password, userPerm = :userPerm where id = :id";
                $stmt = $conn->prepare($query);
                if($stmt->execute(array(':username'=>$this->username, ':alias'=>$this->alias, ':email'=>$this->email, ':password'=>$this->password, ':userPerm'=>$this->userPerm, ':id'=>$this->id))){
                    $result = $stmt->rowCount();
                }
            }else{
                $query = "INSERT INTO user (id, username, alias, email, password, userPerm) values (null, :username, :alias, :email, :password, :userPerm)";
                $stmt = $conn->prepare($query);
                if($stmt->execute(array(':username'=>$this->username, ':alias'=>$this->alias, ':email'=>$this->email, ':password'=>$this->password, ':userPerm'=>$this->userPerm))){
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
        $query = "DELETE FROM user WHERE id = :id";
        $stmt = $conn->prepare($query);
        if($stmt->execute(array(':id'=>$id))){
            $result = true;
        }
        return $result;
    }

    public function find($id){
        $conexao = new Conexao();
        $conn = $conexao->getConnection();
        $query = "SELECT * FROM user where id = :id";
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
        $query = "SELECT * FROM user";
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

    public function logar(){
        $conexao = new Conexao();
        $conn = $conexao->getConnection();
        $query = "SELECT * FROM user WHERE username = :username and password = :password";
        $stmt = $conn->prepare($query);
        if($stmt->execute(array(':username'=>$this->username, ':password'=>$this->password))){
            if($stmt->rowCount() > 0){
                $result = $stmt->fetchObject(Usuario::class);
            }else{
                $result = false;
            }
            return $result;
        }
    }

}