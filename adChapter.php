<?php

	require_once("../model/Manager.php");
    $dbAcess=new Manager;
   	$db=$dbAcess->dbConnect();
   	$newChapter = $db->prepare('INSERT INTO posts( title, content, creation_date) VALUES(?, ?, NOW())');
    $insert = $newChapter->execute(array($_POST['tempChapterTitle'], $_POST['tempChapterContent']));
    //return $insert;
	echo "Le chapitre à bien été ajouté. ".'<br><br>';
	echo "Cliquez ".'<a href="../index.php">ici</a> pour le consulter.';