<?php
    session_start();
    require_once 'controller/UsuarioController.php';
    require_once 'header.php';
?>

<?php
    if(isset($_SESSION['logado']) && $_SESSION['logado'] == true){
        require_once 'view/home.php';
        if(isset($_GET['action'])){
            if($_SESSION['userperm'] == 'A' && $_GET['action'] == 'list'){
                require_once 'view/listUsuario.php';
            }if($_GET['action'] == 'editar'){
                $usuario = call_user_func(array('UsuarioController','editar'), $_GET['id']);
                require_once 'view/cadastro.php'; 
            }
            if($_GET['action'] == 'excluir'){
                $usuario = call_user_func(array('UsuarioController','excluir'), $_GET['id']);
                require_once 'view/listUsuario.php';
            }
        }
        // if($_GET['page'] == 'usuario'){
        // }else if($_GET['page'] == 'board'){
        // }

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