<?php

class TitulosDAO{

    public static function inserir($titulos){
        $query = "INSERT INTO titulos 
                (nome, descricao, codCategoria, foto) VALUES (
                '".$titulos->nome."' ,
                 '".$titulos->descricao."'  ,
                 '".$titulos->codCategoria."' ,
                '".$titulos->foto."'   )";
        /*echo var_dump($query); */
                Conexao::executar($query);
        
    }

    public static function comentar($comentario){
        $query = "INSERT INTO notas 
        (nota, idTitulo, idUsuario, opiniao) VALUES (
            '".$comentario->nota."', 
            ".$comentario->idTitulo.",
            ".$comentario->idUsuario.",
            '".$comentario->opiniao."')";
            Conexao::executar($query);
    }

    public static function editar($titulos){
        $query = "UPDATE titulos SET
                nome = '".$titulos->nome."' ,
                descricao = ".$titulos->preco."  ,
                codCategoria = ".$titulos->categoria->id." ,
                foto = '".$titulos->foto."' 
                WHERE id =  ".$titulos->id;

        Conexao::executar($query);
    }

    public static function excluir($id){
        $query = "DELETE FROM titulos WHERE id = ".$id;
        Conexao::executar($query);
    }

    public static function getTitulos(){
        $query = "SELECT t.id, t.nome, t.descricao, 
                         c.id AS codCat, c.nome AS nomeCat, t.foto
                    FROM titulos t 
                    INNER JOIN categorias c ON c.id = t.codCategoria 
                    ORDER BY t.nome ";
        $result = Conexao::consultar($query);
        $lista = new ArrayObject();
        while(list($cod, $nome, $descricao, $codCat, $nomeCat, $foto)=mysqli_fetch_row($result)){
                $cat = new Categoria();
                $cat->id = $codCat;
                $cat->nome = $nomeCat;
                $titulo = new Titulo();
                $titulo->id = $cod;
                $titulo->nome = $nome;
                $titulo->descricao = $descricao;
                $titulo->categoria = $cat;
                $titulo->foto = $foto;
                $lista->append( $titulo );
        }
        return $lista;
    }

    public static function getTitulosByCat($idCategoria){
        $query = "SELECT t.id, t.nome, t.descricao, 
        c.id AS codCat, c.nome AS nomeCat, t.foto
   FROM titulos t 
   INNER JOIN categorias c ON c.id = t.codCategoria 
   WHERE t.codCategoria = ".$idCategoria."
   ORDER BY t.nome ";
        $result = Conexao::consultar($query);
        $lista = new ArrayObject();
        while(list($cod, $nome, $descricao, $codCat, $nomeCat, $foto)=mysqli_fetch_row($result)){
                $cat = new Categoria();
                $cat->id = $codCat;
                $cat->nome = $nomeCat;
                $titulo = new Titulo();
                $titulo->id = $cod;
                $titulo->nome = $nome;
                $titulo->descricao = $descricao;
                $titulo->categoria = $cat;
                $titulo->foto = $foto;
                $lista->append( $titulo );
        }
        return $lista;

    }


    public static function getTituloById($idtitulo){
        $query = "SELECT t.id, t.nome, t.descricao, 
                         c.id AS codCat, c.nome AS nomeCat, t.foto
                    FROM titulos t 
                    INNER JOIN categorias c ON c.id = t.codCategoria 
                    WHERE t.id = ". $idtitulo ;
        $result = Conexao::consultar($query);

        list($id, $nome, $descricao, $codCategoria, $nomeCat, $foto ) = mysqli_fetch_row($result) ;
        $cat = new Categoria();
        $cat->id = $codCategoria;
        $cat->nome = $nomeCat;

        $titulo = new Titulo();
        $titulo->id = $id;
        $titulo->nome = $nome;
        $titulo->descricao = $descricao;
        $titulo->categoria = $cat;
        $titulo->foto = $foto;

        return $titulo;
    }

public static function getNotaByTitulo($idtitulo){
    $query = "SELECT n.id, 
    n.nota, n.idTitulo, n.idUsuario, n.opiniao, 
    t.nome AS nomeTitulo, t.codCategoria 
    FROM notas n 
    INNER JOIN titulos t ON n.idTitulo = t.id 
    WHERE t.id = ". $idtitulo ;
    $result = Conexao::consultar($query);

    list($id, $nota, $idTitulo, $notaIdUsuario, $notaOpiniao, $nomeTitulo, $tituloCat) = mysqli_fetch_row($result);
    $notas = new Nota();
    $notas->id = $id;
    $notas->nota = $nota;
    $notas->idTitulo = $idTitulo;
    $notas->notaIdUsuario = $notaIdUsuario;
    $notas->notaOpiniao = $notaOpiniao;
    $notas->nomeTitulo = $nomeTitulo;
    $notas->tituloCat = $tituloCat;

    return $notas;
}

public static function mediaNotaPorTitulo($medias){
    $query = "SELECT AVG(nota) FROM notas WHERE idTitulo = ".$medias;
    $result = Conexao::consultar($query);

    list($media) = mysqli_fetch_row($result);
    $mediaNota = new mediaNota();
    $mediaNota->mediaNota = $media;
    return $mediaNota;
}

public static function comentariosTitulo($idTitulo){
    $query = "SELECT n.nota, u.nome, n.opiniao, t.nome AS nomeTitulo
    FROM notas n 
    INNER JOIN usuarios u ON u.id = n.idUsuario
    INNER JOIN titulos t ON n.idTitulo = t.id WHERE t.id = ".$idTitulo;
    $result = Conexao::consultar($query);
    
    $notas = new ArrayObject();
    while(list($nota, $username, $opiniao, $nomeTitulo) = mysqli_fetch_row($result)){
        $n1 = new Nota();
        $n1->nota =  $nota;
        $n1->username = $username;
        $n1->opiniao = $opiniao;
        $n1->nomeTitulo = $nomeTitulo;
        
        $notas->append( $n1 );
    }
    return $notas;
}

public static function pesquisar($pesquisa){
    $termo = "%".$pesquisa."%";
    $query = "SELECT t.id,(SELECT AVG(nota) FROM notas WHERE idTitulo = t.id) AS mediaNota, t.nome, t.foto
        FROM titulos t
        WHERE t.nome LIKE '".$termo."'";
    $result = Conexao::consultar($query);
    
    $lista = new ArrayObject();
    while(list($id, $medianota, $nomeTitulo, $foto) = mysqli_fetch_row($result)){
        $titulo = new Titulo();
        $titulo->id =  $id;
        $titulo->medianota = $medianota;
        $titulo->nome = $nomeTitulo;
        $titulo->foto = $foto;
        
        $lista->append($titulo);
    }
    return $lista;
}

public static function checarNota($idUsuario, $idTitulo){
    $query = "SELECT idUsuario, idTitulo
    FROM notas
    WHERE idUsuario = " . $idUsuario . " AND idTitulo = ".$idTitulo;
    $checarNota = Conexao::consultar($query);
    if(mysqli_num_rows($checarNota) !=0 ){
        return true;
    }else{
        return false;
    }
    
}


}