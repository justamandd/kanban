<?php
require_once './model/Board.php';
class BoardController{
    public function salvar(){
        $board = new Board();

        $board->setName($_POST['name']);
        $board->setDesc($_POST['description']);
        $board->setIdUsuario($_SESSION['id_usuario']);
        $board->setId($_POST['id']);

        $board->save();
    }

    public function listar(){
        $id_usuario = $_SESSION['id_usuario'];
        $boards = new Board();
        return $boards->listAll($id_usuario);
    }

    public function editar($id){
        $board = new Board();
        $board = $board->find($id);
        return $board;
    }

    public function excluir($id){
        $board = new Board();
        $board = $board->remove($id);
    }
}