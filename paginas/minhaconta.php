<?php
if (isset($_REQUEST['erroNoLogin'])) {
    echo " <script> alert('Usuário ou senha inválidos');</script>";
} else {
}
?>
    <?php
    if (isset($_SESSION['logado']) && $_SESSION['logado']) {
        echo "Olá ".$_SESSION['nome_usuario'].", Seja bem vindo.";
    ?>
        <br>
        <br>
        <br>
    <?php
        echo '<a href="?pagina=logout"><button>Sair</button></a>';
    } else {
    ?>
        <div class="ml-3">Já possui uma conta?</div>
        <h2 class="ml-3">Login:</h2>
        <form method="POST" action="?pagina=logar">
            <label class="ml-3">Usuário:</label>
            <br>
            <input type="text" class="ml-3" name="user" />
            <br>
            <label class="ml-3">Senha:</label>
            <br>
            <input type="password" class="ml-3" name="senha" />
            <br>
            <br>

            <input type="submit" class="ml-3" value="Entrar" />
            <br>

        </form>


        <br>
        <br>

        <div class="ml-3">Novo por aqui? Registre-se!</div>
        <h2 class="ml-3">Cadastro:</h2>
        <form method="POST" action="?pagina=registrar&inserir=true">
            <div class="form-group">
                <label for="regEmail" class="ml-3">E-Mail:</label>
                <input type="email" name="regEmail" class="form-control-sm" id="regEmail" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="regSenha" class="ml-3">Senha:</label>
                <input type="password" name="regSenha" class="form-control-sm" id="regSenha">
            </div>
            <div class="form-group">
                <label for="regNome" class="ml-3">Nome:</label>
                <input type="text" name="regNome" class="form-control-sm" id="regNome">
            </div>
            <button type="submit" class="btn btn-primary ml-3">Registrar</button>
        </form>
    <?php

    }
    ?>