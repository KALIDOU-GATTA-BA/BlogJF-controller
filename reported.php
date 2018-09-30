<?php
    require_once("model/Manager.php");
    $dbAcess=new Manager;
   	$bdd=$dbAcess->dbConnect();
   	$id=$_GET['id'];
   	$idC=$_GET['idC'];
    $req= $bdd->query("SELECT alreadyReported FROM comments where id = '$idC' and post_id= '$id' ");
    $bool=$req->fetch();
    $_= $bool['alreadyReported'];
    if ($_==0){ 
                  $req = $bdd->prepare("UPDATE comments SET reported = :_reported, alreadyReported = :_alreadyReported WHERE id = '$idC' and post_id= '$id'");
                  $req->execute(array(
                  '_reported' => 1,
                  '_alreadyReported' => 1
                  ));
                  echo "Merci pour votre contribution, le commentaire a bien été signalé et va être modéré par l'administrateur.";?>
                  <br> <a href="/index.php?action=post&amp;id=<?= $id?>">Retour</a>
        <?php }
    else{
            echo"Ce commentaire a déjà été signalé par un lecteur et est en cours de modération par l'administrateur "; ?>
            <br> <a href="/index.php?action=post&amp;id=<?= $id?>">Retour</a>
    <?php }
?>
