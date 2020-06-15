<?php
$action = "inserir";
include_once "../config.php";
session_start();



if (isset($_REQUEST["inserir"])) {
    $nota = $_POST['nota'];
    $idTitulo = $_POST['titulos'];
    $opiniao = $_POST['txtOpiniao'];

    $notas = new Nota();
    $notas->nota = $nota;
    $notas->idTitulo = $idTitulo;
    $notas->idUsuario = $_SESSION['id_usuario'];
    $notas->opiniao = htmlspecialchars($opiniao);

    if(TitulosDAO::checarNota($notas->idUsuario, $idTitulo)){
        
        header("Location: ../index.php?pagina=opiniao&erro=true");
    }else{
        TitulosDAO::comentar($notas);
    header("Location: ../index.php?pagina=titulos&id=".$idTitulo);
    }
    
}

if (isset($_REQUEST["excluir"])) {
    $id = $_GET['idtitulo'];
    TitulosDAO::excluir($id);
    header("Location: ../index.php");
}
