<div class="container">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Usuários</h1>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Login</th>
                            <th>Apelido</th>
                            <th>Email</th>
                            <th>Permissão</th>
                            <th><a href="index.php?cadastro">Novo</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once 'controller/UsuarioController.php';
                        $usuarios = call_user_func(array('UsuarioController','listar'));
                        if(isset($usuarios) && !empty($usuarios)){
                            foreach($usuarios as $usuario){
                        ?>
                        <tr>
                            <td><?php echo $usuario->getUsername(); ?></td>
                            <td><?php echo $usuario->getAlias(); ?></td>
                            <td><?php echo $usuario->getEmail(); ?></td>
                            <td><?php echo $usuario->getUserPerm(); ?></td>
                            <td>
                                <a href="index.php?page=usuario&action=editar&id=<?php echo $usuario->getId();?>" class="btn btn-primary">Editar</a>
                                <a href="index.php?page=usuario&action=excluir&id=<?php echo $usuario->getId();?>" class="btn btn-danger">Excluir</a>
                            </td>
                        </tr>
                        <?php
                        }}else{
                            ?>
                            <tr>
                                <td colspan="5"><h6>Nenhum registro encontrado</h6></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>