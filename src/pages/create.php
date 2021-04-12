<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/create.css">
    <title>Notícias</title>
</head>
<body>
    <?php
        require '../components/header.php'
    ?>
    <main>
        <div class="create-form-container">
            <form action="create.php" method="post" class="create-form">
                <div class="form-header">
                    <input type="text" name="titulo"
                    value="<?php echo isset($_POST['titulo']) ? $_POST['titulo'] : '' ?>"
                    placeholder="Título da notícia">
                    <p class="char-count">0/250 caracteres</p>
                    <select name="categoria">
                        <?php
                            require '../database/connection.php';
                            require '../controllers/categoria_controller.php';

                            $conn = getConnection();

                            $categorias = getCategorias($conn);

                            if(sizeof($categorias)){
                                foreach($categorias as $categoria){
                                    if(isset($_POST['categoria'])) echo '<option value="' . $categoria['id'] . '"' . ($_POST['categoria'] == $categoria['id'] ? ' selected' : '') . '>' . $categoria['nome'] . '</option>';
                                    else echo '<option value="' . $categoria['id'] . '">' . $categoria['nome'] . '</option>';
                                }
                            }
                        ?>
                    </select>
                </div>
                <textarea name="conteudo" placeholder="Conteúdo da notícia"><?php echo isset($_POST['conteudo']) ? $_POST['conteudo'] : '' ?></textarea>
                <p class="char-count">0/10000 caracteres</p>
                <button type="submit">Criar</button>
                <div class="create-msg-container">
                    <?php
                        require '../controllers/noticia_controller.php';

                        $titulo = filter_input(INPUT_POST, 'titulo');
                        $conteudo = filter_input(INPUT_POST, 'conteudo');
                        $categoriaId = filter_input(INPUT_POST, 'categoria');
                        if($_POST){
                            if($titulo && $conteudo && $categoriaId){
                                if(createNoticia($conn, $titulo, $categoriaId, $conteudo)){
                                    echo '<div class="create-sucesso">Notícia criada com sucesso!</div>';
                                } else echo '<div class="create-erro">Não foi possível criar a notícia.</div>';
                            } else echo '<div class="create-erro">Preencha todos os campos.</div>';
                        }
                    ?>
                </div>
            </form>
        </div>
    </main>
    <script>
        let input = document.querySelector('.form-header input')
        let txt = document.querySelector('textarea')
        let ccs = document.querySelectorAll('.char-count')

        input.addEventListener('input', (e) => {
            if(input.value.length > 250) input.value = input.value.slice(0, 250)
            ccs[0].innerHTML = input.value.length + '/250 caracteres'
        })

        txt.addEventListener('input', (e) => {
            if(txt.value.length > 10000) txt.value = txt.value.slice(0, 10000)
            ccs[1].innerHTML = txt.value.length + '/10000 caracteres'
        })

        ccs[0].innerHTML = input.value.length + '/250 caracteres'
        ccs[1].innerHTML = txt.value.length + '/10000 caracteres'
    </script>
    <?php
        require '../components/footer.php'
    ?>
</body>
</html>