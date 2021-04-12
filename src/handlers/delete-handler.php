<?php
    if(isset($_POST['id-delete'])){
        $conn = getConnection();
        $result = deleteNoticia($conn, $_POST['id-delete']);
        if($result) alert("Notícia ". $_POST['id-delete'] ."excluída com sucesso");
        else alert("Não deu");
    }

    function alert($str){
        echo "<script> alert($str) </script>";
    }
?>