<?php
require_once('../../functions/helpers.php');
require_once('../../functions/pdo_connection.php');
require_once('../../functions/check-login.php');
global $pdo;
$basePath = dirname(dirname(__DIR__));

if (isset($_GET['post_id']) && $_GET['post_id'] !== '') {
    $query = 'SELECT * FROM `posts` WHERE id=?';
    $statement = $pdo->prepare($query);
    $statement->execute([$_GET['post_id']]);
    $post = $statement->fetch();
    if (file_exists($basePath . $post->image)) {
        unlink($basePath . $post->image);
    }

    $query = 'DELETE FROM `posts` WHERE id=?';
    $statement = $pdo->prepare($query);
    $statement->execute([$_GET['post_id']]);
}


redirect('panel/post');