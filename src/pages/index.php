<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/index.css">
    <title>Notícias</title>
</head>
<body>
    <?php
        require '../components/header.php';
    ?>
    <main>
        <?php
            require '../controllers/noticia_controller.php';
            require '../database/connection.php';
            require '../handlers/delete-handler.php';

            $conn = getConnection();

            $search = '';
            if($_GET) $search = $_GET["search"];

            $noticias = getNoticias($conn, $search);

            if(!sizeof($noticias) && $search == ''){
                echo '<p>Não há nenhuma notícia. <a href="create.php">Criar</a></p>';
            }
            else if(!sizeof($noticias) && $search != ''){
                echo '<p>Nenhuma notícia encontrada com o termo "' . $search . '"</p>';
            }
            else{
                foreach($noticias as $noticia){
                    echo '<div class="noticia">
                        <div class="noticia-header">
                            <div>
                                <h3 class="noticia-titulo">' . $noticia['titulo'] . '</h3>
                                <p class="noticia-cat">' . $noticia['categoria'] .  '</p>
                            </div>
                            <form action="" method="post">
                                <input name="id-delete" style="display:none;" value="'. $noticia['id'] .'">
                                <button type="submit">
                                    <img src="../../assets/imgs/delete.png">
                                </button>
                            </form>
                        </div>
                        <div class="noticia-texto">
                            <textarea disabled>' . $noticia['conteudo'] . '</textarea>
                            <div class="gradient"></div>
                        </div>
                        <a class="noticia-botao" href="noticia.php?id=' . $noticia['id'] . '">Acessar</a>
                    </div>';
                }
            }
        ?>
        <!-- <div class="noticia">
            <div class="noticia-header">
                <h3 class="noticia-titulo">Título</h3>
                <p class="noticia-cat">Esportes</p>
            </div>
            <div class="noticia-texto">
                <textarea disabled>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lobortis lectus eu fringilla condimentum. Pellentesque hendrerit mauris sit amet pretium tempus. Vivamus eu nulla eget augue tincidunt consequat et non nibh. Cras hendrerit quis eros vel convallis. Morbi non tempus ante, ut ultricies lectus. Mauris sit amet diam a quam venenatis volutpat nec ac elit. Donec nisi turpis, posuere sed laoreet non, molestie euismod justo. Cras eget tempor ligula. Duis aliquet metus at mauris elementum laoreet. Aenean auctor, est at tincidunt bibendum, nibh metus blandit lacus, elementum eleifend massa massa iaculis erat. Maecenas lacinia, nunc eu porta tristique, mauris nisi finibus eros, quis pretium arcu libero vel metus. Donec suscipit, eros vitae pharetra rutrum, mi ipsum commodo dui, non accumsan metus arcu euismod nulla. Curabitur porttitor malesuada bibendum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent interdum metus est, in facilisis turpis aliquet sed.</textarea>
                <div class="gradient"></div>
            </div>
            <button class="noticia-botao">Acessar</button>
        </div> -->
    </main>
    <script>
        function goToURL(url){
            window.location.href = url
        }
    </script>
    <?php
        require '../components/footer.php'
    ?>

</body>
</html>
