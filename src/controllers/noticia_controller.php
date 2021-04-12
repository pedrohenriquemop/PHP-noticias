<?php
    function getNoticias(PDO $conn, $filter){
        try{
            if($filter != ''){
                $sql = 'SELECT n.id, n.titulo, n.conteudo, cat.nome as categoria
                FROM noticia as n JOIN categoria as cat ON n.id_cat = cat.id
                WHERE n.titulo LIKE "%' . $filter . '%" OR cat.nome LIKE "%'. $filter .'%"';
            }
            else $sql = 'SELECT n.id, n.titulo, n.conteudo, cat.nome as categoria FROM noticia as n JOIN categoria as cat ON n.id_cat = cat.id';
            $result = $conn->query($sql);
            $arr = array();
            while($row = $result->fetch()){
                $arr[] = $row;
            }
            return $arr;
        } catch(PDOexception $e){
            echo 'Erro de conexão: ' . $e->getMessage();
        }
    }

    function getNotciaEspec(PDO $conn, $id){
        try{
            $sql = 'SELECT n.titulo, n.conteudo, cat.nome as categoria FROM noticia as n JOIN categoria as cat ON n.id_cat = cat.id WHERE n.id = ' . $id;
            $result = $conn->query($sql);
            $arr = array();
            while($row = $result->fetch()){
                $arr[] = $row;
            }
            return $arr;
        } catch(PDOexception $e){
            echo 'Erro de conexão: ' . $e->getMessage();
        }
    }

    function createNoticia(PDO $conn, $titulo, $idCat, $conteudo){
        try{
            $sql = 'INSERT INTO noticia (titulo, conteudo, id_cat) VALUES ("' . $titulo . '", "' . $conteudo . '", ' . $idCat . ')';
            $result = $conn->query($sql);
            return $result->rowCount();
        } catch(PDOexception $e){
            echo 'Erro de conexão: ' . $e->getMessage();
        }
    }

    function deleteNoticia(PDO $conn, $id){
        try{
            $sql = 'DELETE FROM noticia WHERE id = ' . $id;
            $result = $conn->query($sql);
            return $result->rowCount();
        } catch(PDOexception $e){
            echo 'Erro de conexão: ' . $e->getMessage();
        }
    }
?>