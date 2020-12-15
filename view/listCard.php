
<div class="container">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Card</h1>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Ação</th>
                            <th><a href="index.php?page=card&action=criar&id=<?php echo $_GET['id']; ?>">Novo</a></th>
                        </tr>
                    </thead> 
                    <tbody>
                        <?php
                            require_once 'controller/CardController.php';
                            $cards = call_user_func(array('CardController','listar'),$_GET['id']);
                            if(isset($cards) && !empty($cards)){
                                foreach($cards as $card){
                            ?>
                            <tr>
                                <td><? echo $card->getName(); ?></td>
                                <td><? echo $card->getDesc(); ?></td>
                                <td>
                                    <a href="index.php?page=card&action=editar&id=<?php echo $_GET['id'] ?>&id_card=<?php echo $card->getId(); ?>" class="btn btn-primary">Editar</a>
                                    <a href="index.php?page=card&action=excluir&id=<?php echo $_GET['id'] ?>&id_card=<?php echo $card->getId();?>" class="btn btn-danger">Excluir</a>
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
