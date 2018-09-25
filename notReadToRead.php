<?php

    require_once("model/Manager.php");
    $dbAcess=new Manager;
    $bdd=$dbAcess->dbConnect();
    $i=$_GET['id'];
    
    header("Location:index.php");
    
   	$req = $bdd->prepare("UPDATE comments SET notReadComment = :read WHERE post_id ='$i'");
    $req->execute(array(
    'read' => 0
    ));