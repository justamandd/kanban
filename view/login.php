<div class="container">
    <div id="middled">
        <form action="" method="post" id="frmLogin" class="mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Login</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="h6 text-left">Usuário</label>
                        <input type="text" name="username" id="username" class="form-control form-control-lg">
                    </div>
                    <div class="form-group">
                        <label class="h6 text-left">Senha</label>
                        <input type="password" name="password" id="password" class="form-control form-control-lg">
                    </div>
                    <button type="submit" class="btn btn-success justify-content-center" name="btnLogar" id="btnLogar">Entrar</button>
                </div>
                <div class="card-footer">
                    <span>Novo por aqui?&nbsp;</span><a href="index.php?cadastro" class="font-weight-bold text-decoration-none">Cadastre-se!</a>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
    if(isset($_POST['btnLogar'])){
        $usuario = call_user_func(array('UsuarioController','logar'));
        if($usuario == false){
            //tratar
        }else{
            $_SESSION['logado'] = true;
            $_SESSION['userperm'] = $usuario->getUserPerm();
            // print_r($usuario);
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['id_usuario'] = $usuario->getId();
        }


        header('Location: index.php?page=board');
    }
?>
