<?php
    class Comentario{
        // Atributos ou características
        public $id;
        public $nome, $descricao, $codCategoria, $foto;


        // Métodos ou ações
        public function __construct($_id = NULL, $nome = NULL, $descricao = NULL, $codCategoria = NULL, $foto = NULL)
        {
            $this->id = $_id;
            $this->nome = $nome;
            $this->descricao = $descricao;
            $this->codCategoria = $codCategoria;   
            $this->foto = $foto;
        }

    }
?>