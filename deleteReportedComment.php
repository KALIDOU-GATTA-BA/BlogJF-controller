<?php 
	require_once("model/Manager.php");
    $dbAcess=new Manager;
    $bdd=$dbAcess->dbConnect();
    $id=$_GET['id'];

    $req=$bdd->query("DELETE FROM comments where id=$id");

    echo 'Le commentaire a bien été supprimé. <br> <br> <a href="../view/backend/indexBackend.php">Retour</a>';