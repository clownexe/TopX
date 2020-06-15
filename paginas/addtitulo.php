    <?php
    $action = "inserir";
        if (isset($_SESSION['logado']) && $_SESSION['logado']) {


        ?>



            <form method="POST" class='ml-2 mt-2' action="controller/salvarTitulo.php?<?php echo $action; ?>">
                <label for="txtNome">Nome:</label>
                <input type="text" name="txtNome" required />
                <br>
                <label for="txtDescricao">Descrição:</label>
                <input type="text" name="txtDescricao" required />
                <br>
                <label for="categoria">Categoria:</label>
            <select name="categoria">
                <option value="0">Selecione a categoria...</option>
                <?php
                $lista = CategoriaDAO::getCategorias();

                foreach ($lista as $cat) {
                    echo '<option value="'   . $cat->id .  '">'  . $cat->nome . '</option>';
                }
                ?>
            </select>
                <br>
                <label for="foto">Foto:</label>
                <input type="text" name="foto" required />
                <br>
                <input type="submit" value="Salvar" />
                <input type="reset" value="Limpar" />
            </form>
        <?php
        }
        ?>