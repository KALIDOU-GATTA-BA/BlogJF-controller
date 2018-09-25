<?php
	require_once("model/Manager.php");
    $dbAcess=new Manager;
    $bdd=$dbAcess->dbConnect();
    $id=$_GET['id'];
    $req=$bdd->query("DELETE FROM posts where id=$id");    
    $req=$bdd->query("DELETE FROM comments where post_id=$id"); 
    echo "Le Chapitre a bien été supprimé!" .'<br><br>'.'<a href="../view/backend/indexBackend.php"> Retour </a>';