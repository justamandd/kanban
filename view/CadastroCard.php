<?php
    ob_start();
?>

</head>
    <body>
        <div class="container">
            <div class="centered">
            <!-- Form de Cadastro de Card -->
                <form action="" method="POST" name="cardCad" id="cardCad">

                    <div class="card-header">
                        <h1 class="card-title">Cadastro de Card</h1>
                    </div>

            <!-- Início do Cadastro -->
                <div class="card-body">
                    <!-- Nome -->
                    <div class="form-group">
                        <input type="text" name="name" id="name" placeholder="Nome" class="form-control form-control-lg" value="<?php echo isset($name)?$name->getName():''?>" required>
                    </div>

                    <!-- Descrição -->
                    <div class="form-group">
                        <input type="text" name="descricao" id="descricao" placeholder="Descrição" class="form-control form-control-lg" value="<?php echo isset($desc)?$desc->getDesc():''?>" required>
                    </div>
                </div>

                <!-- Card Footer -->
                <div class="card-footer">
                    <input type="hidden" name="id" id="id" value="<?php echo isset($id)?$id->getIdUsuario():'';?>">
                    <button type="submit" name="btnSave" id="btnSave" class="btn btn-sucess">Salvar</button>
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

    header('Location:index.php?page=card&action=listar');
}
ob_end_flush();

?>
