<?php
    require_once("model/Manager.php");
    $dbAcess=new Manager;
    $bdd=$dbAcess->dbConnect();
    $id=$_GET['id'];
    $idC=$_GET['idC'];
    header("Location:index.php?action=post&id=$id");
   	$req = $bdd->prepare("UPDATE comments SET notReadComment = :read WHERE post_id ='$id' and id='$idC'");
    $req->execute(array(
    'read' => 0
    ));
