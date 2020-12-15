<?php
    session_start();
    require_once 'controller/UsuarioController.php';
    require_once 'controller/BoardController.php';
    require_once 'controller/CardController.php';
    require_once 'header.php';
?>

<?php
    if(isset($_SESSION['logado']) && $_SESSION['logado'] == true){
        require_once 'view/home.php';
        if($_GET['page'] == 'usuario'){
            if(isset($_GET['action'])){
                if($_SESSION['userperm'] == 'A' && $_GET['action'] == 'listar'){
                    require_once 'view/listUsuario.php';
                }
                if($_GET['action'] == 'editar'){
                    $usuario = call_user_func(array('UsuarioController','editar'), $_GET['id']);
                    require_once 'view/cadastro.php'; 
                }
                if($_GET['action'] == 'excluir'){
                    $usuario = call_user_func(array('UsuarioController','excluir'), $_GET['id']);
                    require_once 'view/listUsuario.php';
                }
                if($_GET['action'] == 'perfil'){
                    require_once 'view/perfil.php';
                }
            }
        }if($_GET['page'] == 'board'){
            if(isset($_GET['action'])){
                if($_GET['action'] == 'cadboard'){
                    require_once 'view/boardCadastro.php';
                }if($_GET['action'] == 'listar'){
                    require_once 'view/listBoard.php';
                }if($_GET['action'] == 'editar'){
                    $board = call_user_func(array('BoardController','editar'), $_GET['id']);
                    require_once 'view/BoardCadastro.php'; 
                }if($_GET['action'] == 'excluir'){
                    $board = call_user_func(array('BoardController','excluir'), $_GET['id']);
                    require_once 'view/listBoard.php'; 
                }if($_GET['action'] == 'abrir'){
                    require_once 'view/listCard.php'; 
                }
            }
        }
        if($_GET['page'] == 'card'){
            if(isset($_GET['action'])){
                if($_GET['action'] == 'criar'){
                    require_once 'view/cadastroCard.php';
                }
                if($_GET['action'] == 'editar'){
                    $card = call_user_func(array('CardController','editar'),$_GET['id_card']);
                    require_once 'view/cadastroCard.php'; 
                }
                if($_GET['action'] == 'excluir'){
                    $card = call_user_func(array('CardController','excluir'),$_GET['id_card']);
                    require_once 'view/listCard.php';
                }
            }
        }
    }else{
        if(isset($_GET['cadastro'])){
            require_once 'view/cadastro.php';
        }else{
            require_once 'view/login.php';
        }
    }
?>

<?php

    require_once 'footer.php';

?>