<?php
class UsuarioDAO{
public static function cadastrarUsuario($cadastrarUser){
    $query = "INSERT INTO usuarios 
    (email, senha, nome) VALUES ( 
        '".$cadastrarUser->email."',
        '".$cadastrarUser->senha."',
        '".$cadastrarUser->nome."')";
        Conexao::executar($query);
}
}
