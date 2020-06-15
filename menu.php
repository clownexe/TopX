<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a href="index.php"><img src="images/TOPX.png" width="60px" height="60px" /></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Início <span class="sr-only">(atual)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?pagina=minhaconta">Minha Conta</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Categorias
                </a>
                <?php echo CategoriaDAO::dropdownCat();?>
            </li>
            <?php
            if (isset($_SESSION['logado']) && $_SESSION['logado']) {
            echo '<li class="nav-item">';
                echo '<a class="nav-link" href="?pagina=addtitulo">Adicionar ao Catálogo</a>';
            }
            ?>
            </li>
            <?php
            if (isset($_SESSION['logado']) && $_SESSION['logado']){
                echo '<li class="nav-item">
                <a class="nav-link" href="?pagina=opiniao">Opiniões</a>';
            }
            ?>
        </ul>
        <form method="POST" class="form-inline my-2 my-lg-0" action='index.php?pagina=pesquisa'>
            <input name="termo" class="form-control mr-sm-2" type="search" placeholder="O que deseja? c:" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
        </form>
    </div>
</nav>




</div>