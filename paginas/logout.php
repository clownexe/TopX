
<?php
    session_start();
    if (isset($_SESSION['logado']))
        unset ($_SESSION['logado']);
    
    if (isset($_SESSION['nome_usuario']))
        unset ($_SESSION['nome_usuario']);
    
    if (isset($_SESSION['id_usuario']))
        unset ($_SESSION['id_usuario']);

    if (isset($_SESSION['email_usuario']))
        unset ($_SESSION['email_usuario']);
    
    session_destroy();
    
    
    header("Location: index.php");

?>