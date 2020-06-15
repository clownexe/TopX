<?php
if (isset($_REQUEST['cat'])) {
    $intCat = (int) $_REQUEST['cat'];
    if ($intCat != 0) {
        $result = TitulosDAO::getTitulosByCat($intCat);
    } else {
        $result = TitulosDAO::getTitulos();
    }
} else {
    $result = TitulosDAO::getTitulos();
}
?>


<div id="meio" class="row pt-4">
    <?php
    foreach ($result as $titulo) {
    ?>
        <div class="col-3">
            <div class="card" style="width: 18rem;">
            <a href="index.php?pagina=titulos&id=<?= $titulo->id; ?>"><img src="<?= $titulo->foto; ?>" class="card-img-top"></a>
                <div class="card-body">
                <a href="index.php?pagina=titulos&id=<?= $titulo->id; ?>"><h5 class="card-title text-center"><?= $titulo->nome; ?></h5></a>
                    <p class="card-text"><?= criaResumo($titulo->descricao,165); ?></p>
                </div>
            </div>
        </div>
    <?php
    }
    ?>