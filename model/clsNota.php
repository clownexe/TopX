<?php
    class Nota{
        // Atributos ou características
        public $id;
        public $nota, $idTitulo, $idUsuario, $opiniao, $username, $nomeTitulo;


        // Métodos ou ações
        public function __construct($id = NULL, $nota = NULL, $idTitulo = NULL, $idUsuario = NULL, $opiniao = NULL)
        {
            $this->id = $id;
            $this->nota = $nota;
            $this->idTitulo = $idTitulo;
            $this->idUsuario = $idUsuario;   
            $this->opiniao = $opiniao;
        }

    }

    class mediaNota{
        public $mediaNota;

        public function __construct($mediaNota = NULL){
            $this->mediaNota = $mediaNota;
        }
    }
?>