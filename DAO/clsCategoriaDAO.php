<?php

class CategoriaDAO{

    public static function getCategorias(){
        $query = "SELECT id, nome FROM categorias ORDER BY nome";
        $result = Conexao::consultar($query);
        $lista = new ArrayObject();

        while( list($cod, $nome )= mysqli_fetch_row($result)){

                $cat = new Categoria();
                $cat->id = $cod;
                $cat->nome = $nome;
                
                $lista->append( $cat );
        }
        return $lista;
    }
    
    public static function exibirMenu(){
        $html = '<select name="categoria">
        <option value="0">Selecione a categoria...</option>';
        foreach (self::getCategorias() as $cat)
            $html .= '<option value="'   . $cat->id .  '">'  . $cat->nome . '</option>';
        $html .='</select>';
        return $html;
    }

    public static function dropdownCat(){
        $html = '<div class="dropdown-menu" aria-labelledby="navbarDropdown">';
        foreach (self::getCategorias() as $cat)
            $html .= '<a class="dropdown-item" href=?pagina=inicio&cat='.$cat->id .'>'. $cat->nome .'</a>';
        $html .='</div>';
        return $html;
    }

    public static function getUsuario($idUsuario){
        $query = "SELECT id FROM usuarios WHERE id = ".$idUsuario;
        $result = Conexao::consultar($query);
        list($usuario) = mysqli_fetch_row($result);
    $user = new Usuario();
    $user->user = $usuario;
    return $user;

    }
}