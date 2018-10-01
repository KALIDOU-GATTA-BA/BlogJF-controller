<?php require_once("model/Manager.php");
    $dbAcess=new Manager;
    $bdd=$dbAcess->dbConnect();
    $id=$_GET['id'];
    $idC=$_GET['idC'];
    
   	$req = $bdd->prepare("UPDATE comments SET reported = :read WHERE post_id ='$id' and id='$idC'");
    $req->execute(array(
    'read' => 0
    ));
    echo 'Vous avez approuvé ce commentaire. <br> <br> <a href="../view/backend/indexBackend.php">Retour</a>';