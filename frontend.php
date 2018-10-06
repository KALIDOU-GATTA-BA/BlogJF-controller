<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once("model/Manager.php");
function listPosts()
{
    $postManager = new PostManager(); 
    $posts = $postManager->getPosts(); 

    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{

    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {      
             $dbAcess=new Manager;
             $db=$dbAcess->dbConnect();
             $req=$db->query("SELECT COUNT(comment) as nbCmt FROM comments WHERE post_id = $postId ");
             $data= $req->fetch();
             $insert= $data['nbCmt'];
             $req1=$db->prepare("UPDATE posts SET countComment = :countCmt WHERE id = $postId ");
             $req1->execute(array(
             'countCmt' => $insert
             )); 
             header('Location: index.php?action=post&id=' . $postId);
    }
    
}
