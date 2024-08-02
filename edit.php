<?php
    $db = new PDO("sqlite:".__DIR__."/db.db"); 
    if(isset($_POST['duzenle'])){

        $title=$_POST['title'];
        $dec=$_POST['dec'];
        $liste=[$title,$dec,$_POST['title']];  
        $kayit_sorgu = "UPDATE card SET title = ?, dec = ? where title=?;";
        $stmt = $db->prepare($kayit_sorgu);
        $stmt->execute($liste);
        header('Location: index.php' ); //geriye gitme
    }

?>
