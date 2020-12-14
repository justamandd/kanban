<nav class="nav-bar navbar-expand-sm navbar-light bg-warning text-dark fixed-top py-2">
    <div class="container">
        <form action="" method="post" id="frmCriarBoard" name="frmCriarBoard" class="form-inline justify-content-center">
            <button class="btn btn-sm btn-outline-dark" name="btnCriarBoard" in="btnCriarBoard">Criar Quadro</button>
        </form>
    </div>
</nav>
<?php
if(isset($_POST['btnCriarBoard'])){
    header('Location: index.php?page=board&action=cadboard');
}
?>