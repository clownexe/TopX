<?php

include_once "../config.php";
include_once "../DAO/clsTituloDAO.php";

function salvarFoto(){
    $nome_arquivo = "";

    if( isset( $_FILES['foto']['name'] ) && $_FILES['foto']['name'] != "" ){
        $nome_arquivo = date("YmdHis") . basename( $_FILES['foto']['name'] ); 
        $diretorio = "../images_titulos/";
        $caminho = $diretorio.$nome_arquivo;

        if(  ! move_uploaded_file( $_FILES['foto']['tmp_name']  , $caminho )  ){
            $nome_arquivo = "sem_foto.png";
        }

    }else{
        $nome_arquivo = "sem_foto.png";
    }
    return $nome_arquivo;
}


if( isset($_REQUEST["inserir"])){
    $nome = $_POST["txtNome"];
    $descricao = $_POST["txtDescricao"];
    $idCategoria = $_POST["categoria"];
    $urlFoto = $_POST["foto"];

    $titulo = new Titulo();
    $titulo->nome = htmlspecialchars($nome);
    $titulo->descricao = htmlspecialchars($descricao);
    $titulo->codCategoria = $idCategoria;
    $titulo->foto = $urlFoto;

    TitulosDAO::inserir($titulo);
    header("Location: ../index.php");
}

if( isset($_REQUEST["excluir"])){
    $id = $_GET['idtitulo'];
    TitulosDAO::excluir($id);
    header("Location: ../index.php");
}
