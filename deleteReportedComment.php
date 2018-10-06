<?php 
	require_once("model/Manager.php");
    $dbAcess=new Manager;
    $bdd=$dbAcess->dbConnect();
    $id=$_GET['id'];

    $req=$bdd->query("SELECT COUNT(comment) as nbCmt FROM comments WHERE post_id = $id ");
    $data= $req->fetch();
    $_= $data['nbCmt'];
    
	$req1=$bdd->query("DELETE FROM comments where id=$id");
    
    $req1 = $bdd->prepare("UPDATE posts SET countComment = :countCmt WHERE id = $id ");
                  $req->execute(array(
                  'countCmt' => $_
                  ));

    echo 'Le commentaire a bien été supprimé. <br> <br> <a href="../view/backend/indexBackend.php">Retour</a>';
