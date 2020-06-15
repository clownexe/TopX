<?php
require 'config.php';
session_start();
$url = isset($_REQUEST['pagina']) ? $_REQUEST['pagina'] : 'inicio'; //Vê se há algum valor de página, se não exibe o inicio

try {
    /**
     * VERIFICA SE O ARQUIVO EXISTE NA PASTA DE PAGINAS
     */
    if (!file_exists('paginas/'. $url . '.php' ))
        throw new Exception ("{$url} não existe");
}
catch(Exception $e) {    
    /**
     * SE DER ALGUM ERRO OU O ARQUIVO NÃO EXISTIR, REDIRECIONA PRO 404.
     */
    /**header("Location: 404.php");*/
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css">

    <title>TopX</title>
</head>
<body>

    <?php  require_once "menu.php"; ?>
    <div class="container">
    <?php require_once('paginas/'. $url . '.php' );
    ?>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
