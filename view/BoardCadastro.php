<?php
ob_start();
?>

</head>
    <body>
        <div class= "container">
            <div class = "centered">
            <!--- Form Cadastro de Board --->
                <form action="" method="POST" id="cadBoard" name="cadBoard">
                    
                    <div class="card-header">
                        <h1 class="card-title">Cadastro de Board</h1>
                    </div>

                    <!--- Início do Cadastro--->
                    <div class="card-body">
                        <!-- Nome --->
                        <div class="form-group">
                            <input type="text" name="name" id="name" placeholder="Nome" class="form-control form-control-lg" value="<?php echo isset($board)?$board->getName():''?>" required>
                        </div>

                        <!-- Descrição --->
                        <div class="form-group">
                            <input type="text" name="description" id="description" placeholder="Descrição" class="form-control form-control-lg" value="<?php echo isset($board)?$board->getDesc():''?>" required>
                        </div>
                    </div>

                    <!-- Card Footer--->
                    <div class="card-footer">
                        <!-- -->
                        <input type="hidden" name="id" id="id" value="<?php echo isset($board)?$board->getId():'';?>">
                        <button type="submit" name="btnSave" id="btnSave" class="btn btn-success">Salvar</button>
                    </div>
                </form> 
            </div>
        </div>
    </body>
<?php
if(isset($_POST['btnSave'])){
    //Inclui o Board Controller
    include_once 'controller/BoardController.php';
    //Chama a função da Board do metódo que será utilizado
    call_user_func(array('BoardController','salvar'));

    header('Location:index.php?page=board&action=listar');
}
ob_end_flush();

?>
