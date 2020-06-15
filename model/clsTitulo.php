<?php
    class Titulo{
        // Atributos ou características
        public $id;
        public $nome, $descricao, $codCategoria, $foto, $medianota;


        // Métodos ou ações
        public function __construct($_id = NULL, $nome = NULL, $descricao = NULL, $codCategoria = NULL, $foto = NULL, $medianota = NULL)
        {
            $this->id = $_id;
            $this->nome = $nome;
            $this->descricao = $descricao;
            $this->codCategoria = $codCategoria;   
            $this->foto = $foto;
            $this->medianota = $medianota;
        }

    }
?>