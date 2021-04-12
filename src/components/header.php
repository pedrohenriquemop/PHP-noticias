<header>
    <h2>
        Notícias
    </h2>
    <div class="header-right">
        <a href="create.php" class="header-option">Criar notícia</a>
        <a href="index.php" class="header-option">Exibir notícias</a>
        <form action="" method="get" class="header-input">
            <input type="text" name="search" class="search-input"
            value="<?php
                if(isset($_GET['search'])) echo $_GET['search'];
            ?>">
            <button type="submit" class="search-btn">
                <img src="../../assets/imgs/search.png">
            </button>
        </form>
    </div>
    <script>
        let f = document.querySelector("form");
        let s = document.querySelector("input")

        f.addEventListener("submit", (e) => {
            s.value = s.value.trim()
            if(s.value == ''){
                e.preventDefault()
                window.location.href = "index.php"
            } else{
                e.preventDefault()
                window.location.href = "index.php?search=" + s.value
            }
        })
    </script>
</header>