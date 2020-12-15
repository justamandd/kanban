<?php
    ob_start();
?>

</head>
    <body>
        <div class="container">
            <div class="">
                <!-- Form de Cadastro de Card -->
                <form action="" method="POST" name="cardCad" id="cardCad">

                    <div class="card-header">
                        <h1 class="card-title">Cadastro de Card</h1>
                    </div>

                <!-- Início do Cadastro -->
                <div class="card-body">
                    <!-- Nome -->
                    <div class="form-group">
                        <input type="text" name="name" id="name" placeholder="Nome" class="form-control form-control-lg" value="<?php echo isset($card)?$card->getName():'';?>" required>
                    </div>

                    <!-- Descrição -->
                    <div class="form-group">
                        <input type="text" name="description" id="description" placeholder="Descrição" class="form-control form-control-lg" value="<?php echo isset($card)?$card->getDesc():'';?>" required>
                    </div>
                </div>

                <!-- Card Footer -->
                <div class="card-footer">
                    <input type="hidden" name="id_card" id="id_card" value="<?php echo isset($_GET['id_card'])? $_GET['id_card']:'';?>">
                    <button type="submit" name="btnSave" id="btnSave" class="btn btn-success">Salvar</button>
                </div>

                </form>
            </div>
        </div>
    </body>
    <?php
if(isset($_POST['btnSave'])){
    //Inclui o Card Controller
    include_once 'controller/CardController.php';
    //Chama a função do Card do metódo que será utilizado
    call_user_func(array('CardController','salvar'));
    if(isset($_GET['id_card'])){
        header('Location:index.php?page=board&action=editar&id=',$_GET['id_card']);
    }else{
        header('Location:index.php?page=board&action=abrir&id=',$_GET['id']);
    }
}
ob_end_flush();

?>
