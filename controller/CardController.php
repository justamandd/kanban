<?php
require_once './model/Card.php';
class CardController{
    public function salvar(){
        $card = new Card();

        $card->setId($_POST['id_card']);
        $card->setName($_POST['name']);
        $card->setDesc($_POST['description']);
        $card->setIdBoard($_GET['id']);

        $card->save();
    }

    public function listar($id){
        $cards = new Card();
        return $cards->listAll($id);
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