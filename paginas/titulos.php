<?php
$idTitulo = $_REQUEST["id"];
$titulo = TitulosDAO::getTituloById($idTitulo);
$notaTitulo = $_REQUEST["id"];
$notas = TitulosDAO::getNotaByTitulo($notaTitulo);
$mediaNota = $_REQUEST["id"];
$notaMedia = TitulosDAO::mediaNotaPorTitulo($mediaNota);

?>


<div id="meio" class="row mt-5">
    <div class="col-4">
        <img src="<?= $titulo->foto; ?>" class="d-block mx-auto img-thumbnail">
    </div>
    <div class="col-4">
        <h1><?= $titulo->nome; ?></h1>
        <h3>Nota Média: <?= ($notaMedia->mediaNota==NULL)? 0 : $notaMedia->mediaNota; ?></h3>
        <p>Descrição: <?= $titulo->descricao; ?><p>
    </div>
    <div class="col-12">
            <?php $result = TitulosDAO::comentariosTitulo($idTitulo);

            foreach ($result as $comment) {
            ?>
                <div class="col-12 my-5">
                    <h3><?= $comment->username ?></h3>
                    <h4><?= 'Nota: ' . $comment->nota ?></h4>
                    <h4><?= 'Comentario: ' . $comment->opiniao ?></h4>

                </div>
            <?php
            }
            ?>
    </div>
</div>


</div>