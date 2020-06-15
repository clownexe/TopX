<?php
    $action = "inserir";
        if (isset($_SESSION['logado']) && $_SESSION['logado']) {
            if(isset($_REQUEST['erro'])){
                echo '<script>alert("Erro, você já deu a nota pra este título")</script>';
            }
        ?>


            
            <form method="POST" class='ml-2 mt-2' action="controller/salvarOpiniao.php?<?php echo $action; ?>">
            <label for="titulo">Titulo:</label>
            <select name="titulos">
                <option value="0">Selecione o título:</option>
                <?php 
                $titulos = TitulosDAO::getTitulos();
                foreach ($titulos as $tit){
                    echo '<option value="'   . $tit->id .  '">'  . $tit->nome . '</option>';
                }
                ?>
            </select>
                <br>
                <label for="txtOpiniao">Comentário:</label>
                <textarea id="txtOpiniao" name="txtOpiniao" rows="4" cols="50" required></textarea>
                <br>
                <label for="nota" name="nota">Dê uma nota de 1 a 10:</label>
                <select name="nota">
                <option value="1"selected>1</option> 
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <br>
                </select>
                <br>
                <input type="submit" value="Salvar" />
                <input type="reset" value="Limpar" />
            </form>
        <?php
        }else{
            echo 'Página não encontrada.';
        }
        ?>