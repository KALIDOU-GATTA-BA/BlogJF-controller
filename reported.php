<?php
	require_once("model/Manager.php");
    $dbAcess=new Manager;
   	$bdd=$dbAcess->dbConnect();
   
   	 //$req = $bdd->query("SELECT MAX(id) from comments");
   	 //$res=$req->fetch();
   	 $id=$_GET['id'];
   	 $idC=$_GET['idC'];
   
     $req1 = $bdd->prepare("UPDATE comments SET reported = :report WHERE id = '$idC' and post_id= '$id'");
     $req1->execute(array(
     'report' => 1
     ));

    echo "le commentaire à bien été signalé !";?>
    <br> <a href="../index.php">Retour</a>