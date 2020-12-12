<?php
require_once './model/Board.php';
class ListController{
    public function salvar(){
        $card = new Card();

        $card->setId($_POST['id']);
        $card->setName($_POST['name']);
        $card->setDesc($_POST['description']);
        $card->setIdList($_GET['id']);

        $card->save();
    }

    public function listar(){
        $cards = new Card();
        return $cards->listAll();
    }

    public function editar($id){
        $card = new Card();
        $card = $card->find($id);
        return $card;
    }

    public function excluir($id){
        $card = new Card();
        $card = $card->remove($id);
    }
}