<?php
    function getConnection(){
        return new PDO('mysql:host=127.0.0.1:3306;dbname=noticias', 'root', '');
    }
?>