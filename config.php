<?php
include_once "model/clsCategoria.php";
include_once "model/clsComentario.php";
include_once 'model/clsConexao.php';
include_once 'model/clsNota.php';
include_once "model/clsTitulo.php";
include_once 'model/clsUsuario.php';
include_once 'DAO/clsCategoriaDAO.php';
include_once "DAO/clsTituloDAO.php";
include_once 'DAO/clsUsuarioDAO.php';

function criaResumo($string, $caracteres)
{
    $string = strip_tags($string);
    if (strlen($string) > $caracteres) {
        while (substr($string, $caracteres, 1) <> ' ' && ($caracteres < strlen($string))) {
            $caracteres++;
        };
    };
    return substr($string, 0, $caracteres) . '...';
}
?>