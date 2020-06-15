<?php
class Usuario{
    public $id, $nome, $email, $senha;

    public function __construct($id = NULL, $nome = NULL, $email = NULL, $senha = NULL)
        {
            $this->id = $id;
            $this->nome = $nome;
            $this->email = $email;
            $this->senha = $senha;   
        }

    }
?>

