<div class="container">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Seus quadros</h1>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require_once 'controller/BoardController.php';
                            $boards = call_user_func(array('BoardController','listar'));
                            if(isset($boards) && !empty($boards)){
                                foreach($boards as $board){
                        ?>
                        <tr>
                            <td><?php echo $board->getName(); ?></td>
                            <td><?php echo $board->getDesc(); ?></td>
                            <td>
                                <a href="index.php?page=board&action=abrir&id=<?php echo $board->getId();?>" class="btn btn-success">Abrir</a>
                                <a href="index.php?page=board&action=editar&id=<?php echo $board->getId();?>" class="btn btn-primary">Editar</a>
                                <a href="index.php?page=board&action=excluir&id=<?php echo $board->getId();?>" class="btn btn-danger">Excluir</a>
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