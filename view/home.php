<nav class="navbar navbar-expand-sm navbar-dark bg-dark text-light fixed-top">
    <div class="container">
        <span class="navbar-brand h1 mb-0">KanBão</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHome" aria-controls="navbarHome" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarHome">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a href="index.php?home" class="nav-link">Home<span class="sr-only"> 
        (current)</span></a></a>
                </li>
                <li class="nav-item active">
                    <a href="index.php?perfil" class="nav-link">Perfil</a>
                </li>
                <li class="nav-item active">
                    <a href="index.php?action=sair" class="nav-link">Sair</a>
                </li>
            </ul>
            <form action="post" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" id="search" name="search" placeholder="Procure seus quadros" aria-label="Search">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </div>
    </div>
</nav>