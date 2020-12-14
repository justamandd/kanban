
<div class="container">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Seus Card's</h1>
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
                            require_once 'controller/CardController.php';
                            $cards = call_user_func(array('CardController','listar'));
                            if(isset($cards) && !empty($cards)){
                                foreach($cards as $card){
                            ?>
                            <tr>
                                <td><? echo $card->getName(); ?></td>
                                <td><? echo $card->getDesc(); ?></td>

                                <td>
                                <a href="index.php?page=card&action=abrir&id=<?php echo $card->getId();?>" class="btn btn-success">Abrir</a>
                                <a href="index.php?page=card&action=editar&id=<?php echo $card->getId();?>" class="btn btn-primary">Editar</a>
                                <a href="index.php?page=card&action=excluir&id=<?php echo $card->getId();?>" class="btn btn-danger">Excluir</a>
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
