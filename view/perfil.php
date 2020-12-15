<?php
    ob_start();
?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Dados do Perfil</h1>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Apelido</th> 
                        <th>Usuario</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php require_once 'controller/UsuarioController.php';   
                    $usuario = call_user_func(array('UsuarioController','infoPerfil'),$_SESSION['id_usuario']);
                    ?>
                    <tr>
                        <td><?php echo $usuario->getAlias(); ?></td>
                        <td><?php echo $usuario->getUsername(); ?></td>
                        <td><?php echo $usuario->getEmail(); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <form action="" method="post" id="frmDados" name="frmDados">
                <a class="btn btn-success" id="btnDados" name="btnDados" href="index.php?page=usuario&action=editar&id=<?php echo $_SESSION['id_usuario']; ?>">Alterar Dados</a>
            </form>
        </div>
    </div>
</div>