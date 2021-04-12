<?php
    function getCategorias(PDO $conn){
        try{
            $sql = 'SELECT * FROM categoria';
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
?>