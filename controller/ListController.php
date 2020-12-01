<?php
require_once './model/Board.php';
class ListController{
    public function salvar(){
        $list = new List();

        $list->setId($_POST['id']);
        $list->setName($_POST['name']);
        $list->setId_boardList($_GET['id']);

        $list->save();
    }

    public function listar(){
        $lists = new List();
        return $lists->listAll();
    }

    public function editar($id){
        $list = new List();
        $list = $list->find($id);
        return $list;
    }

    public function excluir($id){
        $list = new List();
        $list = $list->remove($id);
    }
}