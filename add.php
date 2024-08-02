<?php

    $db = new PDO("sqlite:".__DIR__."/db.db"); 
    if(isset($_POST['kaydet'])){
    
        $title=$_POST['title'];
        $dec=$_POST['dec'];
        $liste=[$title,$dec];  
        //form ekleme sorgusu ve kayıt ekleme işlemi
        $kayit_sorgu = "INSERT INTO card (title, dec) 
                        VALUES (?,?)";
        $stmt = $db->prepare($kayit_sorgu);
        $stmt->execute($liste);
        header('Location: index.php' ); //geriye gitme
    }
?>