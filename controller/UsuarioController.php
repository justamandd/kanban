<?php
require_once './model/Usuario.php';
class UsuarioController{
    public function salvar(){
        $usuario = new Usuario();

        $usuario->setId($_POST['id']);
        $usuario->setAlias($_POST['alias']);
        $usuario->setUsername($_POST['username']);
        $usuario->setEmail($_POST['email']);
        $usuario->setSenha($_POST['senha']);
        $usuario->setUserPerm($_POST['userperm']);

        $usuario->save();
    }

    public function listar(){
        $usuarios = new Usuario();
        return $usuarios->listAll();
    }

    public function editar($id){
        $usuario = new Usuario();
        $usuario = $usuario->find();
        return $usuario;
    }

    public function excluir($id){
        $usuario = new Usuario();
        $usuario = $usuario->remove();
    }

    public function logar(){
        $usuario = new Usuario();
        $usuario->setUsername($_POST['username']);
        $usuario->setPassword($_POST['password']);
        return $usuario->logar();
    }
}