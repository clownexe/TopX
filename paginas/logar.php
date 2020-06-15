<?php
    include_once '../config.php';
    //$usuario_cadastrado = "admin@admin.com";
    //$senha_cadastrada = "123";
    
    
    $user = $_POST['user'];
    $senha = $_POST['senha'];
    
    
    $query = "SELECT id, email, nome FROM usuarios WHERE email = '$user' AND senha = '$senha'";
    $result = Conexao::consultar($query);
    
    if (mysqli_num_rows($result) >0){
        session_start();
        $usuario = mysqli_fetch_assoc($result);
        $_SESSION['logado'] = TRUE;
        $_SESSION['id_usuario'] = $usuario['id'];
        $_SESSION['email_usuario'] = $usuario['email'];
        $_SESSION['nome_usuario'] = $usuario['nome'];
        header("Location: ?pagina=minhaconta");
    }else{
        header("Location: login.php?erroNoLogin");
    }
    
    
?>