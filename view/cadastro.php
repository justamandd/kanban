<?php
    ob_start();
?>
</head>
<body>
    <div class="container">
        <div class="centered">
            <!-- Form Cadastro -->
            <form action="" method="post" id="cadUsuario" name="cadUsuario">
                <!-- Card Init -->
                <div class="card text-center">

                    <!-- Card Header -->
                    <div class="card-header">
                        <h1 class="card-title">Cadastro</h1>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">

                        <!-- Login -->
                        <div class="form-group">
                            <input type="text" name="username" id="username" placeholder="Usuário" class="form-control form-control-lg" value="<?php echo isset($usuario)?$usuario->getUsername():''?>" required>
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <input type="email" name="email" id="email" placeholder="Email" class="form-control form-control-lg" value="<?php echo isset($usuario)?$usuario->getEmail():''?>" required>
                        </div>

                        <!-- Alias -->
                        <div class="form-group">
                            <input type="text" name="alias" id="alias" placeholder="Apelido" class="form-control form-control-lg" value="<?php echo isset($usuario)?$usuario->getAlias():''?>" required>
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <input type="password" name="password" id="password" placeholder="Senha" class="form-control form-control-lg" value="" required>
                        </div>

                        <!-- Password Confirm -->
                        <div class="form-group">
                            <input type="password" name="senhaConfirm" id="senhaConfirm" placeholder="Confirmação" class="form-control form-control-lg" required>
                        </div>
                        <?php
                        if(isset($_SESSION['logado']) && $_SESSION['logado'] == true && $_SESSION['userperm'] == 'A'){
                        ?>
                        <!-- Select Permission -->
                        <div class="form-group">
                            <select name="userperm" id="userperm" class="form-control form-control-lg" required>
                                <option value="0" selected disabled>Selecione a Permissão</option>
                                <option value="A" <?php echo isset($usuario) && $usuario->getUserPerm()=='A'?'selected':''?>>Administrador</option>
                                <option value="C" <?php echo isset($usuario) && $usuario->getUserPerm()=='C'?'selected':''?>>Comúm</option>
                            </select>
                        </div>
                        <?php
                        }
                        ?>
                    </div>

                    <!-- Card Footer -->
                    <div class="card-footer">
                        <!-- Input Hidden -->
                        <input type="hidden" name="id" id="id" value="<?php echo isset($usuario)?$usuario->getId():'';?>">
                        <!-- Submit Button -->
                        <button type="submit" name="btnEnviar" id="btnEnviar" class="btn btn-success">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php
    //verifica se o botão submit foi acionado
    if(isset($_POST['btnEnviar'])){
        //importa o UsuarioController.php
        require_once 'controller/UsuarioController.php';
        //Chama uma função php que permite informar a classe método que será acionado 
        call_user_func(array('UsuarioController','salvar'));
        header('Location:index.php?action=listar');
        // if($_SESSION['logado']) && $_SESSION['logado'] == true && $_SESSION['userperm'] == 'A'){
        // }else{
        //     header('Location: index.php');
        // }
    }
    ob_end_flush();
?>