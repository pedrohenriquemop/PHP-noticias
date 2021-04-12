<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Notícias</title>
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/noticia.css">
</head>
<body>
    <?php require '../components/header.php' ?>
    <main>
        <?php
            require '../controllers/noticia_controller.php';
            require '../database/connection.php';

            $conn = getConnection();

            if(isset($_GET['id'])){
                $result = getNotciaEspec($conn, $_GET['id']);
                if(sizeof($result)){
                    echo '<h1 class="not-tit">' . $result[0]['titulo'] . '</h1>';
                    echo '<h3 class="not-cat">' . $result[0]['categoria'] . '</h3>';
                    $paragrafos = explode("\n", $result[0]['conteudo']);
                    foreach($paragrafos as $paragrafo) echo '<p class="not-con">' . $paragrafo . '</p>';
                } else echo '<p class="error">Notícia não encontrada.</p>';
            }
            else echo '<p class="error">Não há nenhuma notícia selecionada. <a href="index.php">Ir para a página de notícias</a></p>'
        ?>
    </main>
    <?php require '../components/footer.php' ?>
</body>
</html>