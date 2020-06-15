<?php
$termo = $_POST['termo'];
$resultados = TitulosDAO::pesquisar($termo);

?>
<div id="meio" class="row">
    <?php
    echo '<div class="col-12">
    <h2>Resultados para "'.$termo.'"</h2></div>';
    foreach ($resultados as $titulo) {
    ?>
        <div class="col-4 my-5 border">
            <a href="index.php?pagina=titulos&id=<?= $titulo->id; ?>"><img src="<?= $titulo->foto; ?>" class="d-block mx-auto img-thumbnail"></a>
            <h2><p class="text-center"><?= $titulo->nome; ?></p></h2>
            <p class="text-center"> <?= 'Nota média: '. $titulo->medianota; ?></p>
        </div>
    <?php
    }
    ?>