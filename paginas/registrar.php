<?php
if (isset($_REQUEST["inserir"])) {
    $nome = $_POST["regNome"];
    $email = $_POST["regEmail"];
    $senha = $_POST["regSenha"];

    

    $usuario = new Usuario();
    $usuario->nome = ($nome);
    $usuario->email = $email;
    $usuario->senha = ($senha);

    UsuarioDAO::cadastrarUsuario($usuario);

    header("Location: ../index.php");
}