<?php
    require_once("model/Manager.php");
    $dbAcess=new Manager;
    $bdd=$dbAcess->dbConnect();
    $id=$_GET['id'];
     
    $req = $bdd->prepare('UPDATE posts SET content = :newContent, title = :newTitle WHERE id = :iD');
    $req->execute(array(
    'newContent' => $_POST['tempChapterContent'],
    'newTitle' => $_POST['tempChapterTitle'],
    'iD' => $id
    ));
    require_once("view/backend/viewUpdateConfirmation.php");